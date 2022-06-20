@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Usuarios</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="text-center">Dashboard Content</h3>

                            <a class="btn btn-warning" href="{{ route('usuarios.create')}}"> Nuevo</a>

                            <table class="table table-striped mt-2">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nombre</th>
                                        <th>Email</th>
                                        <th>Rol</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($usuarios as $usuario)
                                        <tr>
                                            <td>{{ $usuario->id }}</td>
                                            <td>{{ $usuario->name }}</td>
                                            <td>{{ $usuario->email }}</td>
                                            <td>
                                                @if (!empty($usuario->getRoleNames()))
                                                    @foreach ($usuario->getRoleNames() as $rolName)
                                                        <h5><span class="badge badge-dark">{{$rolName}}</span></h5>
                                                    @endforeach
                                                @endif
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    <a class="btn btn-warning" href="{{ route('usuarios.edit', $usuario->id) }}"> Editar</a>

                                                    {!! Form::open(['route' => ['usuarios.destroy', $usuario->id], 'method' => 'DELETE']) !!}
                                                        {!! Form::submit('Eliminar', ['class' => 'btn btn-danger']) !!}
                                                    {!! Form::close() !!}
                                                </div>


                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="pagination justify-content-end">
                                {{ $usuarios->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
