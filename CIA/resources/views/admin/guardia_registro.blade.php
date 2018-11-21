@extends('layout')

@section('title', 'Guardias')

@section('content')
    
<!-- MODAL de añadir usuario -->
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
                    <form method="POST" action="/usuarios">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="col-12 col-form-label">Guardia</label>
                            <div class="col-12">                                
                                <select class="form-control" name="id_perfil">
                                <option value="0">Persona 1</option>
                                <option value="1">Persona 2</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-2 col-form-label">Puerta</label>
                            <div class="col-12">
                                <select class="form-control" name="id_perfil">
                                <option value="0">Puerta estacionamiento Boulevard</option>
                                <option value="1">Puerta entrada Boulevard</option>
                                </select>
                            </div>
                        </div>  

                        <div class="form-group">
                            <label class="col-2 col-form-label">Horario</label>
                            <div class="col-12">
                                <input type="week" class="form-control" name="semana">
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
<!-- TITULO -->
    <div class="bg-light">
        <div class="row">
            <div class="col-1"></div>
            <div class="col-6">
                <br><br><h2 class="text-left">Guardias</h2>
            </div>
            {{-- botones --}}
            <div class="col-4 text-right">
                <br><br>
                <button type="button" class="btn btn-danger" href="/estadisticas" data-toggle="tooltip" data-placement="top" title="Estadísticas">
                    <i class="fas fa-chart-pie"></i>
                </button> 
                <button type="button" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Exportar">
                    <i class="fas fa-file-excel"></i>
                </button>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_usuario">Agregar</button>
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
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr> 
                            <th> Nombre </th>
                            <th> Puerta </th>
                            <th> Hora de entrada </th>
                            <th> Hora de salida </th>
                            <th> Tiempo </th>
                        </tr>
                    </thead>
                    {{-- @foreach ($usuarios as $usuario)
                    <tbody>
                        <tr>
                            <td>{{ $usuario->nombre }}</td>
                            <td>{{ $usuario->correo }}</td>
                            <td>{{ $usuario->codigo }}</td>
                            <td>
                                @if($usuario->id_perfil === 1) Administrativo
                                @elseif($usuario->id_perfil === 2) Guardia
                                @endif 
                            </td>
                            </td>
                            <td>{{ $usuario->es_coordi }} </td>
                            <td>
                                @if ($usuario->huella != NULL) Si
                                @else No
                                @endif
                            </td>
                        </tr>
                    </tbody>
                    @endforeach --}}
                </table>
                <!-- paginador -->
                <br>
                <div class="col-12">
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
</div>

@endsection