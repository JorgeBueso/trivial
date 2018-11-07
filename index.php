<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
     
        <!--para móviles y para que pueda hacer zoom-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=yes">
        <title>trivial evau2018</title>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/fontawesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/regular.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/solid.min.css" rel="stylesheet" type="text/css"/>
    </head>
    
    <body style="background-color: #6441a5; color: #686868;">
        
        <div class="container" id ="principal" style="color: white">
            <div class="row">
             
                <!--col-12=NUMCOLUMNAS-->
             
                <!--<div class="col-12">--> 
                 
                <div class="col-4" style="">
                       <img src="nbproject/trivial.jpg" height="100" width="100" border="2">
                </div>
                                   
                   <div class="col-4"> 
                   
                        <h2 class="text-center" style="background-color: #392e5c" >TRIVIAL EVAU 2018</h2>   
                        
                   </div>  
                     
                     <div class="col-4"></div>
                                       
                 
<!--                 <div class="col-1">
                    <span class="fas fa-poo fa-2x" onclick="registra();"></span>
                 </div>-->
                   
                        
                </div>   
                
            </div>
            <div class="row">
                <div class="col-4">
                    
                </div>
                <div class="col-4">
                    <br><br>
                   
                    <input id="nami" class="form-control" style="background-color: #FFE4CO" type="text" placeholder="USUARIO" required="required">
                        <br>
                        <input id="password" class="form-control" type="password" placeholder="<?php echo $bbdd;?>">
                        <br>
                        <button  id="boku1" class="btn btn-primary btn-block" type="submit">Iniciar Sesión</button>
                        <br>
                    
                </div>
                
                <div class="col-4"></div>                    
               
            </div>
            
        </div> 
        
     
        
    </body>
     <script src="js/jquery-3.3.1.min.js" type="text/javascript"></script>
     <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
    
    <script>
         //document ready se ejecuta cuando toda la página se ha cargado correctamente 
        $(document).ready(function()
        {
         //   $('#nami').hide();
        });
        
         $.validate({
                lang: 'es'
              
              });
       //esto es lo que hace el boton entrar 
        $('#boku1').click(function()
        {
            //leo el contenido de las cajas de nombre y de contraseña
            var _nami = $('#nami').val();
            var _password = $('#password').val();
      
            $("#principal").load("login.php",
            {
                
                nami :_nami,
                password : _password
      
            });
        });
 /*       
    function registra(){
            $('#principal').load("registra.php");            
        }*/
    </script>
        
    
</html>
