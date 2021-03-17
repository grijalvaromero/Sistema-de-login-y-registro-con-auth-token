<?php 
   include "./conexion.php";
   if( isset($_POST['nombre'] ) && isset($_POST['email']) && isset($_POST['pass'] ) 
    && isset($_POST['pass2'] )){

        if($_POST['pass'] == $_POST['pass2'] ){
            $name=$_POST['nombre'];
            $email=$_POST['email'];
            $pass=sha1($_POST['pass']);
            include "./mail.php";
            if($enviado){
                $conexion->query("insert into usuarios (nombre, email,password, confirmado ,codigo) 
                    values('$name','$email','$pass','no','$codigo')  ")or die($conexion->error);
                    echo "Favor de revisar tu email para verificar tu cuenta";
            }else{
                echo "no se pudo enviar el email";
            }
        }else{
            echo "password invalidos";
        }
    }

?>