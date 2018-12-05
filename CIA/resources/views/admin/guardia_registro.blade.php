@extends('layout')

@section('title', 'Guardias')

@section('content')


<!-- MODAL de asignar guardia -->
    <div class="modal fade" id="modal_usuario" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Horario de guardia</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="/guardia_puerta">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="col-12 col-form-label">Guardia</label>
                            <div class="col-12">     
                                @if($asignarGuardia->isEmpty())
                                    <div class="alert alert-danger" role="alert">
                                        No hay guardias registrados
                                    </div>
                                @else
                                    <select class="form-control" name="id_usuario" required>
                                        <option value="">Selecciona una opción</option>
                                        @foreach ($asignarGuardia as $guardia)
                                            <option value="{{$guardia->id}}">{{$guardia->name}}</option>
                                        @endforeach 
                                    </select>
                                @endif
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
                        {{-- <div class="form-group">
                            <label class="col-12 col-form-label">ID</label>
                            <div class="col-12">                              
                                <input type="number" class="form-control" name="id" required>
                            </div>
                        </div> --}}
                        <div class="form-group">
                            <label class="col-2 col-form-label">Horario</label>
                            <div class="col-12">
                                <input type="text" class="form-control" name="tiempo" required>
                            </div>
                        </div>                   
                </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        @if($asignarGuardia->isEmpty() or $puertas->isEmpty())
                            <button type="submit" class="btn btn-secondary" disabled>Registrar</button>
                        @else
                            <button type="submit" class="btn btn-primary" >Registrar</button>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
<!-- TITULO -->
    <div class="bg-light">
        <div class="row">
            <div class="col-1"></div>
            <div class="col-6">
                <br><br><h2 class="text-left">Guardias asignados</h2>
            </div>
            {{-- botones --}}
            <div class="col-4 text-right">
                <br><br>
                <button type="button" class="btn btn-danger" href="/estadisticas" data-toggle="tooltip" data-placement="top" title="Estadísticas">
                    <i class="fas fa-chart-pie"></i>
                </button> 
                {{-- <button type="button" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Exportar">
                    <i class="fas fa-file-excel"></i>
                </button> --}}
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_usuario">Asignar</button>
            </div>
            <div class="col-2"></div>
        </div>
        <br>
    </div>
    <br>

    
<!-- TABLA USUARIOS -->
<div class="container"><br>
    <div class="row"> 
            <div class="col-12" id="table_alumnos"> 
                @if($guardias->isEmpty())
                    <div class="alert alert-danger" role="alert">No hay registros</div>
                @else
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr> 
                                <th> ID  </th>
                                <th> Nombre </th>
                                <th> Correo </th>
                                <th> Tiempo </th>
                                <th> Puerta </th>
                                <th> Domicilio </th>
                                
                            </tr>
                        </thead>
                            @foreach ($guardias as $guardia)
                            <tbody>
                                <tr>
                                    <td>{{ $guardia->id }}</td>
                                    <td>{{ $guardia->name }}</td>
                                    <td>{{ $guardia->email }}</td>
                                    <td> {{$guardia->tiempo }} </td>            
                                    <td> {{ $guardia->nombre }} </td>
                                    <td> {{$guardia->domicilio }}</td> 

                                </tr>
                            </tbody>
                            @endforeach
                    </table>
                @endif
                
                <!-- paginador -->
                 <br>
                <p> Total: {{$total}}</p>
                {{--<div class="col-12">
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

@endsection