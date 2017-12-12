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
	$idUser = mysqli_real_escape_string($mysqli,$_SESSION['id_Usuario']);
	$idVideo = mysqli_real_escape_string($mysqli,$_SESSION['CurrentVideoId']);
	$textComent = mysqli_real_escape_string($mysqli,$_POST['textComent']);
	$timestamp = date("Y-m-d H:i:s");
	
	
    
	
	$sql = "CALL Insertar_Comentario_Video( '".$idUser."', '".$idVideo."','".$timestamp."','".$textComent."');";

	//echo($sql);

	$result=$mysqli->query($sql);

     
        
	header("location: ../video.php?Video=$idVideo");
        //echo("Registro de Usuario Exitoso");

        
        
        $mysqli->close();	
}

}
 
 catch(PDOException $e)
    {
    echo $mysqli . "<br>" . $e->getMessage();
    }  
    
    

     
     
     