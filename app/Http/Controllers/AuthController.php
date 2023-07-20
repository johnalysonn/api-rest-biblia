<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\UserResource;


class AuthController extends Controller
{
    public function index(){
        $users = User::all();
        return UserResource::collection($users);
    }
    public function register(Request $request){
        $fields = $request-> validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|confirmed',
        ]);

        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password']),
        ]);

        $token = $user->createToken($request->tokenName)->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];
        return response($response);
    }
    public function show($user){
        $user = User::find($user);

        if($user){
            $response = [
                'message' => 'Usuário exibido com sucesso!',
                'data' => UserResource::make($user)
            ];
            return response($response);
        }
        else{
            return response()->json([
                'message' => 'Erro ao exibir o usuário!'
            ]);
        }
    }
    public function login(Request $request){
        $fields = $request-> validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        $user = User::where('email', $fields['email'])->first();

        if(!$user || !Hash::check($fields['password'], $user->password)){
            return response()->json([
                'message' => 'E-mail ou Senha inválidos',
            ]);
        }
        $token = $user->createToken('Usuário logado')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response);
    }
    public function logout(){
        auth()->user()->tokens()->delete();

        return response()->json([
            'message' => 'Logout realizado e tokens excluídos.'
        ]);
    }
    public function update(Request $request, User $user)
    {
        if($user -> update($request->all())){
            return response()->json([
                'message' => 'Usuário atualizado com sucesso!!'
            ]);
        }
        else{
            return response()->json([
                'message' => 'Erro ao atualizar o usuário!'
            ]);
        }
    }
    public function destroy(User $user){
        if($user->delete()){
            return response()->json([
                'message' => 'Usuário deletado com sucesso!!'
            ]);
        }
        else{
            return response()->json([
                'message' => 'Erro ao deletar o user!'
            ]);
        }
    }
}
