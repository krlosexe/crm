                <div class="row">    
                    <div class="col-md-12">
                        <br>
                        <h3>DATOS DE LA CIRUGÍA</h3>
                        <hr>
                    </div>
                    
                    <div class="col-md-12">
                        <label for=""><b>Quirófano</b></label>
                        <input type="text" name="quirofano" class="form-control form-control-user" id="quirofano_edit">
                    </div>
                    <div class="row">
                    <div class="form-group form-group col-md-6">
                        <label for=""><b>Fecha de Inicio</b></label>
                        <input type="date" name="fechainicio_cirugia" class="form-control form-control-user" id="fechainicio_edit">
                    </div>
                    <div class="form-group form-group col-md-6">
                        <label for=""><b>Hora de Inicio</b></label>
                        <input type="time" name="horainicio_cirugia" class="form-control form-control-user" id="horainicio_edit">
                    </div>

                    <div class="form-group col-md-6">
                        <label for=""><b>Fecha de Finalización</b></label>
                        <input type="date" name="fechafin_principal" class="form-control form-control-user" id="fechafin_principal_edit">
                    </div>
                    <div class="form-group form-group col-md-6">
                        <label for=""><b>Hora de Fin</b></label>
                        <input type="time" name="horafin_cirugia" class="form-control form-control-user" id="horafin_principal_edit">
                    </div>
                    </div>

                </div>



                <div class="row">    
                    <div class="col-md-12">
                        <hr>
                    </div>
                    
                    <div class="form-group col-md-2">
                    <br>
                        <label for=""><b>FECHA </b></label>
                        <input type="date" name="fecha_edit" class="form-control form-control-user" id="fecha_edit">
                    </div>
                    <div class="form-group col-md-2">
                    <br>
                        <label for=""><b>HORA</b></label>
                        <input type="time" name="hora_cirugia" class="form-control form-control-user" id="horafin_edit">
                    </div>

                    <div class="form-group col-md-2">
                        <label for=""><b>TENSIÓN ARTERIAL (mm Hg)</b></label>
                        <input type="text" name="tensionarterial_cirugia" class="form-control form-control-user" id="tensionarterial_edit">
                    </div>

                    <div class="form-group col-md-2">
                    <br>
                        <label for=""><b>FRECUENCIA CARDIACA</b></label>
                       <input type="text" name="frecuencia" class="form-control form-control-user" id="frecuencia_edit">
                    </div>

                    <div class="form-group col-md-2">
                        <label for=""><b>SATURACIÓN DE OXÍGENO</b></label>
                        <input type="text" name="saturacion" class="form-control form-control-user" id="saturacion_edit">
                    </div>

                    <div class="form-group col-md-2">
                    <br>
                        <label for=""><b>USUARIO DE CREACIÓN</b></label>
                        <input type="text" name="creacion" class="form-control form-control-user" id="creacion_edit">
                    </div>
                </div>
                <center>

                    <button type="button" class="btn btn-danger btn-user" onclick="prevClient('#cuadro4')">
                        Limpiar
                    </button>
                    <button type="button" class="btn btn-primary btn-user" id="btn-enfermeria">
                        Guardar
                    </button>
                </center>

