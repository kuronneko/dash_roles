<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{

    function __construct()
    {
        //restricción de permisos
        $this->middleware('permission:ver-tag|crear-tag|editar-tag|borrar-tag', ['only' => ['index']]);
        $this->middleware('permission:crear-tag', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-tag', ['only' => ['edit', 'update']]);
        $this->middleware('permission:borrar-tag', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         //traer 5 elementos por pagina
         $tags = Tag::paginate(5);
         return view('tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tags.crear');
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
        ]);

        //crear el objeto Tag y guardarlo en la base de datos
        $tag = new Tag();
        $tag->nombre = $request->nombre;
        $tag->save();

        return redirect()->route('tags.index')->with('success', 'Tag creado correctamente');
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
    public function edit(Tag $tag)
    {
        return view('tags.editar', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
         //validacion de parametros
         $this->validate($request, [
            'nombre' => 'required',
        ]);
        //actualización del objeto Tag
        $tag->update($request->all());
        return redirect()->route('tags.index')->with('success', 'Tag actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
         //eliminación del objeto Blog
         $tag->delete();
         return redirect()->route('tags.index')->with('success', 'Tag eliminado correctamente');
    }
}
