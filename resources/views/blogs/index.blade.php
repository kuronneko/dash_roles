@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Blogs</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">


                            @can('crear-blog')
                                <a class="btn btn-primary" href="{{ route('blogs.create') }}">Crear Blog</a>
                            @endcan

                            <table class="table table-striped table-responsive mt-2">
                                <thead>
                                    <th>Nombre</th>
                                    <th>Vista Previa</th>
                                    <th>Nombre Común</th>
                                    <th>Nombre Cient</th>
                                    <th>Clima</th>
                                    <th>Descripcion</th>
                                    <th>Cultivo</th>
                                    <th>Uso</th>
                                    <th>Plaga</th>
                                    <th>Acciones</th>
                                </thead>
                                <tbody>
                                    @foreach ($blogs as $blog)
                                        <tr>
                                            <td>{{ $blog->nombre }}</td>
                                            <td>
                                                <img class="img-admin-panel" src="{{ asset(str_replace('original.', 'thumb.', $blog->image->first()->url)) }}" alt="{{$blog->titulo}}">
                                            </td>
                                            <td>{{ substr($blog->nombre_comun, 0, 100) }}</td>
                                            <td>{{ $blog->nombre_cientifico }}</td>
                                            <td>{{ $blog->clima }}</td>
                                            <td>{{ substr($blog->descripcion, 0, 100) }}</td>
                                            <td>{{ substr($blog->cultivo, 0, 100) }}</td>
                                            <td>{{ substr($blog->uso, 0, 100) }}</td>
                                            <td>{{ substr($blog->plaga, 0, 100) }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST">
                                                        @can('editar-blog')
                                                            <a class="btn btn-info"
                                                                href="{{ route('blogs.edit', $blog->id) }}">Editar</a>
                                                        @endcan

                                                        @csrf
                                                        @method('DELETE')
                                                        @can('borrar-blog')
                                                            <button type="submit" class="btn btn-danger">Borrar</button>
                                                        @endcan
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <!-- Ubicamos la paginacion a la derecha -->
                            <div class="pagination justify-content-end">
                                {!! $blogs->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
