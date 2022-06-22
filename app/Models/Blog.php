<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = ['titulo', 'contenido'];

    //Blog tiene muchas imagenes
    public function image(){
        return $this->hasMany(Image::class);
    }
    //Blog tiene muchos comentarios
    public function comment(){
        return $this->hasMany(Comment::class);
    }
}
