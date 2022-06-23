@extends('layouts.app_public')

@section('content_public')

<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="container">
                <div class="vertical-menu mb-5">
                    <span><h6><i class="fas fa-redo"></i> Actualizaciones recientes</h6></span>
                    @foreach ($blogs->sortByDesc('updated_at')->take(5) as $blog)
                    <div class="alert alert-success">
                        <a href="{{route('public.content', $blog->id)}}" class="alert-link">{{$blog->nombre}}</a>
                      </div>
                    @endforeach
                  </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="row p-3">
                @foreach ($blogs as $blog)
                <div class="col-md-3 col-6 p-1">
                    <div class="card text-center">
                        <img src="{{ asset(str_replace('original.', 'thumb.', $blog->image->random()->url)) }}" alt="{{$blog->nombre}}">
                        <h5 class="contenido-blog-index text-default font-weight-bold">{{$blog->nombre}}</h5>
                        <p class="contenido-blog-index">{{$blog->descripcion}}</p>
                        <p><a href="{{route('public.content', $blog->id)}}" class="btn btn-primary btn-block">Leer más</a></p>
                      </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="col-md-12 p-3 mt-4">
            @foreach ($tags as $tag)
                  <span class="badge badge-success">{{$tag->nombre}}</span>
            @endforeach
        </div>
    </div>

</div>


@endsection


