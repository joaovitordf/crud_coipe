<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pessoas', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 128);
            $table->string('email', 256);
            $table->string('celular', 15);
            $table->string('cidade', 64);
            $table->string('estado', 32);
            $table->string('documento', 14)->unique();
            $table->string('tipo', 128);
            $table->string('ativo', 32);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pessoas');
    }
};
