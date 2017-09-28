<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>SF - PLC Management</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('resources/css/bootstrap.min.css'); ?>" media="all"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('resources/css/bootstrap-theme.min.css'); ?>" media="all"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('resources/css/glyphicons.css'); ?>" media="all">

</head>
<body>


<div class="container-fluid">
    <nav class="navbar navbar-default" style="margin-top: 20px">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo site_url('admin/admincontroller/index'); ?>"><span class="glyphicons glyphicons-factory"></span> SF</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="<?php echo site_url('admin/admincontroller/index'); ?>"><span class="glyphicons glyphicons-group"></span> Users Management</a></li>
                    <li class="active"><a href="<?php echo site_url('admin/plccontroller/index'); ?>"><span class="glyphicons glyphicons-robot"></span> Infrastructure Management  <span class="sr-only">(current)</span></a></li>
                    <li><a href="<?php echo site_url('admin/maintenancecontroller/index'); ?>"><span class="glyphicons glyphicons-wrench"></span> Maintenance</a></li>
                    <li><a href="<?php echo site_url('admin/logscontroller/index'); ?>"><span class="glyphicons glyphicons-note"></span> View System Logs</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <img src="<?php echo base_url('resources/img/coming.jpg'); ?>" class="img-circle" height="25" width="25">
                            My Account
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php
                                $id_user = $this->session->userdata('id_user');
                                echo site_url("admin/admincontroller/edit_user/$id_user");
                                ?>"><span class="glyphicons glyphicons-user"></span> Edit Profile
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
    <div class="row text-center">
        <div class="col-sm">
            <h2 class="text-primary" style="color: green">
                <span class="glyphicons glyphicons-waste-pipe"></span>
                <br/>Function PLC Maintenance
            </h2>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-1">

        </div>
        <div class="col-sm-10">
            <a href="<?php echo site_url("admin/plccontroller/new_function_plc"); ?>">
                <h3 class="badge text-primary" style="background-color: green">Add New</h3>
            </a>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Function PLC</th>
                    <th>Description</th>
                    <th>Manage</th>
                </tr>

                </thead>
                <tbody>
                    <?php foreach ($functions as $function): ?>
                        <tr class="text-primary">
                            <td>
                                <strong class="text-uppercase">
                                    <a href="<?php echo site_url("admin/plccontroller/edit_function_plc/$function->id_function_plc"); ?>" style="text-decoration: none">
                                        <?php echo $function->function_plc; ?>
                                    </a>
                                </strong>
                            </td>
                            <td>
                                <?php echo $function->description; ?>
                            </td>
                            <td>
                                <a href="<?php echo site_url("admin/plccontroller/edit_function_plc/$function->id_function_plc"); ?>">
                                    <span class="glyphicons glyphicons-pencil" style="color: green"></span></a>
                                <a href="<?php echo site_url("admin/plccontroller/delete_function_plc/$function->id_function_plc"); ?>">
                                    <span class="glyphicons glyphicons-bin" style="color: red"></span></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="col-sm-1">

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