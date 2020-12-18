<div class="card shadow mb-4 hidden" id="cuadro4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Editar de Servicios</h6>
    </div>
    <div class="card-body">
        <form class="user" autocomplete="off" method="post" id="form-update" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="_method" value="put">
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for=""><b>Nombre</b></label>
                                <input type="text" name="name" id="issue-edit" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for=""><b>Nombre en Ingles</b></label>
                                <input type="text" name="name_ingles" id="issue-edit-english" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-8">
                            <div class="kv-avatar">
                                <div class="file-loading">
                                    <input id="avatar-edit" name="img-profile" type="file">
                                </div>
                            </div>
                            <div class="kv-avatar-hintss">
                                <small>Seleccione una foto</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>

    <input type="hidden" name="id_user" class="id_user">
    <input type="hidden" name="token" class="token">
    <input type="hidden" name="id_user_edit" id="id_edit">


    <br>
    <br>
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