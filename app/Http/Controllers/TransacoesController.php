<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\Transacao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class TransacoesController extends Controller
{
    public function index() {
        $transacoes = Transacao::get();
        return view('transacoes.lista_transacoes', ['transacoes' => $transacoes]);
    }

    public function new() {
        return view('transacoes.form_transacoes');
    }

    public function add(Request $request) {
        $transacoes = new Transacao;
        $transacoes = $transacoes->create( $request->all());
        return Redirect::to('/transacoes');
    }

    public function edit($id) {
        $transacao = Transacao::findOrFail( $id );
        return view('transacoes.form_transacoes', ['transacao' => $transacao]);
    }

    public function update( $id, Request $request ){
        $transacao = Transacao::findOrFail( $id );
        $transacao->update( $request->all() );
        return Redirect::to('/transacoes');
    }

    public function delete( $id ){
        $transacao = Transacao::findOrFail( $id );
        $transacao->delete();
        return Redirect::to('/transacoes');
    }

    public function filtroCategoria() {
        return Transacao::withWhereHas ('categorias', function($query){
            $query->where('nome_categoria', request()->query('categoria'));
        })->get();
    }
}