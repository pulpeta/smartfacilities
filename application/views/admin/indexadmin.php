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
                <li class="active"><a href="#"><span class="glyphicons glyphicons-group"></span> Users Management <span class="sr-only">(current)</span></a></li>
                <li><a href="#"><span class="glyphicons glyphicons-wrench"></span> Maintenance</a></li>
                <li><a href="#"><span class="glyphicons glyphicons-group"></span> View System Logs</a></li>
                <li><a href="#"><span class="glyphicons glyphicons-log-out"></span> Logout</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<div class="container-fluid">
    <div class="row text-center">
        <div class="col-sm">
            <h2><span class="glyphicons glyphicons-group"></span> Users Management</h2>
        </div>
    </div>
    <div class="table">
        <div class="row">
            <div class="col-sm-2 text-left text-uppercase"><h3 class="text-info">role</h3></div>
            <div class="col-sm-6 text-left text-uppercase"><h3 class="text-info">user</h3></div>
            <div class="col-sm-4 text-left text-lowercase"><h3 class="badge text-primary" style="background-color: green">Add new</h3></div>
        </div>
        <div class="row">
            <div class="col-sm-2 text-left"><p class="text-info">role</p></div>
            <div class="col-sm-6 text-left text-uppercase"><p class="text-info">user</p></div>
            <div class="col-sm-4 text-left">
                <span class="glyphicons glyphicons-pencil text-primary"></span>
                <span class="glyphicons glyphicons-bin text-danger"></span>
                <span class="glyphicons glyphicons-check text-info"></span>
            </div>
        </div>
        <?php foreach ($users as $user): ?>
        <div class="row">
            <div class="col-sm-2 text-left"><p class="text-info">role</p></div>
            <div class="col-sm-6 text-left text-uppercase"><p class="text-info">user</p></div>
            <div class="col-sm-4 text-left">
                <span class="glyphicons glyphicons-pencil text-primary"></span>
                <span class="glyphicons glyphicons-bin text-danger"></span>
                <span class="glyphicons glyphicons-unchecked text-info"></span>
            </div>
        </div>
        <?php endforeach; ?>
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

<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/npm.js"></script>
<script src="js/Chart.js"></script>
<script src="js/Chart.bundle.min.js"></script>

</html>