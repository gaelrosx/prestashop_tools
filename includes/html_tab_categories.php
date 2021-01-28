<div class="tab-pane fade show" id="categories-content" role="tabpanel" aria-labelledby="categories-tab">
    <div class="row">
        <div class="col-md-12">
            <h1 class="title-module"> MODULO CATEGORIAS</h1>
        </div>
    </div>
    
    <ul class="nav nav-tabs" id="ul-categories" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link active" id="download-categories-tab" data-toggle="tab" href="#download-categories-files" role="tab" aria-controls="download-categories-files" aria-selected="true">Descargar Archivos</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="uploap-categories-tab" data-toggle="tab" href="#upload-categories-files" role="tab" aria-controls="upload-categories-files" aria-selected="false">Subir Archivos Modificados</a>
        </li>
    </ul>

    <div class="tab-content" id="myTabContentCategories">
    
        <div class="tab-pane fade show active mt-5" id="download-categories-files" role="tabpanel" aria-labelledby="download-categories-tab">
            <div class="inner cover">
                <h1 class="cover-heading">DOWNLOAD</h1>
                <p class="lead cover-copy">En esta seccion puede generar los archivos con la metainformacion de los productos activos e inactivos.</p>
                <p class="lead">
                
                <a type="button" class="btn btn-lg btn-default btn-notify" href="exports/categories.php">
                    EXPORTAR CATEGORIAS
                </a>
                
            </div>
        </div>
    
        <div class="tab-pane fade mt-5" id="upload-categories-files" role="tabpanel" aria-labelledby="uploap-categories-tab">
            <div class="inner cover">
                <h1 class="cover-heading"> Upload </h1>
                <p class="lead cover-copy">En esta sección se pueden Subir los cambios de los metadatos de las Categorias hechos en el archivo generado.</p>
                <p class="lead cover-copy"><b style="color: #01040c; font-weight: bold;">IMPORTANTE:</b> No modificar el orden de las columnas del archivo generado, ni eliminar columnas, ya que de hacerlo fallara el script.</p>
                <p class="lead">
                
                <form method="POST" action="imports/update_categories.php" enctype="multipart/form-data" onsubmit="return fileValidation('file_categories','categories')">
                    <div class="form-group">
    
                        <input type="file" class="form-control-file" name="file" id="file_categories" accept=".xlsx">
                    </div>
                    
                    <div class="form-group mt-4">
                        <button type="submit" class="btn btn-lg btn-default btn-notify">SUBIR ARCHIVO</button>
                    </div>
                </form>
            </div>	
        </div>

    </div>


</div>