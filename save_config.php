<?php
    error_reporting(E_ALL ^ E_NOTICE);
    
    ini_set('display_errors', '1');
    
    require_once('libs/Security.class.php');

    Security::save_config( $_POST );

    header('Location: index.php?msg=config_db_success');

?>