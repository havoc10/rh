<div class="box box-primary">

<div class="box-header">
 <h4 class="box-title">Buscar Usuarios</h4>

        <div class="input-group input-group-sm margin col-sm-6">
            <span class="input-group-btn">
              <button type="button" class="btn btn-info btn-flat" onclick="buscarusuario();">Buscar!</button>
            </span>
            <input class="form-control" type="text" id="dato_buscado">
        </div>
        <div class="row">
        <div class="col-sm-12 row margin" >

        <div class="col-md-4 row" >
        <select class="form-control" id="select_filtro_espec"  onchange="buscarusuario();" >
         <?php  if(isset($espec_sel)){ 
             $listadoespecialidad=$espec_sel->nombre; 
             $optsel= '<option value="'.$espec_sel->id.'">'.$espec_sel->nombre.' </option>';
        }else{  
            $listadoespecialidad="General";
            $optsel="";
         } ?>

         <?=  $optsel;  ?>
        <option value="0">General </option>
        <?php foreach($especialidades as $espec){   ?>
        <option value="<?= $espec->id; ?>" > <?= $espec->nombre; ?></option>
        <?php }  ?>
        </select>
        </div>
        <div class="col-sm-5 ">
        <span >  Resultados en  listado <b><?= $listadoespecialidad; ?></b></span>
        </div>
        </div>    
        </div>

        

                 
</div>

<div class="box-body">              
<?php 
if( count($usuarios) >0){
    
?>

<table id="tabla_pacientes" class="display table table-hover" cellspacing="0" width="100%">
       
        <thead>
            <tr>
             <th style="width:10px">#</th>
                <th>Nombres</th>
                <th>Correo</th>
                <th>Especialidad</th>
                <th>Teléfono</th>
                <th>Nacionalidad</th>
                <th>Fecha Creación</th>
             
              <th>Acción</th>
            </tr>
        </thead>
 
        
       
<tbody>


<?php 

   foreach($usuarios as $usuario){  
    if($usuario->estatus <= 1){
?>

 <tr role="row" class="odd">
    <td class="sorting_1"><?= $usuario->id; ?></td>
    <td class="mailbox-messages mailbox-name" > <span class="text-info"><?= $usuario->nombres." ".$usuario->apellidos;  ?></span></td>
    <td><?= $usuario->email;?></td>
    <td><?= $usuario->delaespec->nombre;  ?></td>
    <td><?= $usuario->telefono;  ?></td>
    <td><?= $usuario->nacionalidad;  ?></td>
    <td><?= $usuario->created_at;  ?></td>
    <td>
    <table>
        <tr>
            <td>
                <button class="btn  btn-success btn-xs"  data-toggle="tooltip" title="Ver" onclick="mostrarficha(<?= $usuario->id; ?>,<?= $usuario_actual->tipoUsuario; ?>);" ><i class="fa fa-eye"> </i></button>&nbsp;       
            </td>
            <td>
                <a href="crear_pdf/1/<?= $usuario->id; ?>" data-toggle="tooltip" title="Generar PDF" target="_blank" class="btn btn-primary btn-xs"> <i class="fa fa-file-pdf-o"></i></a>&nbsp;  
            </td>
            <td>
                <form  id="f_borrar_usuario"  method="post"  action="borrar_usuario" class="form-horizontal form_entrada" >
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> 
                    <input type="hidden" name="id_usuario" value="<?= $usuario->id; ?>">  
                    <input type="hidden" name="estatus" value="2">
                    <button class="btn  btn-danger btn-xs" data-toggle="tooltip" title="Eliminar Persona"><i class="fa fa-trash-o"></i> </button>
                </form>    
            </td>
        </tr>
    </table>
    </td>
</tr>

<?php        
}}
?>

</table>

<?php
echo str_replace('/?', '?', $usuarios->render() )  ;
}else{ ?>

<br/><div class='rechazado'><label style='color:#FA206A'>...No se ha encontrado ningun usuario...</label>  </div> 

<?php } ?>
</div>
<script>
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>
</script>


