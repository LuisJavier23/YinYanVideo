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
                            <a href="administrador.php" target="_self">Regresar</a>
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
            <div class="listaReporte">
                <h2>
                    Usuarios reportados
                </h2>

                <?php

                    
                       
                   $mysqliR = new mysqli($servername, $username,$password, $dbname) or die('Error');
                    $queryR = $mysqliR -> query ("CALL Lista_Usuarios_Bloqueados()");
                    if(mysqli_num_rows($queryR)!==0 ){
                        while ($valores = mysqli_fetch_array($queryR)) {    
                        $Nombre=$valores['Nombre'];
                        $Foto_perfil=base64_encode($valores['Foto_perfil']);
                        $Motivo=$valores['Motivo'];
                        $Detalles=$valores['Detalles'];

                            echo"
                    <div>
                <div class=\"reportado\">
                    <div class=\"imgRep\">
                        <img class=\"subIconsPerf\" src=\"data:image/jpeg;base64,$Foto_perfil\">

                        <div class=\"nombreUsuRep\">$Nombre</div>
                    </div>
                    <div class=\"razonRepUsu\">Motivo: $Motivo</div>
                    <div class=\"razonRepUsu\">Detalles: $Detalles</div>
                </div>
                             ";         

                             
                        }
}
                        if(mysqli_num_rows($queryR)==0 )
                            {echo"<h2>-No se encontraron usuarios bloqueados-</h2>";}
                    $mysqliR->close();
                        
                             
                ?>
            <!--end:listaReporte-->
        </div>
        <!--end:containerB-->
    </div>
    <!--end:container-->
</body>

</html>