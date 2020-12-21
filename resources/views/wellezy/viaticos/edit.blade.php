<div class="card shadow mb-4 hidden" id="cuadro4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Editar Viaticos</h6>
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
                                <select name="services" id="services-edit" class="form-control select2" required>
                                    <option value="">Seleccione</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for=""><b>Titulo</b></label>
                                <input type="text" name="title" id="title-edit" class="form-control" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                    <div class="col-md-6">
                            <div class="form-group">
                                <label for=""><b>Costo</b></label>
                                <input type="text" name="costo" id="costo-edit" class="form-control" required>
                            </div>
                        </div>
                    </div>

                    <small>Seleccione una foto</small>
                    <div class="col-md-8">
                        <div class="kv-avatar">
                            <div class="file-loading">
                                <input id="avatar-edit" name="img-profile-one" type="file">
                            </div>
                        </div>
                        <div class="kv-avatar-hintss">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <small>Seleccione una foto</small>
                            <div class="kv-avatar">
                                <div class="file-loading">
                                    <input id="avatar-edit-antes" name="img-profile-two" type="file">
                                </div>
                            </div>
                            <div class="kv-avatar-hintss">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <small>Seleccione una foto</small>
                            <div class="kv-avatar">
                                <div class="file-loading">
                                    <input id="avatar-edit-despues" name="img-profile-three" type="file">
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