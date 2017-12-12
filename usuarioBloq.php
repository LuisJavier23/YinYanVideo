<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YinYan</title>
    <link rel="stylesheet" type="text/css" href="Css/style.css">

     <?php
$servername = "mysql.hostinger.mx";
$username = "u408187247_root";
$password = "Siul23";
$dbname = "u408187247_yin";

session_start();

?>
</head>
<body>
    <div class="container">
        <div class="containerH">
            <header>
                <div class="containerL">
                    <div class="block-left-special">
                        <div class="buttonReturn">
                            <a href="index.php" target="_self">Regresar</a>
                        </div>
                    </div>
                    <!-- end: block-left -->
                    <div class="block-center">
                        <img src="Imagenes/logo/yinyanlogo.png" alt="yinyan" class="logo-special"></img>
                    </div>
                    <!-- end: block-center -->
                </div>
                <!-- end: containerL -->    
            </header>
        </div>
        <!--end:containerH-->
        <div class="containerB">
            <div class="usuarioBloq">
                <h2>
                    Lo sentimos.
                </h2>
              <?php
                                        
                    
                    $mysqli = new mysqli($servername, $username,$password, $dbname) or die('Error');
                    
                    $UsuarioId=$_SESSION["id_UsuarioBlock"];
                    
                    $query = $mysqli -> query ("CALL DatosUsuarioBloqueado('".$UsuarioId."')");
                        
                    while ($valores = mysqli_fetch_array($query)) {             
                  
                             $Nombre = $valores['Nombre'];     
                               $Foto_perfil = base64_encode($valores['Foto_perfil']); 
                               $Fecha_Fin_Ban= $valores['Fecha_Ban']; 
                               $Estatus = $valores['Estatus']; 
                               $Detalles = $valores['Detalles']; 
                               $Motivo = $valores['Motivo']; 
                               $Miniatura = $valores['Miniatura']; 

                              if($Estatus==2) {
                   echo " 
                              <div class=\"bloqueado\">
                    <div class=\"imgBloq\">
                        <img class=\"subIconsPerf\" src=\"data:image/jpeg;base64,$Foto_perfil\">
                        <h2 class=\"nombreUsuRep\">$Nombre</h2>
                    </div>
                    <h2 class=\"textoBloq\">Usted ha sido bloqueado temporalmente por las siguentes razones:</h2>
                    <h2 class=\"nombreUsuRep\">Video:</h2>
                    <img class=\"favIconsPerf\" src=\"$Miniatura\">
                    <h2 class=\"nombreUsuRep\">Motivo:</h2>
                        <h2 id=\"razBloqUsu\">$Motivo : $Detalles </h2>
                        <h2 id=\"fecBloq\">Hasta $Fecha_Fin_Ban</h2>.
                    </div>
                </h2> 


                     ";     }

                     else if($Estatus==3)
                     {
                             echo " 
                              <div class=\"bloqueado\">
                    <div class=\"imgBloq\">
                        <img class=\"subIconsPerf\" src=\"data:image/jpeg;base64,$Foto_perfil\">
                        <h2 class=\"nombreUsuRep\">$Nombre</h2>
                    </div>
                    <h2 class=\"textoBloq\">Usted ha sido bloqueado permanentemente por las siguentes razones:</h2>
                    <h2 class=\"nombreUsuRep\">Video:</h2>
                    <img class=\"favIconsPerf\" src=\"$Miniatura\">
                    <h2 class=\"nombreUsuRep\">Motivo:</h2>
                        <h2 id=\"razBloqUsu\">$Motivo : $Detalles </h2>
                    </div>
                </h2> 


                     ";   

                     }


                        }
                    $mysqli->close();
                    /*-------------------*/
  
                            ?>
            <!--end:usuarioBloq-->
        </div>
        <!--end:containerB-->
    </div>
    <!--end:container-->
</body>

</html>