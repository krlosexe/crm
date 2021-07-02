<div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for=""><b>Categoria</b></label>
                                    <div class="form-group valid-required">
                                        <select name="id_category" class="form-control" id="category_edit"></select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label for=""><b>Sub Categoria</b></label>
                                    <div class="form-group valid-required">
                                        <select name="id_sub_category" class="form-control" id="sub_category_edit"></select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <br>
                                    <button type="button" id="btn-add-surgerie-edit" class="btn btn-primary btn-user">
                                        Agregar <i class="fa fa-pl"></i>
                                    </button>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for=""><b>Observaciones adicionales</b></label>
                                        <input type="text" class="form-control" name="observations" id="observations_edit"></input>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-bordered" id="tablecx_edit" width="100%" cellspacing="0">

                                        <thead>
                                            <tr>
                                                <th>Procedimientos</th>
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

                    <br><br>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for=""><b>Talla Actual</b></label>
                                <input type="text" name="current_size" class="form-control form-control-user" id="current_size_edit" placeholder="PJ. 12">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for=""><b>Talla en que quiere quedar</b></label>
                                <input type="text" name="desired_size" class="form-control form-control-user" id="desired_size_edit" placeholder="PJ. 16">
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="form-group">
                                <label for=""><b>Vol Implante</b></label>
                                <input type="text" name="implant_volumem" class="form-control form-control-user" id="implant_volumem_edit" placeholder="PJ. 11">
                            </div>
                        </div>
                    </div>