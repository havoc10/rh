<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sistema | Panel Control</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="css/pe-icon-7-stroke.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">

    <!-- jvectormap -->
    <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker-bs3.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
   
    <link rel="stylesheet" href="plugins/summernote/summernote.css">

    <link rel="stylesheet" href="css/sistemalaravel.css">

  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="/" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>SILM</b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Inter</b>LAB</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
            
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <!-- <img src="<?=  $usuario->imagenurl;  ?>"  alt="User Image"  style="width:20px;height:20px;border-radius:50%"> -->
                  <span class="hidden-xs"><!-- <b>USUARIO:</b> --> <?=  $usuario->name;  ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                      <!-- <?php if($usuario->imagenurl==""){ $usuario->imagenurl="imagenes/avatar.jpg"; }  ?> -->
                      <img src="imagenes/avatar.jpg"  alt="User Image"  style="width:90px;height:90px;border-radius:50%">
                    <p>
                     <b>Usuario:</b> <?= $usuario->name; ?>
                     <!--  <small>Member since Nov. 2012</small> -->
                    </p>
                  </li>
                 
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat" data-toggle="modal" data-target="#modal-default">Cambiar Password</a>
                    </div>
                    <div class="pull-right">
                      <a href="logout" class="btn btn-default btn-flat">Salir</a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
              <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
              </li>
            </ul>
          </div>
        </nav>


      </header>
      <!-- Left side column. contains the logo and sidebar -->
      
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
                <img src="imagenes/silm.png"  alt="User Image"  style="width:45px;height:45px;border-radius:50%">
            </div>
            <div class="pull-left info">
              <p>Usuario: <?= $usuario->name; ?></p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
         
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MENÚ</li>
            <li class="active treeview">
              <a href="#">
                <i class="fa  fa-users"></i> <span>PERSONAS</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="active"><a href="javascript:void(0);" onclick="cargarformulario(1);" ><i class="fa fa-circle-o"></i>Agregar Persona </a></li>
                <li class="active"><a href="javascript:void(0);" onclick="cargarlistado(1,1);" ><i class="fa fa-circle-o"></i>Listado Personas</a></li>
               <!--  <li class="active"><a href="javascript:void(0);" onclick="cargarlistado(2,1);" ><i class="fa fa-circle-o"></i>Publicaciones</a></li> -->
              </ul>
            </li>  

             <li class="treeview">
              <a href="#">
                <i class="fa  fa-edit"></i> <span>CATALOGOS</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="active"><a href="javascript:void(0);" onclick="cargarformulario(4);" ><i class="fa fa-circle-o"></i>Especialidades </a></li>
               <!--  <li class="active"><a href="javascript:void(0);" onclick="cargarlistado(2,1);" ><i class="fa fa-circle-o"></i>Publicaciones</a></li> -->
              </ul>
            </li>


            <!-- <li class="treeview">
              <a href="#">
                <i class="fa fa-fw fa-envelope"></i> <span>CORREO</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="active"><a href="javascript:void(0);" onclick="cargarformulario(3);" ><i class="fa fa-circle-o"></i>Enviar Correo</a></li>
                
              </ul>
            </li>   -->


           <!--  <li class="treeview">
              <a href="#">
                <i class="fa fa-fw fa-database"></i> <span>DATOS</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="active"><a href="javascript:void(0);" onclick="cargarformulario(2);" ><i class="fa fa-circle-o"></i>Cargar Datos Us. </a></li>
                
              </ul>
            </li>   -->

            <!-- <li class="treeview">
              <a href="#">
                <i class="fa fa-fw fa-database"></i> <span>PDF</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="active"><a href="javascript:void(0);" onclick="cargarlistado(3,1);" ><i class="fa fa-circle-o"></i> Generar </a></li>
                 <li class="active"><a href="javascript:void(0);" onclick="cargarlistado(4,1);" ><i class="fa fa-circle-o"></i> Graficas </a></li>
                
              </ul>
            </li>   -->

          </ul>

        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper" style="min-height:2000px !important;">
        <!-- Content Header (Page header) -->
        <section class="content-header"> 
          <h1>
            
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Inicio</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>

         <!-- contenido capas modales -->

           <?php 
           if($usuario->tipoUsuario==1){ include('menus/submenu_admin.php'); }   
           if($usuario->tipoUsuario!=1){ include('menus/submenu_standard.php'); } ?> 

      <!-- .modal-dialog -->
      <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span></button>
              <h4 class="modal-title">Cambiar Password</h4>
            </div>
            <div class="modal-body">
              <div class="col-md-12">
                  <div class="box box-primary">

                    <div class="box-header with-border">
                    </div><!-- /.box-header -->

                    <div id="notificacion_resul_fcp"></div>
                    <!-- form start -->
                    <form method="post" id="f_cambiar_password" class="form_entrada" action="cambiar_password" >
                         <input type="hidden" name="id_usuario_password" value="<?= $usuario->id; ?>"> 
                       <input type="hidden" name="_token" id="_token"  value="<?= csrf_token(); ?>"> 
                      <div class="box-body">
                        <div class="form-group">
                          <label for="email">Email </label>
                          <input type="email" class="form-control" id="email_usuario" name="email_usuario" placeholder="Entrar email" value="<?= $usuario->email; ?>" >
                        </div>
                        <div class="form-group">
                          <label for="password">Password</label>
                          <input type="password" class="form-control" id="password_usuario" name="password_usuario" placeholder="Password" required>
                        </div>
                      
                        
                      </div><!-- /.box-body -->

                      <div class="box-footer">
                        <button type="submit" class="btn btn-success">Cambiar Datos</button>
                      </div>
                    </form>
                  </div>
              </div><!-- end col mod 6 -->
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
      </div>
      <!-- /.modal-dialog -->

       

        <!-- contenido principal -->
        <section class="content"  id="contenido_principal">
        
        </section>
    
      <!-- cargador empresa -->
        <div style="display: none;" id="cargador_empresa" align="center">
          <br>
         
         <label style="color:#FFF; background-color:#ABB6BA; text-align:center">&nbsp;&nbsp;&nbsp;Espere... &nbsp;&nbsp;&nbsp;</label>

         <img src="imagenes/cargando.gif" align="middle" alt="cargador"> &nbsp;<label style="color:#ABB6BA">Realizando tarea solicitada ...</label>

          <br>
         <hr style="color:#003" width="50%">
         <br>
       </div>

      </div><!-- /.content-wrapper -->
     
    </div><!-- ./wrapper -->


    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
<!--     <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
 -->    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

    <script>  $("#content-wrapper").css("min-height","2000px"); </script>
   
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- Morris.js charts -->
<!--     <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
 -->    <script src="plugins/morris/morris.min.js"></script>
    <!-- Sparkline -->
    <script src="plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="plugins/knob/jquery.knob.js"></script>
    <!-- daterangepicker -->
<!--     <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
 -->    <script src="plugins/daterangepicker/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="plugins/datepicker/bootstrap-datepicker.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>

    <script src="plugins/summernote/summernote.js"></script>
    <!-- Slimscroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
 
 <!-- javascript del sistema laravel -->
   <script src="js/sistemalaravel.js"></script>
    <script src="js/highcharts.js"></script>
  <script src="js/graficas.js"></script>


   <script>cargarlistado(1);</script>


  </body>
</html>
