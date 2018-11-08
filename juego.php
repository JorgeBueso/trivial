<?php

//capturo los valores de los parámetros que me han sido pasados desde app.php
include('funciones.php');
$vidas = $_POST ['vidas'];
$correctas = $_POST ['correctas'];
$tema = $_POST ['tema'];


$mysqli = conectaBBDD();

    $resultadoQuery = $mysqli ->query("SELECT * FROM preguntas WHERE tema = '$tema'");
   
    $numPreguntas = $resultadoQuery -> num_rows;

//declaro un array en php para guardar el resultado en la query  
    $listaPreguntas = array();
    
 //carga todas las filas de la query en el array
    for($i = 0; $i < $numPreguntas ; $i++)
    {
        $r= $resultadoQuery -> fetch_array();//leo una fila del resultado de la query
        $listaPreguntas[$i] [0] = $r['numero'];
        $listaPreguntas[$i] [1] = $r['enunciado'];
        $listaPreguntas[$i] [2] = $r['r1'];
        $listaPreguntas[$i] [3] = $r['r2'];
        $listaPreguntas[$i] [4] = $r['r3'];
        $listaPreguntas[$i] [5] = $r['r4'];
        $listaPreguntas[$i] [6] = $r['correcta'];
        
        $preguntaActual= rand(0,$numPreguntas-1);
        
    }
    
?>

<div>

    <p></p>
    <p><a class="btn btn-block btn-dark disabled">Demuestra que estás listo para la EVAU</a></p>
    <p><a class="btn btn-block btn-warning"  onclick="volver();"><!--<span class="fas fa-arrow-left" ></span>-->ELEGIR OTRA ASIGNATURA</a></p>

    
    <p><a id="sigue1" class="btn btn-block btn-primary"><?php echo $tema; ?></a></p>
    
    <!--TEMPORIZADOR-->
    <div id="cajatiempo" style="height: 30px;" >
            <div id="tiempo" class="progress-bar p bg-success" style="width: 0%;"></div>
        </div>
    
            <p><a id="enunciado" class="btn btn-block btn-dark"></a></p>
            
            <p><a id="r1" class="btn btn-block btn-success"></a></p>
            <p><a id="r2" class="btn btn-block btn-success"></a></p>
            <p><a id="r3" class="btn btn-block btn-success"></a></p>
            <p><a id="r4" class="btn btn-block btn-success"></a></p>
</div>


<script>
    function volver()
    {
       $('#principal').load('app.php'); 
    }
    //para el temporizador
    var progreso;
    var segundo = 0;
    iniciaTemporizador();
    
    
    
     //cargo el array php de preguntas en una variable javascripst
    var listaPreguntas = <?php echo json_encode($listaPreguntas);?>
    
    //calculo un numero aleatorio
    var numeroPregunta = Math.floor( Math.random() * listaPreguntas.length);
    //dibujo los textos en los botones correspondientes
  
    sigue();
    
    function sigue()
    {
   //   $("[id*='r']").removeClass("btn-dark").removeClass("btn-secondary").removeClass("btn-danger").addClass("btn-success");
   //   iniciaTemporizador();
      
      numeroPregunta = Math.floor( Math.random() * listaPreguntas.length);
     $('#enunciado').text(listaPreguntas[numeroPregunta][1]);
     //para 
   //  $("[id*='r']").prop("onclick", null).off("click");
     $('#r1').text(listaPreguntas[numeroPregunta][2]).click(function (){sigue();});
     $('#r2').text(listaPreguntas[numeroPregunta][3]).click(function (){sigue();});
     $('#r3').text(listaPreguntas[numeroPregunta][4]).click(function (){sigue();});
     $('#r4').text(listaPreguntas[numeroPregunta][5]).click(function (){sigue();});
    }
    //las funciones para que funcione el tiempo
    function detieneTemporizador()
{
    clearInterval(progreso);
}

function iniciaTemporizador()
{
    //temporizador de la barra
    segundo = 0;
    $("#tiempo").width(0).text("");
    clearInterval(progreso);
    progreso = setInterval(function()
    {
        var caja = $("#cajatiempo");
        var tiempo = $("#tiempo");
        if (tiempo.width() >= caja.width())
        {
            clearInterval(progreso);
            segundo = 0;
        }
        else
        {
            tiempo.width(tiempo.width() + caja.width()/10);
            segundo++;
        }
        //cambia el color de la barra del tiempo dependiendo del segundo en el que está
        if (segundo < 5)
        {
            tiempo.removeClass("bg-warning").removeClass("bg-danger").addClass("bg-success");
        }
        else if (segundo < 8)
        {
            tiempo.removeClass("bg-success").addClass("bg-warning");
        }
        else 
        {
            tiempo.removeClass("bg-warning").addClass("bg-danger");
        }
        tiempo.text(segundo);
    }, 1080);
    
} 
</script>