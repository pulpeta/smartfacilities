<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>SF General Trends</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('resources/css/bootstrap.min.css'); ?>" media="all"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('resources/css/glyphicons.css'); ?>" media="all">

</head>
<body>

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
                <li class="active"><a href="<?php echo site_url("welcome/trends") ?>">General Trends <span class="sr-only">(current)</span><span class="glyphicons glyphicons-pie-chart"></span></a></li>
                <li><a href="<?php echo site_url("welcome/login") ?>">Login <span class="glyphicons glyphicons-log-in"></span></a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

    <div class="container-fluid">

    <div class="row text-center">
        <div class="col-sm-1">
            1
        </div>
        <div class="col-sm-10">
            <?php foreach ($trends as $trend): ?>
                <p>
                    <?php
                        echo $trend->temp.'° C';
                        echo $trend->humid.' %';
                        echo $trend->date;
                    ?>
                </p>
            <?php endforeach; ?>
        </div>
        <div class="col-sm-1">
            3
        </div>
    </div>

    <div class="row text-center">
        <div class="col-sm-4">
            4
        </div>
        <div class="col-sm-4">
            5
        </div>
        <div class="col-sm-4">
            6
        </div>
    </div>

    <footer class="panel-footer text-center">
        <p class="text-muted">
            Smart Facility <span class="glyphicon glyphicon-copyright-mark"></span> Developed by Federico Sibella
        </p>
        <p>
            Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?>
        </p>
    </footer>

</body>

<script src="<?php echo base_url('resources/js/jquery-3.2.1.min.js'); ?>"></script>
<script src="<?php echo base_url('resources/js/bootstrap.min.js'); ?>"></script>
<script src="<?php echo base_url('resources/js/npm.js'); ?>"></script>
<script src="<?php echo base_url('resources/js/Chart.js'); ?>"></script>

</html>