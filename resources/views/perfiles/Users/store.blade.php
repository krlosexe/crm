<div class="card shadow mb-4 hidden" id="cuadro2">
	<div class="card-header py-3">
	  <h6 class="m-0 font-weight-bold text-primary">Registro de usuarios</h6>
	</div>
	<div class="card-body">
	  	<form class="user" autocomplete="off" method="post" id="store" enctype="multipart/form-data">
			
			@csrf
	  		<ul class="nav nav-tabs" id="myTab" role="tablist">
			  <li  class="nav-item">
			    <a id="tab0" class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Cuenta de Usuario</a>
			  </li>
			  <li  class="nav-item">
			    <a id="tab1" class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Datos Personales</a>
			  </li>
			</ul>

			<br><br>
			<div class="tab-content" id="myTabContent">
			  <div class="tab-pane fade show active tab_content0" id="home" role="tabpanel" aria-labelledby="home-tab">
				
				<div class="row">
					
					<div class="col-md-6">
						<div class="row">
							<div class="col-sm-12 text-center">
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


				  	<div class="col-md-6">
			            <div class="form-group valid-required">
			              <input type="email" name="email" class="form-control form-control-user" id="email" placeholder="Email" required>
			            </div>
			            <div class="form-group row">
			              <div class="col-sm-6 mb-3 mb-sm-0 valid-required">
			                <input type="password" name="password" class="form-control form-control-user" id="password" placeholder="Contraseña" required>
			              </div>
			              <div class="col-sm-6 valid-required">
			                <input type="password" name="repeat-password" class="form-control form-control-user" id="RepeatPassword" placeholder="Repita Contraseña" required>
			              </div>
			            </div>

			            <div class="form-group row">
			              <div class="col-sm-6 mb-3 mb-sm-0 valid-required">
						  <label for=""><b>Rol</b></label>
			                <select class="form-control select2" name="rol" id="rol" required>
			                	<option value="">Seleccione un Rol</option>
			                	<option value="1">op1</option>
			                </select>
			              </div>


						  <div class="col-sm-6 mb-3 mb-sm-0 valid-required">
						 		<label for=""><b>Linea de Negocio</b></label>
								<select name="id_line" id="linea-negocio" class="form-control select2" required>
									<option value="">Seleccione</option>
								</select>
			              </div>


			            </div>


				



	            
				  	</div>
				</div>



			  </div>



			  <div class="tab-pane fade tab_content1" id="profile" role="tabpanel" aria-labelledby="profile-tab">

			  		<div class="row">
			  			<div class="col-sm-4 text-center valid-required">
			  				<label for=""><br></label>
				            <input type="text" name="nombres" class="form-control form-control-user" id="nombres" placeholder="Nombres" required>
				        </div>

				        <div class="col-sm-4 text-center valid-required">
				        	<label for=""><br></label>
				            <input type="text" name="apellido_p" class="form-control form-control-user" id="apellidos_p" placeholder="Apellido Paterno" required>
				        </div>

				        <div class="col-sm-4 text-center valid-required">
				        	<label for=""><br></label>
				            <input type="text" name="apellido_m" class="form-control form-control-user" id="apellidos_m" placeholder="Apellido Materno" required>
				        </div>
			  		</div>


			  		<br>


			  		<div class="row">

				        <div class="col-sm-4 text-center valid-required">
				        	<label for=""><br></label>
				            <input type="text" name="n_cedula" class="form-control form-control-user" id="n_cedula" placeholder="Numero de Cedula" required>
				        </div>

				        <div class="col-sm-4 valid-required">
				        	<label for=""><b>Fecha de Nacimiento</b></label>
				            <input type="date" name="fecha_nacimiento" class="form-control form-control-user" id="fecha_nacimiento" required>
				        </div>

			  			<div class="col-sm-4 text-center valid-required">
			  				<label for=""><br></label>
				            <input type="text" name="telefono" class="form-control form-control-user" id="telefono" placeholder="Numero de Telefono" required>
				        </div>

			  		</div>



			  		<div class="row">
			  			<div class="col-sm-12 text-center valid-required">
				        	<label for=""><br></label>
				            <textarea name="direccion" placeholder="Direccion" id="direccion" class="form-control" cols="30" rows="10"></textarea>
				        </div>
			  		</div>
					

					<input type="hidden" name="id_user" class="id_user">
					<input type="hidden" name="token" class="token">
			  		<br>

			  		<br>



			  </div>
			  
			</div>


            
            

            <center>

            	<button type="button"  class="btn btn-danger btn-user" onclick="prev('#cuadro2')">
              		Cancelar
            	</button>
            	<button id="send_usuario" class="btn btn-primary btn-user">
              		Registrar
            	</button>

            </center>
          
        </form>
	</div>
</div>