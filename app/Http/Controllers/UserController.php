<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|min:1',
            'cpf' => 'required|string|min:1',
            'cep' => 'required|string|min:1',
            'neighborhood' => 'required|string|min:1',
            'city' => 'required|string|min:1',
            'street' => 'required|string|min:1',
            'dateBirth' => 'required|date',
        ]);

        $user = User::create($validated);

        return response()->json($user, 201); // Retorna o usuário criado.
    }
}
