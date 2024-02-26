<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\veiculosEletricosController;

route::get('/', function(){return Response()->json(['Sucesso'=>true]);});

route::get('/veiculoseletricos',[veiculosEletricosController::class,'index']);

route::get('/veiculoseletricos/{id}',[veiculosEletricosController::class,'show']);

route::put('/veiculoseletricos/{id}',[veiculosEletricosController::class,'update']);
route::delete('/veiculoseletricos/{id}',[veiculosEletricosController::class,'destroy']);
route::post('/veiculoseletricos',[veiculosEletricosController::class,'store']);




