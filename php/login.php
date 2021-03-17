<?php
    include "conexion.php";
    $email =$_POST['email'];
    $password = sha1($_POST['pass']);
    $res = $conexion->query("select * from usuarios 
        where email='$email' 
        and password='$password'  and 
        confirmado = 'si'
        ")or die($conexion->error);
    if( mysqli_num_rows($res) > 0 ){
        echo "Todo bien";
        
    }else{
        echo "login incorrecto";
    }
?>