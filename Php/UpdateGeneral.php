<?php


$servername = "mysql.hostinger.mx";
$username = "u408187247_root";
$password = "Siul23";
$dbname = "u408187247_yin";

               


                     
try {         
$mysqli = new mysqli($servername, $username, $password, $dbname) or die('Error');
session_start();
    
if(!empty($_POST))
{
    
    $Id_Usuario=$_SESSION['id_Usuario'];
    
	$nacimiento = mysqli_real_escape_string($mysqli,$_POST['nacimiento']);
	$gender = mysqli_real_escape_string($mysqli,$_POST['gender']);
	$pais = mysqli_real_escape_string($mysqli,$_POST['pais']);
	$ciudad = mysqli_real_escape_string($mysqli,$_POST['ciudad']);
	
    
	
	$sql = "CALL Update_Usuario_Datos( '".$Id_Usuario."', '".$nacimiento."', '".$gender."', '".$pais."', '".$ciudad."');";

	//echo($sql);

	$result=$mysqli->query($sql);

      
        
	header("location: ../perfil.php?Usuario=$Id_Usuario");
        //echo("Registro de Usuario Exitoso");

        
        
        $mysqli->close();	
}

}
 
 catch(PDOException $e)
    {
    echo $mysqli . "<br>" . $e->getMessage();
    }  
    
    

     
     
     
     
     
     
 
  

