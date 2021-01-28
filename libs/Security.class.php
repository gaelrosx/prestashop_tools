<?php 

    class Security {

        public static function exist_pasword()
        {
            return file_exists(self::getBaseRouteFile().'/parameters.txt');
        }

        public static function getBaseRouteFile()
        {
            return  dirname(__DIR__) ."/SZ8YC8IIK4/"; 
        }

        public static function save_config( $data )
        {
            $user =  $data['user'];
    
            $password =  $data['password'];
            
            $db =  $data['db'];

            $file = fopen( self::getBaseRouteFile().'parameters.txt', "w+" );

            fwrite($file, $user.PHP_EOL);
            
            fwrite($file, $password.PHP_EOL);
            
            fwrite($file, $db.PHP_EOL);
            
            fclose($file);

        }
        
        public static function getParamsDb()
        {
            $array_params = [];

            if( self::exist_pasword() )
            {
                $fileOpen = file( self::getBaseRouteFile().'parameters.txt');
                $keys = [
                    "0" => "user",
                    "1" => "password",
                    "2" => "db",
                ];

                foreach( $fileOpen  as $key=> $line )
                {
                    $array_params[ $keys[ $key ] ] = trim( $line );
                    
                }
            }

            return $array_params;
        }
                
 }
?>