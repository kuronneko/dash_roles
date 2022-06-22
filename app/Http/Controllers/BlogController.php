<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Image;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic;
use PhpParser\Node\Stmt\TryCatch;

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
        $blogs = Blog::orderBy('updated_at', 'desc')->paginate(5);
        return view('blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        return view('blogs.crear', compact('tags'));
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
            'nombre' => 'required',
            'nombre_comun' => 'required',
            'nombre_cientifico' => 'required',
            'clima' => 'required',
            'descripcion' => 'required',
            'cultivo' => 'required',
            'uso' => 'required',
            'plaga' => 'required',
            'files.*' => 'mimes:png,jpg,jpeg|max:10240', //tamaño máximo de cada imagen 10mb, 3 images máximo
            'files' => 'required',
            'tags' => 'required',
        ]);

        //crear el objeto Blog y guardarlo en la base de datos
        $blog = new Blog();
        $blog->nombre = $request->nombre;
        $blog->nombre_comun = $request->nombre_comun;
        $blog->nombre_cientifico = $request->nombre_cientifico;
        $blog->clima = $request->clima;
        $blog->descripcion = $request->descripcion;
        $blog->cultivo = $request->cultivo;
        $blog->uso = $request->uso;
        $blog->plaga = $request->plaga;
        $blog->updated_by = Auth::user()->name;
        $blog->save();

        // Instantiate ImageController
        $ImageController = new ImageController;
        // Access method in ImageController
        $ImageController->adjuntarImagenesBlog($blog, $request->file('files'));

        //asociar los tags seleccionados al blog
        $blog->tags()->attach($request->input('tags'));

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
        $tags = Tag::all();
        return view('blogs.editar', compact('blog', 'tags'));
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
            'nombre' => 'required',
            'nombre_comun' => 'required',
            'nombre_cientifico' => 'required',
            'clima' => 'required',
            'descripcion' => 'required',
            'cultivo' => 'required',
            'uso' => 'required',
            'plaga' => 'required',
            'tags' => 'required',
        ]);
        //actualización del objeto Blog
        $blog->update($request->all());
        //elimina todos los tags asociados al blog
        $blog->tags()->detach();
        //vuelve a asociar los tags seleccionados al blog
        $blog->tags()->attach($request->input('tags'));
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
        //Eliminar imagenes adjuntas al blog
        $blog->image()->delete();
        //Eliminar la carpeta contenedora
        $folderPath = 'public/images/' . $blog->id;
        if (Storage::exists($folderPath)) {
            Storage::deleteDirectory($folderPath);
        }
        //eliminar tags asociados a blog
        $blog->tags()->detach();
        //eliminación del objeto Blog
        $blog->delete();
        return redirect()->route('blogs.index')->with('success', 'Blog eliminado correctamente');
    }
}
