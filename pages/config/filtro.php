                                                <div class="col-3">

                                                    <select class="form-select " <?php echo (isset($idmodulo) ? 'data-idmodulo="'.$idmodulo.'"' : '' ) ?>  aria-label="Default select example" id="select-periodo">
                                                        <option selected value="">Todos los periodos</option>
                                                        <?php 
                                                    foreach($periodos as $periodo){
                                                        ?>
                                                        <option value="<?php echo $periodo['id']; ?>">
                                                            <?php echo $periodo['nombre']; ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                    </select>
                                                </div>