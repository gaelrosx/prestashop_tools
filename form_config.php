<?php 
   error_reporting(E_ALL ^ E_NOTICE);
   ini_set('display_errors', '1');
?>
<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Mantenimiento a Productos</title>
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="crossorigin"/>
        <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;700&amp;display=swap"/>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;700&amp;display=swap" media="print" onload="this.media='all'"/>
        <noscript>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;700&amp;display=swap"/>
        </noscript>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/fontawesome.min.css" integrity="sha512-shT5e46zNSD6lt4dlJHb+7LoUko9QZXTGlmWWx0qjI9UhQrElRb+Q5DM7SVte9G9ZNmovz2qIaV7IWv0xQkBkw==" crossorigin="anonymous" />
        <link href="css/style.css" rel="stylesheet">
    </head>

   <body id="top"><div class="site-wrapper">

        <div class="site-wrapper-inner">
            <div class="cover-container">
                <div class="masthead clearfix">
                    <div class="inner mb-5">
                        <h3 class="masthead-brand">CONFIGURACION DE CONEXION A BASE DE DATOS</h3>
                    </div>
                </div>
                
                <div class="row mt-5">
                    <div class="col-md-4">
                        <div style="position: absolute; top: -71px;">
                            <img src="img/logo.png">
                        </div>
                    </div>
                    
                </div>

                <div class="row mt-5">
                    <div class="col-md-12">
                        <form method="post" action="save_config.php" onsubmit="return formValidation()">
                            <div class="row">
                                <div class="col">
                                    <input type="text" class="form-control" id="user" name="user" placeholder="Usuario">
                                </div>

                                <div class="col">
                                    <input type="text" class="form-control" id="password" name="password"  placeholder="Contraseña">
                                </div>

                                <div class="col">
                                    <input type="text" class="form-control" id="db" name="db" placeholder="Base de datos">
                                </div>
                            </div>

                            <div class="row mt-5">
                                <div class="col">
                                    <button type="submit" name="save_config" class="btn btn-lg btn-default btn-notify">Guardar Configuración</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="row mt-5">
                    <span class="col-md-12" style="display: grid;">
                        <h3 class="masthead-brand">Valido para prestashop 1.7</h3>
                    </span>
                </div>

		
      
                <div class="mastfoot">
                    <div class="inner">
                    <p>&copy; Suir Comunicación</p>
                    </div>
                </div>
      
  </div>
</div>
    
  </body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>	  

<script>
    var QueryString = function () {
        var query_string = {};

        var query = window.location.search.substring(1);
        
        var vars = query.split("&");
        
        for (var i=0;i<vars.length;i++)
        {
            var pair = vars[i].split("=");
            if (typeof query_string[pair[0]] === "undefined") {
                query_string[pair[0]] = decodeURIComponent(pair[1]);
            } else if (typeof query_string[pair[0]] === "string") {
                var arr = [ query_string[pair[0]],decodeURIComponent(pair[1]) ];
                query_string[pair[0]] = arr;
            } else {
                 query_string[pair[0]].push(decodeURIComponent(pair[1]));
            }
        }
        return query_string;
    }();

    $( document ).ready(function() {
        if( QueryString.msg.length > 0 )
        {
            Swal.fire({
                icon: 'error',
                title: 'Error de Conexion',
                text: 'No se pudo conectar a base de datos',
                footer: 'Por favor configura la informacion de conexion'
            })
            
        }
    });
    

    function formValidation(){
        
        if( $('#user').val().length == 0 || $('#password').val().length == 0 || $('#db').val().length == 0)
        {
            Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Parametros Incompletos',
            footer: 'Por favor completa todos los campos'
            })
            return false;
        }else{
            return true;
        }

        
    }
</script>
	  
</html>