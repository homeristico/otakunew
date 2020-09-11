<?php

namespace otakunew\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use otakunew\Articulo;
use otakunew\Comentario;
use otakunew\Imagen;
use otakunew\Video;
use otakunew\User;
use otakunew\Download;
use otakunew\Mail\ArticuloNotification;
use Illuminate\Support\Facades\Mail;
use otakunew\Http\Requests\CreateArticleRequest;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $articulos = Articulo::latest()->paginate(10);
        
        return view('articles.index',compact('articulos'));  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user() && Auth::user()->rol == "administrador"){            
                return view('articles.create');            
        }else{            
            return redirect()->route('articles.index');        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateArticleRequest $request)
    {
        if($request->hasFile('imagen')){
            $file = $request->file('imagen');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/images/',$name);
        }
        $articulo = new Articulo();
        $articulo->titulo = strtoupper($request->titulo);
        $articulo->imagen = $name;
        $articulo->descripcion = $request->descripcion;
        $articulo->categoria = $request->categoria;
        $articulo->detalles = $request->detalles;
        //$articulo->link = $request->link;
        $articulo->slug = $request->slug;
        $articulo->save();   
        
        //$correos = User::pluck('email');        
        //Mail::to($correos)->send(new ArticuloNotification($articulo));
        return redirect()->route('articles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($arti)
    {
        $articulo = Articulo::where('slug','=',$arti)->FirstOrFail();
        $articulo_id = $articulo->id;
        //$comentarios = Comentario::where('articulo_id','=',$articulo_id);
        $video = Video::where('articulo_id',$articulo_id)->get();
        $imagen = Imagen::where('articulo_id',$articulo_id)->get();
        $comentarios = DB::table('comentarios')->where('articulo_id', $articulo_id)->get();
        $links = Download::where('articulo_id',$articulo_id)->get();
        return view('articles.show',compact('articulo'))->with('comentarios',$comentarios)->with('imagen',$imagen)->with('video',$video)->with('links',$links);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $editarArticulo = Articulo::where('slug','=',$id)->FirstOrFail();
      return view('articles.edit', compact('editarArticulo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $actualizarArticulo = Articulo::where('slug','=',$slug)->FirstOrFail();
        $actualizarArticulo -> fill($request->except('imagen'));
        if($request->hasFile('imagen')){
            unlink(public_path().'/images/'.$actualizarArticulo->imagen);
            $file = $request->file('imagen');
            $name = time().$file->getClientOriginalName();
            $actualizarArticulo->imagen = $name;
            $file->move(public_path().'/images/', $name);
        }
        $actualizarArticulo->save();
        return redirect()->route('showarticle');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //ELIMINAR ARTICULO
        $imagenArticulo = Articulo::where('id','=',$id)->FirstOrFail();
        $file_path = public_path().'/images/'.$imagenArticulo->imagen;
        \File::delete($file_path);
        $imagenArticulo->delete();

        //ELIMINAR IMAGENES DEL ARTICULO
        $imagenesArticulo = Imagen::where('articulo_id',$id)->get();
        foreach($imagenesArticulo as $imgsArt){
            $ruta = public_path().'/images/imagenesArticulo/'.$imgsArt->imagen;
            \File::delete($ruta);
            $imgsArt->delete();
        }

        //ELEMINAR COMENTARIOS DEL ARTICULO
        $comentariosArticulo = Comentario::where('articulo_id',$id)->get();
        foreach($comentariosArticulo as $comentario){
            $comentario->delete();
        }

        //ELEMINAR VIDEOS DEL ARTICULO
        $videosArticulo = Video::where('articulo_id',$id)->get();
        foreach($videosArticulo as $video){
            $video->delete();
        }

        // return redirect()->route('showarticle');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showArticle()
    {  
        if(Auth::user() && Auth::user()->rol == "administrador"){            
                $showarticle = Articulo::latest()->paginate(10);
                return view('articles.showarticle',compact('showarticle'));          
        }else{            
            return redirect()->route('articles.index');
        }       
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function filtro($cat){
        if($cat == "anime" || $cat == "videojuegos" || $cat == "noticias"){
            $categoria = Articulo::where('categoria',$cat)->latest()->paginate(3);        
            return view('articles.categoria',compact('categoria'));
        }else{
            return $cat;
        }
       
        
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeLinks(Request $request){

        $link = new Download();
        $link->link = $request->link;
        $link->articulo_id = $request->articulo_id;

        if($link->save()){
            return response()->json([
                'success' => true,
                'message' => 'link guardado correctamente.'
            ]);
        }else{
            return response()->json(['success' => false]);
        }        
    }

}
