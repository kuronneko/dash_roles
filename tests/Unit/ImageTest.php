<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Blog;
use Illuminate\Database\Eloquent\Collection;


class ImageTest extends TestCase
{
    public function test_a_blog_has_many_images()
    {
        //prueba unitaria de la relación de 0 a muchos (un blog tiene muchas imagenes, y muchas imagenes pertenecen a 1 solo blog)
        $blog = new Blog;
        $this->assertInstanceOf(Collection::class, $blog->images);
    }
}
