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
   <script>
            function Ingresar() {


      
            
          
                    var Nombre=document.getElementById("nombre").value;
                    var Contra=document.getElementById("contra").value;
                    
        
        if(Nombre==""||Contra=="")
        {
            
        
         document.getElementById("errormessage").innerHTML = "Favor de ingresar usuario y contraseña";
   
     
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





 function Reportar() {


      
            
          
       

      document.getElementById("formReporte").submit();
    

  }

  function hide() {
            var x = document.getElementById('contNav');
            if (x.style.display === 'block') {
                x.style.display = 'none';
            } else {
                x.style.display = 'block';
            }
           
            
            
            
            
            
        }

</script>
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
    <!-- end: containerH -->
      <?php

                  $mysqli = new mysqli($servername, $username,$password, $dbname) or die('Error');
                    
                   
                    
                    $VideoId=$_SESSION['CurrentVideoId'];
                    
                    $query = $mysqli -> query ("CALL Video_Data('".$VideoId."')");
            
                    

                if(mysqli_num_rows($query)!==0 )
                    { while ($valores = mysqli_fetch_array($query)) {   
            
                   $VUserPP = base64_encode($valores['Foto_perfil']);     
                               $VUserName = $valores['Nombre']; 
                               $VUserId= $valores['id_Usuario']; 
                                $VContenido= $valores['Contenido']; 
                                $VTitulo= $valores['Titulo']; 
                               $VDescripcion= $valores['Descripcion']; 
                               $VEstatus= $valores['Estatus'];
                                $VViews= $valores['Views']; 
                                $VMiniatura= $valores['Miniatura']; 
                                  }
                    }
            $mysqli->close();   
            ?>
    <div class="containerB">
        <div class="contVideo">
            <div id="nomVid">
                <h2>
                    <?php echo$VTitulo; ?>
                </h2>
            </div>
            <div id="iconVid">
                <div class="selectionVideo">
                    <img class="vidIconEditar" <?php echo"src=\"$VMiniatura\""; ?> >
                </div>
            </div>
            <div id="usuVid">
                 <?php echo "<img src=\"data:image/jpeg;base64,$VUserPP\" class=\"subIconsPerf\">";?>
                <div class="nombreSubPerf"><?php echo$VUserName; ?></div>
            </div>
            <div id="descVid">
              <h3>Descripcion:</h3>
                <?php echo$VDescripcion ; ?>
            </div>
        </div>
        <!--end: contVideo -->
        <div class="contReporte">
            <form action="Php/RegistrarReporte.php" name="formReporte" id="formReporte" method="post">
                <label for="razonBloqueo">Razon de Bloqueo:</label>
                <select name="razonBloqselect" id="razonBloq">
                  <?php
                                        $mysqli = new mysqli($servername, $username,$password, $dbname) or die('Error');
                    $query = $mysqli -> query ("CALL Lista_Motivos_baneo");
                        while ($valores = mysqli_fetch_array($query)) {             
                            echo '<option name = "seccion" value = "'.$valores['id_Motivos_Baneo'].'">'.$valores['Motivo'].'</option>';               
                        }
                    $mysqli->close();
                    ?>
                </select>
                <input type="button" value="Reportar" id="btnReporte" onclick="Reportar()" />
            </form>
        </div>
        <!--end: contReporte -->
    </div>
    <!--end: containerB -->
</body>

</html>