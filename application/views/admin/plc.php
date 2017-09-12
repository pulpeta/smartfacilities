<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>SF - PLC Management</title>
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
                <li class="active"><a href="<?php echo site_url('admin/plccontroller/index'); ?>"><span class="glyphicons glyphicons-robot"></span> PLC Management</a></li>
                <li><a href="<?php echo site_url('admin/maintenancecontroller/index'); ?>"><span class="glyphicons glyphicons-wrench"></span> Maintenance</a></li>
                <li><a href="<?php echo site_url('admin/logscontroller/logsindex'); ?>"><span class="glyphicons glyphicons-note"></span> View System Logs</a></li>
                <li><a href="<?php echo site_url("admin/admincontroller/logout"); ?>"><span class="glyphicons glyphicons-log-out"></span> Logout</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<div class="container-fluid">

    <div class="row text-center">
        <div class="col-sm">
            <h2 class="text-primary"><span class="glyphicons glyphicons-robot"></span>PLC Maintenance</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-1">

        </div>
        <div class="col-sm-4">
            <div class="row">
                <h3 class="text-primary"><span class="glyphicons glyphicons-robot"></span> PLC</h3>
            </div>
            <div class="row">
                <div class="col-xs-4">
                    <h4 class="text-primary">PLC List</h4>
                </div>
                <div class="col-xs-4">
                    <a href="<?php echo site_url("admin/plccontroller/new_plc"); ?>">
                        <h4 class="badge text-primary" style="background-color: green">Add New</h4>
                    </a>
                </div>
                <div class="col-xs-4">

                </div>
            </div>
            <?php foreach ($plcs as $plc): ?>
                <div class="row">
                    <div class="col-xs-4">
                        <p class="text-primary">
                            <strong class="text-uppercase"><?php echo $plc->name; ?></strong>
                            <?php echo $plc->building; ?>
                            <br/>
                            <?php echo $plc->ip_address; ?>
                            <br/>
                            <?php echo $plc->function_plc; ?>
                        </p>
                    </div>
                    <div class="col-xs-4">
                        <a href="<?php echo site_url("admin/plccontroller/edit_plc/$plc->id_plc"); ?>">
                            <span class="glyphicons glyphicons-pencil" style="color: green"></span></a>
                        <a href="<?php echo site_url("admin/plccontroller/delete_plc/$plc->id_plc"); ?>">
                            <span class="glyphicons glyphicons-bin" style="color: red"></span></a>
                    </div>
                    <div class="col-xs-4">

                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="col-sm-3">
            <div class="row">
                <h3 class="text-primary"><span class="glyphicons glyphicons-building"></span> Buildings</h3>
            </div>
            <div class="row">
                <div class="col-xs-4">
                    <h4 class="text-primary">Buildings info</h4>
                </div>
                <div class="col-xs-4">
                    <a href="<?php echo site_url("admin/plccontroller/new_building"); ?>">
                        <h4 class="badge text-primary" style="background-color: green">Add New</h4>
                    </a>
                </div>
                <div class="col-xs-4">

                </div>
            </div>
            <?php foreach ($buildings as $building): ?>
                <div class="row">
                    <div class="col-xs-4">
                        <p class="text-primary">
                            <strong class="text-uppercase"><?php echo $building->building; ?></strong>
                            <br/>
                            <?php echo $building->building_code; ?>
                        </p>
                    </div>
                    <div class="col-xs-4">
                        <a href="<?php echo site_url("admin/plccontroller/edit_building/$building->id_building"); ?>">
                            <span class="glyphicons glyphicons-pencil" style="color: green"></span></a>
                        <a href="<?php echo site_url("admin/plccontroller/delete_building/$building->id_building"); ?>">
                            <span class="glyphicons glyphicons-bin" style="color: red"></span></a>
                    </div>
                    <div class="col-xs-4">

                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="col-sm-3">
            <div class="row">
                <h3 class="text-primary"><span class="glyphicons glyphicons-exclamation-sign"></span>Functions PLC</h3>
            </div>
            <div class="row">
                <div class="col-xs-4">
                    <h4 class="text-primary">Function list</h4>
                </div>
                <div class="col-xs-4">
                    <a href="<?php echo site_url("admin/plccontroller/new_function_plc"); ?>">
                        <h4 class="badge text-primary" style="background-color: green">Add New</h4>
                    </a>
                </div>
                <div class="col-xs-4">

                </div>
            </div>

            <?php foreach ($functions as $function): ?>
                <div class="row">
                    <div class="col-xs-4">
                        <p class="text-primary">
                            <strong class="text-uppercase"><?php echo $function->function_plc; ?></strong>
                            <br/>
                            <?php echo $function->description; ?>
                        </p>
                    </div>
                    <div class="col-xs-4">
                        <a href="<?php echo site_url("admin/plccontroller/edit_function_plc/$function->id_function_plc"); ?>">
                            <span class="glyphicons glyphicons-pencil" style="color: green"></span></a>
                        <a href="<?php echo site_url("admin/plccontroller/delete_function_plc/$function->id_function_plc"); ?>">
                            <span class="glyphicons glyphicons-bin" style="color: red"></span></a>
                    </div>
                    <div class="col-xs-4">

                    </div>
                </div>
            <?php endforeach; ?>
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