<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    // Método para listar todos os usuários
    public function index()
    {
        $users = User::all(); // Recupera todos os usuários
        return response()->json($users);
    }

    // Método para criar um novo usuário
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|min:1',
            'cpf' => 'required|string|min:1|unique:users,cpf',
            'cep' => 'required|string|min:1',
            'neighborhood' => 'required|string|min:1',
            'city' => 'required|string|min:1',
            'street' => 'required|string|min:1',
            'dateBirth' => 'required|date',
        ]);

        $user = User::create($validated);
        return response()->json($user, 201); // Retorna o usuário criado com o status 201 (Created)
    }

    // Método para atualizar os dados de um usuário
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404); // Caso o usuário não seja encontrado
        }

        $validated = $request->validate([
            'name' => 'required|string|min:1',
            'cpf' => 'required|string|min:1|unique:users,cpf,' . $user->id,
            'cep' => 'required|string|min:1',
            'neighborhood' => 'required|string|min:1',
            'city' => 'required|string|min:1',
            'street' => 'required|string|min:1',
            'dateBirth' => 'required|date',
        ]);

        $user->update($validated);
        return response()->json($user);
    }

    // Método para excluir um usuário
    public function destroy($id)
    {
        $user = User::find($id);
        
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404); // Caso o usuário não seja encontrado
        }

        $user->delete();
        return response()->json(['message' => 'User deleted successfully']);
    }
}
