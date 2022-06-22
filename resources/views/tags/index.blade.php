@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Tags</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">


                            @can('crear-tag')
                                <a class="btn btn-primary" href="{{ route('tags.create') }}">Agregar Tag</a>
                            @endcan

                            <table class="table table-striped table-responsive mt-2">
                                <thead>
                                    <th>Nombre</th>
                                    <th>Acciones</th>
                                </thead>
                                <tbody>
                                    @foreach ($tags as $tag)
                                        <tr>
                                            <td>{{ $tag->nombre }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <form action="{{ route('tags.destroy', $tag->id) }}" method="POST">
                                                        @can('editar-tag')
                                                            <a class="btn btn-info"
                                                                href="{{ route('tags.edit', $tag->id) }}">Editar</a>
                                                        @endcan

                                                        @csrf
                                                        @method('DELETE')
                                                        @can('borrar-tag')
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
                                {!! $tags->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
