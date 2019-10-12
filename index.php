<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="Stack admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
  <meta name="keywords" content="admin template, stack admin template, dashboard template, flat admin template, responsive admin template, web app">
  <meta name="author" content="PIXINVENT">
  <title>PSO - Learning Path Sequence</title>
  <link rel="apple-touch-icon" href="app-assets/images/ico/apple-icon-120.png">
  <link rel="shortcut icon" type="image/x-icon" href="app-assets/images/ico/favicon.ico">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i"
  rel="stylesheet">
  <!-- BEGIN VENDOR CSS-->
  <link rel="stylesheet" type="text/css" href="app-assets/css/vendors.css">
  <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/charts/jquery-jvectormap-2.0.3.css">
  <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/charts/morris.css">
  <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/extensions/unslider.css">
  <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/weather-icons/climacons.min.css">
  <!-- END VENDOR CSS-->
  <!-- BEGIN STACK CSS-->
  <link rel="stylesheet" type="text/css" href="app-assets/css/app.css">
  <!-- END STACK CSS-->
  <!-- BEGIN Page Level CSS-->
  <link rel="stylesheet" type="text/css" href="app-assets/css/core/menu/menu-types/vertical-menu.css">
  <!-- link(rel='stylesheet', type='text/css', href=app_assets_path+'/css'+rtl+'/pages/users.css')-->
  <!-- END Page Level CSS-->
  <!-- BEGIN Custom CSS-->
  <link rel="stylesheet" type="text/css" href="assets/css/style.css">
  <!-- END Custom CSS-->
</head>
<body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar"
data-open="click" data-menu="vertical-menu" data-col="2-columns">
  <!-- fixed-top-->
  <nav class="header-navbar navbar-expand-md navbar navbar-with-menu fixed-top navbar-semi-dark navbar-shadow">
    <div class="navbar-wrapper">
      <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
          <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
          <li class="nav-item">
            <a class="navbar-brand" href="index.php">
              <img class="brand-logo" alt="stack admin logo" src="app-assets/images/logo/stack-logo-light.png">
              <h2 class="brand-text">PSO - LPS</h2>
            </a>
          </li>
          <li class="nav-item d-md-none">
            <a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="fa fa-ellipsis-v"></i></a>
          </li>
        </ul>
      </div>
      <div class="navbar-container content">
        <div class="collapse navbar-collapse" id="navbar-mobile">
          <ul class="nav navbar-nav mr-auto float-left"></ul>
          <ul class="nav navbar-nav float-right">
            <li class="dropdown dropdown-user nav-item">
              <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                <span class="avatar avatar-online">
                  <img src="app-assets/images/portrait/small/avatar-s-1.png" alt="avatar"><i></i></span>
                <span class="user-name">Testing</span>
              </a>
              <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="user-profile.html"><i class="ft-user"></i> Edit Profile</a>
                <a class="dropdown-item" href="login-with-bg-image.html"><i class="ft-power"></i> Logout</a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">
      <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
        <li class=" navigation-header">
          <span>General</span><i class=" ft-minus" data-toggle="tooltip" data-placement="right"
          data-original-title="General"></i>
        </li>
        <li class=" nav-item"><a href="index.php"><i class="ft-home"></i><span class="menu-title" data-i18n="">Uji LPS</span></a>
        </li>
      </ul>
    </div>
  </div>
  <div class="app-content content">
    <div class="content-wrapper" style="padding-bottom: 0px;padding-top: 0px;">
      <div class="content-header row">
      </div>
      <div class="content-body">

        <div class="row">
          <div class="col-md-12">
            <div class="card" style="height: 550px;">
              <div class="card-header">
                <h4 class="card-title">Pengujian PSO</h4>
              </div>
              <div class="card-content px-1">
                <form class="form" name="form_pso" action="hasil_uji.php" method="POST">
                  <div class="row">
                    <div class="col-md-2">
                      <div class="form-group">
                          <label for="kategori">Course Prequisite</label>
                          <select class="select2 form-control" name="cp">
                            <optgroup label="--Pilihan CP--">
                              <option value="1">CP 1</option>
                              <option value="2">CP 2</option>
                              <option value="3">CP 3</option>
                            </optgroup>   
                          </select>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="projectinput8">Jumlah Partikel</label>
                        <input type="text" id="pilihan" class="form-control" placeholder="Jumlah Partikel" name="jml_partikel" value="3">
                      </div>
                    </div>

                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="projectinput8">Nilai K</label>
                        <input type="text" id="pilihan" class="form-control" placeholder="Nilai K" name="k" value="100">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="projectinput8">Nilai A</label>
                        <input type="text" id="pilihan" class="form-control" placeholder="Nilai A" name="nilai_a" value="0.2" >
                      </div>
                    </div>

                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="projectinput8">Nilai T1</label>
                        <input type="text" id="pilihan" class="form-control" placeholder="Nilai T1" name="t1" value="1" >
                      </div>
                    </div>

                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="projectinput8">Total Iterasi</label>
                        <input type="text" id="pilihan" class="form-control" placeholder="Total Iterasi" name="iterasi" value="5">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="projectinput8">Nilai B</label>
                        <input type="text" id="pilihan" class="form-control" placeholder="Nilai B" name="nilai_b" value="0.6">
                      </div>
                    </div>

                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="projectinput8">Nilai T2</label>
                        <input type="text" id="pilihan" class="form-control" placeholder="Nilai T2" name="t2" value="5" >
                      </div>
                    </div>
                  </div>

                  <button type="button" class="btn btn-warning mr-1">
                    <i class="ft-x"></i> Cancel
                  </button>
                  <button type="submit" class="btn btn-primary" name="btn-generate">
                    <i class="fa fa-check-square-o"></i> Uji PSO
                  </button>
                </form>
              </div>
        
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <footer class="footer footer-static footer-light navbar-border">
    <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2">
      <span class="float-md-left d-block d-md-inline-block">Copyright &copy; 2019 <a class="text-bold-800 grey darken-2" href=""
        target="_blank">Syams Fathur</a></span>
      <span class="float-md-right d-block d-md-inline-block d-none d-lg-block">Hand-crafted & Made with <i class="ft-heart pink"></i></span>
    </p>
  </footer>
  <!-- BEGIN VENDOR JS-->
  <script src="app-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
  <!-- BEGIN VENDOR JS-->
  <!-- BEGIN PAGE VENDOR JS-->
  <script src="app-assets/vendors/js/extensions/jquery.knob.min.js" type="text/javascript"></script>
  <script src="app-assets/js/scripts/extensions/knob.js" type="text/javascript"></script>
  <script src="app-assets/vendors/js/charts/raphael-min.js" type="text/javascript"></script>
  <script src="app-assets/vendors/js/charts/morris.min.js" type="text/javascript"></script>
  <script src="app-assets/vendors/js/charts/jvector/jquery-jvectormap-2.0.3.min.js"
  type="text/javascript"></script>
  <script src="app-assets/vendors/js/charts/jvector/jquery-jvectormap-world-mill.js"
  type="text/javascript"></script>
  <script src="app-assets/data/jvector/visitor-data.js" type="text/javascript"></script>
  <script src="app-assets/vendors/js/charts/chart.min.js" type="text/javascript"></script>
  <script src="app-assets/vendors/js/charts/jquery.sparkline.min.js" type="text/javascript"></script>
  <script src="app-assets/vendors/js/extensions/unslider-min.js" type="text/javascript"></script>
  <link rel="stylesheet" type="text/css" href="app-assets/css/core/colors/palette-climacon.css">
  <link rel="stylesheet" type="text/css" href="app-assets/fonts/simple-line-icons/style.min.css">
  <!-- END PAGE VENDOR JS-->
  <!-- BEGIN STACK JS-->
  <script src="app-assets/js/core/app-menu.js" type="text/javascript"></script>
  <script src="app-assets/js/core/app.js" type="text/javascript"></script>
  <script src="app-assets/js/scripts/customizer.js" type="text/javascript"></script>
  <!-- END STACK JS-->
  <!-- BEGIN PAGE LEVEL JS-->
  <script src="app-assets/js/scripts/pages/dashboard-analytics.js" type="text/javascript"></script>
  <!-- END PAGE LEVEL JS-->
</body>
</html>