<?php
		class Conexion{
			var $ruta;
			var $usuario;
			var $contrasena;
			var $baseDatos;

			function Conexion(){
				$this->ruta       ="localhost"; //
				$this->usuario    ="us_tiendaps"; //usuario que tengas definido
				$this->contrasena ="toS7u19&"; //contraseña que tengas definidad
				$this->baseDatos  ="db_tiendaps_a"; //base de datos personas, si quieres utilizar otra base de datos solamente cambiala
			}

			function conectarse(){
				//---------------------------TIPO DE CONEXION 1-----------------------------------
				/*$conectarse= mysql_connect($this->ruta,$this->usuario, $this->contrasena) or die(mysql_error()); //conexion al BD
				if($conectarse){
					mysql_select_db($this->baseDatos);
					return($conectarse);
				}else{
					return ("Error");
					}*/
				//------------------------TIPO DE CONEXION 2 - RECOMENDADA---------------------------------------------
				$enlace = mysqli_connect($this->ruta, $this->usuario, $this->contrasena, $this->baseDatos);
				if($enlace){
					//var_dump("Conexion exitosa");
					//echo "Conexion exitosa";	//si la conexion fue exitosa nos muestra este mensaje como prueba, despues lo puedes poner comentarios de nuevo: //
				}else{
					die('Error de Conexión (' . mysqli_connect_errno() . ') '.mysqli_connect_error());
				}
				return($enlace);
				// mysqli_close($enlace); //cierra la conexion a nuestra base de datos, un ounto de seguridad importante.
			}
		}

?>