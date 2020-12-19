<div class="card shadow mb-4 hidden" id="cuadro2">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Registro de Viaticos</h6>
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
                                <select name="services" id="services-store" class="form-control select2" required>
                                    <option value="">Seleccione</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for=""><b>Titulo</b></label>
                                <input type="text" name="title" id="title-store" class="form-control" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                            <div class="form-group">
                                <label for=""><b>Costo</b></label>
                                <input type="text" name="costo" id="costo-store" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    
                    <small>Seleccione una foto</small>
                    <div class="col-md-8">
                        <div class="kv-avatar">
                            <div class="file-loading">
                                <input id="avatar-1" name="img-profile-one" type="file" required>
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
                                    <input id="avatar-antes" name="img-profile-two" type="file">
                                </div>
                            </div>
                            <div class="kv-avatar-hintss">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <small>Seleccione una foto</small>
                            <div class="kv-avatar">
                                <div class="file-loading">
                                    <input id="avatar-despues" name="img-profile-three" type="file">
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