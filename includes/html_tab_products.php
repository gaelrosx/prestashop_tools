<div class="tab-pane fade show active" id="products-content" role="tabpanel" aria-labelledby="products-tab">
    
    <ul class="nav nav-tabs" id="ul_products" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link active" id="download-products-tab" data-toggle="tab" href="#download-files-products" role="tab" aria-controls="download-files-products" aria-selected="true">Descargar Archivos</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="upload-products-tab" data-toggle="tab" href="#upload-files-products" role="tab" aria-controls="upload-files-products" aria-selected="false">Subir Archivos Modificados</a>
        </li>
    </ul>

    <div class="tab-content" id="myTabContentProducts">
        <div class="tab-pane fade show active mt-5" id="download-files-products" role="tabpanel" aria-labelledby="download-products-tab">
            <div class="inner cover">
                <h1 class="cover-heading"> DOWNLOAD </h1>
                <p class="lead cover-copy">En esta sección se pueden generar de los metadatos de los productos e incluso actualizar sus precios.</p>
                
                <a type="button" class="btn btn-lg btn-default btn-notify" href="exports/active_products.php">
                    EXPORTAR PRODUCTOS ACTIVOS
                </a>
                <a type="button" class="btn btn-lg btn-default btn-notify" href="exports/inactive_products.php">
                    EXPORTAR PRODUCTOS INACTIVOS
                </a>
            </div>
        </div>
    
        <div class="tab-pane fade mt-5" id="upload-files-products" role="tabpanel" aria-labelledby="upload-products-tab">
            <div class="inner cover">
                <h1 class="cover-heading"> UPLOAD </h1>
                <p class="lead cover-copy">En esta sección se pueden Subir los cambios de los metadatos de los productos hechos en el archivo generado.</p>
                <p class="lead cover-copy"><b style="color: #01040c; font-weight: bold;">IMPORTANTE:</b> No modificar el orden de las columnas del archivo generado, ni eliminar columnas, ya que de hacerlo fallara el script.</p>
                
                <div class="text-center">
                    
                    <form method="POST" action="imports/update_products.php" enctype="multipart/form-data" onsubmit="return fileValidation('file_products','products')">
                        <div class="form-group">
        
                            <input type="file" class="form-control-file" name="file" id="file_products" accept=".xlsx">
                        </div>
                        
                        <div class="form-group mt-4">
                            <button type="submit" class="btn btn-lg btn-default btn-notify">SUBIR ARCHIVO</button>
                        </div>
                    </form>
                </div>
                
            </div>	
        </div>
        
    </div>

</div>   