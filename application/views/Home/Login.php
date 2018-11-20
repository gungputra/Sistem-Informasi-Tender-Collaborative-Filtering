<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title id="">Login | e-Tender</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/Konsumen/bootstrap/css/bootstrap.min.css') ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('assets/Konsumen/font-awesome/css/font-awesome.min.css') ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url('assets/Konsumen/ionicons.min.css') ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/Konsumen/dist/css/AdminLTE.min.css') ?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url('assets/Konsumen/dist/css/skins/_all-skins.min.css') ?>">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url('assets/Konsumen/plugins/iCheck/flat/blue.css') ?>">
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?php echo base_url('assets/Konsumen/plugins/morris/morris.css') ?>">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo base_url('assets/Konsumen/plugins/jvectormap/jquery-jvectormap-1.2.2.css') ?>">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo base_url('assets/Konsumen/plugins/datepicker/datepicker3.css') ?>">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url('assets/Konsumen/plugins/daterangepicker/daterangepicker.css') ?>">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo base_url('assets/Konsumen/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') ?>">

  <link rel="stylesheet" href="<?php echo base_url('assets/Konsumen/plugins/datatables/dataTables.bootstrap.css') ?>">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body style="background-color:lightgray">
  <div class="login-box">
    <div class="login-logo">
      <b>e-Tender</b>
    </div>
    <?php if ($this->session->flashdata('error')): ?>
      <div class="callout callout-danger lead">
        <h4>Gagal Sign In !</h4>
        <p><?php echo $this->session->flashdata('error')?></p>
      </div>
    <?php endif; ?>
    <!-- /.login-logo -->
    <div class="login-box-body">


      <p class="login-box-msg">Sign in to start your session</p>

      <form action="<?php echo base_url('User/login') ?>" method="post">
        <div class="form-group has-feedback">
          <label for="username">Username</label>
          <input name="username" class="form-control" placeholder="username" type="text" required>
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <label for="password">Password</label>
          <input name="password" class="form-control" placeholder="Password" type="password" required>
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
      </form>

    </div>
    <!-- /.login-box-body -->
  </div>
  <script src="<?php echo base_url('assets/Konsumen/plugins/jQuery/jquery-2.2.3.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/Konsumen/plugins/dataTables/jquery.dataTables.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/Konsumen/plugins/dataTables/dataTables.bootstrap.min.js') ?>"></script>

  <!-- jQuery UI 1.11.4 -->
  <script src="<?php echo base_url('assets/Konsumen/jquery-ui.min.js') ?>"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

  <!-- Bootstrap 3.3.6 -->
  <script src="<?php echo base_url('assets/Konsumen/bootstrap/js/bootstrap.min.js') ?>"></script>
  <!-- Morris.js charts -->
  <script src="<?php echo base_url('assets/Konsumen/raphael-min.js') ?>"></script>
  <script src="<?php echo base_url('assets/Konsumen/plugins/morris/morris.min.js') ?>"></script>
  <!-- Sparkline -->
  <script src="<?php echo base_url('assets/Konsumen/plugins/sparkline/jquery.sparkline.min.js') ?>"></script>
  <!-- jvectormap -->
  <script src="<?php echo base_url('assets/Konsumen/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/Konsumen/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') ?>"></script>
  <!-- jQuery Knob Chart -->
  <script src="<?php echo base_url('assets/Konsumen/plugins/knob/jquery.knob.js') ?>"></script>
  <!-- daterangepicker -->
  <script src="<?php echo base_url('assets/Konsumen/moment.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/Konsumen/plugins/daterangepicker/daterangepicker.js') ?>"></script>
  <!-- datepicker -->
  <script src="<?php echo base_url('assets/Konsumen/plugins/datepicker/bootstrap-datepicker.js') ?>"></script>
  <!-- Bootstrap WYSIHTML5 -->
  <script src="<?php echo base_url('assets/Konsumen/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') ?>"></script>
  <!-- Slimscroll -->
  <script src="<?php echo base_url('assets/Konsumen/plugins/slimScroll/jquery.slimscroll.min.js') ?>"></script>
  <!-- FastClick -->
  <script src="<?php echo base_url('assets/Konsumen/plugins/fastclick/fastclick.js') ?>"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo base_url('assets/Konsumen/dist/js/app.min.js') ?>"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="<?php echo base_url('assets/Konsumen/dist/js/pages/dashboard.js') ?>"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?php echo base_url('assets/Konsumen/dist/js/demo.js') ?>"></script>
  <script>
  $.widget.bridge('uibutton', $.ui.button);
  </script>
