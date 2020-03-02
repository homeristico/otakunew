<?php

namespace otakunew;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
     /**
     * Get the post that owns the comment.
     */
    public function articlulosVideo()
    {
        return $this->belongsTo('otakunew\Articulo');
    }
}
