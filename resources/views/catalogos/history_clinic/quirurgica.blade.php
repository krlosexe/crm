
                    <div class="row">
                        <div class="col-md-12">
                            <h3>ESPECIFICACIÓN QUIRÚRGICA</h3>
                            <hr>
                        </div>

                        <br>
                        <div class="form-group col-md-4">
                            <label for=""><b>CIE10 </b></label>
                            <input type="text" class="form-control form-control-user" name="cie10" id="cie10_edit">
                        </div>

                        <div class="form-group col-md-4">
                            <label for=""><b>DIAGNÓSTICO </b></label>
                            <input type="text" class="form-control form-control-user" name="diagnostico" id="diagnostico_edit">
                        </div>

                        <div class="form-group col-md-4">
                            <label for=""><b>TIPO</b></label>
                            <input type="text" class="form-control form-control-user" name=""tipo" id="tipo_edit">
                        </div>

                        <div class="form-group col-md-4">
                            <label for=""><b>Tipo de Anestesia</b></label>
                            <input type="text" class="form-control form-control-user" name="tanestesia" id="tanestesia_edit">
                        </div>

                        <div class="form-group col-md-4">
                            <label for=""><b>Procedimiento Quirúrgico Planeado</b></label>
                           <input type="text" class="form-control form-control-user" name="pqp" id="pqp_edit">
                        </div>
                    </div>



                    <div class="row">
                        <div class="col-md-12">
                            <h3>PERSONAL QUIRÚRGICO</h3>
                            <hr>
                        </div>

                        <div class="form-group col-md-4">
                            <label for=""><b>Cirujano Principal</b></label>
                            <input type="text" class="form-control form-control-user" name="cirujano1" id="cirujano1_edit">
                        </div>

                        <div class="form-group col-md-4">
                            <label for=""><b>Segundo Cirujano</b></label>
                            <input type="text" class="form-control form-control-user" name="cirujano2" id="cirujano2_edit">
                        </div>
                        <div class="form-group col-md-4">
                            <label for=""><b>Anestesiólogo</b></label>
                            <input type="text" class="form-control form-control-user" name="anesteciologo" id="anesteciologo_edit">
                        </div>
                        <div class="form-group col-md-4">
                            <label for=""><b>Primer Ayudante</b></label>
                            <input type="text" class="form-control form-control-user" name="ayudante1" id="ayudante1_edit">
                        </div>
                        <div class="form-group col-md-4">
                            <label for=""><b>Segundo Ayudante</b></label>
                            <input type="text" class="form-control form-control-user" name="ayudante2" id="ayudante2_edit">
                        </div>
                        <div class="form-group col-md-4">
                            <label for=""><b>Instrumentador Quirúrgico</b></label>
                            <input type="text" class="form-control form-control-user" name="instrumentador" id="instrumentador_edit">
                        </div>
                        <div class="form-group col-md-4">
                            <label for=""><b>Auxiliares de Sala</b></label>
                            <input type="text" name="auxiliares" class="form-control form-control-user" id="auxiliares_edit">
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-12">
                            <h3>DESCRIPCIÓN QUIRÚRGICA</h3>
                            <hr>
                        </div>
                        <br>
                    </div>


                    <div class="form-group col-md-12">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for=""><b>Fecha de Inicio</b></label>
                            <input type="date" class="form-control" name="fechaini" id="fechaini_date">
                        </div>
                        
                        <div class="form-group col-md-4">
                            <label for=""><b>Hora de Inicio</b></label>
                            <input type="time" class="form-control" name="horaini_date" id="horaini_date">
                        </div>
                    </div>
                        <div class="form-group col-md-6">
                            <label for=""><b>Descripción Quirúrgica</b></label>
                            <input type="text" name="descripcion" class="form-control form-control-user" id="descripcion_edit">
                        </div>

                        <div class="form-group col-md-6">
                            <label for=""><b>Complicaciones</b></label>
                            <input type="text" name="complicacion" class="form-control form-control-user" id="complicacion_edit">
                        </div>
                    </div>

                    <center>

                        <button type="button" class="btn btn-danger btn-user" onclick="prevClient('#cuadro4')">
                            Limpiar
                        </button>
                        <button  type="button" class="btn btn-primary btn-user" id="btn-quirurgica">
                            Guardar
                        </button>
                    </center>





