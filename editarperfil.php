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
    
       <script>
   
function Ingresar() {


      
            
          
                    var Nombre=document.getElementById("nombre").value;
                    var Contra=document.getElementById("contra").value;
                    
        
        if(Nombre==""||Contra=="")
        {
            
        
         document.getElementById("errormessage").innerHTML = "Favor de ingresar todos los campos";
   
     
    }
    
    else
    {
        
            document.getElementById("loginForm").submit();
        
        
    }
    }
    
function CambiarDatosGeneral() {


      
            
          
                    var nacimientoE=document.getElementById("nacimientoE").value;
                    var Contra=document.getElementById("ciudadE").value;
                    
        
        if(nacimientoE==""||ciudadE=="")
        {
            
        
         document.getElementById("errormessageG").innerHTML = "Favor de ingresar todos los campos en seccion \"General\"";
   
     
    }
    
    else
    {
        
            document.getElementById("UpdateGeneral").submit();
        
        
    }
            
            
        



}

function CambiarImagenes() {


      
            
          
                    var avatarE=document.getElementById("avatarE").value;
                    var portadaE=document.getElementById("portadaE").value;
                    
        
        if(avatarE==""||portadaE=="")
        {
            
        
         document.getElementById("errormessageG").innerHTML = "Favor de ingresar todos los campos en seccion \"Cambiar Imagen de Portada y Perfil\"";
   
     
    }
    
    else
    {
        
            document.getElementById("UpdatePhoto").submit();
        
        
    }
            
            
        



}

function CambiarContra() {


      
            
          
                    var contravieja=document.getElementById("contravieja").value;
                    var contraE=document.getElementById("contraE").value;
                    var contraconfirm=document.getElementById("contraconfirm").value;
                    
        
        if(contravieja==""||portadaE==""||contraconfirm=="")
        {
            
        
         document.getElementById("errormessageS").innerHTML = "Favor de ingresar todos los campos en seccion \"Cambiar Contraseña\"";
   
     
    }
    
    else if(contraE!==contraconfirm)
    {
        
            document.getElementById("errormessageS").innerHTML = "Contraseñas no coinciden en \"Cambiar Contraseña:\" ";
        
        
    }
    else
    {
        
        document.getElementById("UpdatePassword").submit();
        
    }
            
            
        



}

function CambiarPregunta() {


      
            
          
                    var contraConfirmPreg=document.getElementById("contraConfirmPreg").value;
                    var respuestaE=document.getElementById("respuestaE").value;
                    
        
        if(contraConfirmPreg==""||respuestaE=="")
        {
            
        
         document.getElementById("errormessageS").innerHTML = "Favor de ingresar todos los campos en seccion \"Cambiar Pregunta de Seguridad\"";
   
     
        }else
    {
        
        document.getElementById("UpdateSegQuestion").submit();
        
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
        <!--end: containerH-->
        <div class="containerB">
             <div class="imagPerf">
                <?php
               
                    if ($_GET["Usuario"]==$_SESSION['id_Usuario'])
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
                    <img id=\"avaImg\"src=\"data:image/jpeg;base64,$FotoPerfil\">
                    <div id=\"avaInfo\">
                        <h3>$UserName</h3>
                    </div>
                </div>";
                    
                    
                }else
                {
                    
                  
                    
                }                    
                
               
                        ?>
            </div>
            <!-- end: imagPerf -->
            <div class="editarTitulo">
                <h2>Editar Perfil</h2>
            </div>
            <div class="editarCampos">
                <h2>Datos Generales</h2>
                <p id="errormessageG" style="color: red;font-size: 130%; font-weight: bold;"></p>
                <div class="campoGeneral">
                    <div class="campoDatos">
                        <h3>General</h3>
                        <form action="Php/UpdateGeneral.php"  name="UpdateGeneral" id="UpdateGeneral" method="POST">
                            <div class="campoFecNam">
                                <LABEL for="nacimiento">Nacimiento: </LABEL>
                                <INPUT type="date" id="nacimientoE" name="nacimiento">
                            </div>
                            <div class="campoGenero">
                                <LABEL for="Nacimiento">Genero: </LABEL>
                                <input type="radio" name="gender" value="1" checked> Masculino
                                <input type="radio" name="gender" value="2"> Femenino
                                <input type="radio" name="gender" value="3"> Otro
                            </div>
                            <div class="campoPais">
                                <LABEL for="Pais">Pais: </LABEL>
                                <select id="paisE" name="pais">
                                    <?php
	  					$mysqli = new mysqli($servername, $username,$password, $dbname) or die('Error');
	  					$query = $mysqli -> query ("CALL Lista_Paises");
			          	while ($valores = mysqli_fetch_array($query)) {				
			            	echo '<option name = "pais" value = "'.$valores[id_Pais].'">'.$valores[Nombre].'</option>';				
			          	}
						$mysqli->close();
			        ?>
                                </select>
                            </div>
                            <div class="campoCiudad">
                                <LABEL for="Ciudad">Ciudad: </LABEL>
                                <input type="text" id="ciudadE" name="ciudad">
                            </div>
                            <br>
                             <br>
                             <br>
                            <input type="button" value="Cambiar Datos" onclick="CambiarDatosGeneral()">
                        </form>
                    </div>
                    <!--end:campoDatos-->
                    <div class="campoImg">
                        <h3>Cambiar Imagen de Portada y Perfil</h3>
                            <form action="Php/UpdateFotoP.php"  name="UpdatePhoto" id="UpdatePhoto" method="POST" enctype="multipart/form-data">
                            <div class="campoPerfil">
                                <LABEL for="avatar">Foto de Avatar </LABEL>
                                <INPUT type="file" id="avatarE" name="avatarE" accept=".png, .jpg, .jpeg">
                            </div>
                            <div class="campoPortada">
                                <LABEL for="Respuesta">Foto de Portada </LABEL>
                                <INPUT type="file" id="portadaE" name="portadaE" accept=".png, .jpg, .jpeg">
                            </div>
                            <input type="button" value="Cambiar Imagenes" onclick="CambiarImagenes()">
                        </form>
                    </div>
                    <!--end:campoImg-->
                </div>
                <!--end:campoGeneral-->
                <h2>Datos de Seguridad</h2>
                <p id="errormessageS" style="color: red;font-size: 130%; font-weight: bold;">
                    <?php
                    if(isset($_SESSION["NewPasswordFail"]))
                   {
                        echo "Contraseña anterior Incorrecta";
                        unset($_SESSION["NewPasswordFail"]);
                        
                   }
                   if(isset($_SESSION["NewQuestionFail"]))
                   {
                        echo "Contraseña confirmada Incorrecta";
                        unset($_SESSION["NewQuestionFail"]);
                        
                   }
                    ?> </p>
                <p id="succesrmessageS" style="color: green;font-size: 130%; font-weight: bold;">
                   <?php
                   if (isset($_SESSION["NewPasswordSucces"]))
                   {
                     echo "Contraseña Cambiada Correctamente";
                     unset($_SESSION["NewPasswordSucces"]);
                     
                   }
                   
                   if (isset($_SESSION["NewQuestionSucces"]))
                   {
                     echo "Pregunta de Seguridad Cambiada Correctamente";
                     unset($_SESSION["NewQuestionSucces"]);
                     
                   }
                   ?>
                </p>
                <div class="campoSeguridad">
                    <!--end:campoCorreo-->
                    <div class="campoContra">
                        <h3>Cambiar Contraseña:</h3>
                        <form action="Php/UpdatePassword.php" name="UpdatePassword" id="UpdatePassword"  method="POST">
                            <div class="campoPassOld">
                                <LABEL for="contrasena">Contraseña anterior: </LABEL>
                                <INPUT type="password" id="contravieja" name="contravieja">
                            </div>
                            <div class="campoPassNew">
                                <div class="campoPassFirst">
                                    <LABEL for="contrasena">Contraseña nueva: </LABEL>
                                    <INPUT type="password" id="contraE" name="contra">
                                </div>
                                <div class="campoPassConfirm">
                                    <LABEL for="contraconfir">Confirmar contraseña nueva: </LABEL>
                                    <INPUT type="password" id="contraconfirm" name="contraconfirm">
                                </div>
                            </div>
                            <input type="button" value="Cambiar Contraseña" onclick="CambiarContra()">
                        </form>
                    </div>
                    <!--end:campoContra-->
                    <div class="campoPregunta">
                        <h3>Cambiar Pregunta de Seguridad:</h3>
                             <form action="Php/UpdateSegQuestion.php" name="UpdateSegQuestion" id="UpdateSegQuestion"  method="POST">
                            <div class="confirmContraPreg">
                                <LABEL for="contraconfir">Confirmar contraseña: </LABEL>
                                <INPUT type="password" id="contraConfirmPreg" name="contraconfirm">
                            </div>
                            <div class="campoPreg">
                                <label for="pregseg">Pregunta de Seguridad: </label>
                                <select id="pregunta_seguridadE" name="pregunta_seguridad">
                                <?php
                                        $mysqli = new mysqli($servername, $username,$password, $dbname) or die('Error');
	  				$query = $mysqli -> query ("CALL Lista_Preguntas_Seguridad");
			          	while ($valores = mysqli_fetch_array($query)) {				
			            	echo '<option name = "seccion" value = "'.$valores[id_PreguntaSeguridad].'">'.$valores[Pregunta].'</option>';				
			          	}
					$mysqli->close();
			        ?>
                                </select>
                            </div>
                            <div class="campoResp">
                                <LABEL for="respuesta">Respuesta: </LABEL>
                                <INPUT type="text" id="respuestaE" name="respuesta">
                            </div>
                            <input type="button" value="Cambiar Pregunta y Respuesta" onclick="CambiarPregunta()">
                        </form>
                    </div>
                    <!--end:campoPregunta-->
                </div>
                <!--end:campoSeguridad-->
            </div>
            <?php
            echo "<input type=\"button\" id=\"RegresarPerfil\" value=\"Regresar\" onclick=\"location.href='perfil.php?Usuario=".$_SESSION["id_Usuario"]."'\">";
                    ?>
            <!--end: editarCampos-->
        </div>
        <!--end:containerB-->
    </div>
    <!--end:container-->
</body>

</html>