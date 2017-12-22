<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sistema Interlab | Log in</title>
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
   
  </head>
  <body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="#"><b>Sistema</b>Interlab</a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <h4 class="text-center login-box-msg">« INGRESA AL SISTEMA » </h4>

        <form action="login" method="post">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">   
            
          <div class="form-group<?= $errors->has('email') ? ' has-error' : '' ?>">
            <input type="email" class="form-control" name="email"  value="<?= old('email'); ?>" >
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            <?php if ($errors->has('email')){ ?>
                <span class="help-block">
                    <strong><?= $errors->first('email'); ?></strong>
                </span>
            <?php } ?>

          </div>
          <div class="form-group<?= $errors->has('password') ? ' has-error' : '' ?>" >
            <input type="password" class="form-control" name="password" value="<?= old('password'); ?>">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            <?php if ($errors->has('password')){ ?>
                <span class="help-block">
                    <strong><?= $errors->first('password'); ?></strong>
                </span>
            <?php } ?>
          </div>

          <div class="row">
            <div class="col-xs-4">
              <button type="submit" class="btn btn-success btn-block btn-flat">Ingresar</button>
              <br>
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
