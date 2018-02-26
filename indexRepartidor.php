<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Index Repartidor - Mister Envios</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="estilos.css">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>  
    <div class="container grid">
       <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"> 
        <div class="col-sm-12 col-md-12 col-lg-12 d-flex justify-content-center tarjeta tabla column">
          
            <div class="row">
                <div class="col-4">
                    <img src="imagenes/logo.png" class="logo">
                </div>
                
                <div class="col-7">
                    <h3 class="envio">Listado de Reparto</h3>
                </div>
                
            </div>
            <?php    
                if(isset($_POST['rp'])){
                    $boton = $_POST['rp'];
                    $num = array_keys( $boton );
                    $num = $num[0];
                    
                    $rpfile=file("envios.txt");
                    $rescribir=fopen("envios.txt", "w+");
                    
                    foreach($rpfile as $linea){
                        $aux=explode("\t",$linea); 
                        
                        if($num==$aux[0]){
            
                            $aux[5]="En Reparto";
                            $pegado=implode("\t",$aux);
                            fwrite($rescribir, $pegado);
                        }else{
                            fwrite($rescribir, $linea);
                        }
                    }
                    
                    fclose($rescribir);
                }
            
            
                if(isset($_POST['en'])){
                    $boton = $_POST['en'];
                    $num = array_keys( $boton );
                    $num = $num[0];
                    
                    $rpfile=file("envios.txt");
                    $rescribir=fopen("envios.txt", "w+");
                    
                    foreach($rpfile as $linea){
                        $aux=explode("\t",$linea); 
                        
                        if($num==$aux[0]){
            
                            $aux[5]="Entregado";
                            $pegado=implode("\t",$aux);
                            fwrite($rescribir, $pegado);
                        }else{
                            fwrite($rescribir, $linea);
                        }
                    }
                    
                    fclose($rescribir);
                }            
            

            
            
                
                $file=file("envios.txt");
                foreach($file as $linea){
                    $aux=explode("\t",$linea);                  
                    
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


                                echo '<div class=" col column align-items-center">';            
                                    echo'<p><strong>Estado&nbsp;</strong>'.$aux[5].'</p>';
                                    echo'<div class="row justify-content-between">';
                                        echo'<button type="submit" name="rp['. $aux[0].']" class="btn btn-warning"><i class="fas fa-truck"></i></button>';
                                        echo'<button type="submit" name="en['. $aux[0].']" class="btn btn-success"><i class="fas fa-handshake"></i></button>';
                                    echo'</div>';
                                echo '</div>';                        
                        echo '</div>';                                       
                }
            ?>
        </div>
        </form>
    </div>
</body>
</html>