<?php
session_start();
include '../library/configServer.php';
include '../library/consulSQL.php';

sleep(5);
$nameAd= $_POST['name-admin'];
$consA=  ejecutarSQL::consultar("select * from administrador where Nombre='$nameAd'");
$totalA = mysql_num_rows($consA);

if($totalA>0){
    if(consultasSQL::DeleteSQL('administrador', "Nombre='".$nameAd."'")){
        echo '<br><p class="lead text-center">Administrador eliminado éxitosamente</p><script>
        setTimeout(function(){
        url ="configAdmin.php";
        $(location).attr("href",url);
        },2000);
    </script>';
    }else{
       echo '<br><p class="lead text-center">Ha ocurrido un error.<br>Por favor intente nuevamente</p>'; 
    }
}else{
    echo '<br><p class="lead text-center">El nombre del administrador no existe</p>';
}

