<div class="modal fade" id="centermodal" tabindex="-1" role="dialog"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered text-start ">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="myCenterModalLabel"> Agregar
                                                                nueva lista</h4>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-hidden="true"></button>
                                                        </div>
                                                        <div class="modal-body ">

                                                            <div class="container">
                                                                <div class="row border p-3 rounded">
                                                                    <form method="post" accept=".xls,.xlsx"
                                                                        id="formulario-list"
                                                                        enctype="multipart/form-data"
                                                                        data-plugin="dropzone"
                                                                        data-previews-container="#file-previews"
                                                                        data-upload-preview-template="#uploadPreviewTemplate"
                                                                        accept=".xlsx">
                                                                        <div class="row ">
                                                                            <div class="col-12">
                                                                                <label class="form-label"
                                                                                    for="nombre">Nombre:</label>
                                                                                <input type="text" class="form-control"
                                                                                    id="nombre-list"
                                                                                    placeholder="Nombre de lista"
                                                                                    name="nombre-list" />
                                                                                <input type="hidden" name="idglobal"
                                                                                    value="<?php echo $idglobal ?>" />
                                                                            </div>
                                                                           
                                                                            <div class="col-6 mt-2">
                                                                                <label class="form-label"
                                                                                    for="modulo-list">Modulo:</label>
                                                                                <select name="modulo-list"
                                                                                    class="form-select"
                                                                                    id="modulo-list">
                                                                                    <option selected value="">
                                                                                        Seleccionar modulo</option>
                                                                                    <?php foreach ($modulos as $modulo) : ?>
                                                                                    <option
                                                                                        value="<?php echo $modulo['id'] ?>">
                                                                                        <?php echo $modulo['nombre'] ?>
                                                                                    </option>
                                                                                    <?php endforeach ?>
                                                                                </select>
                                                                            </div>

                                                                            <div class="col-6 mt-2">
                                                                                <label class="form-label"
                                                                                    for="profesor-list">Profesor:</label>
                                                                                <select name="profesor-list"
                                                                                    class="form-select"
                                                                                    id="profesor-list">
                                                                                    <option selected value="">
                                                                                        Seleccionar profesor</option>
                                                                                    <?php foreach ($profesores as $profesor) : ?>
                                                                                    <option
                                                                                        value="<?php echo $profesor['id'] ?>">
                                                                                        <?php echo ucwords($profesor['nombre']). ' '. ucwords($profesor['apellido']) ?>
                                                                                    </option>
                                                                                    <?php endforeach ?>
                                                                                </select>
                                                                            </div>


                                                                            <div class="col-6 mt-2">
                                                                                <label class="form-label"
                                                                                    for="semestre">Semestre:</label>
                                                                                <select name="semestre"
                                                                                    class="form-select"
                                                                                    id="semestre-list">
                                                                                    <option selected value="">
                                                                                        Seleccionar semestre</option>
                                                                                    <option value="I (Primero)"> I
                                                                                        (Primero) </option>
                                                                                    <option value="II (Segundo)"> II
                                                                                        (Segundo) </option>
                                                                                    <option value="III (Tercero)"> III
                                                                                        (Tercero) </option>
                                                                                    <option value="IV (Cuarto)"> IV
                                                                                        (Cuarto) </option>
                                                                                    <option value="V (Quinto)"> V
                                                                                        (Quinto) </option>
                                                                                    <option value="VI (Sexto)"> VI
                                                                                        (Sexto) </option>
                                                                                    <option value="VII (Septimo)"> VII
                                                                                        (Septimo) </option>
                                                                                    <option value="VIII (Octavo)">VIII
                                                                                        (Octavo) </option>
                                                                                    <option value="IX (Noveno)"> IX
                                                                                        (Noveno) </option>
                                                                                    <option value="X (Decimo)"> X
                                                                                        (Decimo) </option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="col-6 mt-2">
                                                                                <label for="periodo" class="form-label">Periodo:</label>
                                                                                <select class="form-select "
                                                                                    aria-label="Default select example" name="periodo" id="periodo-list">
                                                                                    <option selected value="">Periodo</option>
                                                                                    <?php 
                                                                                        foreach($periodos as $periodo){
                                                                                    ?>
                                                                                    <option
                                                                                        value="<?php echo $periodo['id']; ?>">
                                                                                        <?php echo $periodo['nombre']; ?>
                                                                                    </option>
                                                                                    <?php
                                                    }
                                                    ?>
                                                                                </select>
                                                                            </div>
                                                                            <div class="col-12 mt-2">
                                                                                <label class="form-label"
                                                                                    for="adjunto">Lista</label>
                                                                                <input type="file" class="form-control"
                                                                                    id="adjunto" name="adjunto" />
                                                                            </div>
                                                                            <div class="col-6 pt-1">
                                                                                <button type="button"
                                                                                    name="agregar-list"
                                                                                    class="w-100 col-6 btn btn-success mt-4"
                                                                                    id="agregar-list">Subir
                                                                                    Lista</button>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-12 mt-1" id="resultado-list">

                                                                        </div>
                                                                    </form>

                                                                </div>
                                                            </div>
                                                        </div>


                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->