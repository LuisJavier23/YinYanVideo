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
          $videoId=$_SESSION['CurrentVideoId'];
            $UserId=$_SESSION['id_Usuario'];
	
	$sql = "CALL Delete_Usuario_favorito_Video( '".$videoId."', '".$UserId."');";

	//echo($sql);

	$result=$mysqli->query($sql);

      $_SESSION['ActionTaken']=true;
        
	header("location: ../video.php?Video=$videoId");
        //echo("Registro de Usuario Exitoso");

        
        
        $mysqli->close();	
}

}
 
 catch(PDOException $e)
    {
    echo $mysqli . "<br>" . $e->getMessage();
    }  
    
    

     
     
     
     
     