<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>SF - DB Management</title>
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
            <a class="navbar-brand" href="<?php echo site_url('welcome/index'); ?>"><span class="glyphicons glyphicons-factory"></span> SF</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="<?php echo site_url('admin/admincontroller/index'); ?>">
                        <span class="glyphicons glyphicons-group"></span> Users Management <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo site_url('admin/plccontroller/index'); ?>">
                        <span class="glyphicons glyphicons-robot"></span> PLC Management
                    </a>
                </li>
                <li class="active">
                    <a href="<?php echo site_url('admin/maintenancecontroller/index'); ?>">
                        <span class="glyphicons glyphicons-wrench"></span> Maintenance
                    </a>
                </li>
                <li>
                    <a href="<?php echo site_url('admin/logscontroller/logsindex'); ?>">
                        <span class="glyphicons glyphicons-note"></span> View System Logs
                    </a>
                </li>
                <li>
                    <a href="<?php echo site_url("admin/admincontroller/logout"); ?>">
                        <span class="glyphicons glyphicons-log-out"></span> Logout
                    </a>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<div class="container-fluid">

    <div class="row text-center">
        <div class="col-sm">
            <h2 class="text-primary"><span class="glyphicons glyphicons-wrench"></span> Maintenance</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-1">

        </div>
        <div class="col-sm-10">
            <div class="row text-left">
                <div class="col-xs-4">
                    <h3 class="text-center text-primary"><span class="glyphicons glyphicons-database"></span> Data Base</h3>
                    <p style="color: royalblue"><span class="glyphicons glyphicons-disk-export"></span> Export System Data Base</p>
                </div>
                <div class="col-xs-4">
                    <h3 class="text-center text-primary"><span class="glyphicons glyphicons-cargo"></span> Tables</h3>
                    <p style="color: limegreen"><span class="glyphicons glyphicons-stopwatch"></span> Tables optimization</p>
                    <p style="color: limegreen"><span class="glyphicons glyphicons-settings"></span> Tables maintenance</p>
                </div>
                <div class="col-xs-4">
                    <h3 class="text-center text-primary"><span class="glyphicons glyphicons-notes-2"></span> Logs</h3>
                    <p style="color: orange"><span class="glyphicons glyphicons-cleaning"></span> Clear logs older than 1 year</p>
                    <p><a style="color: red; text-decoration: none" href="<?php echo site_url('admin/maintenancecontroller/clear_all_logs')?>"><span class="glyphicons glyphicons-skull"></span> Clear all logs</a></p>
                </div>
            </div>
            <div class="row text-left">
                <div class="col-xs-4"></div>
                <div class="col-xs-4"></div>
                <div class="col-xs-4"></div>
            </div>
        </div>
        <div class="col-sm-1">

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
</div>

</body>

<script src="<?php echo base_url('resources/js/jquery-3.2.1.min.js'); ?>"></script>
<script src="<?php echo base_url('resources/js/bootstrap.min.js'); ?>"></script>
<script src="<?php echo base_url('resources/js/npm.js'); ?>"></script>

</html>