@extends('layout')

@section('title', 'Admin')

@section('content')
    <div class="jumbotron">
        <h1 class="display-4">Bienvenido, {{ Auth::user()->name }}
        <a class="btn btn-primary btn-lg" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </h1>
        <!-- <p class="lead"> </p> -->
        <hr class="my-4">
        {{-- <p>Elige la opción que desees del menú</p> --}}
        {{-- <a class="btn btn-primary btn-lg" href="/admin" role="button">Manual de usuario</a> --}}
            
    
    {{-- title Estacionamiento --}}
<div class="">
    <div class="row">
        <div class="col-lg-0"></div>
        <div class="col-lg-8">
             <br><h1 class="text-left">Estacionamiento </h1>
        
            {{-- <div class="dropdown"> 
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Selecciona
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    @foreach ($puertas as $puerta) 
                    <a class="dropdown-item" id="{{ $puerta->id }}" href="#">{{ $puerta->domicilio }}</a>
                    @endforeach
                    {{-- <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a> 
                </div>
            </div> --}}
        </div>

        <div class="col-lg-2"></div>
    </div>

    
    {{-- container con tabla --}}
    <div class="container">
            
            @for ($i=0; $i<sizeof($data); $i++)
               <br> <h3 class="text-center">{{ $data[$i]['domicilio'] }}</h3>
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <div class="text-center"> 
                    <div class="card-group">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Disponibilidad</h5>
                                <button type="button" class="btn btn-dark btn-sm">{{ $data[$i]['cupoTotal'] }}</button>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Entradas</h5>
                                <button type="button" class="btn btn-dark btn-sm">{{ $data[$i]['ocupado_total'] }}</button>

                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Salidas</h5>
                                <button type="button" class="btn btn-dark btn-sm">{{ $data[$i]['libre_total'] }}</button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2"></div>
        </div>
        @endfor

        <br>
        {{-- <hr class="my-4"> --}}
    </div>
</div>

</div>
@endsection