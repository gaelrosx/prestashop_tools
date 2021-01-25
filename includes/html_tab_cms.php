<div class="tab-pane fade show" id="cms-content" role="tabpanel" aria-labelledby="cms-tab">
    <ul class="nav nav-tabs" id="ul-cms" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link active" id="download-cms-tab" data-toggle="tab" href="#download-cms-files" role="tab" aria-controls="download-cms-files" aria-selected="true">Descargar Archivos</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="uploap-cms-tab" data-toggle="tab" href="#upload-cms-files" role="tab" aria-controls="upload-cms-files" aria-selected="false">Subir Archivos Modificados</a>
        </li>
    </ul>

    <div class="tab-content" id="myTabContentCms">
    
        <div class="tab-pane fade show active mt-5" id="download-cms-files" role="tabpanel" aria-labelledby="download-cms-tab">
            <div class="inner cover">
                <h1 class="cover-heading">DOWNLOAD</h1>
                <p class="lead cover-copy">En esta seccion puede generar los archivos con la metainformacion del modulo CMS.</p>
                <p class="lead">
                
                <a type="button" class="btn btn-lg btn-default btn-notify" href="exports/cms.php">
                    EXPORTAR CMS
                </a>
                
            </div>
        </div>
    
        <div class="tab-pane fade mt-5" id="upload-cms-files" role="tabpanel" aria-labelledby="uploap-cms-tab">
            <div class="inner cover">
                <h1 class="cover-heading"> Upload </h1>
                <p class="lead cover-copy">En esta sección se pueden Subir los cambios de los metadatos del modulo cms hechos en el archivo generado.</p>
                <p class="lead cover-copy"><b style="color: #01040c; font-weight: bold;">IMPORTANTE:</b> No modificar el orden de las columnas del archivo generado, ni eliminar columnas, ya que de hacerlo fallara el script.</p>
                <p class="lead">
                
                <form method="POST" action="imports/update_cms.php" enctype="multipart/form-data" onsubmit="return fileValidation('file_cms')">
                    <div class="form-group">
    
                        <input type="file" class="form-control-file" name="file" id="file_cms" accept=".xlsx">
                    </div>
                    
                    <div class="form-group mt-4">
                        <button type="submit" class="btn btn-lg btn-default btn-notify">SUBIR ARCHIVO</button>
                    </div>
                </form>
            </div>	
        </div>

    </div>


</div>