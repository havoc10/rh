<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="font-awesome.min.css">

  <style>

  .container {
  font-family: 'Source Sans Pro', 'Helvetica Neue', Helvetica, Arial, sans-serif;
  font-size: 13px;
  color:#464646;
  position: relative;
  width: 100%;
  max-width:   2550px;
  height: auto;
  margin: 0 auto;
  /*padding: 0 10px;*/
  box-sizing: border-box;
  /*border: 1px solid #f4f4f4;*/
   }

   .hr{border: 1px solid #f4f4f4;margin: 0;padding: 0;}

  .t-center{text-align: center;}
  .t-left{text-align: left;}
  .t-right{text-align: right;}

  .dblock{display: inline-block;}
  .c{margin: 0 auto;}

  .dib{display: inline-block;}

  .one{width: 60%;}
  .two{width: 20%;}
  .three{width: 30%;}
  .four{width: 40%;}
  .five{width: 50%;}
  .six{width: 60%;}
  .seven{width: 70%;}
  .eight{width: 80%;}

  .clear{
    overflow: hidden; 
  }
  .neg{
    font-weight: bold;
  }



  </style>

</head>
<body>
  <?php foreach($data as $dat){ ?>

    <?php if ($dat->id == $fid ){ ?>
    <section class="container" >

      <!-- title row -->
      <div style="width: 100%;height: 75px;">
          <div class="dib four">
            <center>
               <img src="<?= $dat->logocv->url;?>" width="75" height="75" >
            </center>
          </div>
          <div class="dib five">
           <h2 style="text-align: center;line-height: 35px"> <i class="fa fa-eye"></i>Curriculum Vitae</h2>
          </div>
        <!-- /.col -->
      </div>

      <hr class="hr">
     

      <!-- DATOS PERSONALES -->
      <div style="width: 100%;">
                 
        <div class="dib seven p">
          <h3>» DATOS PERSONALES «</h3> 
          <hr class="hr">
          <p><b>Nombre:</b> <?= $dat->nombres; ?></p> 
          <p><b>Apellido:</b> <?= $dat->apellidos; ?></p>
          <p><b>Correo:</b> <?= $dat->email; ?></p>
          <p><b>Teléfono:</b> <?= $dat->telefono; ?></p>
          <p><b>Edad:</b> <?= $dat->edad; ?> </p>
          <p><b>Estado Civil:</b> <?= $dat->estado_civil; ?> </p>
          <p><b>Licencia:</b> <?= $dat->conduce; ?> </p>
          <p><b>Especialidad:</b> <?= $dat->delaespec->nombre; ?></p>
          <p><b>Nacionalidad:</b> <?= $dat->nacionalidad; ?></p>
          <hr class="hr">
          <h4>DIRECCIÓN</h4> 
          <hr class="hr">
          <p><b>Calle:</b> <?= $dat->calle; ?> #<?= $dat->numero; ?></p>
          <p><b>Colonia:</b> <?= $dat->colonia; ?></p>
          <p><b>Ciudad:</b> <?= $dat->ciudad; ?></p>
          <p><b>Estado:</b> <?= $dat->estado; ?></p>
        </div>
        
        <div class="dib three" style="height: 0px">
          <center>
               <img src="<?= $dat->imagenurl; ?>" width="100" >
          </center>
        </div>
       
      </div>
      <!-- /DATOS PERSONALES -->
     <?php } ?>
      <?php  } ?>
    
      <hr class="hr">



      <!-- DATOS ACADEMICOS -->
      <div style="width: 100%;">
        <h3>» DATOS ACADEMICOS «</h3> 
        <hr class="hr">
        <?php foreach($data as $dat){ ?>
        <?php if ($dat->id == $fid ){ ?>
        <?php foreach($edu as $educa){  
          if ($educa->idUsuario == $dat->id) {         
          ?>
            
          <h4 style="text-transform: uppercase;">
          <?= $educa->delaedu->titulo; ?></h4>
          <p><b>Institución:</b> <?= $educa->institucion; ?></p>
          <p><b>Titulo:</b> <?= $educa->titulo; ?></p>
          <p><b>Año:</b> <?= $educa->anio; ?></p>
          <hr class="hr">
        <?php } }}}?>
       
      </div>
      <!-- /DATOS ACADEMICOS -->


      
      <!-- DATOS DE EXPERIENCIA -->
      <div style="width: 100%;">
        <h3> » EXPERIENCIA LABORAL «</h3> 
        <hr class="hr">
         <?php foreach($data as $dat){ ?>
         <?php if ($dat->id == $fid ){ ?>
        <?php foreach($exp as $expl){  
          if ($expl->idUsuario == $dat->id) { 
          ?>
            
          <h4 style="text-transform: uppercase;">
          <?= $expl->empresa; ?></h4>
          <p><b>Puesto:</b> <?= $expl->puesto; ?></p>
          <p><b>Lugar:</b> <?= $expl->lugar; ?></p>
          <p><b>Inicio Labores:</b> <?= $expl->inicio_labores; ?></p>
          <p><b>Fin Labores:</b> <?= $expl->fin_labores; ?></p>
          <p><b>Actividades:</b> <?= $expl->actividades; ?></p>

        <hr class="hr">
        <?php }}}} ?>
        

      </div>
      <!-- /DATOS DE EXPERIENCIA -->



</section>  

    
     

</body>
</html>

