<!DOCTYPE html>
<html>

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
    <script>
        function hide() {
            var x = document.getElementById('contNav');
            if (x.style.display === 'block') {
                x.style.display = 'none';
            } else {
                x.style.display = 'block';
            }
           
            
            
            
            
            
        }
        
        function Ingresar() {


      
            
          
                    var Nombre=document.getElementById("nombre").value;
                    var Contra=document.getElementById("contra").value;
                    
        
        if(Nombre==""||Contra=="")
        {
                
        
         document.getElementById("errormessage").innerHTML = "Favor de ingresar usuario y Contraseñaa";
   
     
    }
    
    else
    {
           
            document.getElementById("login").submit();
        
        
    }
            
            
        



}

 function Busqueda() {


      
            
          
                    var Busqueda=document.getElementById("busqueda").value;
                    
        
        if(Busqueda!=="")
        {
                
        
          document.getElementById("searchBox").submit();
   
     
    }
    
        
            
        



}
     
    </script>
    <div class="container">
         <div class="containerH">
            <header>
                <div class="containerL">
                    <div class="block-left">
                        <button id="btnNav" onclick="hide()">Menu&#769;</button>
                        <a href="index.php" target"_self">
                            <img src="Imagenes/logo/yinyanlogo2.png" alt="yinyan" class="logo"></img>
                        </a>
                        <div class="search">
                             <form action="busqueda.php" name="searchBox" method="GET" id="searchBox">
                                <input type="text" size="60" name="busqueda" id="busqueda">
                                <input type="button" onclick="Busqueda()" value="Buscar">
                            </form>
                            </form>
                        </div>
                    </div>
                    <!-- end: block-left -->
                    <div class="block-right">
                        <?php
                        if(isset($_SESSION['LogInFlag']))
                        {
                            
                           $UserName= $_SESSION['Nombre_Usuario'];

                           $idUser= $_SESSION['id_Usuario'];
                           
                      $FotoPerfil= base64_encode($_SESSION['Foto_perfil_Usuario']);
                            
                          
                         echo "<div class=\"box_right\">";                      
                         echo "<label class =\"username_text\">Bienvenido $UserName</label>";
                          echo "<img src=\"data:image/jpeg;base64,$FotoPerfil\" class=\"Foto_Perfil\">";
                         echo " </div>";
                            
                            
                        }
                     else
                     {
                           echo "<div class=\"login\">
                            <form action=\"Php/LoginAction.php\" name=\"login\" id=\"login\" method=\"POST\">
                                  Usuario: <input type=\"text\" name=\"nombre\" id=\"nombre\"> Contraseña: <input type=\"password\" name=\"contra\" id=\"contra\">
                                  <input type=\"hidden\" name=\"Sender\" id=\"Sender\" value =\"index\">
                                <input type=\"button\" value=\"Entrar\" onclick=\"Ingresar()\">
                            </form>
                        </div>
                        
                        <div class=\"register\">
                            <a href=\"register.php\" target=\"_self\">Registrate</a>
                        </div>";
                            
                         
                         
                     }
                        
                        ?>
                      

                    </div>
                    <!-- end: block-right -->
                </div>
                <!-- end: containerL -->
                <div class="containerN">
                    <div id="contNav">
                        <nav class="menu">
                             <?php
                        if(isset($_SESSION['LogInFlag']))
                        {
                            echo "<input type=\"button\" onclick=\"location.href='index.php'\" id=\"Home\" name=\"Home\" value=\"Home\" > 
                            <input type=\"button\" onclick=\"location.href='subirVideo.php'\" id=\"Subir\" name=\"Subir\" value=\"Subir\" >
                            <input type=\"button\" onclick=\"location.href='perfil.php?Usuario=".$_SESSION["id_Usuario"]."'\" id=\"MiPerfil\" name=\"MiPerfil\" value=\"Mi Perfil\" >
                            <form action=\"Php/Logout.php\" name=\"Logout\" method=\"POST\" id=\"Logout\" style= \"display: inline\">  
                                  <input type=\"submit\" id=\"logout\" name=\"logout\" value=\"Log out\">";
                     
                            
                        }
                        else
                        {
                            
                            echo" <input type=\"button\" onclick=\"location.href='index.php'\" id=\"Home\" name=\"Home\" value=\"Home\" >
                                    <input type=\"button\" onclick=\"location.href='login.php'\" id=\"login\" name=\"login\" value=\"Ingresar\" >";
                            
                                           
                            
                            
                            
                            
                        }
                            ?>
                               </form>
                            
                        </nav>
                    </div>
                </div>
                <!-- end: containerN -->
            </header>
        </div>
        <div class="containerB">
            <section class="populares">
                 <p class="errormessage" id="errormessage" ></p>
                <h2>Populares</h2><br>
                <?php
                   $mysqli = new mysqli($servername, $username,$password, $dbname) or die('Error');
                    $query = $mysqli -> query ("CALL See_CatPopular");
                        while ($valores = mysqli_fetch_array($query)) {    
                        $CImageP=$valores['Miniatura'];
                        $CTituloP=$valores['titulo'];
                        $CVideoIdP=$valores['id_video'];

                            echo" <article class=\"video\"><img src=\"$CImageP\" alt=\"horse\" width=\"200\" height=\"100\" onclick=\"location.href='video.php?Video=".$CVideoIdP."'\"></img><br>$CTituloP</article> ";         
                        }
                    $mysqli->close();
               
                ?>
                
            </section>
            <br>
            <!-- end: populares -->
            <section class="recientes">
                <h2>Recientes</h2><br>
        <?php
                   $mysqliR = new mysqli($servername, $username,$password, $dbname) or die('Error');
                    $queryR = $mysqliR -> query ("CALL See_CatRecientes");
                        while ($valores = mysqli_fetch_array($queryR)) {    
                        $CImageP=$valores['Miniatura'];
                        $CTituloP=$valores['titulo'];
                        $CVideoIdP=$valores['id_video'];

                            echo" <article class=\"video\"><img src=\"$CImageP\" alt=\"horse\" width=\"200\" height=\"100\" onclick=\"location.href='video.php?Video=".$CVideoIdP."'\"></img><br>$CTituloP</article> ";         
                        }
                    $mysqliR->close();
               
                ?>
            </section>
            <br>
            <!-- end: recientes -->
          
              
               <?php

                    if(isset($_SESSION['LogInFlag']))
                    {
                        echo "  <section class=\"favoritos\">
                                     <h2>Favoritos</h2><br>";
                   $mysqliR = new mysqli($servername, $username,$password, $dbname) or die('Error');
                    $queryR = $mysqliR -> query ("CALL See_CatFavoritos('".$idUser."')");
                        while ($valores = mysqli_fetch_array($queryR)) {    
                        $CImageP=$valores['Miniatura'];
                        $CTituloP=$valores['titulo'];
                        $CVideoIdP=$valores['id_video'];

                            echo" <article class=\"video\"><img src=\"$CImageP\" alt=\"horse\" width=\"200\" height=\"100\" onclick=\"location.href='video.php?Video=".$CVideoIdP."'\"></img><br>$CTituloP</article> ";         
                        }
                          if(mysqli_num_rows($queryR)==0 )
                            {echo"<h2>-No se encontraron videos en esta categoria-</h2>";}

                    $mysqliR->close();

                    echo" </section>
                                <br>";
                             }
                ?>
           
            <!-- end: favoritos -->
               <?php

                    if(isset($_SESSION['LogInFlag']))
                    {
                        echo "  <section class=\"compartidos\">
                                     <h2>Compartidos recientemente por los canales que sigues!</h2><br>";
                   $mysqliR = new mysqli($servername, $username,$password, $dbname) or die('Error');
                    $queryR = $mysqliR -> query ("CALL See_CatRecientesSub('".$idUser."')");
                        while ($valores = mysqli_fetch_array($queryR)) {    
                        $CImageP=$valores['Miniatura'];
                        $CTituloP=$valores['titulo'];
                        $CVideoIdP=$valores['id_video'];

                            echo" <article class=\"video\"><img src=\"$CImageP\" alt=\"horse\" width=\"200\" height=\"100\" onclick=\"location.href='video.php?Video=".$CVideoIdP."'\"></img><br>$CTituloP</article> ";         
                        }

                        if(mysqli_num_rows($queryR)==0 )
                            {echo"<h2>-No se encontraron videos en esta categoria-</h2>";}
                    $mysqliR->close();
                        
                    echo" </section>
                                <br>";
                             }
                ?>
            <!-- end: compartidos -->

                     <?php

                    if(isset($_SESSION['LogInFlag']))
                    {
                       $Cid_Usuario=0;
                       $Flag=0;
                   $mysqliR = new mysqli($servername, $username,$password, $dbname) or die('Error');
                    $queryR = $mysqliR -> query ("CALL Get_CatCanalFav('".$idUser."')");
                        while ($valores = mysqli_fetch_array($queryR)) {    
                        
                        $Cid_Usuario=$valores['id_Usuario'];

                            }

                            $mysqliR->close();

                    $mysqliFc = new mysqli($servername, $username,$password, $dbname) or die('Error');
                    $queryFC = $mysqliFc -> query ("CALL See_CatCanalFav('".$Cid_Usuario."')");
                        while ($valores = mysqli_fetch_array($queryFC)) {    

                                if($Flag==0){
                                    $CNameFav=$valores['Nombre'];
                                echo "  <section class=\"usuarioFavorito\">
                                     <h2>Canal Preferido: ".$CNameFav."</h2><br>";
                                     $Flag=1;
                                 }

                            $CImageP=$valores['Miniatura'];
                        $CTituloP=$valores['titulo'];
                        $CVideoIdP=$valores['id_video'];

                            echo" <article class=\"video\"><img src=\"$CImageP\" alt=\"horse\" width=\"200\" height=\"100\" onclick=\"location.href='video.php?Video=".$CVideoIdP."'\"></img><br>$CTituloP</article> ";         
                        }

                        if(mysqli_num_rows($queryFC)==0 )
                            { echo "  <section class=\"usuarioFavorito\">
                                     <h2>Canal Preferido:</h2><br>";
                                echo"<h2>-No se encontraron videos en esta categoria-</h2>";}
                    
                        
                    echo" </section>
                                <br>";
                             }
                ?>
            <!-- end: usuarioFavorito -->
        </div>
        <!-- end: containerB -->
        <footer>
            <div class="contact"></div>
            <div class="social"></div>
        </footer>
    </div>
    <!-- end: container -->
</body>

</html>