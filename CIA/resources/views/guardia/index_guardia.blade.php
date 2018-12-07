@extends('layout')

@section('title', 'Admin')

@section('content')
    <!-- Modal de añadir visitante -->
    <div class="modal fade" id="modal_visitante" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Registro</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="/guardar_visitante">
                        {{-- <div class="form-group">
                            <label class="col-12 col-form-label">Estatus</label>
                            <div class="col-12">                                
                                <input class="form-control" id="estatus_visitante" type="text" placeholder="Visitante" readonly>
                            </div>
                        </div> --}}
                        <div class="form-group">
                            <label class="col-2 col-form-label">Nombre</label>
                            <div class="col-12">
                                <input type="text" class="form-control" id="nombre_visitante" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-2 col-form-label">Destinatario</label>
                            <div class="col-12">
                                <input type="text" class="form-control" id="destinatario_visitante" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-2 col-form-label">Asunto</label>
                            <div class="col-12">
                                <textarea class="form-control" id="asunto" rows="1" maxlength="45"></textarea>
                            </div>
                        </div>   
                        <div class="form-group">
                            <label class="col-2 col-form-label">Puerta</label>
                            <div class="col-12">
                                @if($puertas->isEmpty())
                                    <div class="alert alert-danger" role="alert">
                                        No existen datos suficientes
                                    </div>
                                @else
                                    <select class="form-control" name="id_puerta" required>
                                        <option value="">Selecciona una opción</option>
                                        @foreach ($puertas as $puerta)
                                            <option value="{{$puerta->id}}">{{$puerta->domicilio}}, {{$puerta->nombre}}</option>
                                        @endforeach 
                                    </select>
                                @endif
                            </div>
                        </div>           
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Registrar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal de añadir comunidad -->
    <div class="modal fade" id="modal_comunidad" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Registro</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group row">
                            <label class="col-2 col-form-label">Estatus</label>
                            <div class="col-10">
                                <input class="form-control" id="estatus_comunidad" type="text" placeholder="Comunidad UDG" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-2 col-form-label">Nombre</label>
                            <div class="col-10">
                                <input type="text" class="form-control" id="nombre_comunidad" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-2 col-form-label">Código</label>
                            <div class="col-10">
                                <input type="text" class="form-control" id="codigo_comunidad" value="">
                            </div>
                        </div>
                        
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary">Registrar</button>
                </div>
            </div>
        </div>
    </div>
    
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
            

    <div class="row">
            <div class="col-12 text-center">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_visitante">Agregar visitante</button>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_comunidad">Agregar comunidad</button>

            </div>
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
        
        <!-- REGISTRO -->
        
        
        <div class="row">
            
            
            <div class="col-lg-8">
               

            </div>
        </div>
    </div>
    </div>
@endsection