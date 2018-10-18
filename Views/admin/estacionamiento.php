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
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">CIA</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
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
    </nav>
    <!-- CONTENIDO -->
    <div class="container">

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
    <!-- OPCIONES BOTONES -->
        <div class="row">
            <div class="col-12 text-center"><br><br>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_visitante">Estadísticas</button>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_comunidad">Exportar</button>
            </div>
        </div>
        <br><br>
          <!-- <hr class="my-4"> -->

    <!-- TABLAS -->
    <div class="row">
        <div class="col-lg-2"></div>
    <div class="col-lg-8"> 
        <table class="table table-hover">
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