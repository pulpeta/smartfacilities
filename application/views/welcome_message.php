<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Smart Facility 0.1</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('resources/css/bootstrap.min.css'); ?>" media="all"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('resources/css/glyphicons.css'); ?>" media="all">

</head>
<body>
    <div class="container-fluid" style="margin-top: 20px">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo site_url("welcome/index") ?>">SF <span class="glyphicons glyphicons-factory"></span></a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <!-- user menu -->
                        <li>
                            <a href="<?php echo site_url("welcome/trends") ?>">
                                General Trends <span class="sr-only">(current)</span><span class="glyphicons glyphicons-pie-chart"></span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo site_url("welcome/wiki") ?>">
                                Wiki <span class="sr-only">(current)</span><span class="glyphicons glyphicons-question-sign"></span>
                            </a>
                        </li>
                        <li>
                                <a href="
                                    <?php
                                    $loggedin = $this->session->userdata('logged-in');
                                    if(!isset($loggedin) || $loggedin != TRUE){
                                        echo site_url("welcome/login");
                                        echo '">Login <span class="glyphicons glyphicons-log-in"></span>';
                                    }else{
                                        echo site_url('login/user_logout');
                                        echo '">Logout <span class="glyphicons glyphicons-log-out"></span>';
                                    }
                                    ?>
                                </a>
                            </li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        <div class="row text-center">
            <div class="col-sm-1">

            </div>
            <div class="col-sm-10">
                <h1 class="text-primary">Home Page</h1>
            </div>
            <div class="col-sm-1">

            </div>
        </div>
        <div class="row text-center">
            <div class="col-sm-1">

            </div>
            <div class="col-sm-10">
                <img src="<?php echo base_url('resources/img/coming.jpg'); ?>" class="img-circle" height="300" width="300" style="margin-bottom: 50px; margin-top: 30px">
            </div>
            <div class="col-sm-1">

            </div>
        </div>
        <div class="row">

        </div>

        <footer class="panel-footer" style="margin-top: 20px">
            <p class="text-muted text-center">
                Smart Facility <span class="glyphicons glyphicons-copyright-mark"></span> Developed by Federico Sibella
            </p>
            <p class="text-center">
                Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?>
            </p>
        </footer>
    </div>

</body>

<script src="<?php echo base_url('resources/js/jquery-3.2.1.min.js'); ?>"></script>
<script src="<?php echo base_url('resources/js/bootstrap.min.js'); ?>"></script>
<script src="<?php echo base_url('resources/js/npm.js'); ?>"></script>
<script src="<?php echo base_url('resources/js/Chart.js'); ?>"></script>
<!-- <script src="js/Chart.bundle.min.js"></script> -->

</html>