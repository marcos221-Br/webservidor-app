<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('processos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('numeroprocesso');
            $table->string('cliente');
            $table->string('descricao')->nullable();
            $table->boolean('escritorio')->nullable();;
            $table->string('proximoprazo');
            $table->unsignedBigInteger('idusuario');
            $table->timestamps();
            $table->foreign('idusuario')->references('id')->on('usuarios');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('processo');
    }
};
