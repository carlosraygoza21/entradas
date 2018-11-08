@extends('layout')

@section('title', 'Admin')

@section('content')
    <div class="jumbotron">
        <h1 class="display-4">Bienvenido, {{ Auth::user()->name }}</h1>
        <!-- <p class="lead"> </p> -->
        <hr class="my-4">
        {{-- <p>Elige la opción que desees del menú</p> --}}
        <a class="btn btn-primary btn-lg" href="/admin" role="button">Manual de usuario</a>
            <a class="btn btn-primary btn-lg" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>

    </div>
@endsection