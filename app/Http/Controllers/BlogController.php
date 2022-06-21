<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Image;
use Illuminate\Http\Request;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic;

class BlogController extends Controller
{

    function __construct()
    {
        //restricción de permisos
        $this->middleware('permission:ver-blog|crear-blog|editar-blog|borrar-blog', ['only' => ['index']]);
        $this->middleware('permission:crear-blog', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-blog', ['only' => ['edit', 'update']]);
        $this->middleware('permission:borrar-blog', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //traer 5 elementos por pagina
        $blogs = Blog::paginate(5);
        return view('blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blogs.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validación de parametros
        $this->validate($request, [
            'titulo' => 'required',
            'contenido' => 'required',
            'files.3' => 'required|mimes:mp4,webm,gif,png,jpg,jpeg|max:10240', //tamaño máximo de cada imagen 10mb, 3 images máximo
        ]);

        //crear el objeto Blog y guardarlo en la base de datos
        $blog = new Blog();
        $blog->titulo = $request->titulo;
        $blog->contenido = $request->contenido;
        $blog->save();

        //verificación y o creación de la carpeta para la imagen
        if (!file_exists(public_path('/storage/images/' . $blog->id))) {
            mkdir(public_path('/storage/images/' . $blog->id), 0755, true);
        }

        //verificar si el request tiene archivos
        if($request->hasfile('files')){
            //foreach recorriendo el array de archivos
           foreach($request->file('files') as $key => $file){
                //file guardado en la variable document
                $document = $file;
                //nombre del archivo formateado a md5
                $newFilename = md5($document->getClientOriginalName());
                //creación del objeto imagen
                $image = new Image();
                $image->blog_id = $blog->id;
                $image->url = Storage::url('public/images/' . $blog->id . '/' . $newFilename . '_original.' . $document->getClientOriginalExtension()); //ruta de la imagen sin extensión
                $image->ext = $document->getClientOriginalExtension();
                $image->size = $document->getSize();
                $image->basename = $document->getClientOriginalName();
                $image->save();
                //guardar la imagen en el storage
                $imgResized = ImageManagerStatic::make($file->getRealPath());
                $imgResized->save(public_path('/storage/images/' . $blog->id . '/' . $newFilename . '_original.' . $document->getClientOriginalExtension()), 100);
                //generar thumbnails
                ImageManagerStatic::make($imgResized)->fit(180, 306)
                ->save(public_path('/storage/images/' . $blog->id . '/' . $newFilename . '_thumb.' . $document->getClientOriginalExtension()), 80);
           }
        }

        return redirect()->route('blogs.index')->with('success', 'Blog creado correctamente');
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
    public function edit(Blog $blog)
    {
        return view('blogs.editar', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        //validacion de parametros
        $this->validate($request, [
            'titulo' => 'required',
            'contenido' => 'required',
        ]);
        //actualización del objeto Blog
        $blog->update($request->all());
        return redirect()->route('blogs.index')->with('success', 'Blog actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        //eliminación del objeto Blog
        $blog->delete();
        return redirect()->route('blogs.index')->with('success', 'Blog eliminado correctamente');
    }
}
