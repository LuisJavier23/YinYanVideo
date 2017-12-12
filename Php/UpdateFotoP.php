<?php


$servername = "mysql.hostinger.mx";
$username = "u408187247_root";
$password = "Siul23";
$dbname = "u408187247_yin";

               


                     
try {         
$mysqli = new mysqli($servername, $username, $password, $dbname) or die('Error');
$mysqli2 = new mysqli($servername, $username, $password, $dbname) or die('Error');
session_start();
    
if(!empty($_FILES))
{
    
    $Id_Usuario=$_SESSION['id_Usuario'];
    
	$Avatar = addslashes(file_get_contents($_FILES['avatarE']['tmp_name']));
        $Portada = addslashes(file_get_contents($_FILES['portadaE']['tmp_name']));
	
	
    
	
	$sql = "CALL Update_Usuario_Fotos( '".$Id_Usuario."', '{$Avatar}', '{$Portada}');";

	//echo($sql);

	$result=$mysqli->query($sql);

      
        
        $sql2 = "CALL Ver_Usuario_Fotos( '".$Id_Usuario."');";

	//echo($sql);

	$query2=$mysqli2->query($sql2);

        if(mysqli_num_rows($query2)!==0 )
        {   
        while ($valores2 = mysqli_fetch_array($query2)) {				
			            	
                                        
                                        
                                            
                                           
                                            $_SESSION["Foto_perfil_Usuario"] = $valores2['Foto_perfil'];
                                            $_SESSION["Foto_Portada_Usuario"] = $valores2['Foto_portada'];   
         
                                            
        }
        
        
	header("location: ../perfil.php?Usuario=$Id_Usuario");
        //echo("Registro de Usuario Exitoso");

        }
        
        $mysqli->close();	
}else
{
    echo"porque??? :c";
}

}
 
 catch(PDOException $e)
    {
    echo $mysqli . "<br>" . $e->getMessage();
    }  
    
    

     
     
     
     
     
     
 
  

