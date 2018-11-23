@extends('layout')

@section('title', 'Usuarios')

@section('content')
    
<!-- MODAL de añadir usuario -->
    <div class="modal fade" id="modal_usuario" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="/usuarios">
                    {{ csrf_field() }}
                        <div class="form-group">
                            <label class="col-12 col-form-label">Nombre</label>
                            <div class="col-12">                                
                                <input class="form-control" name="name" type="text" placeholder="" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-2 col-form-label">Correo</label>
                            <div class="col-12">
                                <input type="email" class="form-control" name="email" value="" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-12 col-form-label">Código</label>
                            <div class="col-12">                                
                                <input class="form-control" name="id" type="text" placeholder="" required>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-2 col-form-label">Contraseña</label>
                            <div class="col-12">
                                <input type="password" class="form-control" name="password" value="" required>
                            </div>
                        </div>     

                        <div class="form-group">
                            <div class="col-12">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input"  value="" id="iscoordi" name="iscoordi">
                                    <label class="form-check-label" for="defaultCheck1">Coordinador</label>
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-2 col-form-label">Perfil</label>
                            <div class="col-12">
                                <select class="form-control" name="id_perfil">
                                    {{-- <option value="3">Guardia estacionamiento</option> --}}
                                    <option value="1">Administrativo</option>
                                    <option value="2">Guardia</option>
                                </select>
                            </div>
                        </div>               
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Registrar</button>
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
                <br><br><h2 class="text-left">Usuarios</h2>
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
                            <th> Correo </th>
                            <th> Código </th>
                            <th> Perfil </th>
                            {{-- <th> Coordinador </th> --}}
                            {{-- <th> Huella </th> --}}
                        </tr>
                    </thead>
                    @foreach ($usuarios as $usuario)
                    <tbody>
                        <tr>
                            <td>{{ $usuario->name }}</td>
                            <td>{{ $usuario->email }}</td>
                            <td>{{ $usuario->id }}</td>
                                @if($usuario->id_perfil === 1) 
                                <td>Administrativo</td>
                                @elseif($usuario->id_perfil === 2) 
                                <td>Guardia</td>
                                @elseif($usuario->id_perfil === 3) 
                                <td>Alumno</td>
                                @endif 
                            
                            </td>
                            {{-- <td>{{ $usuario->iscoordi }} </td> --}}
                            {{-- <td>
                                @if ($usuario->huella != NULL) Si
                                @else No
                                @endif
                            </td> --}}
                        </tr>
                    </tbody>
                    @endforeach
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