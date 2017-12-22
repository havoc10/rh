<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sistema Laravel | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/iCheck/square/blue.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="/"><b>Sistema</b>Interlab</a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <h4 class="login-box-msg">« REGISTRO EN EL SISTEMA »</h4>
       
      <form action="register" method="post">
      <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">   
      <input type="hidden" name="tipo_usuario" value="1">   
          
          <div class="form-group<?= $errors->has('name') ? ' has-error' : '' ?>" >
            <label>Nombre</label>
            <input type="text" class="form-control" name="name" value="<?= old('name'); ?>">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>

             <?php if ($errors->has('name')){ ?>
                <span class="help-block">
                    <strong><?= $errors->first('name'); ?></strong>
                </span>
            <?php } ?>

          </div>


          <div class="form-group<?= $errors->has('email') ? ' has-error' : '' ?>">
             <label>Email</label>
            <input type="email" class="form-control" name="email" value="<?= old('email'); ?>">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
             <?php if ($errors->has('email')){ ?>
                <span class="help-block">
                    <strong><?= $errors->first('email'); ?></strong>
                </span>
            <?php } ?>

          </div>

          <div class="form-group<?= $errors->has('password') ? ' has-error' : '' ?>" >
                <label>Password</label>
            <input type="password" class="form-control" name="password" value="<?= old('password'); ?>" >
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>

            <?php if ($errors->has('password')){ ?>
                <span class="help-block">
                    <strong><?= $errors->first('password'); ?></strong>
                </span>
            <?php } ?>

          </div>

           <div class="form-group<?= $errors->has('password_confirmation') ? ' has-error' : '' ?>">
                <label>Confirmar Password</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" >

                    <?php if ($errors->has('password_confirmation')) {?>
                        <span class="help-block">
                            <strong><?= $errors->first('password_confirmation') ?></strong>
                        </span>
                    <?php } ?>
            </div>


         
          <div class="row">
            
          <div class="col-md-12 ">
              <?php if ($errors->has('registro')){ ?>
                <div class="callout callout-info">
                    <strong><?= $errors->first('registro'); ?></strong>
                </div>
            <?php } ?>
          </div>  
            
            <div class="col-xs-4">
              <button type="submit" class="btn btn-success btn-block btn-flat">Registrar</button>
             
            </div><!-- /.col -->
          </div>
        </form>

     
       

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.4 -->
    <script src="../../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="../../plugins/iCheck/icheck.min.js"></script>
   

    <script>
      
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>

    
  </body>
</html>
