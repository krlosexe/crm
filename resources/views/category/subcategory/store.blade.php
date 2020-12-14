<div class="card shadow mb-4 hidden" id="cuadro2">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Registro de Sub Categorias</h6>
    </div>
    <div class="card-body">
        <form class="user" autocomplete="off" method="post" id="store" enctype="multipart/form-data">
            @csrf

            <div class="row">

                <div class="col-md-6">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for=""><b>Categorias</b></label>
                                <select name="categoria" id="category-store" class="form-control select2" required>
                                    <option value="">Seleccione</option>
                                </select>
                            </div>
                        </div>

                        <!-- <div class="col-md-3"> -->
								<div class="form-group ml-4">
										<label for="use_app"><b>Visible</b></label>
										<div class="custom-control custom-switch">
											<input type="checkbox" class="custom-control-input" name="use_app" id="use_app" value="1">
											<label class="custom-control-label" for="use_app"></label>
										</div>
									</div>
								<!-- </div> -->
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for=""><b>Nombre</b></label>
                                <input type="text" name="name" id="issue-store" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for=""><b>Nombre en Ingles</b></label>
                                <input type="text" name="name_ingles" id="issue-store" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    
                    <small>Seleccione una foto de portada</small>
                    <div class="col-md-8">
                        <div class="kv-avatar">
                            <div class="file-loading">
                                <input id="avatar-1" name="img-profile" type="file" required>
                            </div>
                        </div>
                        <div class="kv-avatar-hintss">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <small>Seleccione una foto del antes</small>
                            <div class="kv-avatar">
                                <div class="file-loading">
                                    <input id="avatar-antes" name="img-profile-antes" type="file">
                                </div>
                            </div>
                            <div class="kv-avatar-hintss">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <small>Seleccione una foto del despues</small>
                            <div class="kv-avatar">
                                <div class="file-loading">
                                    <input id="avatar-despues" name="img-profile-despues" type="file">
                                </div>
                            </div>
                            <div class="kv-avatar-hintss">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for=""><b>Comentarios</b></label>
                                <!-- <textarea name="observaciones" id="observaciones-store" class="form-control" cols="30" rows="5"></textarea> -->
                                <textarea id="summernote" name="comments"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <input type="hidden" name="id_user" class="id_user">
            <input type="hidden" name="token" class="token">
            <br>
            <br>
    </div>
    <center>

        <button type="button" class="btn btn-danger btn-user" onclick="prev('#cuadro2')">
            Cancelar
        </button>
        <button type="submit" id="send_usuario" class="btn btn-primary btn-user">
            Registrar
        </button>

    </center>
    <br>
    <br>
    </form>

</div>