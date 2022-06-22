@extends('layouts.app_public')

@section('content_public')
    <div class="container">

        <div class="row">
            <div class="col-sm-12">
                <div class="float-left mr-4">
                    <h1 class="text-default font-weight-bold">{{ $blog->titulo }}</h1>
                    <img src="{{ asset(str_replace('original.', 'thumb.', $blog->image->first()->url)) }}"
                        alt="{{ $blog->titulo }}">
                </div>
                <div class="mt-5">
                    <p>{{ substr($blog->contenido, 0, 2000) }}</p>
                </div>
                <div class="float-sm-right ml-4">
                    <img class="img-50" src="{{ asset(str_replace('original.', 'thumb.', $blog->image->get(1)->url)) }}"
                        alt="{{ $blog->titulo }}">
                    <img class="img-50" src="{{ asset(str_replace('original.', 'thumb.', $blog->image->last()->url)) }}"
                        alt="{{ $blog->titulo }}">
                </div>
                <div class="mt-5">
                    <p>{{ substr($blog->contenido, 2000, 10000) }}</p>
                </div>
                <p class="text-secondary font-italic small">Última modificaión por {{$blog->updated_by}} {{\Carbon\Carbon::parse($blog->updated_at)->diffForHumans()}}</p>
            </div>

        </div>
    </div>
@endsection
