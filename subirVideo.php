<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>YinYan</title>
	<link rel="stylesheet" type="text/css" href="Css/style.css">
        
        
            <?php
        $servername = "mysql.hostinger.mx";
$username = "u408187247_root";
$password = "Siul23";
$dbname = "u408187247_yin";

session_start();

?>
        
        
         <script>
       

    

        
        
function Subir() {


      
            
          
                    var Nombre=document.getElementById("nombre").value;
                    var video=document.getElementById("video").value;
                     var image=document.getElementById("image").value;
                   
        
        if(Nombre==""||Descripcion==""||video==""||image=="")
        {
            
        
         document.getElementById("errormessage").innerHTML = "Favor de ingresar todos los campos";
   
     
    }
    
    else
    {
        
            document.getElementById("FormVideo").submit();
        
        
    }
            
            
        



}





</script>

</head>

<body>
	<div class="containerL">
		<div class="block-left-special">
			<div class="buttonReturn">
				<a href="index.php" target="_self">Regresar</a>
			</div>
		</div>
		<!-- end: block-left -->
		<div class="block-center">
			<img src="Imagenes/logo/yinyanlogo.png" alt="yinyan" class="logo-special"></img>
		</div>
		<!-- end: block-center -->
	</div>
    
      <form action="Php/SubirVideoAction.php" name="uploadVideo" method="post" id="FormVideo" enctype="multipart/form-data">
    
            
          
          
	<div class="containerSubir">
            
		<div class="subir">
                    
                  
                    
			<div class="titleSubir">
                            
				<h1>SUBIR VIDEO</h1>
                                 <p id="errormessage" style="color: red;font-size: 130%; font-weight: bold; align-content: center;"></p>
			</div>
                       
                           
			<div class="selectionVideo">
                    <p>
                        <LABEL for="Respuesta">Seleccionar Video </LABEL>
                        <br>
                        <LABEL for="Respuesta" style="color: red">*Fortmato MP4*</LABEL>
                        <br>
                        <br>
                        <INPUT type="file" id="video" name="video" accept=".mp4">
                        <BR>
                          <br>
                          <LABEL for="Respuesta">Seleccionar Miniatura </LABEL>
                           <br>
                        <br>
                        <INPUT type="file" id="image" name="image" accept=".jpg,.png">
                    </p>
                </div>
		</div>
		<!-- end: Login -->	
	</div>
	<!-- end: containerLogin -->
		<div class="ContainerDaVideo">
			<div class="datosVideo">
                            
					<div class="SNameVideo">
					<P>
					<LABEL for="Nombre">Nombre Video: </LABEL>
					<INPUT type="text" id="nombre" name="nombre"/>
				</p>
					</div>
				
				<div class="SCategory">
                    <p>
                        <LABEL for="Category">Categoria: </LABEL>
                        <select id="Categoria" name="Categoria">
                            <?php
                                        $mysqli = new mysqli($servername, $username,$password, $dbname) or die('Error');
	  				$query = $mysqli -> query ("CALL Lista_Categoria");
			          	while ($valores = mysqli_fetch_array($query)) {				
			            	echo '<option name = "seccion" value = "'.$valores[id_Categoria].'">'.$valores[Nombre].'</option>';				
			          	}
					$mysqli->close();
			        ?>
                        </select>
                    </p>
                </div>
                <div class="SPermitions">
                    <p>
                        <LABEL for="Permiciones">Opciones de vista: </LABEL>
                        <select id="Permition" name="Permition">
                            <option value=1>Publico</option>
                            <option value=2>Restringido</option>
                        </select>
                    </p>
                </div>
                <div class="SDescripption">
                <p>
					<LABEL for="Descripcion">Descripción del video: </LABEL>
					<TEXTAREA rows="10" cols="30" name="Descripcion" id="Descripcion"></TEXTAREA>
				</p>
				</div>
                <div class="buttonSubir">
					<input type="button" value="Subir" onclick="Subir()">
				</div> 
			</div>	
                    			

		</div>
</form>
</body>

</html>