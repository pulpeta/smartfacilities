<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>SF - Supervisor Area</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('resources/css/bootstrap.min.css'); ?>" media="all"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('resources/css/glyphicons.css'); ?>" media="all">

</head>
<body>
<div class="container-fluid">

    <nav class="navbar navbar-inverse" style="margin-top: 20px">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo site_url('supervisor/supervisorcontroller/index'); ?>"><span class="glyphicons glyphicons-factory"></span> SF</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="<?php echo site_url('supervisor/supervisorcontroller/index')?>">
                            <span class="glyphicons glyphicons-robot"></span><strong>+</strong><span class="glyphicons glyphicons-pencil"></span> Set PLC Settings<span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('supervisor/supervisorcontroller/manage_plc_assignement'); ?>">
                            <span class="glyphicons glyphicons-user"></span><strong>+</strong><span class="glyphicons glyphicons-robot"></span> Assign PLC
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('supervisor/supervisorcontroller/remote_management')?>">
                            <span class="glyphicons glyphicons-laptop"></span>+<span class="glyphicons glyphicons-robot"></span></span> PLC Remote management
                        </a>
                    </li>
                    <li class="active">
                        <a href="<?php echo site_url('supervisor/supervisorcontroller/reports_charts')?>">
                            <span class="glyphicons glyphicons-stats"></span></span> Reports and Charts<span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <img src="<?php echo base_url('resources/img/coming.jpg'); ?>" class="img-circle" height="25" width="25">
                            My Account
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="<?php
                                            $id_user = $this->session->userdata('id_user');
                                            echo site_url("supervisor/supervisorcontroller/edit_profile/$id_user");
                                        ?>">
                                    <span class="glyphicons glyphicons-user"></span>
                                    Edit Profile
                                </a>
                            </li>
                            <li role="separator" class="divider"></li>
                            <a href="<?php echo site_url("login/user_logout"); ?>" style="text-decoration: none">
                                <span class="glyphicons glyphicons-log-out"></span> Logout
                            </a>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>

    <div class="container-fluid">
        <div class="row text-center">
            <h2 class="text-primary">
                <span class="glyphicons glyphicons-stats"></span>
                <br/>Reports and Charts
            </h2>
        </div>
        <div class="row" style="margin-top: 30px">
            <div class="col-sm-1"></div>
            <div class="col-sm-10">

            </div>
            <div class="col-sm-1"></div>
        </div>
        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-10">

            </div>
            <div class="col-sm-1">

            </div>
        </div>
    </div>

    <footer class="panel-footer text-center" style="margin-top: 20px">
        <p class="text-muted">
            Smart Facility <span class="glyphicon glyphicon-copyright-mark"></span> Developed by Federico Sibella
        </p>
        <p>
            Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?>
        </p>
    </footer>
</div>

</body>

<script src="<?php echo base_url('resources/js/jquery-3.2.1.min.js'); ?>"></script>
<script src="<?php echo base_url('resources/js/bootstrap.min.js'); ?>"></script>
<script src="<?php echo base_url('resources/js/npm.js'); ?>"></script>

</html>