<div class="card shadow mb-4 hidden" id="cuadro2">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Registro de Categorias</h6>
    </div>
    <div class="card-body">
        <form class="user" autocomplete="off" method="post" id="store" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for=""><b>Nombre</b></label>
                                <input type="text" name="name" id="issue-store" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for=""><b>Nombre en Inlges</b></label>
                                <input type="text" name="name_ingles" id="issue-store-english" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-8">
                            <div class="kv-avatar">
                                <div class="file-loading">
                                    <input id="avatar-1" name="img-profile" type="file" required>
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

    <!-- <input type="hidden" name="id_user" class="id_user">
    <input type="hidden" name="token" class="token"> -->
    <br>
    <br>
    <center>

        <button type="button" class="btn btn-danger btn-user" onclick="prev('#cuadro2')">
            Cancelar
        </button>
        <button id="send_usuario" class="btn btn-primary btn-user">
            Registrar
        </button>

    </center>
    <br>
    <br>
    </form>

</div>