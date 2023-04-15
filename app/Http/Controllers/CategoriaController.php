<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use Illuminate\Support\Facades\Redirect;
use DB;
// use App\Http\Controllers\Controller;
// use Illuminate\Support\Facades\DB;

class CategoriaController extends Controller{
    public function index(){         
        $obj_cate=DB::table('categorias')->where('c_estado','<>', 'eliminado')->orderBy('id','desc')->get();
        // $obj_cate=DB::table("categorias")->()->get();
        // $obj_cate=Categoria::all();

        // return $obj_cate;
        // return var_dump($obj_cate);
        return view('categoria.categoria_index',compact('obj_cate'));
    }
    public function guardarNuevoCategoria(Request $request)
    { 
        //guradar datos
        $obj=new Categoria();
        $obj->c_nombre=mb_strtoupper($request->post('c_nombre'),'utf-8');
        $obj->c_descripcion=mb_strtoupper($request->post('c_descripcion'),'utf-8');
        $obj->c_estado='activo';
        $obj->c_fecha_reg=date('Y-m-d');
        $obj->save();
        return "exitosamente guardado";
    }
    public function inicio()
    {
        return view('inicio.contenido_index');
    }
    public function create() {
        //
    }
    public function store(Request $request) {
        //
    }
    public function show(Categoria $categoria) {
        //
    }
    public function edit(Categoria $categoria) {
        //
    }
    public function update(Request $request, Categoria $categoria) {
        //
    }
    public function destroy(Categoria $categoria) {
        //
    }
}
