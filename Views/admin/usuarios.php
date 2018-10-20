<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
   <!-- MENÚ -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <a class="navbar-brand" href="#">CIA</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <div>
                <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="estacionamiento.php">Estacionamiento</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="entradas.php">Entradas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="usuarios.php">Usuarios</a>
                </li>
                </ul>
            </div>
            
        </div>
    </nav>
      <!-- CONTENIDO -->
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
  <div class="container">
  <br><br>
  <div class="col-lg-12">
            <br><h2 class="text-center">Usuarios</h1><br>
        </div>
    <!-- REGISTRO -->
    <div class="row">
        <div class="col-12 text-right">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_usuario">Agregar</button>
        <br><br></div>
    </div>
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
  
  
    <!-- FIN CONTENIDO -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>