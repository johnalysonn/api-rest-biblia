<?php

namespace App\Http\Controllers;

use App\Models\Testamento;
use App\Models\Livro;
use App\Models\Versiculo;
use App\Http\Resources\TestamentoResource;

use Illuminate\Http\Request;

class TestamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testamentos = Testamento::all();
        return TestamentoResource::collection($testamentos);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(Testamento::create($request->all())){
            return response()->json([
                'message' => 'Testamento cadastrado com sucesso!!'
            ]);
        }
        else{
            return response()->json([
                'message' => 'Erro ao cadastrar o testamento!'
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($testamento)
    {
        $testamento = Testamento::find($testamento);
        if($testamento){
            $response = [
                'message' => 'Testamento exibido com sucesso!!',
                'data' => TestamentoResource::make($testamento)

            ];
            return response($response);
        }
        else{
            return response()->json([
                'message' => 'Erro ao exibir o testamento!'
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Testamento $testamento)
    {
        if($testamento -> update($request->all())){
            return response()->json([
                'message' => 'Testamento atualizado com sucesso!!'
            ]);
        }
        else{
            return response()->json([
                'message' => 'Erro ao atualizar o testamento!'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Testamento $testamento)
    {
        if($testamento->delete()){
            return response()->json([
                'message' => 'Testamento deletado com sucesso!!'
            ]);
        }
        else{
            return response()->json([
                'message' => 'Erro ao deletar o testamento!'
            ]);
        }
    }
}
