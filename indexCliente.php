<?php
    session_start();
?>
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
                <br><br><br><br>
                <?php
                    echo '<h3 class="envios">'.$_SESSION["usuario"].'</h3>';
                ?>
                      
                    <h3 class="envio">Envios</h3>

                </div>
                
                
                
                
                <div class="col-4 colum">
                    
                        
                
                    <button type="submit" name="exit0" class="btn btn-primary">
                            <i class="fas fa-sign-out-alt"> Log Out</i>
                    </button>   
                 
                        
                     <div class="btn-group nuevo">
                          <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Nuevo Envio
                          </button>
                          <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
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
                                <div class="col-12 icono ">
                                    <i class="fas fa-image envioicono"> Imagen del envio</i>
                                    <input type="file" name="imagen" placeholder="Contacto">
                                </div>                               
                                <div class="col-12 botonenvio justify-content-center" >
                                    <button type="submit" name="submit" class="btn btn-primary">Enviar</button>
                                </div>
                          </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php
            
                if(isset($_POST['exit0'])){
                     header("location: login.php");
                }
            
            
                    if(isset($_POST['submit'])){
                        $id="";    
                        $fread=file("envios.txt");
                        for($i=0;$i<count($fread);$i++){
                            $array=explode("\t",$fread[$i]);
                            $id=$array[0];
                            
                        }
                        if($id==""){
                            $id=0;
                        }else{
                            $id++;
                        }
                        
                        $ficherow=fopen("envios.txt",'a');          
                        fwrite($ficherow, $id . "\t" . $_POST['remitente'] . "\t" . $_POST['destinatario'] . "\t" . $_POST['direccion'] . "\t" . $_POST['contacto'] . "\t" . "En Espera". "\t". $_SESSION["usuario"] . PHP_EOL);                       
                        fclose($ficherow);
                        
                        if(is_uploaded_file($_FILES['imagen']['tmp_name'])){
                            $nombreDirectorio="imagenes/";
                            $nombreFichero=$id."-imagen.png";
                            $completo=$nombreDirectorio.$nombreFichero;
                            
                            if(is_dir($nombreDirectorio)){  
                                move_uploaded_file($_FILES['imagen']['tmp_name'], $completo);
                            }else{
                                echo "Directorio no valido";
                            }
                            
                        }else{
                            print('No se ha podido subir el fichero');
                        }
                            
                    }
            
                $file=file("envios.txt");
                for($i=0;$i<count($file);$i++){
                    $aux=explode("\t",$file[$i]); 

                    if(rtrim($_SESSION["usuario"])==rtrim($aux[6])){
                        $clase=" ";
                        if(rtrim($aux[5])=="Entregado"){
                            $clase="entregado";
                        }else if(rtrim($aux[5])=="En Reparto"){
                            $clase="reparto";
                        }else{$clase=" ";}
                         
                        echo "_____________________________<br>";

                        echo '<div class="row '.$clase.'">';
                        
                                echo '<div class=" col column">';            
                                    echo'<img class="pic" src="imagenes/'.$aux[0].'-imagen.png" width="100%">';
                                echo '</div>';
                        
                                echo '<div class=" col column">';            
                                    echo'<p><strong>Remitente:&nbsp;</strong>'.$aux[1].'</p>';
                                    echo'<p><strong>Destinatario:&nbsp;</strong>'.$aux[2].'</p>';
                                echo '</div>';

                                echo '<div class=" col column">';            
                                    echo'<p><strong>Direccion:&nbsp;</strong>'.$aux[3].'</p>';
                                    echo'<p><strong>Contacto:&nbsp;</strong>'.$aux[4].'</p>';
                                echo '</div>';


                                echo '<div class=" col column">';            
                                    echo'<p><strong>Estado&nbsp;</strong></p>';
                                    echo'<p>'.$aux[5].'</p>';
                                echo '</div>';                         
                        echo '</div>';    
                    }
                   
                }
                
          ?>  
        </div>
    </div>
</body>
</html>