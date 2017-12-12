<?php
          
$servername = "mysql.hostinger.mx";
$username = "u408187247_root";  
$password = "Siul23";
$dbname = "u408187247_yin";

session_start();

if(!empty($_POST))
{

$mysqli = new mysqli($servername, $username, $password, $dbname) or die('Error');

$TipoBloqueo=mysqli_real_escape_string($mysqli,$_POST['TipoBloqueo']);
$idReporte=mysqli_real_escape_string($mysqli,$_POST['idReporte']);
$mensajeBloqueo=mysqli_real_escape_string($mysqli,$_POST['mensajeBloqueo']);
$fecha_b=mysqli_real_escape_string($mysqli,$_POST['fecha_b']);
$razonbloqueo=mysqli_real_escape_string($mysqli,$_POST['razonbloqueo']);
$idAdmin=$_SESSION["id_SuperUsuario"];
$fecha_I=date("Y-m-d H:i:s");


		$sql = "CALL Action_Reporte( '".$TipoBloqueo."', '".$idReporte."', '".$idAdmin."', '".$mensajeBloqueo."', '".$fecha_b."','".$fecha_I."',  '".$razonbloqueo."');";

		$result=$mysqli->query($sql);

		    $mysqli->close();	


		    header("location: ../administrador.php");

}


?>