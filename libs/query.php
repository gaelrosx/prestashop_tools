<?php 
    
    require_once('conexion.php');
    
    class Query {
        
        // Atributos
        public $conn;
        
        public $link;
        

        // Constructor
        public function __construct(){
            
            $this->conn = new Conexion();

            $this->link = $this->conn->conectarse();

        }


        public function active_inactive_producs( $active )
        {
            $query = "select 
                prod.id_product,
                prod.id_category_default,
                prod.price,
                meta.description,
                meta.description_short,
                meta.meta_description,
                meta.meta_keywords,
                meta.meta_title,
                meta.name ";
            
            $query .= "from ps_product prod inner join  ps_product_lang meta on meta.id_product = prod.id_product ";
            
            $query .=" where prod.active = ?;";
            
            try{
                
                $stmt =  $this->link->prepare( $query );

                $stmt->bind_param('i', $active );

                $stmt->execute();
                
                $results =  self::myGetResult(  $stmt );
                
                $stmt->close();

                $this->link->close();

                return $results;

            } catch (Exception $e) {
                
                var_dump('error al Generar consulta de productos: ',  $e->getMessage() );
                
            }


        }

        public function update_metas_products( $row )
        {
            
            $query = "update ps_product_lang set
                description = ?,
                description_short = ?,
                meta_description = ?,
                meta_keywords = ?,
                meta_title = ?,
                name = ? 
            ";
                
            $query .=" where id_product= ?;";

            try{

                $stmt =  $this->link->prepare( $query );

                $stmt->bind_param('ssssssi',  $row["D"], $row["E"], $row["F"], $row["G"], $row["H"], $row["I"], $row["A"] );

                $stmt->execute();

                $this->update_price_products( $row );

            } catch (Exception $e ){

                var_dump('error al actualizando metas de productos: ',  $e->getMessage() );

            }    
        }

        public function update_price_products( $row )
        {
            $query = "update ps_product set
                price = ?
                where id_product= ?;";

            $stmt =  $this->link->prepare( $query );

            $stmt->bind_param('si', $row["C"], $row["A"] );

            $stmt->execute();

        }

        public function select_categories()
        {
            $query = "select 
                id_category,
                id_lang,
                link_rewrite,
                name,
                description,
                meta_title,
                meta_description
            ";
            
            $query .= "from ps_category_lang ";
            
            try{
                
                $results =  $this->link->query( $query );

                if( !$results )
                    exit( "Error en consulta categorias: ".$this->link->error );

                $this->link->close();

                return $results;

            } catch (Exception $e) {
                
                exit('error al Generar consulta de categorias: '. $e->getMessage() );
                
            }


        }

        public function update_metas_categories( $row )
        {
            $query = "update ps_category_lang set
                name = ?,
                description = ?,
                meta_title = ?,
                meta_description = ?
            ";
                
            $query .=" where 
                id_category = ? and
                id_lang = ? and
                link_rewrite = ?;
            ";

            try{

                $stmt =  $this->link->prepare( $query );

                $stmt->bind_param('ssssiis',  $row["D"], $row["E"], $row["F"], $row["G"], $row["A"], $row["B"], $row["C"] );

                $stmt->execute();

            } catch (Exception $e ){

                var_dump('error al actualizando metas de  categorias: ',  $e->getMessage() );

            } 
        }

        public function select_cms()
        {
            $query = "select 
                id_cms,
                id_lang,
                meta_title,
                head_seo_title,
                meta_description
                meta_keywords,
                content
            ";
            
            $query .= "from ps_cms_lang;";
            
            try{
                
                $results =  $this->link->query( $query );

                if( !$results )
                    exit( "Error en consulta CMS: ".$this->link->error );

                $this->link->close();

                return $results;

            } catch (Exception $e) {
                
                exit('error al Generar consulta de CMS: '. $e->getMessage() );
                
            }


        }

        public function update_metas_cms( $row )
        {
            $query = "update ps_cms_lang set
                meta_title = ?,
                head_seo_title = ?,
                meta_description = ?,
                meta_keywords = ?,
                content = ?
            ";
                
            $query .=" where 
                id_cms = ? and
                id_lang = ?;
            ";

            try{

                $stmt =  $this->link->prepare( $query );

                $stmt->bind_param('sssssii', $row["C"], $row["D"], $row["E"], $row["F"], $row["G"], $row["A"], $row["B"] );

                $stmt->execute();

            } catch (Exception $e ){

                var_dump('error al actualizando metas de  CMS: ',  $e->getMessage() );

            } 
        }

        public function select_manufacture()
        {
            $query = "select 
                brands.id_manufacturer,
                meta.id_lang,
                brands.name,
                meta.description,
                meta.short_description,
                meta.meta_title,
                meta.meta_keywords,
                meta.meta_description
            ";
            
            $query .= " from ps_manufacturer brands inner join  ps_manufacturer_lang meta on meta.id_manufacturer = brands.id_manufacturer ";
            
            try{
                
                $results =  $this->link->query( $query );

                if( !$results )
                    exit( "Error en consulta manufacturer: ".$this->link->error );

                $this->link->close();
                
                return $results;                

            } catch (Exception $e) {
                
                var_dump('error al Generar consulta de manufacturer: ',  $e->getMessage() );
                
            }


        }

        public function update_metas_manufacturer( $row )
        {
            $query = "update ps_manufacturer_lang set
                description = ?,
                short_description = ?,
                meta_title = ?,
                meta_keywords = ?,
                meta_description = ?
            ";
                
            $query .=" where 
                id_manufacturer = ? and
                id_lang = ?;
            ";

            try{

                $stmt =  $this->link->prepare( $query );

                $stmt->bind_param('sssssii', $row["D"], $row["E"], $row["F"], $row["G"], $row["H"],  $row["A"], $row["B"] );

                $stmt->execute();

                $this-> update_name_manufacturer( $row );

            } catch (Exception $e ){

                var_dump('error al actualizando metas de  manufacturer: ',  $e->getMessage() );

            } 
        }

        public function update_name_manufacturer( $row )
        {
            $query = "update ps_manufacturer set
                name = ?
                where id_manufacturer = ?;";

            $stmt =  $this->link->prepare( $query );

            $stmt->bind_param('si', $row["C"], $row["A"] );

            $stmt->execute();

        }

        public static function myGetResult( $Statement ) {
            $RESULT = array();
            $Statement->store_result();
            for ( $i = 0; $i < $Statement->num_rows; $i++ ) {
                $Metadata = $Statement->result_metadata();
                $PARAMS = array();
                while ( $Field = $Metadata->fetch_field() ) {
                    $PARAMS[] = &$RESULT[ $i ][ $Field->name ];
                }
                call_user_func_array( array( $Statement, 'bind_result' ), $PARAMS );
                $Statement->fetch();
            }
            return $RESULT;
        }
                
 }
?>