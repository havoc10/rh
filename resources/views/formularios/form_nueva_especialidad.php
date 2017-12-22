

<div class="row">  

  <div class="col-md-12">

      <div class="box box-primary ">
                        
	      <div class="box-header">
	         <h3 class="box-title">
					Agregar Nueva Especialidad
	         </h3>
	       </div><!-- /.box-header -->

        <div id="notificacion_resul_fae">
        </div>

        <div class="box-body ">
        		
		  		<div class="col-sm 12 row">
			   <div class="col-sm-6 ">
			   	 <h4>Nombre </h4>
					<form  id="f_nueva_especialidad"  method="post"  action="form_nueva_especialidad" class="
					form-horizontal form_entrada" >  
					  <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">              
			        <div class="form-group  col-sm-10">
			          <input type="text" class="form-control" id="nombre_especialidad" name="nombre_especialidad" value="" placeholder="Nombre Especialidad.." >
			        </div>
				        <div class="col-sm-12 row">
			             <button type="submit" class="btn btn-primary">Actualizar Datos</button>
			           </div>
  			      </form>
			      </div>


			      <div class="col-sm-6 row">
			       <h4>Listado Especialidades</h4>
			        <div class="col-sm-12 row">
						
						<div class="col-sm-12 row">

						   <div class="notificacion_resul_faprd"></div>
							<table class="table table-striped table-bordered text-center" style="width: 90%;">
							 <thead>
							   <tr>
							     <th>#</th>
							     <th>Nombre</th>
							     <th>Acción</th>
							   </tr>
							 </thead>
							 <tbody>
							   <tr>
								<?php  foreach ($especialidades as $esp) { ?>
									<tr>
										<td><?= $esp->id; ?></td>
										<td><?= $esp->nombre; ?></td>
										<td><a href="javascript:void(0);" onclick="borrar_especialidad(<?= $esp->id;?> );"  ><i class="fa fa-trash-o"></i></a>
										</td>
									</tr>	
								<?php	}?>
							   </tr>
							 </tbody>
							</table>

						</div>

     		        </div>

		      </div>        
        </div>


      </div>

  </div> <!-- end col mod 6 -->
 
</div> <!-- end row -->




