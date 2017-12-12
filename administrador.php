<!DOCTYPE html>
<html lang="en">

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

<script type="text/javascript">
    
  function Ignorar(idReporte) {


      
            
          
                   document.getElementById("TipoBloqueo"+idReporte).value=1
                    
          
        
          document.getElementById("formReporte"+idReporte).submit();
   
     
    
    
        
            
        



}  


 function Temporal(idReporte) {


      
            
          
                  

                   var Detalles = document.getElementById("formRazBloq"+idReporte).value

                   var FechaB = document.getElementById("fecha_b"+idReporte).value
                    
          if(Detalles!==""&&FechaB!=="")
          {

         document.getElementById("TipoBloqueo"+idReporte).value=2

          document.getElementById("formReporte"+idReporte).submit();
   
     
    }
    
        
            
        



}  


 function Permanente(idReporte) {


      
            
          
                   document.getElementById("TipoBloqueo"+idReporte).value=3
                    
          
        
          document.getElementById("formReporte"+idReporte).submit();
   
     
    
    
        
            
        



} 



</script>


</head>

<body>
    <div class="container">
        <div class="containerH">
            <header>
                <div class="containerL">
                    <div class="block-left">
                        <a href="index.php">
                            <img src="Imagenes/logo/yinyanlogo2.png" alt="yinyan" class="logo"></img>
                        </a>
                      
                <!-- end: containerN -->
            </header>
        </div>
        <!--end:containerH-->
        <div class="containerB">
             <div class="adminSec">
                <h2>Administracion de Reportes </h2>
                <input type="button" id="btnListaBloqueo" value="Lista Usuarios Bloqueados" onclick="location.href='listaUsuBloq.php'">
                 <h3>Videos Reportados</h3>
            <?php

   $mysqli = new mysqli($servername, $username,$password, $dbname) or die('Error');
                    
                    
                    
                    $query = $mysqli -> query ("CALL Lista_Reportes()");
            
                    

                if(mysqli_num_rows($query)!==0 )
                    { 

                        while ($valores = mysqli_fetch_array($query)) {   
            
                   $Foto_Perfil = base64_encode($valores['Foto_Perfil']);     
                               $id_Reporte = $valores['id_Reporte']; 
                               $id_Usuario= $valores['id_Usuario']; 
                                $Nombre= $valores['Nombre']; 
                                $Contenido= $valores['Contenido']; 
                               $Titulo= $valores['Titulo']; 
                               $Descripcion= $valores['Descripcion'];
                                $Fecha_Subida= $valores['Fecha_Subida']; 
                                 $id_Video= $valores['id_Video']; 
                               $id_Motivos_Baneo= $valores['id_Motivos_Baneo'];
                                $Estatus= $valores['Estatus']; 
                                $Fecha_Reporte= $valores['Fecha_Reporte']; 
                                  
                    
             
         echo "  
                <div class=\"adminVideo\">   
                    <div class=\"videoBloq\">
                       
                        <div class=\"videoBloqTxt\">
                            <div class=\"nomVidBloq\">
                                <h3>$Titulo</h3>
                                 <video width=\"420\" height=\"300\" controls>
                                 <source src=\"$Contenido\" type=\"video/mp4\">
                                 </video>
                            </div>
                            <div class=\"fecVidBloq\">
                                <div class=\"fecVidBloqStatic\">
                                    <h4>Subido el</h4>
                                </div>
                                <div class=\"fecVidBloqEdit\">
                                    <h4>$Fecha_Subida</h4>
                                </div>
                            </div>
                             <div class=\"fecVidBloq\">
                                <div class=\"fecVidBloqStatic\">
                                    <h4>Reportado el</h4>
                                </div>
                                <div class=\"fecVidBloqEdit\">
                                    <h4>$Fecha_Reporte</h4>
                                </div>
                            </div>
                            <div class=\"descVidBloq\">
                                <h4>$Descripcion</h4>
                            </div>
                            
                            <div class=\"descVidBloq\">
                                <h4>$Nombre</h4>
                               <img src=\"data:image/jpeg;base64,$Foto_Perfil\" id=\"iconPerfBloq2\">
                            </div>

                        </div>
                        <!--end:vidBloqTxt-->
                        <form action=\"Php/AplicarReporte.php\" id=\"formReporte$id_Reporte\" method=\"POST\" class=\"ReportForms\">
                            <div class=\"vidRazonBloq\">
                                <LABEL for=\"razonBloq\">Razon de Bloqueo: </LABEL>
                                <select id=\"razonB\" name=\"razonbloqueo\" >";
                        $mysqliL = new mysqli($servername, $username,$password, $dbname) or die('Error');
                    $queryL = $mysqliL -> query ("CALL Lista_Motivos_baneo");
                        while ($valores = mysqli_fetch_array($queryL)) {     
                            if($valores['id_Motivos_Baneo']==$id_Motivos_Baneo)
                              {echo '<option name = "seccion" value = "'.$valores['id_Motivos_Baneo'].'" selected>'.$valores['Motivo'].'</option>';}   
                              else
                              {echo '<option name = "seccion" value = "'.$valores['id_Motivos_Baneo'].'">'.$valores['Motivo'].'</option>';}     
                                         
                        }
                    
                                echo"</select>
                            </div>
                              <div class=\"vidRazonBloq\">
                                <LABEL for=\"razonBloq\">Fecha limite del bloqueo temporal </LABEL>
                                <INPUT type=\"date\" id=\"fecha_b$id_Reporte\" name=\"fecha_b\">
                            </div>
                            <div class=\"mensBloq\">
                                <LABEL for=\"razonBloq\">Detalles del Bloqueo: </LABEL>
                                <textarea name=\"mensajeBloqueo\" id=\"formRazBloq$id_Reporte\" cols=\"30\" rows=\"5\"></textarea>
                            </div>
                            <input type=\"button\" id=\"btnBloq\" value=\"Dar por revisado\" onclick=\"Ignorar($id_Reporte)\">
                                  <input type=\"button\" id=\"btnNoBloq\" value=\"Bloqueo temporal\" onclick=\"Temporal($id_Reporte)\">
                            <input type=\"button\" id=\"btnNoBloq\" value=\"Bloqueo Permanente\" onclick=\"Permanente($id_Reporte)\">
                             <input type=\"hidden\" name=\"TipoBloqueo\" id=\"TipoBloqueo$id_Reporte\" value=\"\" >
                              <input type=\"hidden\" name=\"idReporte\" id=\"id_Reporte\" value=\"$id_Reporte\">
                             
                        </form>
                
                    </div>";
            }

            }
            else
            {
                echo"<h3>No se a encontrado ningun reporte que validar</h3>";
            }

            $mysqli->close();  
              
                ?>
                </div>
            </div>
            <!--end:adminSec-->
        </div>
        <!--end:containerB-->
    </div>
    <!--end:container-->
</body>

</html>