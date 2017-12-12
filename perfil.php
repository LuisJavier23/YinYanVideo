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

  $mysqli = new mysqli($servername, $username,$password, $dbname) or die('Error');
                    
                    $UsuarioIdCheck=$_GET["Usuario"];
            
                    $query = $mysqli -> query ("CALL ProcedureVerificarBloqueo('".$UsuarioIdCheck."')");
                  
                    while ($valores = mysqli_fetch_array($query)) { 

                       $UserEstatus = $valores['Estatus'];     
                            
                               if($UserEstatus!=1)
                               {

                                    $mysqli->close();
                                     $_SESSION["idPerfilBloqueado"]=$UsuarioIdCheck;
                                  header("Location:http://yinyanvideo.xyz/perfilBloq.php");


                               }
                    
                    }

      $mysqli->close();


?>
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

  function hide() {
            var x = document.getElementById('contNav');
            if (x.style.display === 'block') {
                x.style.display = 'none';
            } else {
                x.style.display = 'block';
            }
           
            
            
            
            
            
        }

</script>
    <?php

if($_GET["Usuario"]!==$_SESSION['id_Usuario'])
                   {
                       $mysqliChekSub = new mysqli($servername, $username,$password, $dbname) or die('Error');
                    
            $ThisUserId=$_SESSION['id_Usuario'];
            $SubUserId=$_GET["Usuario"];

                    $queryChkSub = $mysqliChekSub -> query ("CALL Verify_Sub_Usuario('".$ThisUserId."','".$SubUserId."')");
            
              if(mysqli_num_rows($queryChkSub)!==0 )
              {
                  
                  $SubFlag=true;
              }else{$SubFlag=false;}
              
              $mysqliChekSub->close();
                    
                 }

                 $_SESSION['CurrentPerfil']=$_GET["Usuario"];

    ?>

</head>

<body>
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
        </div>
        <!-- end: containerH -->
        <div class="containerB">
            <div class="imagPerf">
                <?php
                if ($_GET["Usuario"]==$_SESSION['id_Usuario'])
                {
                    
                        $UserName= $_SESSION['Nombre_Usuario'];
                           
                      $FotoPerfil= base64_encode($_SESSION['Foto_perfil_Usuario']);
                      
                      $FotoPortada= base64_encode($_SESSION['Foto_Portada_Usuario']);
                    
                    
                    
                     echo
                "<div class=\"portraitCrop\">
                    <img id=\"portadaPerf\" src=\"data:image/jpeg;base64,$FotoPortada\">
                </div>
                <div id=\"avatarPerf\">
                    <img id=\"avaImg\" src=\"data:image/jpeg;base64,$FotoPerfil\">
                    <div id=\"avaInfo\">
                        <h3>$UserName</h3>
                    </div>
                </div>";
                    
                }
                else 
                  {
                    
                     $mysqli = new mysqli($servername, $username,$password, $dbname) or die('Error');
                    
                    $UsuarioId=$_GET["Usuario"];
	  				
                    $query = $mysqli -> query ("CALL Datos_Usuario('".$UsuarioId."')");
			          	
                    while ($valores = mysqli_fetch_array($query)) {				
			       $UserName = $valores['Nombre'];     
                               $FotoPerfil = base64_encode($valores['Foto_perfil']); 
                               $FotoPortada= base64_encode($valores['Foto_portada']); 
                               
                    
                    }
                     echo
                "<div class=\"portraitCrop\">
                    <img id=\"portadaPerf\" src=\"data:image/jpeg;base64,$FotoPortada\">
                </div>
                <div id=\"avatarPerf\">
                    <img id=\"avaImg\" src=\"data:image/jpeg;base64,$FotoPerfil\">
                    <div id=\"avaInfo\">
                        <h3>$UserName</h3>
                    </div>
                </div>";
                    
                    
                    
                    
                }
               
                        ?>
            </div>
            <!-- end: imagPerf -->
            <br>
            <?php
            if($_GET["Usuario"]!==$_SESSION['id_Usuario'])
            {
            	 
                        if(isset($_SESSION['LogInFlag']))
                        {

                        if($SubFlag==false){
                       echo "<form action=\"Php/SubUser.php\"  name=\"Sub\" method=\"POST\">
                            <input type=\"submit\" value=\"Suscribirse\">";    

                                        }
                            else if($SubFlag==true)
                            {
                           echo "<form action=\"Php/UnSubUser.php\"  name=\"UnSub \"method=\"POST\">
                            <input type=\"submit\" value=\"Anular Suscripcion\"  >";
                            }
                          }
                          else
                          {

                            echo"<form name=\"fake\" >";
                               echo"<input type=\"button\" onclick=\"location.href='login.php'\" name=\"Fake\" value=\"Suscribirse\">";
                          }
                                
            echo"</form>";
            }
                    ?>
                
            <div id="seccionesPerf">
                <section id="infoUsu">
                    <?php
                                        
                    
                    $mysqli = new mysqli($servername, $username,$password, $dbname) or die('Error');
                    
                    $UsuarioId=$_GET["Usuario"];
	  				
                    $query = $mysqli -> query ("CALL Datos_Usuario('".$UsuarioId."')");
			          	
                    while ($valores = mysqli_fetch_array($query)) {				
			       $fechaNacP = $valores['Fecha_nacimiento'];     
                               $CiudadP = $valores['Ciudad']; 
                               $PaisP= $valores['Pais']; 
                               $DescP = $valores['Descripcion']; 
                               
                   echo " 
                      <br>
                    <h2>Sobre el usuario</h2>
                     <div class=\"DetallesUsuario\">$DescP</div>";
                   if($_GET["Usuario"]==$_SESSION['id_Usuario'])
                   {$Usuario=$_SESSION['id_Usuario'];
                       echo "<button id=\"btnEditar\" onclick=\"location.href='editarperfil.php?Usuario=$Usuario'\" class=\"btnPerf\">Editar Perfil</button>
                                <button id=\"btnAdministrar\" onclick=\"location.href='listavideo2.php?Usuario=$Usuario'\" class=\"btnPerf\">Administrar Contenido</button>";
                   }
                   echo"<div class=\"fecNamUsu\">
                        <h3>Fecha de Nacimiento:</h3>
                        <div class=\"numfecNamUsu\">$fechaNacP</div>
                    </div>
                   <div class=\"cdUsu\">
                        <h3>Ciudad:</h3>
                        <div class=\"nomcdUsu\">$CiudadP</div>
                    </div>
                    <div class=\"paisUsu\">
                        <h3>País:</h3>
                        <div class=\"nompaisUsu\">$PaisP</div>
                    </div>";			
			          	}
					$mysqli->close();
                    /*-------------------*/
  
                            ?>
                </section>
                </br>
                <section id="subidosUsu">
                   <h2>Subidos</h2>
                    <?php
                    
                          $mysqli = new mysqli($servername, $username,$password, $dbname) or die('Error');
                    
                    $UsuarioId=$_GET["Usuario"];
	  				
                    $query = $mysqli -> query ("CALL Videos_Subidos_Usuario('".$UsuarioId."')");
			

                if(mysqli_num_rows($query)!==0 )
                    { while ($valores = mysqli_fetch_array($query)) {	
            
			       $VideoMini = $valores['Miniatura'];     
                               $videoTittle = $valores['Titulo']; 
                               $VideoId= $valores['id_Video']; 

                    echo 
                   " 
                    <div class=\"subiPerf\">
                     <a href=\"video.php?Video=".$VideoId."\">
                        <img class=\"subiIconsPerf\" src=\"$VideoMini\" alt=\"\">
                             </a>   
                        <div class=\"nombreSubiPef\">$videoTittle</div>
                    </div>";
                    }
        }else
            {echo "<p>Ningun video Disponible</p>";}
            $mysqli->close();
                    ?>
                </section>
                </br>
                <section id="favUsu">
                    <h2>Favoritos</h2>
                    
                     <?php
                        
                        
                        
                        
                          $mysqli = new mysqli($servername, $username,$password, $dbname) or die('Error');
                    
                    $UsuarioId=$_GET["Usuario"];
	  				
                    $query = $mysqli -> query ("CALL Videos_favoritos_Usuario('".$UsuarioId."')");
			

                if(mysqli_num_rows($query)!==0 )
                    { while ($valores = mysqli_fetch_array($query)) {	
            
			       $VideoMini = $valores['Miniatura'];     
                               $videoTittle = $valores['Titulo']; 
                               $VideoId= $valores['id_Video']; 

                   echo "
                           <div class=\"favPerf\">
                         <a href=\"video.php?Video=".$VideoId."\">
                           <img class=\"favIconsPerf\" src=\"$VideoMini\">
                                </a>
                        <div class=\"nombreFavPerf\">$videoTittle</div> </div>";
                    }
        }else
            {echo "<p>Ningun video Disponible</p>";}
            $mysqli->close();
                      
                    ?>
                </section>
                <!--end: favUsu -->
                </br>
                <section id="subsUsu">
                    <h2>Suscripciones</h2>
                        <?php
                        
                        
                        
                        
                          $mysqli = new mysqli($servername, $username,$password, $dbname) or die('Error');
                    
                    $UsuarioId=$_GET["Usuario"];
	  				
                    $query = $mysqli -> query ("CALL Usuarios_suscrito_usuario('".$UsuarioId."')");
			

                if(mysqli_num_rows($query)!==0 )
                    { while ($valores = mysqli_fetch_array($query)) {	
            
			       $UserPP = base64_encode($valores['Foto_perfil']);     
                               $UserName = $valores['Nombre']; 
                               $UserId= $valores['id_Usuario']; 

                   echo " 
                    <div class=\"subsPerf\">
                           <a href=\"perfil.php?Usuario=".$UserId."\">
                            <img class=\"subIconsPerf\" src=\"data:image/jpeg;base64,$UserPP\">
                                </a>
                        <div class=\"nombreSubPerf\">$UserName</div></div>";
                    }
        }else
            {echo "<p>Ningun perfil disponible</p>";}
            $mysqli->close();
                      
                    ?>
                </section>

                  <section id="subsUsu">
                    <h2>Se a Suscrito</h2>
                    
                        <?php
                        
                        
                        
                        
                          $mysqli = new mysqli($servername, $username,$password, $dbname) or die('Error');
                    
                    $UsuarioId=$_GET["Usuario"];
	  				
                    $query = $mysqli -> query ("CALL Usuarios_subcriptores_usuario('".$UsuarioId."')");
			

                if(mysqli_num_rows($query)!==0 )
                    { while ($valores = mysqli_fetch_array($query)) {	
            
			       $UserPP = base64_encode($valores['Foto_perfil']);     
                               $UserName = $valores['Nombre']; 
                               $UserId= $valores['id_Usuario']; 

                   echo "   
                            <div class=\"subsPerf\">
                           <a href=\"perfil.php?Usuario=".$UserId."\">
                            <img class=\"subIconsPerf\" src=\"data:image/jpeg;base64,$UserPP\">
                                </a>
                        <div class=\"nombreSubPerf\">$UserName</div></div>";
                    }
        }else
            {echo "<p>Ningun perfil disponible</p>";}
            $mysqli->close();
                      
                    ?>
                </section>
                <!--end: subsUsu -->
            </div>

        </div>
        <!-- end: containerB -->
    </div>
    <!-- end: container -->
    <script>
        function hide() {
            var x = document.getElementById('contNav');
            if (x.style.display === 'block') {
                x.style.display = 'none';
            } else {
                x.style.display = 'block';
            }
        }
    </script>
    <!--end: script-->
</body>

</html>