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
	$Nombre = mysqli_real_escape_string($mysqli,$_POST['nombre']);
	$Contrasena= mysqli_real_escape_string($mysqli,$_POST['contra']);
	
	
    
	
	$sql = "CALL Verificar_Usuario( '".$Nombre."', '".md5($Contrasena)."');";
  
	echo($sql);

	$query=$mysqli->query($sql);

        if(mysqli_num_rows($query)!==0 )
        {   
        while ($valores = mysqli_fetch_array($query)) {				
			            	
                                        
                                      
                                      
                                            $_SESSION["Estatus_Usuario"] = $valores['Estatus'];
                                     
                                              $Estatus=$_SESSION["Estatus_Usuario"];
                                              

                                              if($Estatus==1)
                                              {


                                            $_SESSION["LogInFlag"] = true;
                                            $_SESSION["id_Usuario"] = $valores['id_Usuario'];
                                            $_SESSION["Nombre_Usuario"] = $valores['Nombre'];
                                            $_SESSION["Foto_perfil_Usuario"] = $valores['Foto_perfil'];
                                            $_SESSION["Foto_Portada_Usuario"] = $valores['Foto_portada'];   
                                            


                                              if($_POST['Sender']=="index")
                                              {
                                            header("location: ../index.php");
                                              }
                                              else if ($_POST["Sender"]=="perfil")
                                              {

                                                   header("location: ../perfil.php");
                                         
                                              }
                                        } 
                                        else if ($Estatus==0)
                                        {

                                            $_SESSION["id_SuperUsuario"] = $valores['id_Usuario'];
                                            header("location: ../administrador.php");

                                        }  
                                        else
                                        {
                                              $_SESSION["id_UsuarioBlock"] = $valores['id_Usuario'];
                                              unset($_SESSION["LogInFlag"]);
                                            header("location: ../usuarioBloq.php");

                                        }
                                        
                                        
                                        
			          	}
        
        }
        else
        {
            
              $_SESSION["LogInFail"] = true;
                                            
              
              header("location: ../login.php");
            
            
        }
	
        //echo("Registro de Usuario Exitoso");

        
        
        $mysqli->close();	
}

}
 
 catch(PDOException $e)
    {
    echo $mysqli . "<br>" . $e->getMessage();
    }  
    
    

     
     
     
     
     