                <div class="row">    
                    <div class="col-md-12">
                        <hr>
                    </div>
                    
                    <div class="form-group col-md-4">
                        <label for=""><b>Ayuno de 6-8 horas para Solidos</b></label>
                                        <select name="solidos1" id="solidos1_edit" class="form-control select2">
                                            <option value="">Seleccione</option>
                                            <option value="SI">SI</option>
                                            <option value="NO">NO</option>
                                        </select>
                    </div>

                    <div class="form-group col-md-4">
                        <label for=""><b>Ayuno de 6-8 horas para Solidos</b></label>
                                        <select name="solidos2" id="solidos2_edit" class="form-control select2">
                                            <option value="">Seleccione</option>
                                            <option value="SI">SI</option>
                                            <option value="NO">NO</option>
                                        </select>
                    </div>

                </div>

                <div class="col-md-12">
                    <div class="col-md-12">
                        <br>
                        <h3>MOTIVO DE LA CONSULTA</h3>
                        <hr>
                    </div>
                    <div class="form-group col-md-12">
                        <input type="text" name="motivo_consulta" class="form-control form-control-user" id="motivo_consulta_edit">
                    </div>
                </div>


                <div class="col-md-12">
                    <div class="col-md-12">
                    <br>
                        <h3>ANTECEDENTES ALERGICOS</h3>
                        <hr>
                    </div>
                    <br>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group valid-required">
                                <input type="text" class="form-control form-control-user" name="alergicos_edit" id="alergicos_edit">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group valid-required">
                                <input type="text" class="form-control form-control-user" name="aler_edit" id="aler_edit">
                            </div>
                        </div>

                        <div class="col-md-4">
                        
                            <button type="button" id="btn_alergicos" class="btn btn-primary btn-user">
                            Agregar <i class="fa fa-pl"></i>
                            </button>
                        </div>

                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-bordered" id="table_alergicos" width="100%" cellspacing="0">

                                        <thead>
                                            <tr>
                                            <th>Item</th>
                                            <th>Observación</th>
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




                <div class="col-md-12">
                    <div class="col-md-12">
                        <br>
                        <h3>ANTECEDENTES FAMILIARES</h3>
                        <hr>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group valid-required">
                                <input type="text" class="form-control form-control-user" name="familiares_edit" id="familiares_edit">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group valid-required">
                                <input type="text" class="form-control form-control-user" name="fami_edit" id="fami_edit">
                            </div>
                        </div>
                        <div class="col-md-4">
                        
                            <button type="button" id="btn_familiares" class="btn btn-primary btn-user">
                            Agregar <i class="fa fa-pl"></i>
                            </button>
                        </div>

                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-bordered" id="table_familiares" width="100%" cellspacing="0">

                                        <thead>
                                            <tr>
                                            <th>Item</th>
                                            <th>Observación</th>
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


                

                <div class="col-md-12">
                    <div class="col-md-12">
                        <br>
                        <h3>ANTECEDENTES PATOLÓGICOS</h3>
                        <hr>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group valid-required">
                                <input type="text" class="form-control form-control-user" name="patologicos_edit" id="patologicos_edit">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group valid-required">
                                <input type="text" class="form-control form-control-user" name="pato_edit" id="pato_edit">
                            </div>
                        </div>
                        <div class="col-md-4">
                        
                            <button type="button" id="btn_patologicos" class="btn btn-primary btn-user">
                            Agregar <i class="fa fa-pl"></i>
                            </button>
                        </div>

                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-bordered" id="table_patologicos" width="100%" cellspacing="0">

                                        <thead>
                                            <tr>
                                            <th>Item</th>
                                            <th>Observación</th>
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

                <div class="col-md-12">
                    <div class="col-md-12">
                        <br>
                        <h3>ANTECEDENTES QUIRÚRGICOS</h3>
                        <hr>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group valid-required">
                                <input type="text" class="form-control form-control-user" name="quirurgicos_edit" id="quirurgicos_edit">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group valid-required">
                                <input type="text" class="form-control form-control-user" name="quirur_edit" id="quirur_edit">
                            </div>
                        </div>
                        <div class="col-md-4">
                        
                            <button type="button" id="btn_quirurgicos" class="btn btn-primary btn-user">
                            Agregar <i class="fa fa-pl"></i>
                            </button>
                        </div>

                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-bordered" id="table_quirurgicos" width="100%" cellspacing="0">

                                        <thead>
                                            <tr>
                                            <th>Item</th>
                                            <th>Observación</th>
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

                <div class="col-md-12">
                    <div class="col-md-12">
                        <br>
                        <h3>ANTECEDENTES TOXICOLÓGICOS</h3>
                        <hr>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group valid-required">
                                <input type="text" class="form-control form-control-user" name="toxicologicos_edit" id="toxicologicos_edit">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group valid-required">
                                <input type="text" class="form-control form-control-user" name="obs_toxico_edit" id="obs_toxico_edit">
                            </div>
                        </div>
                        <div class="col-md-4">
                        
                            <button type="button" id="btn_toxicologicos" class="btn btn-primary btn-user">
                            Agregar <i class="fa fa-pl"></i>
                            </button>
                        </div>

                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-bordered" id="table_toxicologicos" width="100%" cellspacing="0">

                                        <thead>
                                            <tr>
                                            <th>Item</th>
                                            <th>Observación</th>
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
                        <h3>MONITORIZACIÓN</h3>
                        <hr>
                    </div>

                    <div class="col-md-4">
                        <label for=""><b>SIGNOS VITALES DE INGRESO</b></label>
                    </div>

                <div class="row">
                   
                    <div class="form-group col-md-2">
                    <br>
                        <label for=""><b>Tension Arterial</b></label>
                        <input type="text" name="tension_arteria" class="form-control form-control-user" id="tension_arteria_edit">
                    </div>

                    <div class="form-group col-md-2">
                    <br>
                        <label for=""><b>Frecuencia Cardiaca</b></label>
                        <input type="text" name="frecuencia_cardiaca" class="form-control form-control-user" id="frecuencia_cardiaca_edit">
                    </div>

                    <div class="form-group col-md-2">
                    <br>
                        <label for=""><b>Peso</b></label>
                        <input type="text" name="peso_inicio" class="form-control form-control-user" id="peso_inicio_edit">
                    </div>

                    <div class="form-group col-md-2">
                    <br>
                        <label for=""><b>Talla</b></label>
                        <input type="text" name="talla_inicio" class="form-control form-control-user" id="talla_inicio_edit">
                    </div>
                    
                    <div class="form-group col-md-2">
                    <br>
                        <label for=""><b>IMC</b></label>
                        <input type="text" name="imc_edit" class="form-control form-control-user" id="imcdata_edit">
                    </div>
                    <div class="form-group col-md-2">
                        <label for=""><b>Clasificación del Riesgo ASA</b></label>
                        <input type="text" name="clasificacion_asa" class="form-control form-control-user" id="clasificacion_asa_edit">
                    </div>

                </div>
            </div>

            <div class="col-md-18">
                    <div class="col-md-18">
                        <br>
                        <hr>
                    </div>

                        <div class="row">
                            <div class="col-md-2">
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
                            <div class="col-md-2">
                                <div class="form-group valid-required">
                                    <input type="text" class="form-control form-control-user" name="Farmaco" id="Farmaco_edit">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group valid-required">
                                    <input type="text" class="form-control form-control-user" name="dosis_edit" id="dosis_edit">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group valid-required">
                                    <input type="text" class="form-control form-control-user" name="ta_edit" id="ta_edit">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group valid-required">
                                    <input type="text" class="form-control form-control-user" name="Fc_edit" id="Fc_edit">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group valid-required">
                                    <input type="text" class="form-control form-control-user" name="sat02_edit" id="sat02_edit">
                                </div>
                            </div>                    
                            <div class="col-md-2">
                                <div class="form-group valid-required">
                                    <input type="text" class="form-control form-control-user" name="ramsay_edit" id="ramsay_edit">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <button type="button" id="btn_farmacos" class="btn btn-primary btn-user">
                                    Agregar <i class="fa fa-pl"></i>
                                </button>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-bordered" id="table_farmacos" width="100%" cellspacing="0">

                                        <thead>
                                            <tr>
                                            <th>Tiempo</th>
                                            <th>Farmaco</th>
                                            <th>Dosis</th>
                                            <th>TA</th>
                                            <th>Fc</th>
                                            <th>Sat. 02%</th>
                                            <th>Ramsay</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
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
                        <h3><b>ACTIVIDAD</b></h3>
                        <hr>
                            <div class="row">
                                <div class="form-group col-md-4">
                                <br>
                                    <label for=""><b>MUEVE VOLUNTARIAMENTE 4 EXTREMIDADES</b></label>
                                </div>
                                <div class="form-group col-md-4">
                                    <input type="text" class="form-control form-control-user" name="extremidades4_edit" id="extremidades4_edit">
                                </div>
                                <div class="form-group col-md-4">
                                <br>
                                <label class='container-check'>
                                    <input type='checkbox' name='extremidades_check' class='checkitem chk-col-blue' id='extr4_verify' value='1'>
                                    <span class='checkmark'></span>
                                    <label for=''></label>
                                </label>
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for=""><b>MUEVE VOLUNTARIAMENTE 2 EXTREMIDADES</b></label>
                                </div>
                                <div class="form-group col-md-4">
                                    <input type="text" class="form-control form-control-user" name="extremidades2_edit" id="extremidades2_edit">
                                </div>
                                <div class="form-group col-md-4">
                                <label class='container-check'>
                                    <input type='checkbox' name='extremidades_check' class='checkitem chk-col-blue' id='extre2_verify' value='1'>
                                    <span class='checkmark'></span>
                                    <label for=''></label>
                                </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for=""><b>INCAPAZ DE MOVER EXTREMIDADES</b></label>
                                </div>
                                <div class="form-group col-md-4">
                                    <input type="text" class="form-control form-control-user" name="extremidades_edit" id="extremidades_edit">
                                </div>
                                <div class="form-group col-md-4">
                                <label class='container-check'>
                                    <input type='checkbox' name='extremidades_check' class='checkitem chk-col-blue' id='extre_verify' value='1'>
                                    <span class='checkmark'></span>
                                    <label for=''></label>
                                </label>
                                </div>
                                
                            </div>
                    </div> 


                    <div class="col-md-12">
                        <br>
                        <h3><b>RESPIRACIÓN</b></h3>
                        <hr>
                        
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for=""><b>RESPIRA PROFUNDAMENTE Y TOSE LIBREMENTE</b></label>
                                </div>
                                <div class="form-group col-md-4">
                                    <input type="text" class="form-control form-control-user" name="libre_edit" id="libre_edit">
                                </div>
                                <div class="form-group col-md-4">
                                <label class='container-check'>
                                    <input type='checkbox' name='libre_verify' class='checkitem chk-col-blue' id='libre_verify' value='1'>
                                    <span class='checkmark'></span>
                                    <label for=''></label>
                                </label>
                                </div>
                            </div>
                            <div class="row">
                            <div class="form-group col-md-4">
                                <label for=""><b>DISNEA A RESPIRACIÓN LIMITADA</b></label>
                            </div>
                            <div class="form-group col-md-4">
                                <input type="text" class="form-control form-control-user" name="limitada_edit" id="limitada_edit">
                            </div>
                            <div class="form-group col-md-4">
                                <label class='container-check'>
                                    <input type='checkbox' name='respiracion_verify' class='checkitem chk-col-blue' id='respiracion_verify' value='1'>
                                    <span class='checkmark'></span>
                                    <label for=''></label>
                                </label>
                            </div>
                            </div>
                            <div class="row">
                            <div class="form-group col-md-4">
                                <label for=""><b>APNEA</b></label>
                            </div>
                            <div class="form-group col-md-4">
                                <input type="text" class="form-control form-control-user" name="apnea_edit" id="apnea_edit">
                            </div>
                            <div class="form-group col-md-4">
                                <label class='container-check'>
                                    <input type='checkbox' name='apnea_verify' class='checkitem chk-col-blue' id='apnea_verify' value='1'>
                                    <span class='checkmark'></span>
                                    <label for=''></label>
                                </label>
                            </div> 
                            </div>                       
                    </div> 

                    <div class="col-md-12">
                        <br>
                        <h3><b>CIRCULACIÓN</b></h3>
                        <hr>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for=""><b>TA +20% DEL NIVEL PRE SEDACIÓN</b></label>
                                </div>
                                <div class="form-group col-md-4">
                                    <input type="text" class="form-control form-control-user" name="sedacion_edit" id="sedacion_edit">
                                </div>
                                <div class="form-group col-md-4">
                                <label class='container-check'>
                                    <input type='checkbox' name='sedacion_verify' class='checkitem chk-col-blue' id='sedacion_verify' value='1'>
                                    <span class='checkmark'></span>
                                    <label for=''></label>
                                </label>
                                </div>
                            </div>
                            <div class="row">
                            <div class="form-group col-md-4">
                                <label for=""><b>TA 20-49% DEL NIVEL PRE SEDACIÓN</b></label>
                            </div>
                            <div class="form-group col-md-4">
                                <input type="text" class="form-control form-control-user" name="presed_edit" id="presed_edit">
                            </div>
                            <div class="form-group col-md-4">
                                <label class='container-check'>
                                    <input type='checkbox' name='respiracion_verify' class='checkitem chk-col-blue' id='respiracion_verify' value='1'>
                                    <span class='checkmark'></span>
                                    <label for=''></label>
                                </label>
                            </div>
                            </div>
                            <div class="row">
                            <div class="form-group col-md-4">
                                <label for=""><b>TA -50% DEL NIVEL PRE SEDACIÓN</b></label>
                            </div>
                            <div class="form-group col-md-4">
                                <input type="text" class="form-control form-control-user" name="pre_sedacion_edit" id="pre_sedacion_edit">
                            </div>
                            <div class="form-group col-md-4">
                                <label class='container-check'>
                                    <input type='checkbox' name='pre_sedacion_verify' class='checkitem chk-col-blue' id='pre_sedacion_verify' value='1'>
                                    <span class='checkmark'></span>
                                    <label for=''></label>
                                </label>
                            </div>  
                            </div>
                    </div> 


                    <div class="col-md-12">
                        <br>
                        <label for="" aline="center"><b>CONSCIENCIA</b></label>
                        <hr>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for=""><b>COMPLETAMENTE DESPIERTO</b></label>
                                </div>
                                <div class="form-group col-md-4">
                                    <input type="text" class="form-control form-control-user" name="despierto_edit" id="despierto_edit">
                                </div>
                                <div class="form-group col-md-4">
                                <label class='container-check'>
                                    <input type='checkbox' name='despierto_verify' class='checkitem chk-col-blue' id='despierto_verify' value='1'>
                                    <span class='checkmark'></span>
                                    <label for=''></label>
                                </label>
                                </div>
                            </div>
                            <div class="row">
                            <div class="form-group col-md-4">
                                <label for=""><b>RESPONDE A LA LLAMADA</b></label>
                            </div>
                            <div class="form-group col-md-4">
                                <input type="text" class="form-control form-control-user" name="responde_edit" id="responde_edit">
                            </div>
                            <div class="form-group col-md-4">
                                <label class='container-check'>
                                    <input type='checkbox' name='responde_verify' class='checkitem chk-col-blue' id='responde_verify' value='1'>
                                    <span class='checkmark'></span>
                                    <label for=''></label>
                                </label>
                            </div>
                            </div>
                            <div class="row">
                            <div class="form-group col-md-4">
                                <label for=""><b>NO RESPONDE</b></label>
                            </div>
                            <div class="form-group col-md-4">
                                <input type="text" class="form-control form-control-user" name="noresponde_edit" id="noresponde_edit">
                            </div>
                            <div class="form-group col-md-4">
                                <label class='container-check'>
                                    <input type='checkbox' name='noresponde_verify' class='checkitem chk-col-blue' id='noresponde_verify' value='1'>
                                    <span class='checkmark'></span>
                                    <label for=''></label>
                                </label>
                            </div> 
                            </div>
                    </div> 
                </div>

            <div class="col-md-12">    
                    <div class="col-md-12">
                        <br>
                        <h3>Observaciones</h3>
                        <hr>
                    </div>
                <div class="row">
                    <div class="col-md-12">
                        <input type="text" name="observaciones_edit" class="form-control form-control-user" id="observaciones_edit">
                    </div>
                </div>
            </div>

            <center>

                <button type="button" class="btn btn-danger btn-user" onclick="prevClient('#cuadro4')">
                    Limpiar
                </button>
                <button type="button" class="btn btn-primary btn-user" id="btn-sedacion">
                    Guardar
                </button>
            </center>
