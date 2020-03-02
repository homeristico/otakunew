<?php

namespace otakunew\Http\Controllers;

use Illuminate\Http\Request;
use otakunew\Articulo;

class BuscarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $validateData = $request->validate([
                'buscarDato' => 'required',
            ]);

            $res = array();
            $nada = "";
            $buscar = $request->buscarDato;
            $palabra = strtoupper($buscar);
            $articulo = Articulo::all();
            foreach($articulo as $titulo){
                $conicidencia = strpos($titulo->titulo,$palabra);
                if($conicidencia === false){
                     //return "no hay concidencia";
                }else{
                    array_push($res, $titulo);
                   
                }
                
            }
            if(empty($res)){
                $nada = "No se obtuvieron resultados para: ".$buscar;
            }else{
                $nada = "";
            }
            return view('articles.busqueda',compact('res'))->with('nada',$nada);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
