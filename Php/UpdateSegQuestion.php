<?php
$servername = "mysql.hostinger.mx";
$username = "u408187247_root";
$password = "Siul23";
$dbname = "u408187247_yin";


                     
try {         
$mysqli = new mysqli($servername, $username, $password, $dbname) or die('Error');
$mysqli2 = new mysqli($servername, $username, $password, $dbname) or die('Error');
session_start();

if(!empty($_POST))
{
	
	$Contrasena= mysqli_real_escape_string($mysqli,$_POST['contraconfirm']);
	
	
         $Nombre=$_SESSION["Nombre_Usuario"];
         $id_Usuario=$_SESSION["id_Usuario"];
	
	$sql = "CALL Verificar_Usuario( '".$Nombre."', '".md5($Contrasena)."');";

	echo($sql);

	$query=$mysqli->query($sql);

        if(mysqli_num_rows($query)!==0 )
        {   
       			
			            
                                    
                                            
                                            $_SESSION["NewQuestionSucces"] = true;
                                            
                                            $pregunta_seguridad = mysqli_real_escape_string($mysqli2,$_POST['pregunta_seguridad']);
                                            
                                             $respuesta = mysqli_real_escape_string($mysqli2,$_POST['respuesta']);
                                            
                                              
                                        $sql2 = "CALL Update_Usuario_PreguntaSeguridad( '".$id_Usuario."', '".$pregunta_seguridad."','".$respuesta."');";
                                              
                                       // echo $sql2;
                                        
                                        $result=$mysqli2->query($sql2);
                                        
			        $mysqli->close();  
                                
                                header("location: ../editarperfil.php?Usuario=$id_Usuario");
        
        }
        else
        {
            
              $_SESSION["NewQuestionFail"] = true;
                                            
              
             header("location: ../editarperfil.php?Usuario=$id_Usuario");
            
            
        }
	
        //echo("Registro de Usuario Exitoso");

        
        
        $mysqli->close();	
}

}
 
 catch(PDOException $e)
    {
    echo $mysqli . "<br>" . $e->getMessage();
    }  
    
    

  