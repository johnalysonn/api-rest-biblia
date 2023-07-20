<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use Illuminate\Http\Request;
use App\Http\Resources\LivroResource;

class LivroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $livro = Livro::all();
        return LivroResource::collection($livro);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(Livro::create($request->all())){
            return response()->json([
                'message' => 'Livro cadastrado com sucesso!!'
            ]);
        }
        else{
            return response()->json([
                'message' => 'Erro ao cadastrar o Livro!'
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($livro)
    {
        $livro= Livro::find($livro);

        if($livro){
            $response = [
                'message' => 'Livro exibido com sucesso!',
                'data' => LivroResource::make($livro)
            ];

            return response($response);
        }

        else{
            return response()->json([
            'message' => 'Erro ao exibir o livro!'
            ]);
        };
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Livro $livro)
    {
        if($livro -> update($request->all())){
            return response()->json([
                'message' => 'Livro atualizado com sucesso!!'
            ]);
        }
        else{
            return response()->json([
                'message' => 'Erro ao atualizar o livro!'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Livro $livro)
    {
        if($livro->delete()){
            return response()->json([
                'message' => 'Livro deletado com sucesso!!'
            ]);
        }
        else{
            return response()->json([
                'message' => 'Erro ao deletar o livro!'
            ]);
        }
    }
}
