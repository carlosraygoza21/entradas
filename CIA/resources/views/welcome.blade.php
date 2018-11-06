@extends('layout')

@section('title', 'CIA - Bienvenido')


@section('content')

    <div class="jumbotron">
        <h1 class="display-4">LOG IN</h1>
        <!-- <p class="lead"> </p> -->
        <hr class="my-4">
        <p>Elige la opción que desees del menú</p>
        <a class="btn btn-primary btn-lg" href="/admin" role="button">Manual de usuario</a>
    </div>
    <!-- <h1> holaaa</h1> -->
    {{-- @foreach($data as $datas)
        {{ $datas }}
    @endforeach --}}
    
@endsection