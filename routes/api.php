<?php

use App\Http\Controllers\AnimalController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// Animal rotas
Route::post('animal/cadastrar', [AnimalController::class, 'criarAnimal']);
Route::get('animal/todos', [AnimalController::class, 'retornarTodos']);
Route::post('animal/pesquisar/nome', [AnimalController::class, 'pesquisarPorNome']);
Route::post('animal/pesquisar/especie', [AnimalController::class, 'pesquisarPorEspecie']);
Route::post('animal/pesquisar/ra', [AnimalController::class, 'pesquisarPorRa']);
Route::delete('animal/excluir/{id}', [AnimalController::class, 'excluirAnimal']);
Route::post('animal/atualizar', [AnimalController::class, 'atualizarAnimal']);
Route::get('animal/encontrar/{id}', [AnimalController::class, 'pesquisarPorId']);