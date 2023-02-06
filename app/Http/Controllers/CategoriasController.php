<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CategoriasController extends Controller
{
    public function index() {
        $categorias = Categoria::get();
        return view('categorias.lista_categorias', ['categorias' => $categorias]);
    }

    public function new() {
        return view('categorias.form_categorias');
    }

    public function add(Request $request) {
        $categorias = new Categoria;
        $categorias = $categorias->create( $request->all());
        return Redirect::to('/categorias');
    }

    public function edit($id) {
        $categoria = Categoria::findOrFail( $id );
        return view('categorias.form_categorias', ['categoria' => $categoria]);
    }

    public function update( $id, Request $request ){
        $categoria = Categoria::findOrFail( $id );
        $categoria->update( $request->all() );
        return Redirect::to('/categorias');
    }

    public function delete( $id ){
        $categoria = Categoria::findOrFail( $id );
        $categoria->delete();
        return Redirect::to('/categorias');
    }
}
