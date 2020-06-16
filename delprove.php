<?php
session_start();
include '../library/configServer.php';
include '../library/consulSQL.php';

sleep(5);
$nitProve= $_POST['nit-prove'];
$cons=  ejecutarSQL::consultar("select * from proveedor where NITProveedor='$nitProve'");
$totalprove = mysql_num_rows($cons);

if($totalprove>0){
    if(consultasSQL::DeleteSQL('proveedor', "NITProveedor='".$nitProve."'")){
        echo '<br><p class="lead text-center">Proveedor eliminado éxitosamente</p>';
    }else{
       echo '<br><p class="lead text-center">Ha ocurrido un error.<br>Por favor intente nuevamente</p><script>
        setTimeout(function(){
        url ="configAdmin.php";
        $(location).attr("href",url);
        },2000);
    </script>'; 
    }
}else{
    echo '<br><p class="lead text-center">El código de proveedor no existe</p>';
}