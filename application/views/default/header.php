<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{title}</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?php echo base_url();?>public/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>public/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>public/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>public/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>public/dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>public/bower_components/morris.js/morris.css">
  <link rel="stylesheet" href="<?php echo base_url();?>public/bower_components/jvectormap/jquery-jvectormap.css">
  <link rel="stylesheet" href="<?php echo base_url();?>public/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>public/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="<?php echo base_url();?>public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
 	<!-- jQuery 3 -->
<script src="<?php echo base_url();?>public/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url();?>public/bower_components/jquery-ui/jquery-ui.min.js"></script>
	<script> 
		var url_global = "<?php echo base_url();?>";
	</script>
	<script type="text/javascript">
  		var BASE_URL = "<?php echo base_url(); ?>";
  	</script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
	<script src="<?php echo base_url();?>public/dist/js/angular/1.2.1/angular.min.js"></script>
	<script src="<?php echo base_url();?>public/plugins/bootpag/jquery.bootpag.min.js"></script>

  <script src="<?php echo base_url();?>public/dist/css/rila_global.css"></script>
</head>
<body ng-app="rilaApps" class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <header   class="main-header">
    <!-- Logo -->
    <a href="<?php echo base_url('apps');?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">Apps</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">Apps Convert Phone</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="" class="sidebar-toggle" data-toggle="push-menu" role="button">
       <i class="fa fa-fw fa-hand-o-left"></i>
        <span class="sr-only fa fa-minus-square-o">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo base_url();?>public/images/avata/default.png" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $user_data["name"]; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo base_url();?>public/images/avata/default.png" class="img-circle" alt="User Image">

                <p>
                 <?php echo $user_data['username']; ?> <br>
                   <small>Quyền Hạn: <?php 
				   if(!empty($user_data['role'])){
					   if($user_data['role']==1){
						   echo "Admin";
					   }else{
						   echo "Thành Viên";
					   }
				   }
				   ?> </small>
                 
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?php echo base_url()?>cms/profile" class="btn btn-warning btn-flat">Thông Tin Tài Khoản</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo base_url()?>exits" class="btn btn-default btn-flat">Thoát ra</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
           
          </li>
        </ul>
      </div>
    </nav>
  </header>