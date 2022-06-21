<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    public function user(){ //$image->album->id
        return $this->belongsTo(User::class, 'user_id'); //Pertenece a un album.
    }

    public function blog(){ //$image->album->id
        return $this->belongsTo(Blog::class, 'blog_id'); //Pertenece a un album.
    }
}
