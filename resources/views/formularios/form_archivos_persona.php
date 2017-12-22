
<div class="row">   

 <!-- CARGA DOCUMENTOS -->
  <div class="col-md-4">
    <div class="box box-primary">

    <div class="box-header">
        <h3 class="box-title">Agregar Documentación</h3>
    </div><!-- /.box-header -->

    <div id="notificacion_resul_ar" style="width: 90%;margin:0 auto;"></div>


    <form  id="f_agregar_archivo" method="post"  action="agregar_archivos_persona" class="formarchivo" enctype="multipart/form-data">                
       
         <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> 
         <input type="hidden" name="id_usuario" value="<?= $usuario->id; ?>">  



       <div class="box-body ">

       	 <div class="col-xs-12 form-group">
            <label for="tipo_publicacion">Tipo de documento</label>
             <select id="tipo_publicacion" name="tipo_publicacion" class="form-control"  >
              <?php foreach($tipoarchivos as $tipo){  ?>
                 <option value="<?= $tipo->id; ?>" > <?= $tipo->nombre; ?> </option>
              
              <?php } ?>
              
             </select>
          </div> 

          <div class="col-xs-12 form-group">
              <label for="nombre">Nombre Documento</label>
              <input type="text" class="form-control" id="nombre" name="nombre" value="" required>
          </div>

       
          <div class=" col-xs-12 form-group bg-info" style="padding-bottom: 15px;">
            <label for="file">Archivo a subir (Formato: PDF) </label>
            <input type="file" class="form-control" id="file" name="file" required >
          </div>

       </div>

       <div class="box-footer">
           <button type="submit" class="btn btn-success">Agregar Documento</button>
       </div>
     
    </form>
    </div>
  </div>
 
  <!-- DOCUMENTOS PERSONALES -->
  <div class="col-md-4" >
    <div class="box box-primary">
            <div class="box-body box-profile">
              <p class="pull-right"><i class="fa fa-plus text-red"></i><a href="unirpdf/<?= $usuario->id; ?>/3/"> Agregar todo  </a></p>
              <center>  <i class="fa fa-3x fa-file-pdf-o text-red"></i> </center> <br>
              <h3 class="profile-username text-center">DOCUMENTOS PERSONALES</h3>
              <h3 class='text-center'>
                <a href="unirpdf/<?= $usuario->id; ?>/1/"> <i class="fa fa-plus text-red"></i> Agregar datos al cv  </a> 
              </h3>
              <div id="notificacion_resul_fapu"></div>
              <ul class="list-group list-group-unbordered">
              <?php foreach($tipoarchivos as $tipo){  ?>
              <?php  if($tipo->nombre=="Personales"){   ?> 
              <li class="list-group-item">
              <i class="fa fa-file-pdf-o"></i> <b style="text-transform: uppercase;">« <?= $tipo->nombre; ?> » </b><i class="fa fa-file-pdf-o"></i>
              <?php foreach($archivos->get() as $archivo){  ?>
              <?php  if($archivo->idTipoArchivo==$tipo->id){   ?>
              <?php  if($archivo->idTipoArchivo==1){   ?> 
               <br/><i class="fa fa-circle-o text-red"></i> <span class="text-red" >
               » <?=  $archivo->nombre;  ?></span>
               <span class="tools pull-right" ><a href="<?= url($rutaarchivos.$archivo->ruta)  ?>" style="display:block;" target="_blank"> &nbsp;&nbsp;  <i class="fa fa-x fa-eye"> </i></a> </span>   
               <span class="tools pull-right" ><a href="javascript:void(0);" onclick="borrarpublicacion(<?= $archivo->id; ?> );"> <i class="fa fa-trash-o text-red"> </i></a> </span>

               
              
              <?php } ?>  
              <?php } ?>  
              <?php } ?>
              <?php } ?>
               
              </li>

               <?php } ?>

               
              </ul>

            </div><!-- /.box-body -->
    </div>
  </div>


   <!-- DOCUMENTOS PERSONALES -->
  <div class="col-md-4">
    <div class="box box-primary">
            <div class="box-body box-profile">
            <center>  <i class="fa fa-3x fa-file-pdf-o text-green"></i> </center> <br>
              <h3 class="profile-username text-center">DOCUMENTOS CURSOS ETC.</h3>
              <h3 class='text-center'>
                <a href="unirpdf/<?= $usuario->id; ?>/2/"> <i class="fa fa-plus text-green"></i> Agregar datos al cv  </a> 
              </h3>
              <div id="notificacion_resul_fapu"></div>
              <ul class="list-group list-group-unbordered">
              <?php foreach($tipoarchivos as $tipo){  ?>
              <?php  if($tipo->nombre=="Cursos"){   ?> 

              <li class="list-group-item">
              <i class="fa fa-file-pdf-o"></i> <b style="text-transform: uppercase;">« <?= $tipo->nombre; ?> » </b><i class="fa fa-file-pdf-o"></i>
            
              <?php foreach($archivos->get() as $archivo){  ?>
              <?php  if($archivo->idTipoArchivo==$tipo->id){   ?>
              <?php  if($archivo->idTipoArchivo==2){   ?> 
               <br/><i class="fa fa-circle-o text-green"></i> <span class="text-green" >
               » <?=  $archivo->nombre;  ?></span>
               <span class="tools pull-right" ><a href="<?= url($rutaarchivos.$archivo->ruta)  ?>" style="display:block;" target="_blank"> &nbsp;&nbsp;  <i class="fa fa-x fa-eye"> </i></a> </span>   
               <span class="tools pull-right" ><a href="javascript:void(0);" onclick="borrarpublicacion(<?= $archivo->id; ?> );"> <i class="fa fa-trash-o text-red"> </i></a> </span>

               
              
              <?php } ?> 
              <?php } ?>    
              <?php } ?>
              <?php } ?>
               
              </li>

               <?php } ?>

               
              </ul>

            </div><!-- /.box-body -->
    </div>
  </div>
	



</div>