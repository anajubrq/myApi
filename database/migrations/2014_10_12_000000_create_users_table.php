<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // A coluna 'id' será criada automaticamente, como chave primária.
            $table->string('name'); // Nome do usuário.
            $table->string('cpf')->unique(); // CPF do usuário, com uma restrição de unicidade.
            $table->string('cep'); // CEP.
            $table->string('neighborhood'); // Bairro.
            $table->string('city'); // Cidade.
            $table->string('street'); // Rua.
            $table->date('dateBirth'); // Data de nascimento (tipo 'date' é adequado para datas).
            $table->timestamps(); // Adiciona as colunas created_at e updated_at.
        });
    }

    public function down()
    {
        Schema::dropIfExists('users'); // Se precisar desfazer a migration.
    }
}
