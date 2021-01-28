<?php
		require_once('Security.class.php');

		class Conexion{
			var $ruta;
			var $user;
			var $password;
			var $db;

			public function __construct(){
				
				$params = Security::getParamsDb();

				$this->ruta       = "localhost"; //"172.17.0.2"; 
				
				$this->user    = $params['user'];
				
				$this->password = $params['password'];; 
				
				$this->db  =  $params['db'];
			}

			function conectarse(){
				try {
					
					//$enlace = mysqli_connect($this->ruta, $this->user, $this->password, $this->db);
					$enlace = new mysqli($this->ruta, $this->user, $this->password, $this->db);

					if ($enlace->connect_errno) {
						
						header('Location: form_config.php?msg=error_conection');
						
						//echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
					}
					
					/*if ($enlace === false){
						header('Location: form_config.php?msg=error_conection');
					}*/

					
					$enlace->set_charset("utf8");

					return $enlace;

				} catch (Exception $e) {
					var_dump('Error de Conexión: ',  $e->getMessage());
					//echo 'Error de Conexión: ',  $e->getMessage(), "\n";
				}
				
			
			}
		}

?>
