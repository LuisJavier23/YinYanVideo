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
            function Ingresar() {


      
            
          
                    var Nombre=document.getElementById("nombre").value;
                    var Contra=document.getElementById("contra").value;
                    
        
        if(Nombre==""||Contra=="")
        {
            
        
         document.getElementById("errormessage").innerHTML = "Favor de ingresar usuario y contraseña";
   
     
    }
    
    else
    {
           
            document.getElementById("login").submit();
        
        
    }

   
            
            
        



}
            
            
      function Busqueda() {


      
            
          
                    var Busqueda=document.getElementById("busqueda").value;
                    
        
        if(Busqueda!=="")
        {
                
        
          document.getElementById("searchBox").submit();
   
     
    }
    
        
            
        



}  





 function Comentar() {


      
            
          
                    var txtC=document.getElementById("txtC").value;
                  
        
        if(txtC=="Tu comentario aqui")
        {
            
        
         document.getElementById("txtC").innerHTML = "HAHAHA....No enserio escribe algo";
   
     
    } else if(txtC=="HAHAHA....No enserio escribe algo")
    {

         document.getElementById("txtC").innerHTML = "Enserio?, no es tan gracioso, ni siquiera era muy gracioso para empezar...va ya no digo nada escribe tu comentario, Do it";

    }
    else if(txtC=="Enserio?, no es tan gracioso, ni siquiera era muy gracioso para empezar...va ya no digo nada escribe tu comentario, Do it")
    {
        
            
             document.getElementById("txtC").innerHTML = "";
        
        
    }
      else if(txtC=="")
    {
        
            
              document.getElementById("txtC").innerHTML = "";
        
        
    }
    else if(txtC!=="")
    {

      document.getElementById("formComentario").submit();
    }

  }

  function hide() {
            var x = document.getElementById('contNav');
            if (x.style.display === 'block') {
                x.style.display = 'none';
            } else {
                x.style.display = 'block';
            }
           
            
            
            
            
            
        }

</script>

     <?php

                  $mysqli = new mysqli($servername, $username,$password, $dbname) or die('Error');
                    
                    $VideoId=$_GET["Video"];
                    
                    $_SESSION['CurrentVideoId']=$VideoId;
                    
                    $query = $mysqli -> query ("CALL Video_Data('".$VideoId."')");
			
                    

                if(mysqli_num_rows($query)!==0 )
                    { while ($valores = mysqli_fetch_array($query)) {	
            
			       $VUserPP = base64_encode($valores['Foto_perfil']);     
                               $VUserName = $valores['Nombre']; 
                               $VUserId= $valores['id_Usuario']; 
                                $VContenido= $valores['Contenido']; 
                                $VTitulo= $valores['Titulo']; 
                               $VDescripcion= $valores['Descripcion']; 
                               $VEstatus= $valores['Estatus'];
                                $VViews= $valores['Views']; 
                                  }
                    }
            $mysqli->close();   
            
            if(isset($_SESSION['ActionTaken']))
            {
             
                     unset($_SESSION['ActionTaken']);
            }
            else
            {
                $mysqliUp = new mysqli($servername, $username,$password, $dbname) or die('Error');
                        
                    $query2 = $mysqliUp -> query ("CALL Update_Video_Add_Views('".$VideoId."')");
                    
                    $mysqliUp->close();
                
            }
            
            
            
            $mysqliChekLike = new mysqli($servername, $username,$password, $dbname) or die('Error');

                    if(isset($_SESSION['LogInFlag']))
                    {

                      $UserId=$_SESSION['id_Usuario'];

                    
            

                    $queryChkLike = $mysqliChekLike -> query ("CALL Check_Usuerio_Like_Video('".$UserId."','".$VideoId."')");
            
              if(mysqli_num_rows($queryChkLike)!==0 )
              {
                  
                  $LikeFlag=true;
              }else{$LikeFlag=false;}
              
              $mysqliChekLike->close();
                /*------------------*/
              
               $mysqliChekFav = new mysqli($servername, $username,$password, $dbname) or die('Error');
                    
            
                    $queryChkFav = $mysqliChekFav -> query ("CALL Check_Usuario_Fav_Video('".$UserId."','".$VideoId."')");
            
              if(mysqli_num_rows($queryChkFav)!==0 )
              {
                  
                  $FavFlag=true;
              }else{$FavFlag=false;}
              
              $mysqliChekFav->close();

            }
              
              /*-----------------*/
                $mysqliCountLike = new mysqli($servername, $username,$password, $dbname) or die('Error');
                    
        

                    $queryCountLike = $mysqliCountLike -> query ("CALL Count_Likes_Video('".$VideoId."')");
            
             while ($valores = mysqli_fetch_array($queryCountLike)) {	
            
			    
                                $VNoLikes= $valores['NoDeLikes']; 
                                  }
              
              $mysqliCountLike ->close();
            
              
                /*-----------------*/
                $mysqliCountFav = new mysqli($servername, $username,$password, $dbname) or die('Error');
                    
        

                    $queryCountFav = $mysqliCountFav -> query ("CALL Count_Favoritos_Video('".$VideoId."')");
            
             while ($valores = mysqli_fetch_array($queryCountFav)) {	
            
			    
                                $VNoFavs=$valores['NoDeFavs']; 
                                  }
              
              $mysqliCountFav ->close();
            /*-----------------------------*/


            
              
              
            ?>
</head>

<body>
    <div class="container">
       <div class="containerH">
            <header>
                <div class="containerL">
                    <div class="block-left">
                        <button id="btnNav" onclick="hide()">Menu&#769;</button>
                        <a href="index.php" target"_self">
                            <img src="Imagenes/logo/yinyanlogo2.png" alt="yinyan" class="logo"></img>
                        </a>
                        <div class="search">
                             <form action="busqueda.php" name="searchBox" method="GET" id="searchBox">
                                <input type="text" size="60" name="busqueda" id="busqueda">
                                <input type="button" onclick="Busqueda()" value="Buscar">
                            </form>
                            </form>
                        </div>
                    </div>
                    <!-- end: block-left -->
                    <div class="block-right">
                        <?php
                        if(isset($_SESSION['LogInFlag']))
                        {
                            
                           $UserName= $_SESSION['Nombre_Usuario'];

                           $idUser= $_SESSION['id_Usuario'];
                           
                      $FotoPerfil= base64_encode($_SESSION['Foto_perfil_Usuario']);
                            
                          
                         echo "<div class=\"box_right\">";                      
                         echo "<label class =\"username_text\">Bienvenido $UserName</label>";
                          echo "<img src=\"data:image/jpeg;base64,$FotoPerfil\" class=\"Foto_Perfil\">";
                         echo " </div>";
                            
                            
                        }
                     else
                     {
                           echo "<div class=\"login\">
                            <form action=\"Php/LoginAction.php\" name=\"login\" id=\"login\" method=\"POST\">
                                  Usuario: <input type=\"text\" name=\"nombre\" id=\"nombre\"> Contraseña: <input type=\"password\" name=\"contra\" id=\"contra\">
                                  <input type=\"hidden\" name=\"Sender\" id=\"Sender\" value =\"index\">
                                <input type=\"button\" value=\"Entrar\" onclick=\"Ingresar()\">
                            </form>
                        </div>
                        
                        <div class=\"register\">
                            <a href=\"register.php\" target=\"_self\">Registrate</a>
                        </div>";
                            
                         
                         
                     }
                        
                        ?>
                      

                    </div>
                    <!-- end: block-right -->
                </div>
                <!-- end: containerL -->
                <div class="containerN">
                    <div id="contNav">
                        <nav class="menu">
                             <?php
                        if(isset($_SESSION['LogInFlag']))
                        {
                            echo "<input type=\"button\" onclick=\"location.href='index.php'\" id=\"Home\" name=\"Home\" value=\"Home\" > 
                            <input type=\"button\" onclick=\"location.href='subirVideo.php'\" id=\"Subir\" name=\"Subir\" value=\"Subir\" >
                            <input type=\"button\" onclick=\"location.href='perfil.php?Usuario=".$_SESSION["id_Usuario"]."'\" id=\"MiPerfil\" name=\"MiPerfil\" value=\"Mi Perfil\" >
                            <form action=\"Php/Logout.php\" name=\"Logout\" method=\"POST\" id=\"Logout\" style= \"display: inline\">  
                                  <input type=\"submit\" id=\"logout\" name=\"logout\" value=\"Log out\">";
                     
                            
                        }
                        else
                        {
                            
                            echo" <input type=\"button\" onclick=\"location.href='index.php'\" id=\"Home\" name=\"Home\" value=\"Home\" >
                                    <input type=\"button\" onclick=\"location.href='login.php'\" id=\"login\" name=\"login\" value=\"Ingresar\" >";
                            
                                           
                            
                            
                            
                            
                        }
                            ?>
                               </form>
                            
                        </nav>
                    </div>
                </div>
                <!-- end: containerN -->
            </header>
        </div>
        <!-- end: containerH -->
        <div class="containerVideo">
            <div class="containerV">
                <?php echo "<h2>$VTitulo</h2><br>"; ?>
                  <p id="errormessage" style="color: red;font-size: 130%; font-weight: bold;">
                    <?php 
                         if (isset($_SESSION['ReportFlag'])) 
                              {
                                  echo "Video Reportado Correctamente";
                                  unset($_SESSION['ReportFlag']);
                                  
                                }

                ?></p>
            <video width="854" height="480" controls>
                   <?php echo"<source src=\"$VContenido\" type=\"video/mp4\">"?>
                Your browser does not support the video tag.
                            </video>
                <br>
                <br>
                <br>
                <br>
                <div class="containerVLD">     
            <?php
                   echo "
                           <a href=\"perfil.php?Usuario=".$VUserId."\">
                            <img class=\"subIconsPerf\" src=\"data:image/jpeg;base64,$VUserPP\">
                                </a>
                        <div class=\"nombreSubPerf\">$VUserName</div>";
            ?>
                    <div class="containerViews">    
                       <?php echo"<h4>Views: $VViews</h4>"; ?>
                       <?php echo"<h4>Likes: $VNoLikes</h4>";?>
                        <?php echo"<h4>Favoritos: $VNoFavs</h4>";?>
                    </div>  
                    <div class="containerLikes">
                        <?php
                        if(isset($_SESSION['LogInFlag']))
                        {
                        if($LikeFlag==false){
                        echo "<form action=\"Php/VideoLike.php\" name=\"Likes\" method=\"POST\">
                            <input type=\"submit\" value=\"Me gusta\">";
                        }else if($LikeFlag==true)
                            {
                           echo "<form action=\"Php/VideoDisLike.php\" name=\"DisLikes\" method=\"POST\">
                            <input type=\"submit\" value=\"No me gusta\">";
                            }
                          }else
                          {

                            echo"<form name=\"fake\">";
                               echo"<input type=\"button\" onclick=\"location.href='login.php'\" value=\"Me gusta\">";
                          }
                                ?>
                        </form>
                    </div>
                      <div class="containerFavorito">
                          <?php
                           if(isset($_SESSION['LogInFlag']))
                        {
                        if($FavFlag==false){
                        echo "<form action=\"Php/VideoFavorito.php\" name=\"Favorito\" method=\"POST\">
                            <input type=\"submit\" value=\"Favorito\">";
                        }else if($FavFlag==true)
                            {
                           echo "<form action=\"Php/VideoDisFavorito.php\" name=\"DesFavorito\" method=\"POST\">
                            <input type=\"submit\" value=\"Quitar Favorito\">";
                            }
                          }else
                          {
                              echo"<form name=\"fake\">";
                           
                              echo"<input type=\"button\" onclick=\"location.href='login.php'\" value=\"Favorito\">";
                           
                          }
                                ?>
                        </form>
                    </div>
                    <div class="containerReportar">
                      <?php
                        if(isset($_SESSION['LogInFlag']))
                        {
                        echo"<form action=\"reportevideo.php\" name=\"Reportar\" method=\"POST\">
                            <input type=\"submit\" value=\"Reportar\">
                         </form>";
                          }else
                          {

                            echo"<input type=\"button\" onclick=\"location.href='login.php'\" value=\"Reportar\">";
                          }
                        ?>
                    </div>
                </div>
                <div class="descriptionVideo">
                   <?php echo"<h3>$VDescripcion</h3>" ?>
                </div>
            </div>
            <div class="otherVideos">
                <section id="favUsu">
                      <?php
                    echo"<h2>Mas de $VUserName</h2>";
                       
   $mysqliVidReco = new mysqli($servername, $username,$password, $dbname) or die('Error');
                    
        

                    $queryRecV = $mysqliVidReco -> query ("CALL Videos_Recomendados_Usuario('".$VUserId."','".$VideoId."')");
             if(mysqli_num_rows($queryRecV)!==0 ){
             while ($valores = mysqli_fetch_array($queryRecV)) {  
            
          
                                $RTitulo=$valores['Titulo']; 
                                $RMini=$valores['Miniatura']; 
                                $Rid_vid=$valores['id_Video']; 


 echo"
                    <div class=\"favPerf\">
                    <a href=\"video.php?Video=".$Rid_vid."\">
                        <img class=\"favIconsPerf\"  src=\"$RMini\">
                        </a>
                        <div class=\"nombreFavPerf\">$RTitulo</div>
                    </div>
                   
                    </div>
                    ";






                                  }
                                }else
                                { 

                                      echo "<br><h3>Por el momento, no se encontraron mas videos de este usuario</h3><br>";

                                }
              
              $mysqliVidReco ->close();

               
                ?>
                   
                </section>
                <br>
            </div>
        </div>
        <!-- end: containerVideo -->
        <div class="containerComentarios">
            <div class="containerTitleComments">
                <h2>Comentarios</h2>
            </div>
            <div class="perfComentario">
              <?php
   $mysqliComentSee = new mysqli($servername, $username,$password, $dbname) or die('Error');
                    
        

                    $queryComent = $mysqliComentSee -> query ("CALL Ver_Comentario_Video('".$VideoId."')");
             if(mysqli_num_rows($queryComent)!==0 ){
             while ($valores = mysqli_fetch_array($queryComent)) {  
            
          
                                $CUserName=$valores['Nombre']; 
                                $CPhoto=base64_encode($valores['Foto_Perfil']); 
                                $CFecha=$valores['Fecha_Comentario']; 
                                $CComentario=$valores['Comentario']; 


 echo"
                    <div class=\"perfBusq\">
                    <img id=\"avaBusq\" img src=\"data:image/jpeg;base64,$CPhoto\">
                    <div class=\"perfBusqTxt\">
                      <h2>$CUserName</h2>
                           <h3>$CFecha</h3>
                        <h2>$CComentario</h2>
                    </div>
                </div>
                <br>";






                                  }
                                }else
                                {

                                   echo "<br><h3>No se encontraron comentarios, Se el primero!!</h3><br>";

                                }
              
              $mysqliComentSee ->close();

               
                ?>
                </div>
                <div class="agregarComent"> 
                    <h2>Agrega tu comentario:</h2>
                    <form action="Php/InsertarComentario.php" id="formComentario" method="POST">
                      <textarea name="textComent" id="txtC" form="formComentario" cols="70" rows="10">Tu comentario aqui</textarea>
                      <?php
                       if(isset($_SESSION['LogInFlag']))
                        {
                        echo"<input type=\"button\" value=\"Publicar\" onclick=\"Comentar()\" id=\"btnComentario\">";
                      }else
                      {

                        echo"<input type=\"button\" onclick=\"location.href='login.php'\" id=\"btnComentario\" name=\"FakePublicar\" value=\"Publicar\">";

                      }



                        ?>
                    </form>
                </div>
            </div>
            <!--end: perfComentario-->
        </div>
        <!-- end:containerComentarios-->
    </div>
    <!--end:container-->
</body>

</html>