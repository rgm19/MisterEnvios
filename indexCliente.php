<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Index Cliente - Mister Envios</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="estilos.css">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>  
    <div class="container grid">
        <div class="col-sm-12 col-md-12 col-lg-12 d-flex justify-content-center tarjeta tabla column">
           
            <div class="row">
                <div class="col-4">
                    <img src="imagenes/logo.png" class="logo">
                </div>
                
                <div class="col-4">
                    <h3 class="envio">Envios</h3>
                </div>
                
                <div class="col-4">
                     <div class="btn-group nuevo">
                          <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Nuevo Envio
                          </button>
                          
                          <div class="dropdown-menu miniform">
                                <div class="col-12 icono">
                                    <i class="fas fa-user envioicono"></i>
                                    <input type="text" name="remitente" placeholder="Remitente">
                                </div>
                                <div class="col-12 icono">
                                    <i class="fas fa-user envioicono"></i>
                                    <input type="text" name="destinatario" placeholder="Destinatario">
                                </div>
                                <div class="col-12 icono ">
                                    <i class="fas fa-address-card envioicono"></i>
                                    <input type="text" name="direccion" placeholder="Dirección">
                                </div>
                                <div class="col-12 icono ">
                                    <i class="fas fa-phone envioicono"></i>
                                    <input type="text" name="contacto" placeholder="Contacto">
                                </div>                                
                                <div class="col-12 botonenvio justify-content-center">
                                    <button type="button" class="btn btn-primary">Enviar</button>
                                </div>                                                                
                          </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>