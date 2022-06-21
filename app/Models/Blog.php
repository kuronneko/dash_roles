<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = ['titulo', 'contenido'];

    public function image(){ //$image->album->id
        return $this->hasMany(Image::class);
    }

    public function comment(){ //$image->album->id
        return $this->hasMany(Comment::class);
    }
}
