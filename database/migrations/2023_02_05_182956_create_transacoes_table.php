<?php

use App\Models\Pessoa;
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
        Schema::create('transacoes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pessoa_id')->references('id')->on('pessoas');
            $table->foreignId('categoria_id')->references('id')->on('categorias');
            $table->string('status_transacao', 16);
            $table->string('tipo_transacao', 16);
            $table->decimal('saldo_atual', 9, 2);
            $table->string('data_vencimentoTitulo', 64);
            $table->string('data_liquidacao', 64);
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
        Schema::dropIfExists('transacoes');
    }
};
