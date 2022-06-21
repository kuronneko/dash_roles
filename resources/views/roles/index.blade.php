@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Roles</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            @can('crear-rol')
                                <a href="{{ route('roles.create') }}" class="btn btn-primary">Crear Rol</a>
                            @endcan

                            <table class="table table-striped table-responsive mt-2">
                                <thead>
                                    <tr>
                                        <th>Rol</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($roles as $rol)
                                        <tr>
                                            <td>
                                                <h5><span class="badge badge-dark">{{ $rol->name }}</span></h5>
                                            </td>
                                            <td>
                                            <div class="btn-group">
                                            @can('borrar-rol')
                                                {!! Form::open(['route' => ['roles.destroy', $rol->id], 'method' => 'DELETE']) !!}
                                                    {!! Form::submit('Eliminar', ['class' => 'btn btn-danger']) !!}
                                                {!! Form::close() !!}
                                            @endcan
                                            @can('editar-rol')
                                            <a class="btn btn-info" href="{{ route('roles.edit', $rol->id) }}">Editar</a>
                                            @endcan
                                        </div>
                                        </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="pagination justify-content-end">
                                {{ $roles->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
