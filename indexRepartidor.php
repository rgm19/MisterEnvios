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
                <div class="col-6">
                    <img src="imagenes/logo.png" class="logo">
                </div>
                
                <div class="col-6">
                    <h3 class="envio">Listado de Reparto</h3>
                </div>
                
            </div>
            <?php        
                $file=file("envios.txt");
                for($i=0;$i<count($file);$i++){
                    $aux=explode("\t",$file[$i]);
                    echo "_____________________________<br>";
                    
                    if(settype($aux[4],"string")=='En reparto'){
                     
                    
                    echo '<div class="row align-items-center reparto">';
                            echo '<div class=" col column">';            
                                echo'<p><strong>Remitente:&nbsp;</strong>'.$aux[0].'</p>';
                                echo'<p><strong>Destinatario:&nbsp;</strong>'.$aux[1].'</p>';
                            echo '</div>';
                    
                            echo '<div class=" col column">';            
                                echo'<p><strong>Direccion:&nbsp;</strong>'.$aux[2].'</p>';
                                echo'<p><strong>Contacto:&nbsp;</strong>'.$aux[3].'</p>';
                            echo '</div>';
                    
                    
                            echo '<div class=" col column align-items-center">';            
                                echo'<p><strong>Estado&nbsp;</strong>'.$aux[4].'</p>';
                                echo'<div class="row justify-content-between">';
                                    echo'<button type="submit" name="submit" class="btn btn-warning"><i class="fas fa-truck"></i></button>';
                                    echo'<button type="submit" name="submit" class="btn btn-success"><i class="fas fa-handshake"></i></button>';
                            echo'</div>';
                            echo '</div>';
                    echo '</div>';
                        
                    }
                    
                    if(settype($aux[4],"string")=='Entregado'){
                    echo "_____________________________<br>";
                    
                    echo '<div class="row align-items-center entregado">';
                            echo '<div class=" col column">';            
                                echo'<p><strong>Remitente:&nbsp;</strong>'.$aux[0].'</p>';
                                echo'<p><strong>Destinatario:&nbsp;</strong>'.$aux[1].'</p>';
                            echo '</div>';
                    
                            echo '<div class=" col column">';            
                                echo'<p><strong>Direccion:&nbsp;</strong>'.$aux[2].'</p>';
                                echo'<p><strong>Contacto:&nbsp;</strong>'.$aux[3].'</p>';
                            echo '</div>';
                    
                    
                            echo '<div class=" col column align-items-center">';            
                                echo'<p><strong>Estado&nbsp;</strong>'.$aux[4].'</p>';
                                echo'<div class="row justify-content-between">';
                                    echo'<button type="submit" name="submit" class="btn btn-warning"><i class="fas fa-truck"></i></button>';
                                    echo'<button type="submit" name="submit" class="btn btn-success"><i class="fas fa-handshake"></i></button>';
                            echo'</div>';
                            echo '</div>';
                    echo '</div>';
                        
                    }
                }
            
                
                die;
            ?>
        </div>
    </div>
</body>
</html>