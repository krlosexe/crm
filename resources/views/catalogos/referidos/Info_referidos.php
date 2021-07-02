
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for=""><b>Estado</b></label>
                                        <select name="state" id="state_edit" class="form-control select2" required>
                                            <option value="">Seleccione</option>
                                            <option value="Afiliada">Afiliada</option>
                                            <option value="Agendada">Agendada</option>
                                            <option value="Aprobada">Aprobada</option>
                                            <option value="Aprobada - Descartada">Aprobada - Descartada</option>
                                            <option value="Asesorada No Agendada"> Asesorada No Agendada</option>
                                            <option value="Asesorado por FB esperando contacto Telefonico">Asesorado por FB esperando contacto Telefonico</option>
                                            <option value="Demandada">Demandada</option>
                                            <option value="Descartada">Descartada</option>
                                            <option value="Llamada no Asesorada">Llamada no Asesorada</option>
                                            <option value="No Asistio">No Asistio</option>
                                            <option value="No Contactada">No Contactada</option>
                                            <option value="No Contesta">No Contesta</option>
                                            <option value="Numero Equivocado">Numero Equivocado</option>
                                            <option value="Operada">Operada</option>
                                            <option value="Procedimiento">Procedimiento</option>
                                            <option value="Programada">Programada</option>
                                            <option value="Re Agendada a Valoracion">Re Agendada a Valoracion</option>
                                            <option value="Valorada">Valorada</option>
                                            <option value="Valorada / Descartada">Valorada / Descartada</option>
                                            <option value="En mora">En mora</option>
                                            <option value="Al Dia">Al Dia</option>
                                        </select>
                                    </div>
                                </div>
                            </div>



                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for=""><b>Nombres y Apellidos</b></label>
                                        <input type="text" name="nombres" class="form-control form-control-user" id="nombre_edit" placeholder="PJ. Carlos Javier" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <label for=""><b>Numero de identificacion</b></label>
                                        <input type="text" name="identificacion" class="form-control form-control-user" id="identificacion_edit" placeholder="PJ. 23559081154">
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="identificacion_verify"><b>Cédula Verificada?</b></label>
                                        <label class='container-check'>
                                            <input type='checkbox' name='identificacion_verify' class='checkitem chk-col-blue' id='identificacion_verify_edit' value='1'>
                                            <span class='checkmark'></span>
                                            <label for=''></label>
                                        </label>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <label for=""><b>Fecha de Nacimiento</b></label>
                                        <input type="date" name="fecha_nacimiento" class="form-control" id="fecha_nacimiento_edit" placeholder="PJ. Cardenas">
                                    </div>
                                </div>


                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for=""><b>Edad</b></label>
                                        <input type="text" name="year" class="form-control" id="year_edit" disabled>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for=""><b>Ciudad</b></label>
                                        <select name="city" id="city_edit" class="form-control" required>
                                            <option value="">Seleccione</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for=""><b>Clinica</b></label>
                                        <select name="clinic" id="clinic_edit" class="form-control" required>
                                            <option value="">Seleccione</option>
                                        </select>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <label for=""><b>Telefono</b></label>
                                        <input type="text" name="telefono" class="form-control form-control-user" id="telefono_edit" placeholder="PJ. 315 2077862" required>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <br>
                                    <button type="button" id="add_phone_edit" class="btn btn-primary"><i class="fa fa-plus"></i></button>
                                </div>
                            </div>

                            <hr>

                            <div class="row">
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <label for=""><b>E-mail</b></label>
                                        <input type="text" name="email" class="form-control form-control-user" id="email_edit" placeholder="PJ. correo@dominio.com" required>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <br>
                                    <button type="button" id="add_email_edit" class="btn btn-primary"><i class="fa fa-plus"></i></button>
                                </div>

                            </div>


                            <hr>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for=""><b>Origen</b></label>
                                            <input type="text" name="origen" class="form-control form-control-user" id="origen_edit">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for=""><b>Forma de pago (Contado/Financiación)</b></label>
                                            <input type="text" name="forma_pago" class="form-control form-control-user" id="forma_pago_edit">
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for=""><b>Facebook</b></label>
                                            <input type="text" name="facebook" class="form-control form-control-user" id="facebook_edit">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for=""><b>Instagram</b></label>
                                            <input type="text" name="instagram" class="form-control form-control-user" id="instagram_edit">
                                        </div>
                                    </div>



                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for=""><b>Twitter</b></label>
                                            <input type="text" name="twitter" class="form-control form-control-user" id="twitter_edit">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for=""><b>Youtube</b></label>
                                            <input type="text" name="youtube" class="form-control form-control-user" id="youtube_edit">
                                        </div>
                                    </div>



                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label for=""><b>Link Fotos de Google</b></label>
                                            <input type="text" name="photos_google" class="form-control form-control-user" id="photos_google_edit">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for=""><b>PRP</b></label>
                                            <select name="prp" id="prp_edit" class="form-control">
                                                <option value="No">No</option>
                                                <option value="Si">Si</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                     
