<?php //$param = $_SESSION['param']; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Satuan Kerja Perangkat Daerah Kabupaten Lamongan</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/vendor.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/flat-admin.css">
   <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/datepicker3.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/daterangepicker-bs3.css">
  
   <!-- time picker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-timepicker.min.css">

  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/custom.css">

  <!-- Theme -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/theme/blue-sky.css">
  <!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/theme/blue.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/theme/red.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/theme/yellow.css"> -->
</head>

<body>
  
  <div class="app app-blue-sky">
    <aside class="app-sidebar" id="sidebar">
      <div class="sidebar-header">
      <div>&nbsp;</div>
        <a class="" href="<?php echo base_url(); ?>"><span class="highlight"><img style="margin: auto; max-height: 110px; max-width: 110px; height: auto; width: auto;" class="media-object text-center" src="<?php echo base_url().'/assets/images' ?>/kablamongan.png" alt="Satuan Kerja Perangkat Daerah Kabupaten Lamongan"></span></a>
        <button type="button" class="sidebar-toggle"><i class="fa fa-times"></i></button>
      </div>
      <div class="sidebar-menu">
        <ul class="sidebar-nav">
        
        <?php //if ($_SESSION['masuk']['status'] == 1){ ?>
          <li <?php echo ($class == 'skpd') ? 'class="active"' : '' ; ?>>
            <a href="<?php echo base_url(); ?>skpd">
              <div class="icon">
                <i class="fa fa-bank" aria-hidden="true"></i>
              </div>
              <div class="title text-capitalize">SKPD</div>
            </a>
          </li>
          
          <li <?php echo ($class == 'temuan') ? 'class="active"' : '' ; ?>>
            <a href="<?php echo base_url(); ?>temuan">
              <div class="icon">
                <i class="fa fa-list-alt" aria-hidden="true"></i>
              </div>
              <div class="title text-capitalize">Temuan</div>
            </a>
          </li>

          <li <?php echo ($class == 'berita') ? 'class="active"' : '' ; ?>>
            <a href="<?php echo base_url(); ?>berita">
              <div class="icon">
                <i class="fa fa-file-text-o" aria-hidden="true"></i>
              </div>
              <div class="title text-capitalize">Berita Acara</div>
            </a>
          </li>

          <li <?php echo ($class == 'polling') ? 'class="active"' : '' ; ?>>
            <a href="<?php echo base_url(); ?>polling">
              <div class="icon">
                <i class="fa fa-pie-chart" aria-hidden="true"></i>
              </div>
              <div class="title text-capitalize">Polling</div>
            </a>
          </li>

          <li <?php echo ($class == 'user') ? 'class="active"' : '' ; ?>>
            <a href="<?php echo base_url(); ?>user">
              <div class="icon">
                <i class="fa fa-users" aria-hidden="true"></i>
              </div>
              <div class="title text-capitalize">User</div>
            </a>
          </li>
        <?php //} ?>

        </ul>
      </div>
      <div class="sidebar-footer">
        <!-- <ul class="menu">
          <li>
            <a href="/" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-cogs" aria-hidden="true"></i>
            </a>
          </li>
          <li><a href="#"><span class="flag-icon flag-icon-th flag-icon-squared"></span></a></li>
        </ul> -->
      </div>
    </aside>

    <script type="text/ng-template" id="sidebar-dropdown.tpl">
      <div class="dropdown-background">
        <div class="bg"></div>
      </div>
      <div class="dropdown-container">
        {{list}}
      </div>
    </script>
    <div class="app-container">

    <nav class="navbar navbar-default" id="navbar">
      <div class="container-fluid">
        <div class="navbar-collapse collapse in">
          <ul class="nav navbar-nav navbar-mobile">
            <li>
              <button type="button" class="sidebar-toggle">
                <i class="fa fa-bars"></i>
              </button>
            </li>
            <li class="logo">
              <a class="navbar-brand" href="#"><span class="highlight">Satuan Kerja Perangkat Daerah Kabupaten Lamongan</span></a>
            </li>
            <li>
              <button type="button" class="navbar-toggle">
                <img class="profile-img" src="<?php echo base_url(); ?>assets/images/profile.png">
              </button>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-left">
            <li class="navbar-title">Dashboard</li>
            <!-- <li class="navbar-search hidden-sm">
              <input id="search" type="text" placeholder="Search..">
              <button class="btn-search"><i class="fa fa-search"></i></button>
            </li> -->
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown profile">
              <a href="/html/pages/profile" class="dropdown-toggle"  data-toggle="dropdown">
                <img class="profile-img" src="<?php echo base_url(); ?>/assets/images/profile.png">
                <div class="title">Profile</div>
              </a>
              <div class="dropdown-menu">
                <div class="profile-info">
                  <h4 class="username"><?php //echo $_SESSION['masuk']['nama']; ?></h4>
                </div>
                <ul class="action">
                  <?php //$direct = ($_SESSION['masuk']['status'] == 5) ? 'resto/' : 'user/' ; ?>
                  <?php //$id = ($_SESSION['masuk']['status'] == 1) ? $_SESSION['masuk']['id'] : '' ; ?>
                  <li><a onclick="window.location='<?php //echo base_url().$direct.$id; ?>'">Profile</a></li>
                  <li><a onclick="window.location='<?php echo base_url(); ?>logout'">Logout</a></li>
                </ul>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="btn-floating" id="help-actions">
      <div class="btn-bg" style="background-color: #39c3da;box-shadow: #39c3da 0px 1px 3px 0px;"></div>
      <button type="button" class="btn btn-info btn-toggle" data-toggle="toggle" data-target="#help-actions">
        <i class="icon fa fa-plus"></i>
        <span class="help-text">Shortcut</span>
      </button>
      <div class="toggle-content">
        <ul class="actions">
          <li><a onclick="window.location='<?php echo base_url(); ?>skpd'"><i class="fa fa-bank" aria-hidden="true"></i>&nbsp;SKPD</a></li>
          <li><a onclick="window.location='<?php echo base_url(); ?>temuan/form'"><i class="fa fa-list-alt" aria-hidden="true"></i>&nbsp;Temuan</a></li>
          <li><a onclick="window.location='<?php echo base_url(); ?>polling'"><i class="fa fa-pie-chart" aria-hidden="true"></i>&nbsp;Polling</a></li>
          <li><a onclick="window.location='<?php echo base_url(); ?>user'"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;User</a></li>
        </ul>
      </div>
    </div>