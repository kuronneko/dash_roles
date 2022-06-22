@extends('layouts.app_public')

@section('content_public')
    <div class="container">

        <div class="row">
            <div class="col-sm-12">
                <h1 class="text-default font-weight-bold">{{ $blog->nombre }}</h1>
                <div class="float-left mr-4">
                    <a data-fancybox="images" href="{{ $blog->image->first()->url }}">
                        <img src="{{ asset(str_replace('original.', 'thumb.', $blog->image->first()->url)) }}"
                        alt="{{ $blog->nombre }}">
                    </a>
                </div>
                <div class="">
                    <p><span class="font-weight-bold">Nombre cientifico: </span>{{ substr($blog->nombre_cientifico, 0, 10000) }}</p>
                    <p><span class="font-weight-bold">Nombres comunes: </span>{{ substr($blog->nombre_comun, 0, 10000) }}</p>
                    <p><span class="font-weight-bold">Descripción de la planta: </span>{{ substr($blog->descripcion, 0, 10000) }}</p>
                    <p><span class="font-weight-bold">Clima: </span>{{ substr($blog->clima, 0, 10000) }}</p>
                    <p><span class="font-weight-bold">Cultivo: </span>{{ substr($blog->cultivo, 0, 10000) }}</p>
                </div>
                <div class="float-sm-right ml-4">
                    <a data-fancybox="images" href="{{ $blog->image->get(1)->url }}">
                    <img class="img-50" src="{{ asset(str_replace('original.', 'thumb.', $blog->image->get(1)->url)) }}" alt="{{ $blog->titulo }}">
                    </a>
                    <a data-fancybox="images" href="{{ $blog->image->last()->url }}">
                    <img class="img-50" src="{{ asset(str_replace('original.', 'thumb.', $blog->image->last()->url)) }}" alt="{{ $blog->titulo }}">
                    </a>
                </div>
                <div class="mt-5">
                    <p><span class="font-weight-bold">Uso: </span>{{ substr($blog->uso, 0, 10000) }}</p>
                    <p><span class="font-weight-bold">Plagas y Enfermedades: </span>{{ substr($blog->plaga, 0, 10000) }}</p>
                </div>
                <p class="text-secondary font-italic small">Última modificaión por {{$blog->updated_by}} {{\Carbon\Carbon::parse($blog->updated_at)->diffForHumans()}}</p>
            </div>

        </div>
    </div>
@endsection
