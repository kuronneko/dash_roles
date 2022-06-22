<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    //imagen pertenece a un blog
    public function blog(){
        return $this->belongsTo(Blog::class, 'blog_id');
    }
}
