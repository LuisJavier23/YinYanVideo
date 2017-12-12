<?php
$servername = "mysql.hostinger.mx";
$username = "u408187247_root";
$password = "Siul23";
$dbname = "u408187247_yin";

         


                     
try {      
$mysqli = new mysqli($servername, $username, $password, $dbname) or die('Error');

$mysqliCheck = new mysqli($servername, $username, $password, $dbname) or die('Error');
session_start();
    
$Nombre = mysqli_real_escape_string($mysqliCheck,$_POST['nombre']);
$Correo = mysqli_real_escape_string($mysqliCheck,$_POST['correo']);

$sql2 = "CALL Verificar_Usuario_Correo( '".$Nombre."', '".$Correo."');";

$result2=$mysqliCheck->query($sql2);

if(mysqli_num_rows($result2)==0)
 {

if(!empty($_POST))
{
	
	$Ciudad = mysqli_real_escape_string($mysqli,$_POST['ciudad']);
	$Contra = mysqli_real_escape_string($mysqli,$_POST['contra']);
	$Genero = mysqli_real_escape_string($mysqli,$_POST['gender']);
	$Nacimiento = mysqli_real_escape_string($mysqli,$_POST['nacimiento']);
    $Avatar = addslashes(file_get_contents($_FILES['avatar']['tmp_name']));
    $Portada = addslashes(file_get_contents($_FILES['portada']['tmp_name']));
    $Pais = mysqli_real_escape_string($mysqli,$_POST['pais']);
	$Pregunta_seguridad = mysqli_real_escape_string($mysqli,$_POST['pregunta_seguridad']);
	$Respuesta = mysqli_real_escape_string($mysqli,$_POST['respuesta']);
	
    
	
	$sql = "CALL Usuario_Insertar( '".$Nombre."', '".$Ciudad."', '".$Correo."', '".md5($Contra)."', '".$Genero."', '".$Nacimiento."', '{$Avatar}' , '{$Portada}' ,'".$Pais."','".$Pregunta_seguridad."','".$Respuesta."');";

	//echo($sql);

	$result=$mysqli->query($sql);

        $_SESSION["NewUserFlag"] =true;
        
	header("location: ../login.php");
        //echo("Registro de Usuario Exitoso");

        
        
        $mysqli->close();	
}
}
else
{

 $_SESSION["UserAlreadyExist"] =true;

header("location: ../register.php");

}
 }
 catch(PDOException $e)
    {
    echo $mysqli . "<br>" . $e->getMessage();
    }  
    
    

     
     
     
     
     
     
 
  


    


                  







