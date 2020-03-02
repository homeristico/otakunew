<?php

namespace otakunew;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    //SE DEBE CREAR PARA PODER ACTUALIZAR EN EL CONTROLLADOR
    protected $fillable = ['titulo','imagen','descripcion','detalles','link','categoria'];


        /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Get the comments for the blog post.
     */
    public function comentarios()
    {
        return $this->hasMany('otakunew\Comentario');
    }
    /**
     * Get the comments for the blog post.
     */
    public function imagenes()
    {
        return $this->hasMany('otakunew\Imagen');
    }
    /**
     * Get the comments for the blog post.
     */
    public function videos()
    {
        return $this->hasMany('otakunew\Video');
    }
}
