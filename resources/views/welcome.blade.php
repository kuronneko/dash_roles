@extends('layouts.app_public')

@section('content_public')

<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="container">
                <div class="vertical-menu mb-5">
                    <h6>Actualizaciones recientes</h6>
                    @foreach ($blogs->sortByDesc('updated_at')->take(5) as $blog)
                    <div class="alert alert-success">
                        <a href="{{route('public.content', $blog->id)}}" class="alert-link">{{$blog->titulo}}</a>
                      </div>
                    @endforeach
                  </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="row">
                @foreach ($blogs as $blog)
                <div class="col-md-2 col-4 mb-3 p-1">
                    <div class="card text-center">
                        <img src="{{ asset(str_replace('original.', 'thumb.', $blog->image->random()->url)) }}" alt="{{$blog->titulo}}">
                        <h5 class="contenido-blog-index text-default font-weight-bold">{{$blog->titulo}}</h5>
                        <p class="contenido-blog-index">{{$blog->contenido}}</p>
                        <p><a href="{{route('public.content', $blog->id)}}" class="btn btn-primary btn-block">Leer más</a></p>
                      </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

</div>


@endsection


