<div class="col-md-12">            
                <div class="row">    
                    <div class="col-md-12">
                        <br>
                        <h3>PERSONAL</h3>
                        <hr>
                    </div>
                    
                    <div class="form-group col-md-4">
                        <label for=""><b>Anestesiólogo Principal</b></label>
                        <input type="text" name="anestesiologo_principal" class="form-control form-control-user" id="anestesiologo_principal_edit">
                    </div>

                    <div class="form-group form-group col-md-4">
                        <label for=""><b>Anestesiólogo Secundario</b></label>
                        <input type="text" name="anestesiologo_secundario" class="form-control form-control-user" id="anestesiologo_secundario_edit">
                    </div>

                    <div class="form-group col-md-4">
                        <label for=""><b>Cirujano Principal</b></label>
                        <input type="text" name="cirujano_principal" class="form-control form-control-user" id="cirujano_principal_edit">
                    </div>

                    <div class="form-group col-md-4">
                        <label for=""><b>Segundo Cirujano</b></label>
                        <input type="text" name="segundo_cirujano" class="form-control form-control-user" id="segundo_cirujano_edit">
                    </div>

                    <div class="form-group col-md-4">
                        <label for=""><b>Instrumentador</b></label>
                        <input type="text" name="instrumentador" class="form-control form-control-user" id="instrumentador_edit">
                    </div>

                    <div class="form-group col-md-4">
                        <label for=""><b>Auxiliar de Sala</b></label>
                        <input type="text" name="aux_sala" class="form-control form-control-user" id="aux_sala_edit">
                    </div>
                </div>


                <div class="row">    
                    <div class="col-md-12">
                        <br>
                        <h3>REGISTRO INTRAOPERATORIO </h3>
                        <hr>
                    </div>
                    <div class="form-group col-md-4">
                        <label for=""><b>Anestesiólogo Principal</b></label>
                        <input type="text" name="anesteintra_principal" class="form-control form-control-user" id="anesteintra_principal_edit">
                    </div>

                    <div class="form-group col-md-4">
                        <label for=""><b>Diagnósticos</b></label>
                        <input type="text" name="diagnóstico" class="form-control form-control-user" id="diagnóstico_edit">
                    </div>
                </div>
                



                
                <div class="col-md-12">
                    <div class="col-md-12">
                    <br>
                        <h3>PREMEDICACIÓN</h3>
                        <hr>
                    </div>
                    <br>


                        <div class="col-md-12">
                            <div class="col-md-4">
                            <br>
                                <label for=""><b>Medicamento</b></label>
                                <div class="form-group valid-required">
                                    <input type="text" class="form-control form-control-user" name="pre_medicamento" id="pre_medicamento">
                                </div>
                            </div>

                                <br><br>
                                <button type="button" id="btn-pre_medicamento" class="btn btn-primary btn-user">
                                    Agregar <i class="fa fa-pl"></i>
                                </button>

                            
                            <div class="col-md-12">
                                <table class="table table-bordered" id="tablprem_edit" width="100%" cellspacing="0">

                                    <thead>
                                        <tr>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>

                        </div>
                        

                </div>   





                <div class="col-md-12">
                    <div class="col-md-12">
                    <br>
                        <h3>MONITORIA</h3>
                        <hr>
                    </div>
                    <br>


                        <div class="col-med-12">
                    
                            <div class="col-md-4">
                            <br>
                                <label for=""><b>Monitoría</b></label>
                                <div class="form-group valid-required">
                                    <input type="text" class="form-control form-control-user" name="monitoria" id="monitoria_edit">
                                </div>
                            </div>

                                <br><br>
                                <button type="button" id="btn-monitoria" class="btn btn-primary btn-user">
                                    Agregar <i class="fa fa-pl"></i>
                                </button>

                        
                            <div class="col-md-4">
                                <table class="table table-bordered" id="tablmonito_edit" width="100%" cellspacing="0">

                                    <thead>
                                        <tr>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>

                       
                        </div>
                       
                </div>   



            
                  
                    <div class="col-md-12">
                        <br>
                        <h3>EVENTOS IOP</h3>
                        <hr>
                    </div>
                   
                <div class="col-md-12">

                    <div class="col-md-4">
                        <label for=""><b>Ayuno (Horas)</b></label>
                        <input type="text" name="ayuno" class="form-control form-control-user" id="ayuno_edit">
                    </div>

                    <div class="col-md-4">
                        <label for=""><b>Déficit</b></label>
                        <input type="text" name="Deficit" class="form-control form-control-user" id="Deficit_edit">
                    </div>

                    <div class="col-md-4">
                        <label for=""><b>Mantenimiento</b></label>
                        <input type="text" name="mante" class="form-control form-control-user" id="mante_edit">
                    </div>
                    <div class="col-md-4">
                        <label for=""><b>Volemia</b></label>
                        <input type="text" name="volemia" class="form-control form-control-user" id="volemia_edit">
                    </div>

                    <div class="col-md-4">
                        <label for=""><b>PPS</b></label>
                        <input type="text" name="pps" class="form-control form-control-user" id="pps_edit">
                    </div>
                </div>
           

                    <div class="col-md-12">
                        <br>
                        <h3>TÉCNICA ANESTÉSICA</h3>
                        <hr>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                                        <label for=""><b>Anestésia</b></label>
                                        <select name="state" id="state_edit" class="form-control select2" required>
                                            <option value="">Seleccione</option>
                                            <option value="general">General Inhalaroria</option>
                                            <option value="intravenosa">Intravenosa</option>
                                            <option value="peridural">Peridural</option>
                                            <option value="espinal">Espinal</option>
                                            <option value="local"> Localcontrolada</option>
                                        </select>
                        </div>

                        <div class="col-md-3">
                            <label for=""><b>Aguja N°</b></label>
                            <input type="text" name="aguja" class="form-control form-control-user" id="aguja_edit">
                        </div>

                        <div class="col-md-3">
                            <label for=""><b>Cateter</b></label>
                            <input type="text" name="cateter" class="form-control form-control-user" id="cateter_edit">
                        </div>

                        <div class="col-md-3">
                            <label for=""><b>Nivel de Punción</b></label>
                            <input type="text" name="puncion" class="form-control form-control-user" id="puncion_edit">
                        </div>
                        
                        <div class="col-md-3">
                            <label for=""><b>Nivel Antiséptico</b></label>
                            <input type="text" name="antiséptico" class="form-control form-control-user" id="antiseptico_edit">
                        </div>

                        <div class="col-md-3">
                            <label for=""><b>Bloqueo</b></label>
                            <input type="text" name="bloqueo" class="form-control form-control-user" id="bloqueo_edit">
                        </div>
                    </div>
                
           


            <div class="row" id="matrix selecionable">

                 

            </div>


            <div class="col-md-12">    
                    <div class="col-md-12">
                        <br>
                        <h3>VÍA AEREA</h3>
                        <hr>
                    </div>
                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for=""><b>Metódo</b></label>
                                        <select name="state" id="metodo_edit" class="form-control select2" required>
                                            <option value="">Seleccione</option>
                                            <option value="canula">Cánula</option>
                                            <option value="mascara">Máscara</option>
                                            <option value="lma">LMA</option>
                                            <option value="frastrach">Frastrach</option>
                                            <option value="proseal"> Proseal</option>
                                            <option value="flexible">Flexible</option>
                                            <option value="iot">IOT</option>
                                            <option value="int">INT</option>
                                            <option value="fobroscopia"> Fibroscopia</option>
                                        </select>
                                    </div>

                
                    <div class="col-md-3">
                        <label for=""><b>Neumo</b></label>
                        <input type="text" name="neumo" class="form-control form-control-user" id="neumo_edit">
                    </div>

                    <div class="col-md-3">
                        <label for=""><b>N°</b></label>
                        <input type="text" name="nuemon" class="form-control form-control-user" id="neumon_edit">
                    </div>

                    <div class="col-md-3">
                        <label for=""><b>Tubo Doble Luz</b></label>
                        <input type="text" name="tdl" class="form-control form-control-user" id="tdl_edit">
                    </div>

                    <div class="col-md-3">
                        <label for=""><b>N°</b></label>
                        <input type="text" name="tdln" class="form-control form-control-user" id="tdln_edit">
                    </div>

                </div>
            </div>

                <div class="row" id="tablasecuencial">




                </div>



                <div class="row" id="tablasecuencial2">




                </div>


            <div class="col-md-12">    
                    <div class="col-md-12">
                        <br>
                        <h3>EVENTOS- DATOS INTRAOPERATORIOS</h3>
                        <hr>
                    </div>

                <div class="col-md-12">
                    
                    <div class="col-md-3">
                        <label for=""><b>N°</b></label>
                        <div class="form-group valid-required">
                            <input type="text" class="form-control form-control-user" name="nevento" id="nevento_edit">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <label for=""><b>Descripcion</b></label>
                        <div class="form-group valid-required">
                            <input type="text" class="form-control form-control-user" name="descripcion" id="descripcion">
                        </div>
                    </div>


                    <div class="col-md-3">
                    <br>
                        <button type="button" id="eventos_intraoperatorios" class="btn btn-primary btn-user">
                            Agregar <i class="fa fa-pl"></i>
                        </button>
                    </div>
                </div>
                    <div class="col-md-12">
                        
                            <div class="col-md-12">
                                <table class="table table-bordered" id="intraoperatorio" width="100%" cellspacing="0">

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
            </div>    


            <div class="col-md-12">    
                    <div class="col-md-12">
                        <br>
                        <h3>GASES SANGUINEOS</h3>
                        <hr>
                    </div>
                <div class="col-md-12">
                    <div class="col-md-4">
                        <label for=""><b>Fecha de la Toma</b></label>
                        <input type="text" name="fechatoma" class="form-control form-control-user" id="fechatoma_edit">
                    </div>

                    <div class="col-md-4">
                        <label for=""><b>pH</b></label>
                        <input type="text" name="ph" class="form-control form-control-user" id="ph_edit">
                    </div>

                    <div class="col-md-4">
                        <label for=""><b>pCO2</b></label>
                        <input type="text" name="pco2" class="form-control form-control-user" id="pco2_edit">
                    </div>

                    <div class="col-md-4">
                        <label for=""><b>paO2</b></label>
                        <input type="text" name="pao2" class="form-control form-control-user" id="pao2_edit">
                    </div>

                    <div class="col-md-4">
                        <label for=""><b>HCO2</b></label>
                        <input type="text" name="hco2" class="form-control form-control-user" id="hco2_edit">
                    </div>
                    
                    <div class="col-md-4">
                        <label for=""><b>SAT</b></label>
                        <input type="text" name="sat" class="form-control form-control-user" id="sat_edit">
                    </div>

                    <div class="col-md-4">
                        <label for=""><b>BE</b></label>
                        <input type="text" name="be" class="form-control form-control-user" id="be_edit">
                    </div>

                    <div class="col-md-4">
                        <label for=""><b>LACT</b></label>
                        <input type="text" name="lact" class="form-control form-control-user" id="lact_edit">
                    </div>

                </div>
            </div>


            
                    <div class="col-md-12">
                        <br>
                        <h3>BALANCE DE LÍQUIDOS</h3>
                        <hr>
                    </div>

                <div class="col-md-6">
                    <div class="col-md-12">
                        <br>
                        <h3>Eliminados</h3>
                        <hr>
                    </div>
                    <div class="form-group col-md-12">
                        <label for=""><b>Deficit</b></label>
                        <input type="text" name="deficit" class="form-control form-control-user" id="deficit_edit">
                    </div>                    
                    <div class="form-group col-md-12">
                        <label for=""><b>Pérdidas</b></label>
                        <input type="text" name="perdidas" class="form-control form-control-user" id="perdidas_edit">
                    </div>                    
                    <div class="form-group col-md-12">
                        <label for=""><b>Diueresis</b></label>
                        <input type="text" name="diueresis" class="form-control form-control-user" id="diueresis_edit">
                    </div>                    
                    <div class="form-group col-md-12">
                        <label for=""><b>Sangrado</b></label>
                        <input type="text" name="sangrado" class="form-control form-control-user" id="Sangrado_edit">
                    </div>                    
                    <div class="form-group col-md-12">
                        <label for=""><b>Otros</b></label>
                        <input type="text" name="otros" class="form-control form-control-user" id="otros_edit">
                    </div>                    
                    <div class="form-group col-md-12">
                        <label for=""><b>Total</b></label>
                        <input type="text" name="total_eliminados" class="form-control form-control-user" id="total_eliminados_edit">
                    </div>

                </div>
            
                <div class="col-md-6">
                    <div class="col-md-12">
                        <br>
                        <h3>Método</h3>
                        <hr>
                    </div>
                    <div class="form-group col-md-12">
                        <label for=""><b>Lactato Ringer</b></label>
                        <input type="text" name="ringer" class="form-control form-control-user" id="ringer_edit">
                    </div>                    
                    <div class="form-group col-md-12">
                        <label for=""><b>Solución Salina</b></label>
                        <input type="text" name="salinas" class="form-control form-control-user" id="salinas_edit">
                    </div>                    
                    <div class="form-group col-md-12">
                        <label for=""><b>Coloides</b></label>
                        <input type="text" name="coloides" class="form-control form-control-user" id="coloides_edit">
                    </div>                    
                    <div class="form-group col-md-12">
                        <label for=""><b>Sangre</b></label>
                        <input type="text" name="sangre" class="form-control form-control-user" id="sangre_edit">
                    </div>             
                    <div class="form-group col-md-12">
                        <label for=""><b>Glóbulos Rojos</b></label>
                        <input type="text" name="rojos" class="form-control form-control-user" id="rojos_edit">
                    </div>                    
                    <div class="form-group col-md-12">
                        <label for=""><b>Otros</b></label>
                        <input type="text" name="Otros" class="form-control form-control-user" id="Otros_edit">
                    </div>
                    <div class="form-group col-md-12">
                        <label for=""><b>Total</b></label>
                        <input type="text" name="total_metodo" class="form-control form-control-user" id="total_metodo_edit">
                    </div>

                </div>
            



                
                    <div class="col-md-12">
                        <br>
                        <h3>TRASLADADO A</h3>
                        <hr>


                        <div class="col-md-12">
                            <div class="col-md-12">
                            <br>
                                <div class="form-group valid-required">
                                    <input type="text" class="form-control form-control-user" name="traslado" id="traslado">
                                </div>
                            </div>

                                <br><br>
                                <button type="button" id="traslado" class="btn btn-primary btn-user">
                                    Agregar <i class="fa fa-pl"></i>
                                </button>

                            
                            <div class="col-md-12">
                                <table class="table table-bordered" id="traslado" width="100%" cellspacing="0">

                                    <thead>
                                        <tr>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
     

                



        </div>

                
                    

