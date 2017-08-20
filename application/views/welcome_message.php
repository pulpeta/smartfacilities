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
            <a class="navbar-brand" href="#">SF <span class="glyphicons glyphicons-factory"></span></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <!-- user menu -->
                <li class="active"><a href="/smartfacilities">General Trend <span class="sr-only">(current)</span><span class="glyphicons glyphicons-pie-chart"></span></a></li>
                <li><a href="<?php site_url("welcome/login") ?>">Login <span class="glyphicons glyphicons-log-in"></span></a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

    <div class="container-fluid">

        <div class="row text-center">
            <div class="col-sm-2  text-left">
                <h5>Set Temp.</h5>
            </div>
            <div class="col-sm-8 text-center">
                <h5><span class="glyphicons glyphicons-temperature"></span> 21° C</h5>
            </div>
            <div class="col-sm-2 text-right">
                <h5 class="text-muted">On-Off</h5>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-2 text-left">
                <h5>Temp. range limits</h5>
            </div>
            <div class="col-sm-8 text-center">
                <h5 class="text-muted">Trend</h5>
            </div>
            <div class="col-sm-2 text-right">
                <h5 class="text-muted">Last logon:</h5>
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

<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/npm.js"></script>
<script src="js/Chart.js"></script>
<script src="js/Chart.bundle.min.js"></script>

</html>