<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    public function blog(){ //$image->album->id
        return $this->belongsTo(Blog::class, 'blog_id'); //Pertenece a un album.
    }
}
