<?php

namespace otakunew;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
     /**
     * Get the post that owns the comment.
     */
    public function articuloComentario()
    {
        return $this->belongsTo('otakunew\Articulo');
    }

    /**
     * Get the post that owns the comment.
     */
    public function usuario()
    {
        return $this->belongsTo('otakunew\User');
    }
}
