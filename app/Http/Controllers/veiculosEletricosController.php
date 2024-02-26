<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\veiculosEletricos;
use Illuminate\Supporte\Facades\Validator;
use Illuminate\Http\Response;

class veiculosEletricosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $recebedados = veiculosEletricos::all();
        $contador = $recebeDados->count();

        return 'Veiculos Eletricos: '.$contador. $recebeDados.Response()->json([],Response::HTTP_NO_CONTENT); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $recebeDados = $request->all();
        $valida = Validator::make($recebeDados,[
            'marca'=> 'required',
            'modelo'=> 'required',
            'motor'=> 'required'
        ]);

        if($valida->fail()){
            return 'Dados Invalidos' .$valida->error(true). 500;
        }
        $carroEletricoBanco = veiculosEletricos::create($recebeDados);
        if($carroEletricoBanco){
            return 'Dados Cadastrados' .Response()->json([],Response::HTTP_NO_CONTENT);

        }
        else{
            return 'Dados não Cadastrados' .Response()->json([],Response::HTTP_NO_CONTENT);
        };


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $recebeDados = veiculosEletricos::find($id);
        $contador = $recebeDados->count();

        if($recebeDados){
            return 'Veiculos Eletrico: '.$contador.'-'. $recebeDados.Response()->json([],Response::HTTP_NO_CONTENT); 
        }else {
            return 'Veiculo Eletrico não Encontrado' .Response()->json([],Response::HTTP_NO_CONTENT);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $recebeDados = $request->all();
        $valida = Validator::make($recebeDados,[
            'marca'=> 'required',
            'modelo'=> 'required',
            'motor'=> 'required'
        ]);

        if($valida->fail()){
            return 'Dados Invalidos' .$valida->error(true). 500;
        }

        $veiculosEletricosBanco = veiculosEletricos::find($id);
        $veiculosEletricosBanco->marca = $recebeDados['marca'];
        $veiculosEletricosBanco->modelo = $recebeDados['modelo'];
        $veiculosEletricosBanco->motor = $recebeDados['motor'];

        $carroEletricoBanco = veiculosEletricos::save($veiculosEletricosBanco);
        if($carroEletricoBanco){
            return 'Atualização de dados bem sucedida' .Response()->json([],Response::HTTP_NO_CONTENT);

        }
        else{
            return 'Atualização de dados falhou' .Response()->json([],Response::HTTP_NO_CONTENT);
        };

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $recebeDados = veiculosEletricos::find($id);

        if($carroEletricoBanco){

            $recebeDados->delete();
            return 'Os Dados Deletados com Sucesso' .Response()->json([],Response::HTTP_NO_CONTENT);

        }
        else{
            return 'Os Dados não foram Deletados' .Response()->json([],Response::HTTP_NO_CONTENT);
        };

    }
}
