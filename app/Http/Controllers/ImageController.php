<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Image;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic;
use PhpParser\Node\Stmt\TryCatch;
class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

        /**
     * Crear el objecto imagen, lo asocia al objeto Blog y almacena los archivos en el storage
     */
    public function adjuntarImagenesBlog(Blog $blog, $files)
    {
        try {
            //verificación y o creación de la carpeta para la imagen
            if (!file_exists(public_path('/storage/images/' . $blog->id))) {
                mkdir(public_path('/storage/images/' . $blog->id), 0755, true);
            }
            //verificar si el request tiene archivos
            if ($files) {
                //foreach recorriendo el array de archivos
                foreach ($files as $key => $file) {
                    //nombre del archivo formateado a md5
                    $newFilename = md5($file->getClientOriginalName());
                    //creación del objeto imagen
                    $image = new Image();
                    $image->blog_id = $blog->id;
                    $image->url = Storage::url('public/images/' . $blog->id . '/' . $newFilename . '_original.' . $file->getClientOriginalExtension()); //ruta de la imagen sin extensión
                    $image->ext = $file->getClientOriginalExtension();
                    $image->size = $file->getSize();
                    $image->basename = $file->getClientOriginalName();
                    $image->save();
                    //guardar la imagen en el storage
                    $imgResized = ImageManagerStatic::make($file->getRealPath());
                    $imgResized->save(public_path('/storage/images/' . $blog->id . '/' . $newFilename . '_original.' . $file->getClientOriginalExtension()), 100);
                    //generar thumbnails
                    ImageManagerStatic::make($imgResized)->fit(180, 306)
                        ->save(public_path('/storage/images/' . $blog->id . '/' . $newFilename . '_thumb.' . $file->getClientOriginalExtension()), 80);
                }
            }
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
