<div class="row">
                <div class="row">    
                    <div class="col-md-12">
                        <hr>
                    </div>
                    
                    <div class="form-group col-md-4">
                        <label for=""><b>Ayuno de 6-8 horas para Solidos</b></label>
                                        <select name="solidos1" id="solidos1_edit" class="form-control select2">
                                            <option value="">Seleccione</option>
                                            <option value="general">SI</option>
                                            <option value="intravenosa">NO</option>
                                        </select>
                    </div>

                    <div class="form-group form-group col-md-4">
                        <label for=""><b>Ayuno de 6-8 horas para Solidos</b></label>
                                        <select name="solidos2" id="solidos2_edit" class="form-control select2">
                                            <option value="">Seleccione</option>
                                            <option value="general">SI</option>
                                            <option value="intravenosa">NO</option>
                                        </select>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-12">
                        <br>
                        <h3>MOTIVO DE LA CONSULTA</h3>
                        <hr>
                    </div>
                    <div class="form-group form-group col-md-4">
                        <input type="text" name="motivo_consulta" class="form-control form-control-user" id="motivo_consulta_edit">
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-12">
                        <br>
                        <h3>ANTECEDENTES ALERGICOS</h3>
                        <hr>
                    </div>

                        <div class="col-md-12">
<!--OJO ANEXAR A GESTOR-->
                            <div class="col-md-4">
                                <label for=""><b>Item</b></label>
                                <div class="form-group valid-required">
                                    <input type="text" class="form-control form-control-user" name="item_alegicos" id="item_alergicos">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for=""><b>Observación</b></label>
                                <div class="form-group valid-required">
                                    <input type="text" class="form-control form-control-user" name="observacion_alergicos" id="observacion_alergicos">
                                </div>
                            </div>


                            <div class="col-md-3">
                                <br>
                                <button type="button" id="btn_alergicos" class="btn btn-primary btn-user">
                                    Agregar <i class="fa fa-pl"></i>
                                </button>
                            </div>
                        </div>
                        
                            <div class="col-md-12">
                                <table class="table table-bordered" id="tabla_alergicos" width="100%" cellspacing="0">

                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <br>
                        <h3>ANTECEDENTES FAMILIARES</h3>
                        <hr>
                    </div>

                        <div class="col-md-12">
<!--OJO ANEXAR A GESTOR-->
                            <div class="form-group col-md-4">
                                <label for=""><b>Item</b></label>
                                <div class="form-group valid-required">
                                    <input type="text" class="form-control form-control-user" name="item_familiares" id="item_familiares">
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for=""><b>Observación</b></label>
                                <div class="form-group valid-required">
                                    <input type="text" class="form-control form-control-user" name="observacion_familiares" id="observacion_familiares">
                                </div>
                            </div>


                            <div class="form-group col-md-3">
                                <br>
                                <button type="button" id="btn_familiares" class="btn btn-primary btn-user">
                                    Agregar <i class="fa fa-pl"></i>
                                </button>
                            </div>
                        </div>
                        
                            <div class="col-md-12">
                                <table class="table table-bordered" id="tabla_familiares" width="100%" cellspacing="0">

                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <br>
                        <h3>ANTECEDENTES PATOLÓGICOS</h3>
                        <hr>
                    </div>

                        <div class="col-md-12">
<!--OJO ANEXAR A GESTOR-->
                            <div class="col-md-4">
                                <label for=""><b>Item</b></label>
                                <div class="form-group valid-required">
                                    <input type="text" class="form-control form-control-user" name="item_patologicos" id="item_patologicos">
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for=""><b>Observación</b></label>
                                <div class="form-group valid-required">
                                    <input type="text" class="form-control form-control-user" name="observacion_patologicos" id="observacion_patologicos">
                                </div>
                            </div>


                            <div class="form-group col-md-3">
                                <br>
                                <button type="button" id="btn_patologicos" class="btn btn-primary btn-user">
                                    Agregar <i class="fa fa-pl"></i>
                                </button>
                            </div>
                        </div>
                        
                            <div class="col-md-12">
                                <table class="table table-bordered" id="tabla_patologicos" width="100%" cellspacing="0">

                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <br>
                        <h3>ANTECEDENTES QUIRÚRGICOS</h3>
                        <hr>
                    </div>

                        <div class="col-md-12">
<!--OJO ANEXAR A GESTOR-->
                            <div class="form-group col-md-4">
                                <label for=""><b>Item</b></label>
                                <div class="form-group valid-required">
                                    <input type="text" class="form-control form-control-user" name="item_quirurgicos" id="item_quirurgicos">
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for=""><b>Observación</b></label>
                                <div class="form-group valid-required">
                                    <input type="text" class="form-control form-control-user" name="observacion_quirurgicos" id="observacion_quirurgicos">
                                </div>
                            </div>


                            <div class="form-group col-md-3">
                                <br>
                                <button type="button" id="btn_quirurgicos" class="btn btn-primary btn-user">
                                    Agregar <i class="fa fa-pl"></i>
                                </button>
                            </div>
                        </div>
                        
                            <div class="col-md-12">
                                <table class="table table-bordered" id="tabla_quirurgicos" width="100%" cellspacing="0">

                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <br>
                        <h3>ANTECEDENTES TOXICOLÓGICOS</h3>
                        <hr>
                    </div>

                        <div class="col-md-12">
<!--OJO ANEXAR A GESTOR-->
                            <div class="col-md-4">
                                <label for=""><b>Item</b></label>
                                <div class="form-group valid-required">
                                    <input type="text" class="form-control form-control-user" name="item_toxicologicos" id="item_toxicologicos">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for=""><b>Observación</b></label>
                                <div class="form-group valid-required">
                                    <input type="text" class="form-control form-control-user" name="observacion_toxicologicos" id="observacion_toxicologicos">
                                </div>
                            </div>


                            <div class="col-md-3">
                                <br>
                                <button type="button" id="btn_toxicologicos" class="btn btn-primary btn-user">
                                    Agregar <i class="fa fa-pl"></i>
                                </button>
                            </div>
                        </div>
                        
                            <div class="col-md-12">
                                <table class="table table-bordered" id="tabla_toxicologicos" width="100%" cellspacing="0">

                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                </div>

            <div class="col-md-12">    
                    <div class="col-md-12">
                        <br>
                        <h3>MONITORIZACIÓN</h3>
                        <hr>
                    </div>

                    <div class="col-md-4">
                        <label for=""><b>SIGNOS VITALES DE INGRESO</b></label>
                    </div>

                <div class="col-md-12">
                   
                    <div class="form-group col-md-4">
                        <label for=""><b>Tension Arterial</b></label>
                        <input type="text" name="tension_arteria" class="form-control form-control-user" id="tension_arteria_edit">
                    </div>

                    <div class="form-group col-md-4">
                        <label for=""><b>Frecuencia Cardiaca</b></label>
                        <input type="text" name="frecuencia_cardiaca" class="form-control form-control-user" id="frecuencia_cardiaca_edit">
                    </div>

                    <div class="form-group col-md-4">
                        <label for=""><b>Peso</b></label>
                        <input type="text" name="peso_inicio" class="form-control form-control-user" id="peso_inicio_edit">
                    </div>

                    <div class="form-group col-md-4">
                        <label for=""><b>Talla</b></label>
                        <input type="text" name="talla_inicio" class="form-control form-control-user" id="talla_inicio_edit">
                    </div>
                    
                    <div class="form-group col-md-4">
                        <label for=""><b>IMC</b></label>
                        <input type="text" name="imc" class="form-control form-control-user" id="imc_edit">
                    </div>

                    <div class="form-group col-md-4">
                        <label for=""><b>Clasificación del Riesgo ASA</b></label>
                        <input type="text" name="clasificacion_asa" class="form-control form-control-user" id="clasificacion_asa_edit">
                    </div>

                </div>
            </div>

            <div class="row">
                    <div class="col-md-12">
                        <br>
                        <hr>
                    </div>

                        <div class="col-md-12">
<!--OJO ANEXAR A GESTOR-->
                            <div class="col-md-2">
                                <label for=""><b>Tiempo</b></label>
                                <div class="form-group valid-required">
                                        <select name="time" id="time_edit" class="form-control select2">
                                            <option value="">Seleccione</option>
                                            <option value="inicio">Inicio</option>
                                            <option value="5">5</option>
                                            <option value="10">10</option>
                                            <option value="15">15</option>
                                            <option value="20">20</option>
                                            <option value="25">25</option>
                                            <option value="30">30</option>
                                            <option value="35">35</option>
                                            <option value="40">40</option>
                                            <option value="45">45</option>
                                            <option value="50">50</option>
                                            <option value="55">55</option>
                                            <option value="60">60</option>
                                        </select>
                                </div>
                            </div>
                            <div class="form-group col-md-2">
                                <label for=""><b>Farmaco</b></label>
                                <div class="form-group valid-required">
                                    <input type="text" class="form-control form-control-user" name="Farmaco" id="Farmaco_edit">
                                </div>
                            </div>
                            
                            <div class="form-group col-md-2">
                                <label for=""><b>Dosis</b></label>
                                <div class="form-group valid-required">
                                    <input type="text" class="form-control form-control-user" name="dosis_edit" id="dosis_edit">
                                </div>
                            </div>
                            
                            <div class="form-group col-md-2">
                                <label for=""><b>TA</b></label>
                                <div class="form-group valid-required">
                                    <input type="text" class="form-control form-control-user" name="ta_edit" id="ta_edit">
                                </div>
                            </div>
                            
                            <div class="form-group col-md-2">
                                <label for=""><b>Fc</b></label>
                                <div class="form-group valid-required">
                                    <input type="text" class="form-control form-control-user" name="Fc_edit" id="Fc_edit">
                                </div>
                            </div>

                            <div class="form-group col-md-2">
                                <label for=""><b>Sat. 02%</b></label>
                                <div class="form-group valid-required">
                                    <input type="text" class="form-control form-control-user" name="sat02_edit" id="sat02_edit">
                                </div>
                            </div>
                            
                            <div class="form-group col-md-2">
                                <label for=""><b>Ramsay</b></label>
                                <div class="form-group valid-required">
                                    <input type="text" class="form-control form-control-user" name="ramsay_edit" id="ramsay_edit">
                                </div>
                            </div>

                            <div class="form-group col-md-2">
                                <br>
                                <button type="button" id="btn_farmacos" class="btn btn-primary btn-user">
                                    Agregar <i class="fa fa-pl"></i>
                                </button>
                            </div>
                        </div>
                        
                            <div class="col-md-12">
                                <table class="table table-bordered" id="tabla_farmacos" width="100%" cellspacing="0">

                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <br>
                        <h3><b>ESCALA DE ALDRETE MODIFICADA</b></h3>
                        <hr>
                    </div>   


                    <div class="col-md-12">
                        <br>
                        <label for="" aline="center"><b>ACTIVIDAD</b></label>
                        <hr>
                            <div class="col-md-4">
                                <label for=""><b>MUEVE VOLUNTARIAMENTE 4 EXTREMIDADES</b></label>
                                <input type="text" class="form-control form-control-user" name="extremidades4_edit" id="extremidades4_edit">
                                <label class='container-check'>
                                    <input type='checkbox' name='extre4_verify' class='checkitem chk-col-blue' id='extr4_verify' value='1'>
                                    <span class='checkmark'></span>
                                    <label for=''></label>
                                </label>
                            </div>
                            <div class="col-md-2">
                                <label for=""><b>MUEVE VOLUNTARIAMENTE 2 EXTREMIDADES</b></label>
                                <input type="text" class="form-control form-control-user" name="extremidades2_edit" id="extremidades2_edit">
                                <label class='container-check'>
                                    <input type='checkbox' name='extre2_verify' class='checkitem chk-col-blue' id='extre2_verify' value='1'>
                                    <span class='checkmark'></span>
                                    <label for=''></label>
                                </label>
                            </div>
                            <div class="col-md-2">
                                <label for=""><b>INCAPAZ DE MOVER EXTREMIDADES</b></label>
                                <input type="text" class="form-control form-control-user" name="extremidades_edit" id="extremidades_edit">
                                <label class='container-check'>
                                    <input type='checkbox' name='extre_verify' class='checkitem chk-col-blue' id='extre_verify' value='1'>
                                    <span class='checkmark'></span>
                                    <label for=''></label>
                                </label>
                            </div>
                    </div> 


                    <div class="col-md-12">
                        <br>
                        <label for="" aline="center"><b>RESPIRACIÓN</b></label>
                        <hr>
                            <div class="col-md-4">
                                <label for=""><b>RESPIRA PROFUNDAMENTE Y TOSE LIBREMENTE</b></label>
                                <input type="text" class="form-control form-control-user" name="libre_edit" id="libre_edit">
                                <label class='container-check'>
                                    <input type='checkbox' name='libre_verify' class='checkitem chk-col-blue' id='libre_verify' value='1'>
                                    <span class='checkmark'></span>
                                    <label for=''></label>
                                </label>
                            </div>
                            <div class="col-md-2">
                                <label for=""><b>DISNEA A RESPIRACIÓN LIMITADA</b></label>
                                <input type="text" class="form-control form-control-user" name="limitada_edit" id="limitada_edit">
                                <label class='container-check'>
                                    <input type='checkbox' name='respiracion_verify' class='checkitem chk-col-blue' id='respiracion_verify' value='1'>
                                    <span class='checkmark'></span>
                                    <label for=''></label>
                                </label>
                            </div>
                            <div class="col-md-2">
                                <label for=""><b>APNEA</b></label>
                                <input type="text" class="form-control form-control-user" name="apnea_edit" id="apnea_edit">
                                <label class='container-check'>
                                    <input type='checkbox' name='respiracion_verify' class='checkitem chk-col-blue' id='respiracion_verify' value='1'>
                                    <span class='checkmark'></span>
                                    <label for=''></label>
                                </label>
                            </div>
                    </div> 

                    <div class="col-md-12">
                        <br>
                        <label for="" aline="center"><b>CIRCULACIÓN</b></label>
                        <hr>
                            <div class="col-md-4">
                                <label for=""><b>TA +20% DEL NIVEL PRE SEDACIÓN</b></label>
                                <input type="text" class="form-control form-control-user" name="sedacion_edit" id="sedacion_edit">
                                <label class='container-check'>
                                    <input type='checkbox' name='sedacion_verify' class='checkitem chk-col-blue' id='sedacion_verify' value='1'>
                                    <span class='checkmark'></span>
                                    <label for=''></label>
                                </label>
                            </div>
                            <div class="col-md-2">
                                <label for=""><b>TA 20-49% DEL NIVEL PRE SEDACIÓN</b></label>
                                <input type="text" class="form-control form-control-user" name="presed_edit" id="presed_edit">
                                <label class='container-check'>
                                    <input type='checkbox' name='respiracion_verify' class='checkitem chk-col-blue' id='respiracion_verify' value='1'>
                                    <span class='checkmark'></span>
                                    <label for=''></label>
                                </label>
                            </div>
                            <div class="col-md-2">
                                <label for=""><b>TA -50% DEL NIVEL PRE SEDACIÓN</b></label>
                                <input type="text" class="form-control form-control-user" name="pre_sedacion_edit" id="pre_sedacion_edit">
                                <label class='container-check'>
                                    <input type='checkbox' name='pre_sedacion_verify' class='checkitem chk-col-blue' id='pre_sedacion_verify' value='1'>
                                    <span class='checkmark'></span>
                                    <label for=''></label>
                                </label>
                            </div>
                    </div> 


                    <div class="col-md-12">
                        <br>
                        <label for="" aline="center"><b>CONSCIENCIA</b></label>
                        <hr>
                            <div class="col-md-4">
                                <label for=""><b>COMPLETAMENTE DESPIERTO</b></label>
                                <input type="text" class="form-control form-control-user" name="despierto_edit" id="despierto_edit">
                                <label class='container-check'>
                                    <input type='checkbox' name='despierto_verify' class='checkitem chk-col-blue' id='despierto_verify' value='1'>
                                    <span class='checkmark'></span>
                                    <label for=''></label>
                                </label>
                            </div>
                            <div class="col-md-2">
                                <label for=""><b>RESPONDE A LA LLAMADA</b></label>
                                <input type="text" class="form-control form-control-user" name="responde_edit" id="responde_edit">
                                <label class='container-check'>
                                    <input type='checkbox' name='responde_verify' class='checkitem chk-col-blue' id='responde_verify' value='1'>
                                    <span class='checkmark'></span>
                                    <label for=''></label>
                                </label>
                            </div>
                            <div class="col-md-2">
                                <label for=""><b>NO RESPONDE</b></label>
                                <input type="text" class="form-control form-control-user" name="noresponde_edit" id="noresponde_edit">
                                <label class='container-check'>
                                    <input type='checkbox' name='noresponde_verify' class='checkitem chk-col-blue' id='noresponde_verify' value='1'>
                                    <span class='checkmark'></span>
                                    <label for=''></label>
                                </label>
                            </div>
                    </div> 
                </div>

            <div class="col-md-12">    
                    <div class="col-md-12">
                        <br>
                        <h3>Observaciones</h3>
                        <hr>
                    </div>
                <div class="col-md-12">
                    <div class="col-md-4">
                        <input type="text" name="fechatoma" class="form-control form-control-user" id="fechatoma_edit">
                    </div>
                </div>
            </div>

            <center>

                <button type="button" class="btn btn-danger btn-user" onclick="prevClient('#cuadro4')">
                    Limpiar
                </button>
                <button class="btn btn-primary btn-user">
                    Guardar
                </button>
            </center>

</div>