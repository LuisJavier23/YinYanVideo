<?php
$servername = "mysql.hostinger.mx";
$username = "u408187247_root";
$password = "Siul23";
$dbname = "u408187247_yin";

         


             
try {         
$mysqli = new mysqli($servername, $username, $password, $dbname) or die('Error');
session_start();
    
if(empty($_POST))
{
          $SubIdId=$_SESSION['CurrentPerfil'];
            $UserId=$_SESSION['id_Usuario'];
	
	$sql = "CALL Delete_Usuario_sub_usuario( '".$UserId."', '".$SubIdId."');";

	//echo($sql);

	$result=$mysqli->query($sql);

      
        
	header("location: ../perfil.php?Usuario=$SubIdId");
        //echo("Registro de Usuario Exitoso");

        
        
        $mysqli->close();	
}

}
 
 catch(PDOException $e)
    {
    echo $mysqli . "<br>" . $e->getMessage();
    }  
    
    

     
     
     
     
     
     
 