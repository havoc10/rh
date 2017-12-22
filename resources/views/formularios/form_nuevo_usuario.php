<div class="box box-primary">
                
  <div class="box-header">
    <h3 class="box-title">Nuevo Usuario del Sistema</h3>
  </div><!-- /.box-header -->

  <div id="notificacion_resul_fanu">
 
  </div>


<form  id="f_nuevo_usuario"  method="post"  action="agregar_nuevo_usuario" class="form-horizontal form_entrada" >  
  <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">              

  <div class="box-body">

    <!-- PANEL DATOS -->
    <div class="col-sm-12">
      <div class="panel panel-default ">
      <div class="panel-heading text-center"><i class="fa fa-user fa-1x"></i> <b>Datos Personales</b></div>

      <div class="panel-body">

      <div class="col-sm-4">
        <div class="form-group col-sm-12 nombres">
          <label for="nombres">Nombres*</label>
          <input type="text" class="form-control" id="nombres" name="nombres" placeholder="Nombres.." >
        </div>
      </div>

      <div class="col-sm-4">
        <div class="form-group col-sm-12">
          <label for="apellidos">Apellidos</label>
          <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Apellidos.." >
        </div>
      </div>

      <div class="col-sm-4">
        <div class="form-group col-sm-12">
          <label for="edad">Edad</label>
          <input type="text" class="form-control" id="edad" name="edad" placeholder="Edad.." >
        </div>
      </div>

      <div class="col-sm-4">
        <div class="form-group col-sm-12">
          <label for="sexo">Sexo</label>
          <select class="form-control" class="form-control" id="sexo" name="sexo" >
            <option value="Masculino">Masculino</option>
            <option value="Femenino">Femenino</option>
          </select>
        </div>
      </div>

      <div class="col-sm-4">
        <div class="form-group col-sm-12">
          <label for="email">Email</label>
          <input type="text" class="form-control" id="email" name="email" placeholder="Email.." >
        </div>
      </div>

      <div class="col-sm-4">
        <div class="form-group col-sm-12">
          <label for="telefono">Teléfono</label>
          <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Teléfono.." >
        </div>
      </div>

      <div class="col-sm-4">
        <div class="form-group col-sm-12">
          <label for="estado_civil">Estado Civil</label>
          <select class="form-control" id="estado_civil" name="estado_civil">
            <option value="Casado">Casado</option>
            <option value="Soltero">Soltero</option>
            <option value="Union_libre">Union_libre</option>
          </select>
        </div>
      </div>

      <div class="col-sm-4">
        <div class="form-group col-sm-12">
          <label for="nacionalidad">Nacionalidad</label>
          <input type="text" class="form-control" id="nacionalidad" name="nacionalidad" placeholder="Nacionalidad.." >
        </div>
      </div>

      <div class="col-sm-4">
        <div class="form-group col-sm-12">
          <label for="conduce">Conduce</label>
          <input type="text" class="form-control" id="conduce" name="conduce" placeholder="Conduce.." >
        </div>
      </div>

      <div class="col-sm-4">
        <div class="form-group col-sm-12">
          <label for="telefono">Pasaporte</label>
          <input type="text" class="form-control" id="pasaporte" name="pasaporte" placeholder="Pasaporte.." >
        </div>
      </div>

      <div class="col-sm-4">
        <div class="form-group col-sm-12">
          <label for="especialidad">Especialidad</label>
            <select id="especialidad" name="especialidad" class="form-control">
            <?php for ($i=0;$i<=count($especialidad)-1;$i++) {?>
              <option value="<?= $especialidad[$i]->id ?>"><?= $especialidad[$i]->nombre ?></option>
            <?php  }  ?>
            </select>
        </div>
      </div>

      <div class="col-sm-4">
        <div class="form-group col-sm-12">
          <label for="logo">Imagen CV</label>
            <select id="logo" name="logo" class="form-control">
            <?php for ($i=0;$i<=count($logo)-1;$i++) {?>
              <option value="<?= $logo[$i]->id ?>"><?= $logo[$i]->nombre ?></option>
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
              <input type="text" class="form-control" id="calle" name="calle" placeholder="Caller.." >
            </div>
          </div>

          <div class="col-sm-4">
            <div class="form-group col-sm-12">
              <label for="numero">Numero</label>
              <input type="text" class="form-control" id="numero" name="numero" placeholder="Numero.." >
            </div>
          </div>

          <div class="col-sm-4">
            <div class="form-group col-sm-12">
              <label for="colonia">Colonia</label>
              <input type="text" class="form-control" id="colonia" name="colonia" placeholder="Colonia.." >
            </div>
          </div>

          <div class="col-sm-4">
            <div class="form-group col-sm-12">
              <label for="ciudad">Ciudad</label>
              <input type="text" class="form-control" id="ciudad" name="ciudad" placeholder="Ciudad.." >
            </div>
          </div>

          <div class="col-sm-4">
            <div class="form-group col-sm-12">
              <label for="estado">Estado</label>
              <input type="text" class="form-control" id="estado" name="estado" placeholder="Estado.." >
            </div>
          </div>

          <div class="col-sm-4">
            <div class="form-group col-sm-12">
              <label for="cp">C.P.</label>
              <input type="text" class="form-control" id="cp" name="cp" placeholder="Código Postal.." >
            </div>
          </div>

        </div>
      </div>
    </div>
    <!-- /PANEL DATOS_DIRECCION -->

   <!--  <div class="form-group col-xs-12">
      <label for="email">password*</label>
      <input type="password" class="form-control" id="password" name="password" p required >
    </div> -->

  </div>

  <div class="box-footer col-xs-12 ">
    <button type="submit" class="btn btn-success">Guardar</button>
  </div>

</form>

</div>
</div>
<script>
 function cargarlogo(){
$('#logo option:eq(0)').prop('selected', true);  
}

cargarlogo()
</script>