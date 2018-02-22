<?php
session_start();
$_SESSION["usuario"]="";
setcookie("logueo",$_SESSION["usuario"], time()+3600);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - Mister Envios</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="estilos.css">

</head>
<body>
   
   <?php
        if (!isset($_SESSION["autentificado"])){ 
            
            if (isset($_REQUEST['nombre']) && isset($_REQUEST['clave'])) {

                    if($_REQUEST["nombre"]=="cliente1" && $_REQUEST["clave"]=="cliente1"){
                        
                        $_SESSION["usuario"]="cliente1";
                        header("location: indexCliente.php");
                        
                    } else if($_REQUEST["nombre"]=="cliente2" && $_REQUEST["clave"]=="cliente2"){
                        
                        $_SESSION["usuario"]="cliente2";
                        header("location: indexCliente.php");
                        
                    } else if($_REQUEST["nombre"]=="repartidor" && $_REQUEST["clave"]=="repartidor"){
                        
                        $_SESSION["usuario"]="repartidor";               
                        header("location: indexRepartidor.php");
                        
                    } else if($_REQUEST["nombre"]=="admin" && $_REQUEST["clave"]=="admin"){
                        
                        $_SESSION["usuario"]="admin";
                        header("location: indexAdmin.php");
                    } else {                
                        header("Location: login.php?errorusuario=1");
                    }
            }
            
        }
        
        
    ?> 
    <div class="container grid">
        <div class="col-sm-7 col-md-9 col-lg-12 d-flex justify-content-center tarjeta">
           <form action="login.php" METHOD="post">
            <table class="tabla">
                <tr>
                    <td><img class="logo" src="imagenes/logo.png"></td>
                </tr>
                <tr>
                    <td><h3>Login</h3>
                        <?php
                            if(isset($_REQUEST["errorusuario"])){
                                echo '<p class="error">Credenciales erroneas. Intentalo de nuevo!</p>';
                             }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td><i class="fas fa-user"></i>
                     &nbsp;&nbsp;<input class="login" type="text" name="nombre" autocomplete="On" placeholder="username" value="<?php if(isset($_COOKIE['logueo'])){echo $_COOKIE['logueo'];}?>"></td>
                </tr>
                <tr>
                    <td><i class="fas fa-key"></i>
                        &nbsp;&nbsp;<input class="login" type="password" name="clave" autocomplete="On" placeholder="password">
                    </td>
                </tr>
                <tr>
                    <td>
                        <button type="submit" class="btn btn-primary">Inicio Sesión</button>
                    </td>
                </tr>
            </table>
            </form>
        </div>
    </div>
</body>
</html>