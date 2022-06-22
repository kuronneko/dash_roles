<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    //comentario pertenece a un usuario
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
    //comentario pertenece a un blog
    public function blog(){
        return $this->belongsTo(Blog::class, 'blog_id');
    }
}
