<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Smart Facility 0.1</title>
    <link rel="stylesheet" type="text/css" href="resources/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="resources/css/glyphicons.css">

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
            <a class="navbar-brand" href="#"><span class="glyphicons glyphicons-factory"></span> SF</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <!-- user menu -->
                <li class="active"><a href="/smartfacilities">General Trend <span class="sr-only">(current)</span><span class="glyphicons glyphicons-pie-chart"></span></a></li>
                <!-- supervisor menu -->
                <li><a href="#">Users Permissions <span class="glyphicons glyphicons-keys"></span></a></li>
                <li><a href="#">Operational Settings <span class="glyphicons glyphicons-adjust-alt"></span></a></li>
                <!-- administrator menu -->
                <li><a href="#">Users Management <span class="glyphicons glyphicons-group"></span></a></li>
                <li><a href="#">Maintenance <span class="glyphicons glyphicons-blacksmith"></span></a></li>
                <li><a href="#">Logs <span class="glyphicons glyphicons-stethoscope"></span></a></li>

            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

    <div class="container-fluid">

    <div class="row">
        <div class="col-sm-4">

        </div>
        <div class="col-sm-4">

        </div>
        <div class="col-sm-4">

        </div>
    </div>

    <div class="row">
        <div class="col-sm-4">

        </div>
        <div class="col-sm-4">

        </div>
        <div class="col-sm-4">

        </div>
    </div>

    <footer class="panel-footer">
        <p class="text-muted">
            Smart Facility <span class="glyphicon glyphicon-copyright-mark"></span> Developed by Federico Sibella
        </p>
        <p>
            Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?>
        </p>
    </footer>

</body>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/npm.js"></script>
<script src="js/Chart.js"></script>
<script src="js/Chart.bundle.min.js"></script>

</html>