<?php
$servername = "mysql.hostinger.mx";
$username = "u408187247_root";
$password = "Siul23";
$dbname = "u408187247_yin";

    


                     
try {         
$target_dirVid = "../Server/Video/";

$target_dirImg = "../Server/Image/";

$real_dirVid = "Server/Video/";


$real_dirImg = "Server/Image/";

$mysqli = new mysqli($servername, $username, $password, $dbname) or die('Error');
session_start();
$uploadOk = 1;

if(!empty($_POST))
{

  $videoId= $_SESSION['EditVideoId'];
  $idCurrentUser = $_SESSION['id_Usuario'];
  $Titulo = mysqli_real_escape_string($mysqli,$_POST['nombre']);
  $Categoria = mysqli_real_escape_string($mysqli,$_POST['Categoria']);
  $Permition = mysqli_real_escape_string($mysqli,$_POST['Permition']);
  $Descripcion = mysqli_real_escape_string($mysqli,$_POST['Descripcion']);

       
        
        if(isset($_POST["submit"])) {
        $checkI = getimagesize($_FILES["image"]["tmp_name"]);
         if($checkI !== false) {
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}


$datImage = basename($_FILES['image']['name']);


$time= time();

$restI = substr($datImage, -4); 

$randImg=mt_rand();

$target_fileImg = $target_dirImg.$time.$randImg.$restI;
$real_fileImg = $real_dirImg.$time.$randImg.$restI;



if ($uploadOk == 0) { 
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_fileImg)) {
        echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
        
        
        $sql = "CALL Update_Video_Datos( '".$videoId."', '".$Titulo."', '".$Descripcion."', '".$Categoria."', '".$Permition."', '".$real_fileImg."');";

  
        
//echo($sql);
  $result=$mysqli->query($sql);

     
        
	header("location: ../perfil.php?Usuario=$idCurrentUser");
        //echo("Registro de Usuario Exitoso");

        
        
        $mysqli->close();	
}

}
}
}
 
 catch(PDOException $e)
    {
    echo $mysqli . "<br>" . $e->getMessage();
    }  
    
    

     
     
     