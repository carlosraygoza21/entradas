@extends('layout')

@section('title', 'Estacionamiento')

@section('content')






{{-- title Registros --}}
<div class="bg-light">
    <div class="row">
        <div class="col-1"></div>
        <div class="col-8">
            <br><br><h2 class="text-left">Estacionamiento</h2>
        </div>
        {{-- botones --}}
        {{-- <div class="col-2 text-right">
            <br><br> --}}
            {{-- <button type="button" class="btn btn-danger" href="/estadisticas" data-toggle="tooltip" data-placement="top" title="Tooltip on top">
                <i class="fas fa-chart-pie"></i>
            </button>  --}}
            {{-- <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal_comunidad">
                <i class="fas fa-file-excel"></i>
            </button> --}}
        {{-- </div> --}}
        <div class="col-2"></div>
    </div>
    <br>
</div>
<br>
{{-- tabla --}}
<div class="container">
<div class="row">
    {{-- <div class="col-2"></div> --}}
    <div class="col-12" id="table_registros"> 
        @if($registros->isEmpty())
                    <div class="alert alert-danger" role="alert">No hay registros</div>
        @else
            <table class="table table-hover table-bordered">
                <thead>
                    <tr> 
                        <th> Nombre </th>
                        <th> Puerta </th>
                        <th> Hora </th>
                        <th> Fecha </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($registros as $registro)
                    <tr>
                        <td>{{$registro->name}}</td>
                        <td>{{$registro->domicilio}} </td>
                        <td>{{$registro->hora}}</td>
                        <td>{{$registro->fecha}}</td>
                    </tr>
                    @endforeach
                
                </tbody>
            </table>
        @endif
    </div>
    {{-- <div class="col-2"></div> --}}
</div>        
{{-- <div class="row">   
    <!-- paginador -->
    <div class="col-12 ">
        <nav aria-label="Page navigation example">
            <ul class="pagination align-center justify-content-md-center">
                <li class="page-item disabled"><a class="page-link" href="#">Anterior</a></li>
                <li class="page-item active"><a class="page-link " href="#table_registros">1</a></li>
                <li class="page-item"><a class="page-link" href="#table_registros">2</a></li>
                <li class="page-item"><a class="page-link" href="#table_registros">3</a></li>
                <li class="page-item"><a class="page-link" href="#table_registros">Siguiente</a></li>
            </ul>
        </nav>
    </div>
</div>  --}}

</div>





@endsection