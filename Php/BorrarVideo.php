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
         $videoId=$_POST['Video'];
         $userid=$_SESSION["id_Usuario"];
	
	$sql = "CALL Delete_Video( '".$videoId."');";

	//echo($sql);

	$result=$mysqli->query($sql);

      
        
	header("location: ../perfil.php?Usuario=$userid");
        //echo("Registro de Usuario Exitoso");

        
        
        $mysqli->close();	
}

}
 
 catch(PDOException $e)
    {
    echo $mysqli . "<br>" . $e->getMessage();
    }  
    
    

     
     