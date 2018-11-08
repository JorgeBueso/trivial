<div id="menu" style="color: white">
    <p><a onclick="muestraModal();" class= "btn btn-block btn-dark " >TRIVIAL EVAU/SELECTIVIDAD </a></p>
    <p><a class="btn btn-block btn-dark disabled">ELIGE UNA ASIGNATURA</a></p>
    <p><a class="btn btn-block btn-outline-success disabled" >NombreUsuario:<?php echo $_SESSION['nombreUsuario'] = $nami; ?></a></p>
    <p><a></a></p>

    
    <p><a id="sigue1" class="btn btn-block btn-primary" onclick="sigue('1')">HISTORIA</a></p>
    <p><a id="sigue2" class="btn btn-block btn-secondary" onclick="sigue('2')">ECONOMÍA</a></p>
    <p><a id="sigue3" class="btn btn-block btn-danger" onclick="sigue('3')">FILOSOFÍA</a></p>
    <p><a id="sigue4" class="btn btn-block btn-success" onclick="sigue('4')">LENGUA Y LITERATURA</a></p>
    <p><a id="sigue5" class="btn btn-block btn-info" onclick="sigue('5')">INGLÉS</a></p>
</div>
<script> 
      $(document).ready(function()
        {
            $('#nami').hide();
            $('#password').hide();
            $('#boku1').hide();
        });
        
 var _vidas=3;
    function sigue(_tema)
    {
        switch (_tema)
        {
            case'1':
                $("#menu").load("juego.php", {vidas: _vidas, correctas: 0, tema: "Historia"});
                break;
            case'2':
                $("#menu").load("juego.php", {vidas: _vidas, correctas: 0, tema: "Economia"});
                break;
            case'3':
                $("#menu").load("juego.php", {vidas: _vidas ,correctas: 0, tema: "Filosofia"});
                break;
            case'4':
                $("#menu").load("juego.php", {vidas: _vidas, correctas: 0, tema: "Lengua"});
                break;
            case'5':
                $("#menu").load("juego.php", {vidas: 3, correctas: 0, tema: "Ingles"});
                break;
        }
    }
    
    function muestraModal()
    {
        $('#modalPrueba').modal('show');    
    }
</script>
    <?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

