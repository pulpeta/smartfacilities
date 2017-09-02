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
                <li><a href="<?php echo site_url("welcome/trends") ?>">General Trends <span class="sr-only">(current)</span><span class="glyphicons glyphicons-pie-chart"></span></a></li>
                <li><a href="<?php echo site_url("welcome/login") ?>">Login <span class="glyphicons glyphicons-log-in"></span></a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-2  text-center">
                <b class="badge" style="font-size: 3em"><a style="text-decoration: none; color: white;" href="#">-</a>  25,5° C  <a style="text-decoration: none; color: white" href="#">+</a></b>
            </div>
            <div class="col-sm-8 text-center">
                <div class="col-xs-6">
                    <b style="font-size: 3em"><span class="glyphicons glyphicons-temperature x2" style="color: red"></span> 21.5°C</b>
                </div>
                <div class="col-xs-6">
                    <b style="font-size: 3em">35.20% <span class="glyphicons glyphicons-tint x2" style="color: dodgerblue"></span></b>
                </div>
            </div>
            <div class="col-sm-2 text-center">
                <?php
                    echo '<b class="badge" style="font-size: 2em"><span class="glyphicons glyphicons-power"></span></b>';
                ?>
            </div>
        </div>

        <div class="row" style="margin-top: 30px">
            <div class="col-sm-2 text-left">
                <h3 class="text-muted"><b>Range limits</b></h3>
                <?php foreach ($limits as $limit): ?>
                    <?php
                        echo '<p class="text-muted">Min: '.$limit->temp_min.'° C</p>';
                        echo '<p class="text-muted">Max: '.$limit->temp_max.'° C</p>';
                    ?>
                <?php endforeach; ?>
            </div>
            <div class="col-sm-8 text-center">

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
            <div class="col-sm-2 text-left">
                <h3 class="text-muted"><b>Last logon:</b></h3>
                <p class="text-muted">
                    <?php foreach ($names as $name) {
                        echo $name;
                    }
                    ?>
                </p>
            </div>
        </div>

        <footer class="panel-footer">
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