            <div class="col-md-12">    
                    <div class="col-md-12">
                        <br>
                        <h3>DATOS DE LA CIRUGÍA</h3>
                        <hr>
                    </div>
                <div class="col-md-12">
                    <div class="col-md-4">
                        <label for=""><b>Cirugía Programada</b></label>
                        <input type="text" name="programada" class="form-control form-control-user" id="programada_edit">
                    </div>
                    <div class="col-md-4">
                        <label for=""><b>Quirofano</b></label>
                        <input type="text" name="quirofano" class="form-control form-control-user" id="quirofano_edit">
                    </div>
                    <div class="col-md-4">
                        <label for=""><b>Fecha del Último Alimento</b></label>
                        <input type="text" name="alineamiento" class="form-control form-control-user" id="alineamiento_edit">
                    </div>
                </div>
            </div>

            <div class="col-md-12">    
                    <div class="col-md-12">
                        <br>
                        <h3>PERSONAL</h3>
                        <hr>
                    </div>
                <div class="col-md-12">
                    <div class="col-md-4">
                        <label for=""><b>Cirujano Principal</b></label>
                        <input type="text" name="cirujano" class="form-control form-control-user" id="programada_edit">
                    </div>
                    <div class="col-md-4">
                        <label for=""><b>Anestesiólogo</b></label>
                        <input type="text" name="anestesiologo" class="form-control form-control-user" id="anestesiologo_edit">
                    </div>
                    <div class="col-md-4">
                        <label for=""><b>Auxiliar de Enfermería</b></label>
                        <input type="text" name="enfermera" class="form-control form-control-user" id="enfermera_edit">
                    </div>
                </div>
            </div>


                    <div class="col-md-12">

            <!--subir btn a gestor-->
                        <div class="col-md-12">
                            <br>
                            <h3>REVISIÓN POR SISTEMAS</h3>
                            <hr>
                        </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group valid-required">
                                <input type="text" class="form-control form-control-user" name="sistema_edit" id="sistema_edit">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group valid-required">
                                <input type="text" class="form-control form-control-user" name="hallazgo_edit" id="hallazgo_edit">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <button type="button" id="btn_sistema" class="btn btn-primary btn-user">
                            Agregar <i class="fa fa-pl"></i>
                            </button>
                        </div>

                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-bordered" id="table_sistema" width="100%" cellspacing="0">

                                        <thead>
                                            <tr>
                                            <th>Nombre del Sistema </th>
                                            <th>Hallazgo</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



            <div class="row">    
                    <div class="col-md-12">
                        <br>
                        <h3>PERTENENCIAS</h3>
                        <hr>
                    </div>
                    <div class="col-md-4">
                        <input type="text" name="pertenencias" class="form-control form-control-user" id="pertenencias_edit">
                    </div>
                    <div class="col-md-4">
                        <label for=""><b>Entrega</b></label>
                        <input type="text" name="entrega" class="form-control form-control-user" id="entrega_edit">
                    </div>
                    <div class="col-md-4">
                        <label for=""><b>Recibe</b></label>
                        <input type="text" name="recibe" class="form-control form-control-user" id="recibe_edit">
                    </div>     
            </div>



                        <center>
                            <br><br>
                            <button type="button" class="btn btn-danger btn-user" onclick="prevClient('#cuadro4')">
                                Limpiar
                            </button>
                            <button class="btn btn-primary btn-user">
                                Guardar
                            </button>
                        </center>






