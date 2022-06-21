@extends('layouts.app_public')

@section('content_public')


<div class="container">
    <div class="card bg-transparent border-0">
    </div>
    <div class="row">
        <div class="col-lg-4 col-12">
            <div class="card bg-transparent border-0">
                <div class="text-center">
                    <h1 class="text-default font-weight-bold">{{$blog->titulo}}</h1>
                    <img src="{{ asset(str_replace('original.', 'thumb.', $blog->image->first()->url)) }}" alt="{{$blog->titulo}}">
                </div>
            </div>
        </div>

        <div class="col-lg-8 col-12">
            <div class="card bg-transparent border-0">
                <div class="card-body mt-5 p-0">
                    <p>{{$blog->contenido}}</p>
                </div>
              </div>
        </div>

        <div class="col-sm-12">
            <div class="float-left mr-4">
                <h1 class="text-default font-weight-bold">{{$blog->titulo}}</h1>
                <img src="{{ asset(str_replace('original.', 'thumb.', $blog->image->first()->url)) }}" alt="{{$blog->titulo}}">
            </div>
            <div class="mt-5">
                <p>{{$blog->contenido}}</p>
            </div>
            <div class="float-right ml-4">
                <img src="{{ asset(str_replace('original.', 'thumb.', $blog->image->last()->url)) }}" alt="{{$blog->titulo}}">
            </div>
            <div class="mt-5">
                <p>{{$blog->contenido}}</p>
            </div>
        </div>

    </div>
</div>

@endsection
