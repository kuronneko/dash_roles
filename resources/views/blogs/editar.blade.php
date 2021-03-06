@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Editar Blog</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                        @if ($errors->any())
                            <div class="alert alert-dark alert-dismissible fade show" role="alert">
                            <strong>¡Revise los campos!</strong>
                                @foreach ($errors->all() as $error)
                                    <span class="badge badge-danger">{{ $error }}</span>
                                @endforeach
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                        @endif


                        {!! Form::model($blog, ['method' => 'PUT', 'route' => ['blogs.update', $blog->id]]) !!}

                        <div class="row">

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" name="nombre" class="form-control" value="{{ $blog->nombre }}">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="nombre_comun">Nombre Común</label>
                                    <input type="text" name="nombre_comun" class="form-control" value="{{ $blog->nombre_comun }}">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="nombre_cientifico">Nombre Cientifico</label>
                                    <input type="text" name="nombre_cientifico" class="form-control" value="{{ $blog->nombre_cientifico }}">
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="nombre_cientifico">Clima</label>
                                    <input type="text" name="clima" class="form-control" value="{{ $blog->clima }}">
                                </div>
                            </div>
                            <hr>
                            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                                <div class="form-floating">
                                    <label for="descripcion">Descripcion</label>
                                    <textarea class="form-control" name="descripcion" style="height: 100px">{{ $blog->descripcion }}</textarea>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                                <div class="form-floating">
                                    <label for="cultivo">Cultivo</label>
                                    <textarea class="form-control" name="cultivo" style="height: 100px">{{ $blog->cultivo }}</textarea>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                                <div class="form-floating">
                                    <label for="uso">Usos</label>
                                    <textarea class="form-control" name="uso" style="height: 100px">{{ $blog->uso }}</textarea>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                                <div class="form-floating">
                                    <label for="plaga">Plagas</label>
                                    <textarea class="form-control" name="plaga" style="height: 100px">{{ $blog->plaga }}</textarea>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12 mt-4">
                                <div class="form-group">
                                    <label for="">Tags: </label>
                                    @foreach ($tags as $tag)
                                    <label>
                                        {!! Form::checkbox('tags[]', $tag->id, in_array($tag->id, $blog->tags->pluck('id')->toArray()) ? true:false, array('class' => 'nombre')) !!}
                                        {{ $tag->nombre }}
                                    </label>
                                @endforeach
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                        {!! Form::close() !!}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
