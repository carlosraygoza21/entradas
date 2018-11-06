@extends('layout')

@section('title', 'Estacionamiento')

@section('content')






{{-- title Registros --}}
<div class="bg-light">
    <div class="row">
        <div class="col-1"></div>
        <div class="col-8">
            <br><br><h2 class="text-left">Registros</h2>
        </div>
        {{-- botones --}}
        <div class="col-2 text-right">
            <br><br>
            <button type="button" class="btn btn-danger" href="/estadisticas" data-toggle="tooltip" data-placement="top" title="Tooltip on top">
                <i class="fas fa-chart-pie"></i>
            </button> 
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal_comunidad">
                <i class="fas fa-file-excel"></i>
            </button>
        </div>
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
        <table class="table table-hover table-bordered">
            <thead>
                <tr> 
                    <th> Nombre </th>
                    <th> Carrera </th>
                    <th> Llegada </th>
                    <th> Salida </th>
                    <th> Fecha </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>James</td>
                    <td>INCO</td>
                    <td>06:55 am</td>
                    <td>11:15 am</td>
                    <td>05/09/2018</td>
                </tr>
                <tr>
                    <td>Maria</td>
                    <td>INNI</td>
                    <td>10:45 am</td>
                    <td>-</td>
                    <td>05/09/18</td>
                </tr>
                <tr>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                </tr>
            </tbody>
        </table>
    </div>
    {{-- <div class="col-2"></div> --}}
</div>        
<div class="row">   
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
</div> 

</div>



{{-- title Estacionamiento --}}
<br><br><br>
<div class="bg-light">
    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
            <br><h2 class="text-left">Actualmente</h2>
        </div>
        <div class="col-lg-2"></div>
    </div>

    <br>
    {{-- container con tabla --}}
    <div class="container bg-light">
        <div class="row">
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

        <br>
        {{-- <hr class="my-4"> --}}
    </div>
</div>

@endsection