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

     <body>
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
                    <form>
                        <div class="form-group">
                            <label class="col-12 col-form-label">Estatus</label>
                            <div class="col-12">                                
                                <input class="form-control" id="estatus_visitante" type="text" placeholder="Visitante" readonly>
                            </div>
                        </div>
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
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" maxlength="45"></textarea>
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
    
    <div class="container">
    <!-- ESTADISTICAS -->
    <div class="row">
        <div class="col-lg-12">
            <br><h1 class="text-center">Estacionamiento</h1><br>
        </div>
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
            <div class="text-center"> 
            <div class="card-group">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Disponibilidad</h5>
                        <button type="button" class="btn btn-dark btn-sm">20</button>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Entradas</h5>
                        <button type="button" class="btn btn-dark btn-sm">154</button>

                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Salidas</h5>
                        <button type="button" class="btn btn-dark btn-sm">54</button>

                    </div>
                </div>
            </div>
            </div>
        </div>
        <div class="col-lg-2"></div>

    </div>
        
        <!-- REGISTRO -->
        <div class="row">
            <div class="col-12 text-center"><br><br>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_visitante">Agregar visitante</button>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_comunidad">Agregar comunidad</button>

            </div>
        </div>
        
        <div class="row">
            
            
            <div class="col-lg-8">
               

            </div>
        </div>
        
    </div>
@endsection