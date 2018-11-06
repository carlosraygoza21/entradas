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
                <ul class="navbar-nav">
                    <li class="nav-item ">
                        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="estacionamiento.php">Estacionamiento</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="entradas.php">Entradas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="usuarios.php">Usuarios</a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- CONTENIDO -->
        <div class="container">
            <br><br><br>
            <div class="row">
                <div class="col-4">
                    <input type="date" class="form-control" id="input_date">
                </div>
                <div class="col-4 text-center">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_comunidad">Exportar</button>
                </div>
                <div class="col-4">
                    <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </div>
            </div>
            <br>
            <!-- TABS -->
            <div class="row">
                <div class="col-12"> 
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Visitantes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Alumnos</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <!-- primer tab -->
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <!-- TABLA -->
                            <br>
                                <div class="col-12" id="table_registros"> 
                                    <table class="table table-hover table-bordered">
                                        <thead>
                                            <tr> 
                                                <th> Nombre </th>
                                                <th> Asunto </th>
                                                <th> Destinatario </th>
                                                <th> Entrada </th>
                                                <th> Salida </th>
                                                <th> Fecha </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>James Franco</td>
                                                <td>Junta</td>
                                                <td>Rector</td>
                                                <td>17:45 </td>
                                                <td> - </td>
                                                <td>02/09/18</td>
                                            </tr>
                                            <tr>
                                                <td>Maria Magdalena</td>
                                                <td>Informes</td>
                                                <td>Control Escolar</td>
                                                <td>09:05 </td>
                                                <td>13:14 </td>
                                                <td>02/09/18</td>
                                            </tr>
                                            <tr>
                                                <td>Saul El Canelo Álvarez</td>
                                                <td>Golpear a Natalia Cervantes</td>
                                                <td>Natalia Cervantes</td>
                                                <td>12:37</td>
                                                <td> - </td>
                                                <td>02/09/18</td>
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
                            <!-- segundo tab -->
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <br>
                                <div class="col-12" id="table_alumnos"> 
                                    <table class="table table-hover table-bordered">
                                        <thead>
                                            <tr> 
                                                <th> Nombre </th>
                                                <th> Código </th>
                                                <th> Fecha </th>
                                                <th> Entrada </th>
                                                <th> Salida </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Ruben Macías</td>
                                                <td>12343567</td>
                                                <td>12/12/18</td>
                                                <td>09:15 </td>
                                                <td>14:55 </td>
                                            </tr>
                                            <tr>
                                                <td>Carlos Raygoza</td>
                                                <td>214520244</td>
                                                <td>15/15/18</td>
                                                <td>09:15 </td>
                                                <td>14:55 </td>
                                            </tr>
                                            <tr>
                                                <td>Fráncisco Algo</td>
                                                <td>23432423423</td>
                                                <td>15/15/18</td>
                                                <td>07:15 </td>
                                                <td>13:55 </td>
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