    <!DOCTYPE html>
<html>

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
			<img src="Imagenes/logo/yinyanlogo.png" alt="yinyan" class="logo-special"></img>
		</div>
		<!-- end: block-center -->
	</div>
	<div class="containerLogin">
		<div class="Login">
			<div class="titleLogin">
				<h1>INICIA SESIÓN</h1>
			</div>

			<form action="Php/LoginAction.php" name="loginForm" id="loginForm" method="POST">
				<P>
                                <?php
                                
                                if (isset($_SESSION['NewUserFlag'])) 
                              {
                                  echo "<p class=\"alertmessage\" > Usuario Registrado Correctamente! </p>";
                                  unset($_SESSION['NewUserFlag']);
                                  
                                }
                                
                                  if (isset($_SESSION['LogInFail'])) 
                              {
                                  echo "<p class=\"errormessage\" > Nombre de Usuario y/o contraseña incorrectos</p>";
                                  unset($_SESSION['LogInFail']);
                                  
                                }

                                ?>
                                     <p id="errormessage" style="color: red;font-size: 130%; font-weight: bold;"></p>
					<LABEL for="Nombre">Usuario: </LABEL>
					<INPUT type="text" id="nombre" name="nombre">
					<BR>
					<br>
					<LABEL for="Contrasena">Contraseña: </LABEL>
					<INPUT type="password" id="contra" name="contra">
                                         <input type="hidden" name="Sender" id="Sender" value ="index">
					<BR>
					<br> 
					<input type="button" value="Ingresar" onclick="Ingresar()">
				</p>
			</form>
			<div class="question">
				<a href="register.php" target="_self">¿No tienes cuenta?</a>
			</div>
		</div>
		<!-- end: Login -->

	</div>
	<!-- end: containerLogin -->

</body>

</html>