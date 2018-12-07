@extends('layout')

@section('title', 'Entradas')

@section('content')

{{-- title Registros --}}
<div class="bg-light">
    <div class="row">
        <div class="col-1"></div>
        <div class="col-8">
            <br><br><h2 class="text-left">Entradas</h2>
        </div>
        {{-- botones --}}
        <div class="col-2 text-right">
            <br><br>
            {{-- <button type="button" class="btn btn-danger" href="/estadisticas" data-toggle="tooltip" data-placement="top" title="Tooltip on top">
                <i class="fas fa-chart-pie"></i>
            </button>  --}}
            {{-- <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal_comunidad">
                <i class="fas fa-file-excel"></i>
            </button> --}}
        </div>
        <div class="col-2"></div>
    </div>
    <br>
</div>

<!-- TABS -->
<div class="bg-light">
    <div class="container">
        <div class="row">
            <div class="col-12"> 
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#visitantes" role="tab" aria-controls="home" aria-selected="true">Visitantes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " id="profile-tab" data-toggle="tab" href="#cucei" role="tab" aria-controls="profile" aria-selected="false">CUCEI</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="tab-content" id="myTabContent">
                {{-- barra de botones --}}
                {{-- <div class="row"> --}}
                    {{-- date --}}
                    {{-- <div class="col-3"></div>
                    <div class="col-3">
                        <br>
                        <input type="date" class="form-control" id="input_date">
                    </div> --}}
                    {{-- botones --}}
                    {{-- <div class="col-2 text-center">
                        <br>
                        <button type="button" class="btn btn-danger" href="/estadisticas" data-toggle="tooltip" data-placement="top" title="Tooltip on top">
                            <i class="fas fa-chart-pie"></i>
                        </button> 
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal_comunidad">
                            <i class="fas fa-file-excel"></i>
                        </button>
                    </div> --}}
                    {{-- search --}}
                    {{-- <div class="col-5">
                        <br>
                        <form class="form-inline">
                            <input class="form-control d" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>
                    </div> --}}
                    
                {{-- </div> --}}
                <!-- primer tab -->
                <div class="tab-pane fade show active" id="visitantes" role="tabpanel" aria-labelledby="home-tab">
                    <!-- TABLA -->
                    <br>
                    <div class="col-12" id="table_registros"> 
                        @if($entradas_visitante->isEmpty())
                            <div class="alert alert-danger" role="alert">No hay registros</div>
                        @else
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr> 
                                    <th> Nombre </th>
                                    <th> Destinatario </th>
                                    <th> Asunto </th>
                                    <th> Puerta </th>
                                    <th> Fecha </th>
                                    <th> Tiempo </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($entradas_visitante as $entrada)
                                    <tr>
                                        <td>{{ $entrada->nombre }}</td>
                                        <td>{{ $entrada->motivo_visita }}</td>
                                        <td>{{ $entrada->asunto }}</td>
                                        <td>{{ $entrada->domicilio }}</td>
                                        <td>{{ $entrada->fecha_registro }}</td>
                                        <td>{{ $entrada->hora }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @endif
                        <!-- paginador -->
                        {{-- <div class="col-12">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination align-center justify-content-md-center">
                                    <li class="page-item disabled"><a class="page-link" href="#">Anterior</a></li>
                                    <li class="page-item active"><a class="page-link " href="#table_registros">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#table_registros">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#table_registros">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#table_registros">Siguiente</a></li>
                                </ul>
                            </nav>
                        </div> --}}
                    </div>
                </div>
                <!-- segundo tab -->
                <div class="tab-pane fade" id="cucei" role="tabpanel" aria-labelledby="profile-tab">
                    <br>
                    <div class="col-12" id="table_alumnos"> 
                        @if($entradas_usuarios->isEmpty())
                            <div class="alert alert-danger" role="alert">No hay registros</div>
                        @else
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr> 
                                    <th> Código </th>
                                    <th> Nombre </th>
                                    <th> Puerta </th>
                                    <th> Fecha </th>
                                    <th> Tiempo </th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                @foreach($entradas_usuarios as $entrada)
                                    <tr>
                                        <td>{{ $entrada->id }}</td>
                                        <td>{{ $entrada->name }}</td>
                                        <td>{{ $entrada->domicilio }}</td>
                                        <td>{{ $entrada->fecha }}</td>
                                        <td>{{ $entrada->hora }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @endif
                        <!-- paginador -->
                        {{-- <div class="col-12">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination align-center justify-content-md-center">
                                    <li class="page-item disabled"><a class="page-link" href="#">Anterior</a></li>
                                    <li class="page-item active"><a class="page-link " href="#table_registros">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#table_registros">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#table_registros">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#table_registros">Siguiente</a></li>
                                </ul>
                            </nav>
                        </div> --}}
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


    @endsection