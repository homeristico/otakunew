<?php

namespace otakunew\Http\Controllers;

use Illuminate\Http\Request;
use otakunew\Comentario;
use otakunew\Mail\comentarioNotification;
use Illuminate\Support\Facades\Mail;

class ComentarioController extends Controller
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
         $comentario = new Comentario();
         $comentario->comentario = $request->comentario;
         $comentario->articulo_id = $request->articulo_id;
         $comentario->user_id = $request->user_id;
         $comentario->user_comentario = $request->user_comentario;
         $comentario->save();

         $array = array("comentario" => $comentario->comentario,           
                        "user_comentario" => $comentario->user_comentario    
        );

        //Mail::to('newotakumail@gmail.com')->send(new comentarioNotification($array));
        echo json_encode($array);
       
         
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
