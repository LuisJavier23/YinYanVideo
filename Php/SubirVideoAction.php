<?php

$servername = "mysql.hostinger.mx";
$username = "u408187247_root";
$password = "Siul23";
$dbname = "u408187247_yin";

$target_dirVid = "../Server/Video/";

$target_dirImg = "../Server/Image/";

$real_dirVid = "Server/Video/";


$real_dirImg = "Server/Image/";

$mysqliAV = new mysqli($servername, $username, $password, $dbname) or die('Error');
session_start();
$uploadOk = 1;

if(!empty($_POST))
{

	$UserName= $_SESSION['id_Usuario'];
        $Titulo = mysqli_real_escape_string($mysqliAV,$_POST['nombre']);
	$Categoria = mysqli_real_escape_string($mysqliAV,$_POST['Categoria']);
	$Permition = mysqli_real_escape_string($mysqliAV,$_POST['Permition']);
	$Descripcion = mysqli_real_escape_string($mysqliAV,$_POST['Descripcion']);

       
        
        if(isset($_POST["submit"])) {
        $checkV = getimagesize($_FILES["video"]["tmp_name"]);
        $checkI = getimagesize($_FILES["image"]["tmp_name"]);
         if($checkV !== false || $checkI !== false) {
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}


$datVideo = basename($_FILES['video']['name']);
$restV = substr($datVideo, -4);	

$time= time();
$randVid=mt_rand();

$target_fileVid = $target_dirVid.$time.$randVid.$restV;
$real_fileVid = $real_dirVid.$time.$randVid.$restV;

$datImage = basename($_FILES['image']['name']);
$restI = substr($datImage, -4);	

$randImg=mt_rand();

$target_fileImg = $target_dirImg.$time.$randImg.$restI;
$real_fileImg = $real_dirImg.$time.$randImg.$restI;



if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    
    if (move_uploaded_file($_FILES["video"]["tmp_name"], $target_fileVid)&&move_uploaded_file($_FILES["image"]["tmp_name"], $target_fileImg)) {
        echo "The file ". basename( $_FILES["video"]["name"]). " has been uploaded.";
        echo "<BR>";
        echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
        
        
        $sqlAV = "CALL Video_Insertar( '".$UserName."', '".$Titulo."', '".$Descripcion."', '".$Permition."', '".$real_fileImg."', '".$real_fileVid."', '".$Categoria."');";

	
        
//echo($sql);

	$mysqliAV->query($sqlAV);

        $_SESSION['FlagVideoSubido']=true;
        
        $mysqliAV->close();   

	header("location: ../index.php");
        
        
        
        
        
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
    
}

	
}

else{
	//$error = "Esta mal chavo :C";
    echo("Info equivocada");
    header("../subirVideo.php");
	}

	
