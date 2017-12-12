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

?>
    <script>
       

    

        
        
function Registrar() {


      
            
          
                    var Nombre=document.getElementById("nombre").value;
                    var Correo=document.getElementById("correo").value;
                    var Contra=document.getElementById("contra").value;
                    var Pregunta_seguridad=document.getElementById("pregunta_seguridad").value;
                    var Respuesta=document.getElementById("respuesta").value;
                    var Nacimiento=document.getElementById("nacimiento").value;
                    var Genero = $('input[name="gender"]:checked').val();
                    var Pais=document.getElementById("pais").value;
                    var Ciudad=document.getElementById("ciudad").value;
                     var Avatar=document.getElementById("avatar").value;
                    var Portada=document.getElementById("portada").value;
        
        if(Nombre==""||Correo==""||Contra==""||Pregunta_seguridad==""||Respuesta==""||Nacimiento=="" ||Pais==""||Ciudad==""||Avatar==""||Portada=="")
        {
            
        
         document.getElementById("errormessage").innerHTML = "Favor de ingresar todos los campos";
   
     
    }
    
    else
    {
        
            document.getElementById("FormRegistrar").submit();
        
        
    }
            
            
        



}



</script>
    
    
</head>

<body>
    
    <div class="containerL">
        <div class="block-left-special">
            <div class="buttonReturn">
                <a href="index.php" target="_self">Regresar</a>
            </div>
        </div>
        <!-- end: block-left -->
        <div class="block-center">
            <img src="Imagenes/logo/yinyanlogo.png" alt="yinyan" class="logo-special">
        </div>
        <!-- end: block-center -->
    </div>
    
    <div class="containerGeneral">
        <div class="containerR">
            <div class="containerTitle">
                
                <h1>ÚNETE A YINYAN </h1>
            </div>
            
            <form action="Php/RegisterAction.php" name="registerUser" method="POST" id="FormRegistrar" enctype="multipart/form-data">  
                
                <p id="errormessage" style="color: red;font-size: 130%; font-weight: bold;">
                    <?php 
                         if (isset($_SESSION['UserAlreadyExist'])) 
                              {
                                  echo "Usuario y/o Contraseña ya existentes, favor de ingresar diferentes Usuario y/o Contraseña";
                                  unset($_SESSION['UserAlreadyExist']);
                                  
                                }

                ?></p>
            <div class="RName">
               
                    <P> 
                        <LABEL for="Nombre">Nombre de Usuario: </LABEL>
                        <input type="text" id="nombre" name="nombre">
                        <BR>
                    </p>
                    
            </div>
            <div class="RMail">
               
                    <P>
                        <LABEL for="Email">Correo: </LABEL>
                        <INPUT type="email" id="correo" name="correo">
                        <BR>
                    </p>
                
            </div>
            <div class="RContra">
                
                    <p>
                        <LABEL for="Email">Contraseña: </LABEL>
                        <INPUT type="password" id="contra" name="contra">
                        <BR>
                    </p>
                </div>
           <div class="RQuestion">
                
                    <p>
                        <LABEL for="PreguntaSeguridad">Pregunta de Seguridad </LABEL>
                        <!--<INPUT type="text" id="city"><BR>-->
                        <select id="pregunta_seguridad" name="pregunta_seguridad">
                     	<?php
                                        $mysqli = new mysqli($servername, $username,$password, $dbname) or die('Error');
	  				$query = $mysqli -> query ("CALL Lista_Preguntas_Seguridad");
			          	while ($valores = mysqli_fetch_array($query)) {				
			            	echo '<option name = "seccion" value = "'.$valores[id_PreguntaSeguridad].'">'.$valores[Pregunta].'</option>';				
			          	}
					$mysqli->close();
			        ?>
            	</select>
                    </p>
                
            </div>
                
                   <div class="RAnswer">
                
                    <p>
                        <LABEL for="Respuesta">Respuesta: </LABEL>
                        <INPUT type="text" id="respuesta" name="respuesta">
                        <BR>
                    </p>
                </div>
                
            <div class="RBirth">
                
                    <p>
                        <LABEL for="Nacimiento">Nacimiento: </LABEL>
                        <INPUT type="date" id="nacimiento" name="nacimiento">
                        <BR>
                    </p>
               
            </div>
            <div class="RGender">
                
                    <LABEL for="Nacimiento">Genero: </LABEL>
                    <input type="radio" name="gender" value="1" checked> Masculino
                    <input type="radio" name="gender" value="2"> Femenino
                    <input type="radio" name="gender" value="3"> Otro
                
            </div>
                   <div class="RPerfil">
                
                    <p>
                        <LABEL for="Respuesta">Foto de Avatar </LABEL>
                        <INPUT type="file" id="avatar" name="avatar" accept=".png, .jpg, .jpeg">
                        <BR>
                    </p>
                </div>  
                
                   <div class="RPortada">
                
                    <p>
                        <LABEL for="Respuesta">Foto de Portada </LABEL>
                        <INPUT type="file" id="portada" name="portada"  accept=".png, .jpg, .jpeg">
                        <BR>
                    </p>
                </div>
          
            <div class="RCoutry">
                
                    <p>
                        <LABEL for="Pais">Pais: </LABEL>
                        <!--<INPUT type="text" id="country"><BR>-->
                         <select id="pais" name="pais">
                  <?php
	  					$mysqli = new mysqli($servername, $username,$password, $dbname) or die('Error');
	  					$query = $mysqli -> query ("CALL Lista_Paises");
			          	while ($valores = mysqli_fetch_array($query)) {				
			            	echo '<option name = "seccion" value = "'.$valores[id_Pais].'">'.$valores[Nombre].'</option>';				
			          	}
						$mysqli->close();
			        ?>
                 </select>
                    </p>
                
            </div>
                
              <div class="RCity">
                
                    <p>
                        <LABEL for="Ciudad">Ciudad: </LABEL>
                        <!--<INPUT type="text" id="city"><BR>-->
                        <input type="text" id="ciudad" name="ciudad">
                     
                    </p>
                
            </div>
                
                
                
            <div id ="Registrar" class="buttonRegister">
                <input type="button" value="Registrar" onclick="Registrar()">
            </div>
           </form>  
            <br>
            <div class="question">
				<a href="login.php" target="_self">¿Ya tienes cuenta?</a>
			</div>
        </div>
        <!-- end: containerR -->
    </div>
    <!-- end: containerGeneral -->
    
   
</body>

</html>