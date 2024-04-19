<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::dropIfExists('users');
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('cpf')->unique();
            $table->string('email2')->unique();
            $table->string('status')->default('Ativo')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('role')->nullable()->default(2); //2 cliente, 1 admin
            $table->string('img')->nullable()->default('perfil.png'); //2 cliente, 1 admin
            $table->string('estado_civil')->nullable();
            $table->string('matricula')->nullable();
            $table->string('endereco')->nullable();
            $table->text('cep')->nullable();
            $table->text('cidade')->nullable();
            $table->text('uf')->nullable();
            $table->text('natural')->nullable();
            $table->string('cpf')->nullable();
            $table->string('rg')->nullable();
            $table->string('cargo')->nullable();
            $table->string('nivel')->nullable();
            $table->string('lotacao')->nullable();
            $table->string('pai')->nullable();
            $table->string('mae')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
