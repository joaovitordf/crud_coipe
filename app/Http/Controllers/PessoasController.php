<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Pessoa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PessoasController extends Controller
{
    public function index() {
        $pessoas = Pessoa::get();
        return view('pessoas.lista_pessoas', ['pessoas' => $pessoas]);
    }

    public function new() {
        return view('pessoas.form_pessoas');
    }

    public function add(Request $request) {
        $pessoa = new Pessoa;
        $pessoa = $pessoa->create( $request->all());
        return Redirect::to('/pessoas');
    }

    public function edit($id) {
        $pessoa = Pessoa::findOrFail( $id );
        return view('pessoas.form_pessoas', ['pessoa' => $pessoa]);
    }

    public function update( $id, Request $request ){
        $pessoa = Pessoa::findOrFail( $id );
        $pessoa->update( $request->all() );
        return Redirect::to('/pessoas');
    }

    public function delete( $id ){
        $pessoa = Pessoa::findOrFail( $id );
        $pessoa->delete();
        return Redirect::to('/pessoas');
    }
}
