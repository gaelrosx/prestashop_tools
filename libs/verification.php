<?php 
    require_once('Security.class.php');
    
    require_once('conexion.php');

    if( !Security::exist_pasword() )
    {
        header('Location: form_config.php');
    }

    //Verificar el estado de la conexion a base de datos
    $conn = new Conexion();

    $link = $conn->conectarse();
    

?>