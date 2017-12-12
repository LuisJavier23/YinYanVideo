<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>YinYan</title>
	<link rel="stylesheet" type="text/css" href="../Css/style.css">

     <?php
$servername = "mysql.hostinger.mx";
$username = "u408187247_root";
$password = "Siul23";
$dbname = "u408187247_yin";

session_start();

?>


      <?php
            $mysqli = new mysqli($servername, $username,$password, $dbname) or die('Error');
            $videoId=$_POST['Video'];
            $_SESSION['EditVideoId']=$_POST['Video'];
            $sql = "CALL Video_Data( '".$videoId."');";
              $query=$mysqli->query($sql);
                  while ($valores = mysqli_fetch_array($query)) {       
                    $MinVid=$valores['Miniatura'];
                    $ETitulo=$valores['Titulo'];
                    

                     
                  }
          $mysqli->close();
              ?>

               <script>
        function hide() {
            var x = document.getElementById('contNav');
            if (x.style.display === 'block') {
                x.style.display = 'none';
            } else {
                x.style.display = 'block';
            }
           
            
            
            
            
            
        }
        
        function Ingresar() {


      
            
          
                    var Nombre=document.getElementById("nombre").value;
                    var Contra=document.getElementById("contra").value;
                    
        
        if(Nombre==""||Contra=="")
        {
                
        
         document.getElementById("errormessage").innerHTML = "Favor de ingresar usuario y Contraseñaa";
   
     
    }
    
    else
    {
           
            document.getElementById("login").submit();
        
        
    }
            
            
        



}

function Editar()
{

    
                    var Titulo=document.getElementById("nombre").value;

                    var image=document.getElementById("image").value;
                    
        
        if(Titulo!==""&&image!=="")
        {
                
        
          document.getElementById("FormVideo").submit();


		}

}

 function Busqueda() {


      
            
          
                    var Busqueda=document.getElementById("busqueda").value;
                    
        
        if(Busqueda!=="")
        {
                
        
          document.getElementById("searchBox").submit();
   
     
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
	<div class="containerSubir">
		<div class="subir">
			<div class="titleSubir">
				<h1><?php echo $ETitulo; ?></h1>
			</div>
			<div class="selectionVideo">
        <?php
				echo"<img class=\"vidIconEditar\" src=\"$MinVid\">";
        ?>
			</div>
		</div>
		<!-- end: Login -->
	</div>
	<!-- end: containerLogin -->
	<div class="ContainerDaVideo">
		<div class="datosVideo">
			<form action="Php/EditarVideoAction.php" name="uploadVideo" method="POST" id="FormVideo" enctype="multipart/form-data">
					<div class="selectionVideo">
                    <p>
                          <LABEL for="Respuesta">Seleccionar Miniatura </LABEL>
                           <br>
                        <br>
                        <INPUT type="file" id="image" name="image" accept=".jpg,.png">
                    </p>
                </div>
		</div>
				<div class="SNameVideo">
					<P>

						<LABEL for="Nombre">Nombre Video: </LABEL>
						<INPUT type="text" id="nombre" name="nombre" />
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
                    $Categoria=$valores['id_Categoria'];
                    $Nombre=$valores['Nombre'];

                    echo "<option name = \"seccion\" value = \"$Categoria\">$Nombre</option>";       
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
                            <option value="1">Publico</option>
                            <option value="2">Privado</option>
                        </select>
					</p>
				</div>
				<div class="SDescripption">
					<p>
						<LABEL for="Descripcion" >Descripción del video: </LABEL>
						<TEXTAREA rows="10" cols="30" name="Descripcion"> </TEXTAREA>
					</p>
				</div>
				<div class="buttonSubir">
					<input type="button" value="Guardar" onclick="Editar()">
				</div>
			</form>
		</div>
	</div>

</body>

</html>