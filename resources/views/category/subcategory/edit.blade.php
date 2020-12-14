<div class="card shadow mb-4 hidden" id="cuadro4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Editar Sub Categorias</h6>
    </div>
    <div class="card-body">
        <form class="user" autocomplete="off" method="post" id="form-update" enctype="multipart/form-data">

            @csrf

            <input type="hidden" name="_method" value="put">

            <div class="row">

                <div class="col-md-5">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for=""><b>Categorias</b></label>
                                <select name="categoria" id="category-edit" class="form-control select2" required>
                                    <option value="">Seleccione</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group ml-4">
                            <label for="use_app"><b>Solo los que usan el App</b></label>
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" name="use_app" id="use_app_edit" value="1">
                                <label class="custom-control-label" for="use_app"></label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for=""><b>Nombre</b></label>
                                <input type="text" name="name" id="cat-name-edit" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for=""><b>Nombre en Ingles</b></label>
                                <input type="text" name="name_ingles" id="cat-ingles-edit" class="form-control" required>
                            </div>
                        </div>
                    </div>

                    <small>Seleccione una foto de portada</small>
                    <div class="col-md-8">
                        <div class="kv-avatar">
                            <div class="file-loading">
                                <input id="avatar-edit" name="img-profile" type="file">
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
                                    <input id="avatar-edit-antes" name="img-profile-before" type="file">
                                </div>
                            </div>
                            <div class="kv-avatar-hintss">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <small>Seleccione una foto del despues</small>
                            <div class="kv-avatar">
                                <div class="file-loading">
                                    <input id="avatar-edit-despues" name="img-profile-after" type="file">
                                </div>
                            </div>
                            <div class="kv-avatar-hintss">
                            </div>
                        </div>
                    </div>
                </div>


                    <div class="col-md-7">
                        <div class="row">
                            <div class="col-md-2">
                            </div>
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label for=""><b>Comentarios</b></label>
                                    <textarea id="summernote_edit" name="comments"></textarea>
                                </div>
                            </div>
                        </div>
                        <br><br>
                        <!-- <input type="hidden" name="id_cliente" id="id_cliente_edit"> -->
                        <br><br>
                        <div class="row">
                            <div class="col-md-2">
                        </div>
                    </div>
                </div>
            </div>

            <!-- <input type="hidden" name="inicial" id="inicial"> -->
            <input type="hidden" name="id_user" class="id_user">
            <input type="hidden" name="token" class="token">

            <input type="hidden" name="id_user_edit" id="id_edit">


            <br>
            <br>
    </div>
    <center>

        <button type="button" class="btn btn-danger btn-user" onclick="prev('#cuadro4')">
            Cancelar
        </button>
        <button class="btn btn-primary btn-user">
            Guardar
        </button>

    </center>
    <br>
    <br>
    </form>

</div>