<div class="col-sm-6 row">
	<table class="table table-striped table-bordered">
	 <thead>
	   <tr>
	     <th>#</th>
	     <th>Lastname</th>
	   </tr>
	 </thead>
	 <tbody>
	   <tr>
		<?php  foreach ($especialidades as $esp) { ?>
			<tr>
					<td><?= $esp->id; ?></td>
					<td><?= $esp->nombre; ?></td>
			</tr>	
		<?php	}?>
	     
	     
	   </tr>
	 </tbody>
	</table>

</div>