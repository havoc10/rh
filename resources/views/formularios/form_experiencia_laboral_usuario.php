<div class="row">  

 <div class="col-md-6">

    <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Agregar Experiencia Laboral</h3>
            </div><!-- /.box-header -->

            <div id="notificacion_resul_fael"></div>

            <form  id="f_agregar_experiencia_laboral"  method="post"  action="agregar_experiencia_laboral_usuario" class="form_entrada"  >                
               
                 <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> 
                 <input type="hidden" name="id_usuario" value="<?= $usuario->id; ?>">   

               <div class="box-body ">

                    <div class="form-group col-xs-12">
                          <label for="puesto">Puesto</label>
                          <input type="text" class="form-control" id="puesto_explab" name="puesto_explab" value="" required>
                     </div> 

                    <div class="form-group col-xs-12"> 

                          <label for="empresa">Empresa</label>
                          <input type="text" class="form-control" id="empresa_explab" name="empresa_explab" value="" required>
                     </div>

                    <div class="form-group col-xs-12">
                          <label for="lugar">Lugar</label>
                          <input type="text" class="form-control" id="lugar_explab" name="lugar_explab" value="" required>
                     </div>
                       <div class="form-group col-xs-12">
                          <label for="inicio_labores">Fecha de inicio</label>
                          <input type="text" class="form-control" id="inicio_labores_explab" name="inicio_labores_explab" value="" required>
                     </div>  
                       <div class="form-group col-xs-12">
                          <label for="fin_labores">Fecha de terminación</label>
                          <input type="text" class="form-control" id="fin_labores_explab" name="fin_labores_explab" value="">
                     </div>  

                     <div class="form-group col-xs-12">
                        <label for="actividades">Actividades realizadas</label>
                        <textarea class="form-control" rows="8" style="min-height: 300px" placeholder="..."  id="actividades_explab"  name="actividades_explab"></textarea>
                     </div>
               </div>

               <div class="box-footer">
               <button type="submit" class="btn btn-primary">Agregar experiencia laboral</button>
               </div>
             
            </form>
        </div>


 </div>
 
  <div class="col-md-6">

  	    <div class="box box-primary">
                <div class="box-body box-profile">
                	<?php 
                    if($usuario->imagenurl==""){ $usuario->imagenurl="imagenes/avatar.jpg"; }  
                  ?> 
                  <img class="profile-user-img img-responsive img-circle" src="<?=  $usuario->imagenurl;  ?>" alt="User profile picture">
                  <h3 class="profile-username text-center"><?= $usuario->nombres." ".$usuario->apellidos; ?></h3>
                  <p class="text-muted text-center"><?= $usuario->ocupacion; ?></p>
                  
                  <div id="notificacion_resul_fapu"></div>
                  <ul class="list-group list-group-unbordered">
                  
                  
                  <?php foreach($experiencia_laboral->get() as $exp_lab){  ?>
                  <li class="list-group-item">
                  <i class="fa fa-briefcase"></i></i><b> <?=  $exp_lab->puesto;  ?></b> <a class="pull-right"></a>
                  
                        
                   <br/> <i class="fa fa-building-o text-green"></i> <span class="text-blue"><?=  $exp_lab->empresa;  ?></span>
                   <br/> <span><b>Lugar: </b><?=  $exp_lab->lugar;  ?></span> <span class="tools pull-right" ><a href="javascript:void(0);" onclick="borrarexplab(<?= $exp_lab->id;  ?> );"  ><i class="fa fa-trash-o"></i></a></span>
                   <br/> <span><b>Fecha de inicio: </b>
                   <?php
                      $fecha_ini = $exp_lab->inicio_labores;
                      $fecha_ini_f = new DateTime($fecha_ini);
                      $mes_i = $fecha_ini_f->format('F');
                      $ano_i = $fecha_ini_f->format('Y');
                      if ($mes_i=="January") $mes_i="Enero";
                      if ($mes_i=="February") $mes_i="Febrero";
                      if ($mes_i=="March") $mes_i="Marzo";
                      if ($mes_i=="April") $mes_i="Abril";
                      if ($mes_i=="May") $mes_i="Mayo";
                      if ($mes_i=="June") $mes_i="Junio";
                      if ($mes_i=="July") $mes_i="Julio";
                      if ($mes_i=="August") $mes_i="Agosto";
                      if ($mes_i=="September") $mes_i="Setiembre";
                      if ($mes_i=="October") $mes_i="Octubre";
                      if ($mes_i=="November") $mes_i="Noviembre";
                      if ($mes_i=="December") $mes_i="Diciembre";
                      $fecha_c = $mes_i.' '.$ano_i;
                      echo $fecha_c;

                      /*$fecha_ini = $exp_lab->inicio_labores;
                      $fecha_ini_f = new DateTime($fecha_ini);
                      echo $fecha_ini_f->format('F Y');*/
                   ?></span>
                   <br/> <span><b>Fecha de terminación: </b>
                   <?php
                      $fecha_fin = $exp_lab->fin_labores;
                      $fecha_fin_f = new DateTime($fecha_fin);
                      $mes_f = $fecha_fin_f->format('F');
                      $ano_f = $fecha_fin_f->format('Y');
                      if ($mes_f=="January") $mes_f="Enero";
                      if ($mes_f=="February") $mes_f="Febrero";
                      if ($mes_f=="March") $mes_f="Marzo";
                      if ($mes_f=="April") $mes_f="Abril";
                      if ($mes_f=="May") $mes_f="Mayo";
                      if ($mes_f=="June") $mes_f="Junio";
                      if ($mes_f=="July") $mes_f="Julio";
                      if ($mes_f=="August") $mes_f="Agosto";
                      if ($mes_f=="September") $mes_f="Setiembre";
                      if ($mes_f=="October") $mes_f="Octubre";
                      if ($mes_f=="November") $mes_f="Noviembre";
                      if ($mes_f=="December") $mes_f="Diciembre";
                      $fecha_cf = $mes_f.' '.$ano_f;
                      echo $fecha_cf;
                   ?></span>
                   <br/> <span><b>Actividades: </b><br/><?= $exp_lab->actividades;  ?></span>
   
                  </li>

                   <?php }?>

                   
                  </ul>

                  <a href="javascript:void(0);" class="btn btn-primary btn-block"><b>-</b></a>
                </div><!-- /.box-body -->
        </div>
  </div>
	
</div>

<script>
function activareditor(){   
   $("#actividades_explab").summernote();
};

function activaDatepicker(){
  $("#inicio_labores_explab").datepicker({
    format: "yyyy/mm/dd",
    startView: 1,
    minViewMode: 1,
    endDate: "today",
    autoclose: true,
    language: "es"
  });
  $("#fin_labores_explab").datepicker({
    format: "yyyy/mm/dd",
    startView: 1,
    minViewMode: 1,
    endDate: "today",
    autoclose: true,
    language: "es"
  }).on('changeDate',function(e)
    {
        $("#fin_labores_explab").datepicker('update', new Date(e.date.getFullYear(), e.date.getMonth() + 1, 0));
    });
}

activareditor();
activaDatepicker();
</script>