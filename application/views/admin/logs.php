<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>SF - System Logs</title>
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
                <li><a href="<?php echo site_url('admin/admincontroller/index'); ?>"><span class="glyphicons glyphicons-group"></span> Users Management <span class="sr-only">(current)</span></a></li>
                <li><a href="<?php echo site_url('admin/maintenancecontroller/index') ?>"><span class="glyphicons glyphicons-wrench"></span> Maintenance</a></li>
                <li class="active"><a href="<?php echo site_url('admin/logscontroller/logsindex') ?>"><span class="glyphicons glyphicons-note"></span> View System Logs</a></li>
                <li><a href="<?php echo site_url("admin/admincontroller/logout") ?>"><span class="glyphicons glyphicons-log-out"></span> Logout</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<div class="container-fluid">

    <div class="row text-center">
        <div class="col-sm">
            <h2><span class="glyphicons glyphicons-note"></span> System Logs</h2>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-1">

        </div>
        <div class="col-sm-2">
            <h3><a class="badge" href="" style="background-color: green">Export csv</a></h3>
        </div>
        <div class="col-sm-8">
            <h4>Filter options:</h4>
            <ul class="list-inline text-muted">
                <li>
                    <strong>Username: </strong>

                </li>
                <li>
                    <strong>Event type: </strong>

                </li>
            </ul>
            <a href="" class="badge" style="background-color: orange">ApplyFilter</a>
        </div>
        <div class="col-sm-1">

        </div>
    </div>

    <div class="row">
        <div class="col-sm-1">

        </div>
        <div class="col-sm-2">
            <h3 class="text-info">Date</h3>
        </div>
        <div class="col-sm-1">
            <h3 class="text-info">User</h3>
        </div>
        <div class="col-sm-1">
            <h3 class="text-info">Event</h3>
        </div>
        <div class="col-sm-6">
            <h3 class="text-info">Description</h3>
        </div>
        <div class="col-sm-1">

        </div>
    </div>

    <?php foreach ($logs as $log): ?>
    <div class="row">
        <div class="col-sm-1">

        </div>
        <div class="col-sm-2">
            <p><?php echo $log->date; ?></p>
        </div>
        <div class="col-sm-1">
            <p><?php echo $log->username; ?></p>
        </div>
        <div class="col-sm-1">
            <p><?php echo $log->event_type; ?></p>
        </div>
        <div class="col-sm-6">
            <p><?php echo $log->event; ?></p>
        </div>
        <div class="col-sm-1">

        </div>
    </div>
    <?php endforeach; ?>

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
