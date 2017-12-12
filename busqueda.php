<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YinYan</title>
    <link rel="stylesheet" type="text/css" href="Css/style.css">
    <script src="Lib/jquery-3.2.1.min.js" type="text/javascript"></script>
    <?php
$servername = "mysql.hostinger.mx";
$username = "u408187247_root";
$password = "Siul23";
$dbname = "u408187247_yin";

session_start();

$SearchText=$_GET["busqueda"];



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

 function BusquedaR() {


      
            
          
                    var Busqueda=document.getElementById("busquedaR").value;
                    
        
        if(Busqueda!=="")
        {
                
        
          document.getElementById("SearchRange").submit();
   
     
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
            <div class="busqTitulo">
                <h2 id="test">Busqueda de canal/video</h2>
            </div>
            <div class="filtro">
                <div class="filtroTxtBusq">
                   
                    <form action="busqueda.php" id="SearchRange" name="SearchRange" style="display: inline-block; margin: 20px;" method="GET">
                    <label for="SerchR">
                     <h3>Buscar videos por Rango de Fechas</h3>
                    </label>
                     <input type="text" size="60" name="busqueda" id="busquedaR">
                    <INPUT type="date" id="DateI" name="DateI" style="display: inline-block;">
                    <INPUT type="date" id="DateF" name="DateF" style="display: inline-block;">
                    <input type="button" onclick="BusquedaR()" value="Buscar">
                     </form>
                      <form action="" id="SearchCategory" name="SearchCategory" style="display: inline-block; margin: 20px;">
                    <label for="SerchR">
                     <h3>Buscar videos en Categoria</h3>
                    </label>
                    <input type="text" size="60" name="busqueda" id="busquedaR">
                     <select id="Categoria" name="Categoria">
                     <?php
                                        $mysqli = new mysqli($servername, $username,$password, $dbname) or die('Error');
                    $query = $mysqli -> query ("CALL Lista_Categoria");
                        while ($valores = mysqli_fetch_array($query)) {             
                            echo '<option name = "seccion" value = "'.$valores['id_Categoria'].'">'.$valores['Nombre'].'</option>';             
                        }
                    $mysqli->close();
                    ?>
                    </select>
                    <input type="submit" value="Buscar">


                </form>

                </div>

               
            </div>
            <!--end: filtro-->
            <div class="busqTitulo">
                <h2>Resultados:</h2>
            </div>
            <div class="perfBusqList">
                  <?php

                   
                      
                   $mysqliR = new mysqli($servername, $username,$password, $dbname) or die('Error');
                    $queryR = $mysqliR -> query ("CALL Search_User('".$SearchText."')");
                        while ($valores = mysqli_fetch_array($queryR)) {    
                        $SUserPP=base64_encode($valores['Foto_perfil']);
                        $SUser_id=$valores['id_Usuario'];
                        $SNoVideos=$valores['Videos'];
                        $SNameUser=$valores['Nombre'];
                        $SDescripcion=$valores['Descripcion'];

                     echo"<div class=\"perfBusq\">
                     <a href=\"perfil.php?Usuario=".$SUser_id."\">
                    <img id=\"avaBusq\" src=\"data:image/jpeg;base64,$SUserPP\">
                    </a>
                    <div class=\"perfBusqTxt\">
                        <h2>$SNameUser</h2>
                         <h2>$SDescripcion</h2>
                        <h2>$SNoVideos videos</h2>
                    </div>
                       </div> ";
                        }
                          if(mysqli_num_rows($queryR)==0 )
                            {echo"<h2>-No se encontraron Usuarios-</h2>";}

                    $mysqliR->close();

                    echo" </section>
                                <br>";
                             
                ?>
           
            
                </div>
            </div>
            <!--end: perfBusqList-->
            <div class="videoBusqList">
                <?php


if(isset($_GET["DateI"]))
{

    $SearchDateI=$_GET["DateI"];
    $SearchDateF=$_GET["DateF"];

     $mysqliR = new mysqli($servername, $username,$password, $dbname) or die('Error');
                    $queryR = $mysqliR -> query ("CALL Search_Video_Fecha('".$SearchText."','".$SearchDateI."','".$SearchDateF."')");
                        while ($valores = mysqli_fetch_array($queryR)) {  
                        $FVideo_id=$valores['id_Video'];
                        $FTitulo=$valores['Titulo'];
                        $FFecha_Subida=$valores['Fecha_Subida'];
                        $FMiniatura=$valores['Miniatura'];
                        $FDescripcion=$valores['Descripcion'];


                echo"<div class=\"videoBusq\">
                    <img class=\"iconVideoBusq\" src=\"$FMiniatura\">
                    <div class=\"videoBusqTxt\">
                        <div class=\"nomVidBusq\">
                            <h2>$FTitulo</h2>
                        </div>
                        <div class=\"fecVidBusq\">
                            <div class=\"fecVidStatic\">
                                <h3>Subido el</h3>
                            </div>
                            <div class=\"fecVidEdit\">
                                <h3>$FFecha_Subida</h3>
                            </div>
                        </div>
                        <div class=\"descVidBusq\">
                            <h3>$FDescripcion</h3>
                        </div>
                    </div>
                </div>";


}

if(mysqli_num_rows($queryR)==0 )
                            {echo"<h2>-No se encontraron Videos-</h2>";}

}
else if(isset($_GET["Categoria"])) 
{

 $SearchCategory =$_GET["Categoria"];
    

     $mysqliR = new mysqli($servername, $username,$password, $dbname) or die('Error');
                    $queryR = $mysqliR -> query ("CALL Search_Video_Categoria('".$SearchText."','".$SearchCategory."')");
                    if(mysqli_num_rows($queryR)!==0 ){
                        while ($valores = mysqli_fetch_array($queryR)) {  
                        $FVideo_id=$valores['id_Video'];
                        $FTitulo=$valores['Titulo'];
                        $FFecha_Subida=$valores['Fecha_Subida'];
                        $FMiniatura=$valores['Miniatura'];
                        $FDescripcion=$valores['Descripcion'];


                echo"<div class=\"videoBusq\">
                    <img class=\"iconVideoBusq\" src=\"$FMiniatura\">
                    <div class=\"videoBusqTxt\">
                        <div class=\"nomVidBusq\">
                            <h2>$FTitulo</h2>
                        </div>
                        <div class=\"fecVidBusq\">
                            <div class=\"fecVidStatic\">
                                <h3>Subido el</h3>
                            </div>
                            <div class=\"fecVidEdit\">
                                <h3>$FFecha_Subida</h3>
                            </div>
                        </div>
                        <div class=\"descVidBusq\">
                            <h3>$FDescripcion</h3>
                        </div>
                    </div>
                </div>";
}
}
if(mysqli_num_rows($queryR)==0 )
                            {echo"<h2>-No se encontraron Videos-</h2>";}


}else
{

  $mysqliR = new mysqli($servername, $username,$password, $dbname) or die('Error');
                    $queryR = $mysqliR -> query ("CALL Search_Video('".$SearchText."')");
                        while ($valores = mysqli_fetch_array($queryR)) {  
                        $FVideo_id=$valores['id_Video'];
                        $FTitulo=$valores['Titulo'];
                        $FFecha_Subida=$valores['Fecha_Subida'];
                        $FMiniatura=$valores['Miniatura'];
                        $FDescripcion=$valores['Descripcion'];


                echo"<div class=\"videoBusq\">
                    <img class=\"iconVideoBusq\" src=\"$FMiniatura\">
                    <div class=\"videoBusqTxt\">
                        <div class=\"nomVidBusq\">
                            <h2>$FTitulo</h2>
                        </div>
                        <div class=\"fecVidBusq\">
                            <div class=\"fecVidStatic\">
                                <h3>Subido el</h3>
                            </div>
                            <div class=\"fecVidEdit\">
                                <h3>$FFecha_Subida</h3>
                            </div>
                        </div>
                        <div class=\"descVidBusq\">
                            <h3>$FDescripcion</h3>
                        </div>
                    </div>
                </div>";



}
   
}
                ?>

            </div>
            <!--end: videoBusqList-->
        </div>
    </div>
</body>

</html>