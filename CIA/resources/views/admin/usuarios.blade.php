@extends('layout')

@section('title', 'Usuarios')

@section('content')
    
<!-- Modal de añadir usuario -->
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
                    <form>
                        <div class="form-group">
                            <label class="col-12 col-form-label">Nombre</label>
                            <div class="col-12">                                
                                <input class="form-control" id="nombre_usuario" type="text" placeholder="" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-2 col-form-label">Email</label>
                            <div class="col-12">
                                <input type="email" class="form-control" id="email_usuario" value="" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-2 col-form-label">Usuario</label>
                            <div class="col-12">
                                <input type="text" class="form-control" id="usuario_usuario" value="" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-2 col-form-label">Contraseña</label>
                            <div class="col-12">
                                <input type="password" class="form-control" id="contra_usuario" value="" required>
                            </div>
                        </div>     
                        <div class="form-group">
                            <label class="col-2 col-form-label">Perfil</label>
                            <div class="col-12">
                                <select class="form-control" id="exampleFormControlSelect1">
                                <option value="0">Guardia estacionamiento</option>
                                <option value="1">Administrativo</option>
                                </select>
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
    <!-- container -->
    <div class="bg-light">
    <div class="row">
        <div class="col-1"></div>
        <div class="col-6">
            <br><br><h2 class="text-left">Usuarios</h2>
        </div>
        {{-- botones --}}
        <div class="col-4 text-right">
            <br><br>
            <button type="button" class="btn btn-danger" href="/estadisticas" data-toggle="tooltip" data-placement="top" title="Tooltip on top">
                <i class="fas fa-chart-pie"></i>
            </button> 
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal_comunidad">
                <i class="fas fa-file-excel"></i>
            </button>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_usuario">Agregar</button>
        </div>
        
        <div class="col-2"></div>
    </div>
    <br>
</div>
<br>

  <div class="container"><br>
    <!-- REGISTRO -->

  <div class="row"> 
        <div class="col-12" id="table_alumnos"> 
            <table class="table table-hover table-bordered">
                <thead>
                    <tr> 
                        <th> Nombre </th>
                        <th> Correo </th>
                        <th> Usuario </th>
                        <th> Perfil </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Ruben Macías</td>
                        <td>rubencito_hassemcito@academicos.udg.mx</td>
                        <td>Hassemcitop</td>
                        <td>Administrador </td>
                    </tr>
                    <tr>
                        <td>Don Pepe</td>
                        <td>carlos_cool@alumnos.udg.mx</td>
                        <td>carlos_raygoza</td>
                        <td>Administrador</td>
                    </tr>
                    <tr>
                        <td>Natalia Cervantes</td>
                        <td>natalithap@alumnos.udg.mx</td>
                        <td>la_baby</td>
                        <td>Guardia Estacionamiento</td>
                    </tr>
                </tbody>
            </table>
            <!-- paginador -->
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

@endsection