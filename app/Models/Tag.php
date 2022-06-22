<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $fillable = ['nombre'];
    //Many to many with Blog
    public function blogs(){
        return $this->belongsToMany(Blog::class)->withPivot('blog_id', 'tag_id');
    }
}
