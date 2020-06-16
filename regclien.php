<?php
include '../library/configServer.php';
include '../library/consulSQL.php';

sleep(3);
$nitCliente= $_POST['clien-nit'];
$nameCliente= $_POST['clien-name'];
$fullnameCliente= $_POST['clien-fullname'];
$apeCliente= $_POST['clien-lastname'];
$passCliente= md5($_POST['clien-pass']);
$dirCliente= $_POST['clien-dir'];
$phoneCliente= $_POST['clien-phone'];
$emailCliente= $_POST['clien-email'];

if(!$nitCliente=="" && !$nameCliente=="" && !$apeCliente=="" && !$dirCliente=="" && !$phoneCliente=="" && !$emailCliente=="" && !$fullnameCliente==""){
    $verificar=  ejecutarSQL::consultar("select * from cliente where NIT='".$nitCliente."'");
    $verificaltotal = mysql_num_rows($verificar);
    if($verificaltotal<=0){
        if(consultasSQL::InsertSQL("cliente", "NIT, Nombre, NombreCompleto, Apellido, Direccion, Clave, Telefono, Email", "'$nitCliente','$nameCliente','$fullnameCliente','$apeCliente','$dirCliente', '$passCliente','$phoneCliente','$emailCliente'")){
            echo '<center><br><h2>El registro se completo con éxito<h2><br></center>';
        }else{
           echo '<center><br><h2>Ha ocurrido un error.<h2><br><h2>Por favor intente nuevamente<h2><center>'; 
        }
    }else{
        echo '<center><br><h2>El NIT que ha ingresado ya esta registrado.<br>Por favor ingrese otro número de NIT<h2><center>';
    }
}else {
    echo '<center><br><h2>Los campos no deben de estar vacíos<h2><center>';
}

