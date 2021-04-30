<div class="card shadow mb-4 hidden" id="cuadro4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Editar Producto</h6>
  </div>
  <div class="card-body">
      <form class="user" autocomplete="off" method="post" id="form-update" enctype="multipart/form-data">
      
        @csrf

        <input type="hidden" name="_method" value="put">
        
        <div class="row">
          <div class="col-md-12">

              <div class="row">
                <div class="col-md-3">
                  <label for=""><b>Cod</b></label>
                    <div class="form-group valid-required">
                      <input type="text" name="code" class="form-control form-control-user" id="code_edit" placeholder="Pj: TKN-00-0060" required>
                    </div>
                </div>


                <div class="col-md-3">
                  <label for=""><b>Categoria</b></label>
                    <select name="categorie[]" id="categorie_edit" class="form-control select2" required multiple>
                    <option value="">Seleccione</option>
                    <option value="2">2</option>
                    <option value="1">3</option>
                  </select>
                </div>


                <div class="col-md-6">
                  <label for="available_store"><b>Disponible en Tienda ?</b></label>
                  <label class='container-check'>
                      <input type='checkbox' name='available_store' class='checkitem chk-col-blue' id='available_store_edit' value='1'>
                      <span class='checkmark'></span>
                      <label for=''></label>
                  </label>
                </div>

              </div>


                <div class="row">
                    <div class="col-md-3">
                      <label for=""><b>Descripcion</b></label>
                        <div class="form-group valid-required">
                          <input type="text" name="description" class="form-control form-control-user" id="description_edit" placeholder="Pj: Mesolift Cocktail" required>
                        </div>
                    </div>


                    <div class="col-md-3">
                      <label for=""><b>Registro Invima</b></label>
                        <div class="form-group valid-required">
                          <input type="text" name="register_invima" class="form-control form-control-user" id="register_invima_edit">
                        </div>
                    </div>





                    <div class="col-md-3">
                      <label for=""><b>Precio COP</b></label>
                        <div class="form-group valid-required">
                          <input type="text" name="price_cop" class="form-control form-control-user" id="precio_cop_edit" placeholder="Pj: 5" required>
                        </div>
                    </div>


                    <div class="col-md-3">
                      <label for=""><b>Presentacion</b></label>
                        <div class="form-group valid-required">
                          <input type="text" name="presentation" class="form-control form-control-user" id="presentation_edit" placeholder="" required>
                        </div>
                    </div>

                </div>


                <div class="row">
                  <div class="col-sm-12 text-center">
                    <input id="avatar-edit" name="img-photo" type="file">
                  </div>
							</div>


            </div>

        </div>

        <input type="hidden" name="inicial" id="inicial">
        <input type="hidden" name="id_user" class="id_user">
        <input type="hidden" name="token" class="token">

        <input type="hidden" name="id_user_edit" id="id_edit">


          <br>
          <br>
        </div>
          <center>

            <button type="button"  class="btn btn-danger btn-user" onclick="prev('#cuadro4')">
                Cancelar
            </button>
            <button id="send_usuario" class="btn btn-primary btn-user">
                Guardar
            </button>

          </center>
          <br>
          <br>
      </form>
      
    </div>

