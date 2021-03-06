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

  <!-- CONTENIDO -->
  <body>
    <!-- Modal de añadir visitante -->
    <div class="modal fade" id="modal_visitante" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Registro</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label class="col-12 col-form-label">Estatus</label>
                            <div class="col-12">                                
                                <input class="form-control" id="estatus_visitante" type="text" placeholder="Visitante" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-2 col-form-label">Nombre</label>
                            <div class="col-12">
                                <input type="text" class="form-control" id="nombre_visitante" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-2 col-form-label">Destinatario</label>
                            <div class="col-12">
                                <input type="text" class="form-control" id="destinatario_visitante" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-2 col-form-label">Asunto</label>
                            <div class="col-12">
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" maxlength="45"></textarea>
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
    <!-- Modal de añadir comunidad -->
    <div class="modal fade" id="modal_comunidad" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Registro</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group row">
                            <label class="col-2 col-form-label">Estatus</label>
                            <div class="col-10">
                                <input class="form-control" id="estatus_comunidad" type="text" placeholder="Comunidad UDG" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-2 col-form-label">Nombre</label>
                            <div class="col-10">
                                <input type="text" class="form-control" id="nombre_comunidad" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-2 col-form-label">Código</label>
                            <div class="col-10">
                                <input type="text" class="form-control" id="codigo_comunidad" value="">
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
    
    <div class="container">
    <!-- ESTADISTICAS -->
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
        
        <!-- REGISTRO -->
        <div class="row">
            <div class="col-12 text-center"><br><br>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_visitante">Agregar visitante</button>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_comunidad">Agregar comunidad</button>

            </div>
        </div>
        
        <div class="row">
            
            
            <div class="col-lg-8">
               

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