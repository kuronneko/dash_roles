@extends('layouts.app_public')

@section('content_public')

<div class="container">
    <div class="row">
        <div class="col-md-2">
            <div class="container">
                <div class="vertical-menu">
                    <a href="#" class="active">Filtros</a><br>
                    <a href="#">Link 1</a><br>
                    <a href="#">Link 2</a><br>
                    <a href="#">Link 3</a><br>
                    <a href="#">Link 4</a><br>
                  </div>
            </div>
        </div>
        <div class="col-md-10">
            <div class="row">
                @foreach ($blogs as $blog)
                <div class="col-md-2 col-4 mb-3 p-1">
                    <div class="card text-center">
                        <img src="{{ asset(str_replace('original.', 'thumb.', $blog->img_url)) }}" alt="{{$blog->titulo}}">
                        <h5 class="contenido-blog-index text-default font-weight-bold">{{$blog->titulo}}</h5>
                        <p class="contenido-blog-index">{{$blog->contenido}}</p>
                        <p><a href="{{route('public.content', $blog->id)}}" class="btn btn-primary btn-block">Ver más</a></p>
                      </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

</div>


@endsection


