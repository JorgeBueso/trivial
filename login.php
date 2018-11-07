    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">
    </head>
    </html>    
    
<?php
 session_start();//inicia la sesión del navegador en el servidor PHP o la continua.    
 
 include ('./funciones.php');

 $mysqli = conectaBBDD();
   
    function limpiaPalabra($palabra)
    {
      //filtro muy básico para evitar la inyecciÓn SQL
           $palabra = trim($palabra,"'");
           $palabra = trim($palabra,"-"); 
           $palabra = trim($palabra," ");
           $palabra = trim($palabra,"`");
           $palabra = trim($palabra,'"');
           return $palabra;
    }
    
   
    
    $nami = limpiaPalabra($_POST ['nami']);
    
    $password = limpiaPalabra($_POST ['password']);
    
    
    
    //echo 'Has puesto el usuario:' .$nami. ' y la contraseña :'.$password. ';
    
    $resultadoQuery = $mysqli ->query("SELECT * FROM usuarios WHERE nombreUsuario = '$nami' ");
   
    $numUsuarios = $resultadoQuery -> num_rows;
    
    
    if($numUsuarios > 0 )
    {
         $resultado = $resultadoQuery -> fetch_array();
      
       
        //almaceno mi primera variable de sesión, y en esta guardo el nombre de usuario
            $_SESSION['nombreUsuario'] = $nami;
        //en la variable de sesión idUsuario guardo el id del usuario
            $_SESSION['idUsuario'] = $resultado['idUsuario'];
        //muestro la pantalla de la aplicación 
        require 'app.php';
        }else
            {
                //muestro la pantalla de error,el usuario está mal
                require 'error.php';
            }
        
       
    
         
   

   