<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnimalFormRequest;
use App\Http\Requests\AnimalUpdateFormRequest;
use App\Models\Animal;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    public function criarAnimal(AnimalFormRequest $request)
    {
        $animal = Animal::create([
            'nome' => $request->nome,
            'idade' => $request->idade,
            'especie' => $request->especie,
            'ra' => $request->ra,
            'peso' => $request->peso,
            'altura' => $request->altura,
            'sexo' => $request->sexo,
            'dieta' => $request->dieta,
            'habitat' => $request->habitatS

        ]);
        return response()->json([
            "success" => true,
            "message" => "Animal cadastrado com sucesso",
            "data" => $animal
        ], 200);
    }

    public function pesquisarPorId($id)
    {
        $animal = Animal::find($id);
        if ($animal == null) {
            return response()->json([
                'status' => false,
                'message' => "Animal não encontrado"
            ]);
        }
        return response()->json([
            'status' => true,
            'data' => $animal
        ]);
    }

    public function retornarTodos()
    {
        $profissionais = Animal::all();
        return response()->json([
            'status' => true,
            'data' => $profissionais
        ]);
    }

    public function pesquisarPorNome(Request $request)
    {
        $animal = Animal::where('nome', 'like', '%' . $request->nome . '%')->get();

        if (count($animal) > 0) {

            return response()->json([
                'status' => true,
                'data' => $animal
            ]);
        }

        return response()->json([
            'status' => false,
            'message' => 'Não há resultados para a pesquisa.'
        ]);
    }

    public function pesquisarPorEspecie(Request $request)
    {
        $animal = Animal::where('especie', 'like', '%' . $request->especie . '%')->get();

        if (count($animal) > 0) {

            return response()->json([
                'status' => true,
                'data' => $animal
            ]);
        }

        return response()->json([
            'status' => false,
            'message' => 'Não há resultados para a pesquisa.'
        ]);
    }

    public function excluirAnimal(Request $request)
    {

        $animal = Animal::find($request->id);

        if (!isset($animal)) {
            return response()->json([
                'status' => false,
                'message' => "Animal não encontrado"
            ]);
        }
        else{
        $animal->delete();
        return response()->json([
            'status' => true,
            'message' => "Animal excluido com sucesso"
        ]);}
    }

    public function atualizarAnimal(AnimalUpdateFormRequest $request)
    {
        $animal = Animal::find($request->id);
        //Função If set para verificar se a variavel está vazia ou com um valor determinado
        if (!isset($animal)) {
            return response()->json([
                'status' => false,
                'message' => "Animal não atualizado"
            ]);
        }
        if (isset($request->idade)) {
            $animal->idade = $request->idade;
        }

        if (isset($request->nome)) {
            $animal->nome = $request->nome;
        }

        if (isset($request->especie)) {
            $animal->especie = $request->especie;
        }

        if (isset($request->ra)) {
            $animal->ra = $request->ra;
        }

        if (isset($request->peso)) {
            $animal->peso = $request->peso;
        }

        if (isset($request->altura)) {
            $animal->altura = $request->altura;
        }

        if (isset($request->sexo)) {
            $animal->sexo = $request->sexo;
        }

        if (isset($request->dieta)) {
            $animal->dieta = $request->dieta;
        }

        if (isset($request->habitat)) {
            $animal->habitat = $request->habitat;
        }

        $animal->update();

        return response()->json([
            'status' => true,
            'message' => "Animal atualizados"
        ]);
    }

    public function pesquisarPorRa(Request $request)
    {
        $animal = Animal::where('ra', 'like', '%' . $request->ra . '%')->get();
        if (count($animal) > 0) {

            return response()->json([
                'status' => true,
                'data' => $animal
            ]);
        }
        return response()->json([
            'status' => false,
            'message' => 'Não há resultados para a pesquisa.'
        ]);
    }
}
