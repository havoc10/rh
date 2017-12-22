

<div class="row">  

  <div class="col-md-9">

        <div class="box box-primary">
                        
        <div class="box-header">
          <h3 class="box-title">Editar información de la Persona</h3>
        </div><!-- /.box-header -->

        <div id="notificacion_resul_feu"></div>

        <form  id="f_editar_usuario"  method="post"  action="editar_usuario" class="form-horizontal form_entrada" >                
          <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> 
          <input type="hidden" name="id_usuario" value="<?= $usuario->id; ?>">              


        <div class="box-body ">

          <!-- PANEL DATOS -->
          <div class="col-sm-12">
            <div class="panel panel-default ">
            <div class="panel-heading text-center"><i class="fa fa-user fa-1x"></i> <b>Datos Personales</b></div>

            <div class="panel-body">

            <div class="col-sm-4">
              <div class="form-group  col-sm-12">
                <label for="nombres">Nombres*</label>
                <input type="text" class="form-control" id="nombres" name="nombres" value="<?= $usuario->nombres; ?>" placeholder="Nombres.." >
              </div>
            </div>

            <div class="col-sm-4">
              <div class="form-group col-sm-12">
                <label for="apellidos">Apellidos</label>
                <input type="text" class="form-control" id="apellidos" name="apellidos" value="<?= $usuario->apellidos; ?>" placeholder="Apellidos.." >
              </div>
            </div>

            <div class="col-sm-4">
              <div class="form-group col-sm-12">
                <label for="edad">Edad</label>
                <input type="text" class="form-control" id="edad" name="edad" value="<?= $usuario->edad; ?>" placeholder="Edad.." >
              </div>
            </div>

            <div class="col-sm-4">
              <div class="form-group col-sm-12">
                <label for="sexo">Sexo</label>

                <select type="text" class="form-control" id="sexo" name="sexo" >
                  <option value="Masculino">Masculino</option>
                  <option value="Femenino">Femenino</option>
                </select>
              </div>
            </div>

            <div class="col-sm-4">
              <div class="form-group col-sm-12">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email" name="email" value="<?= $usuario->email; ?>" placeholder="Email.." >
              </div>
            </div>

            <div class="col-sm-4">
              <div class="form-group col-sm-12">
                <label for="telefono">Teléfono</label>
                <input type="text" class="form-control" id="telefono" name="telefono" value="<?= $usuario->telefono; ?>" placeholder="Teléfono.." >
              </div>
            </div>

            <div class="col-sm-4">
              <div class="form-group col-sm-12">
                <label for="estado_civil">Estado Civil</label>
                <input type="text" class="form-control" id="estado_civil" name="estado_civil" value="<?= $usuario->estado_civil; ?>" placeholder="Estado Civil.." >
              </div>
            </div>

            <div class="col-sm-4">
              <div class="form-group col-sm-12">
                <label for="nacionalidad">Nacionalidad</label>
                <input type="text" class="form-control" id="nacionalidad" name="nacionalidad" value="<?= $usuario->nacionalidad; ?>" placeholder="Nacionalidad.." >
              </div>
            </div>

            <div class="col-sm-4">
              <div class="form-group col-sm-12">
                <label for="conduce">Conduce</label>
                <select class="form-control" id="conduce" name="conduce">
                  <option value="Si">Si</option>
                  <option value="">No</option>
                </select>
              </div>
            </div>

            <div class="col-sm-4">
              <div class="form-group col-sm-12">
                <label for="telefono">Pasaporte</label>
                <input type="text" class="form-control" id="pasaporte" name="pasaporte" value="<?= $usuario->pasaporte; ?>" placeholder="Pasaporte.." >
              </div>
            </div>

            <div class="col-sm-4">
              <div class="form-group col-sm-12">
                <label for="especialidad">Especialidad</label>
                  <select id="especialidad" name="especialidad" class="form-control">
                  <?php for ($i=0;$i<=count($especialidades)-1;$i++) {?>
                    <option value="<?= $especialidades[$i]->id ?>"> <?= $especialidades[$i]->nombre ?></option>
                  <?php  }  ?>
                  </select>
              </div>
            </div>

             <div class="col-sm-4">
              <div class="form-group col-sm-12">
                <label for="logo">Logo CV</label>
                  <select id="logo" name="logo" class="form-control">
                  <?php for ($i=0;$i<=count($logo)-1;$i++) {?>
                    <option value="<?= $logo[$i]->id ?>"> <?= $logo[$i]->nombre ?></option>
                  <?php  }  ?>
                  </select>
              </div>
            </div>

            </div></div>
          </div>
          <!-- PANEL DATOS -->

         <!-- PANEL DATOS_DIRECCION -->
          <div class="col-sm-12">
            <div class="panel panel-default ">
              <div class="panel-heading text-center"><i class="fa fa-home fa-1x"></i> <b>Dirección</b> </div>
              <div class="panel-body">

                <div class="col-sm-4">
                  <div class="form-group col-sm-12">
                    <label for="calle">Calle</label>
                    <input type="text" class="form-control" id="calle" name="calle" value="<?= $usuario->calle; ?>" placeholder="Caller.." >
                  </div>
                </div>

                <div class="col-sm-4">
                  <div class="form-group col-sm-12">
                    <label for="numero">Numero</label>
                    <input type="text" class="form-control" id="numero" name="numero" value="<?= $usuario->numero; ?>" placeholder="Numero.." >
                  </div>
                </div>

                <div class="col-sm-4">
                  <div class="form-group col-sm-12">
                    <label for="colonia">Colonia</label>
                    <input type="text" class="form-control" id="colonia" name="colonia" value="<?= $usuario->colonia; ?>" placeholder="Colonia.." >
                  </div>
                </div>

                <div class="col-sm-4">
                  <div class="form-group col-sm-12">
                    <label for="ciudad">Ciudad</label>
                    <input type="text" class="form-control" id="ciudad" name="ciudad" value="<?= $usuario->ciudad; ?>" placeholder="Ciudad.." >
                  </div>
                </div>

                <div class="col-sm-4">
                  <div class="form-group col-sm-12">
                    <label for="estado">Estado</label>
                    <input type="text" class="form-control" id="estado" name="estado" value="<?= $usuario->estado; ?>" placeholder="Estado.." >
                  </div>
                </div>

                <div class="col-sm-4">
                  <div class="form-group col-sm-12">
                    <label for="cp">C.P.</label>
                    <input type="text" class="form-control" id="cp" name="cp" value="<?= $usuario->cp; ?>" placeholder="Código Postal.." >
                  </div>
                </div>

              </div>
            </div>
          </div>
          <!-- /PANEL DATOS_DIRECCION -->

        </div>



        <div class="box-footer">
             <button type="submit" class="btn btn-primary">Actualizar Datos</button>
        </div>
        </form>
        </div>

  </div> <!-- end col mod 6 -->

  <div class="col-md-3">


      <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">Agregar Fotografia</h3>
        </div><!-- /.box-header -->
     
      <div id="notificacion_resul_fci"></div>

      <form  id="f_subir_imagen" name="f_subir_imagen" method="post"  action="subir_imagen_usuario" class="formarchivo" enctype="multipart/form-data" >                
      
       <input type="hidden" name="id_usuario_foto" value="<?= $usuario->id; ?>"> 
       <input type="hidden" name="_token" id="_token"  value="<?= csrf_token(); ?>"> 

      <div class="box-body">

        <div class="form-group col-xs-12" >


          <?php if($usuario->imagenurl==""){ $usuario->imagenurl=url("imagenes/avatar.jpg"); }  ?>
          <img src="<?=  url($usuario->imagenurl)  ?>"  alt="User Image"  style="width:160px;height:160px;display: block;margin:0 auto" id="fotografia_usuario" >
                <!-- User image -->
          
       </div>


      <div class="col-xs-12"  >
        <div class="form-group">
          <label>Agregar Imagen </label>
          <input name="archivo" id="archivo" type="file"   class="archivo form-control"  required/><br /><br />
        </div>
      </div>

     
      <div class="box-footer">
        <button type="submit" class="btn btn-primary">Actualizar Imagen</button>
      </div>

       


      </div>

      </form>

      </div>

  </div>    <!-- end col mod 6 -->
 
</div> <!-- end row -->


<script>
 function cargarpais(){
$('#especialidad option:eq(<?= $usuario->especialidad-1; ?>)').prop('selected', true);	
}
 function cargarlogo(){
$('#logo option:eq(<?= $usuario->logo-1; ?>)').prop('selected', true);  
}
cargarpais();
cargarlogo();

</script>
