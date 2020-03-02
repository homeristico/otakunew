<?php

namespace otakunew;

use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    
     /**
     * Get the post that owns the comment.
     */
    public function articlulosImagen()
    {
        return $this->belongsTo('otakunew\Articulo');
    }
}
