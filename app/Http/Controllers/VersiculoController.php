<?php

namespace App\Http\Controllers;

use App\Models\Versiculo;
use Illuminate\Http\Request;
use App\Http\Resources\VersiculoResource;

class VersiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $versiculo = Versiculo::all();
        return VersiculoResource::collection($versiculo);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(Versiculo::create($request->all())){
            return response()->json([
                'message' => 'Versiculo cadastrado com sucesso!!'
            ]);
        }
        else{
            return response()->json([
                'message' => 'Erro ao cadastrar o versiculo!'
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($versiculo)
    {
        $versiculo = Versiculo::find($versiculo);

        if($versiculo){
            $response = [
                'message' => 'Versiculo exibido com sucesso!',
                'data' => VersiculoResource::make($versiculo)
            ];
            return response($response);
        }
        else{
            return response()->json([
                'message' => 'Erro ao exibir o versiculo!'
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Versiculo $versiculo)
    {
        if($versiculo -> update($request->all())){
            return response()->json([
                'message' => 'Versiculo atualizado com sucesso!!'
            ]);
        }
        else{
            return response()->json([
                'message' => 'Erro ao atualizar o versiculo!'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Versiculo $versiculo)
    {
        if($versiculo->delete()){
            return response()->json([
                'message' => 'Versiculo deletado com sucesso!!'
            ]);
        }
        else{
            return response()->json([
                'message' => 'Erro ao deletar o versiculo!'
            ]);
        }
    }
}
