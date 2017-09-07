<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>SF - Admin Area</title>
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
                <li class="active"><a href="<?php echo site_url('admin/admincontroller/index'); ?>"><span class="glyphicons glyphicons-group"></span> Users Management <span class="sr-only">(current)</span></a></li>
                <li><a href="<?php echo site_url('admin/maintenancecontroller/index') ?>"><span class="glyphicons glyphicons-wrench"></span> Maintenance</a></li>
                <li><a href="<?php echo site_url('admin/logscontroller/logsindex') ?>"><span class="glyphicons glyphicons-note"></span> View System Logs</a></li>
                <li><a href="<?php echo site_url("admin/admincontroller/logout") ?>"><span class="glyphicons glyphicons-log-out"></span> Logout</a></li>
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
            <div class="col-sm-1"></div>
            <div class="col-sm-2 text-left"><h3 class="text-info">Role</h3></div>
            <div class="col-sm-3 text-left"><h3 class="text-info">User</h3></div>
            <div class="col-sm-2"></div>
            <div class="col-sm-3 text-left">
                <a href="<?php echo site_url("admin/admincontroller/create_user"); ?>">
                    <h3 class="badge text-primary" style="background-color: green">Add New</h3>
                </a>
            </div>
            <div class="col-sm-1"></div>
        </div>

        <?php foreach ($users as $user): ?>
        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-2 text-left">
                <?php if (($user->enabled) == 1){
                    echo '<p class="text-info">'.$user->role.'</p>';
                }else{
                    echo '<p class="text-info" style="text-decoration: line-through">'.$user->role.'</p>';
                }
                ?>
            </div>
            <div class="col-sm-3 text-left text-uppercase">
                <?php if (($user->enabled) == 1){
                    echo '<p class="text-info">'.$user->name . '  -  ' . $user->username . '</p>';
                }else{
                    echo '<p class="text-info" style="text-decoration: line-through">'.$user->name . '  -  ' . $user->username . '</p>';
                }
                ?>
            </div>
            <div class="col-sm-2 text-left text-uppercase">
                <p class="text-info">
                    <?php
                    echo "Last logon at: ";
                    echo $user->lastlogonAt;
                    ?>
                </p>
            </div>
            <div class="col-sm-3 text-left">
                <p>
                    <a href="<?php echo site_url("admin/admincontroller/edit_user/$user->id_user"); ?>">
                        <span class="glyphicons glyphicons-pencil text-primary"></span></a>

                    <a href="<?php echo site_url("admin/admincontroller/delete_user/$user->id_user"); ?>">
                        <span class="glyphicons glyphicons-bin text-danger"></span></a>

                    <a href="<?php
                                if(($user->enabled) == 1){
                                        echo site_url("admin/admincontroller/disable_user/$user->id_user");
                                        echo '"><span class="glyphicons glyphicons-check text-info"></span></a>';
                                    }else{
                                        echo site_url("admin/admincontroller/enable_user/$user->id_user");
                                        echo '"><span class="glyphicons glyphicons-unchecked text-info"></span></a>';
                                    }
                                ?>
                </p>
            </div>
            <div class="col-sm-1"></div>
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

<script src="<?php echo base_url('resources/js/jquery-3.2.1.min.js'); ?>"></script>
<script src="<?php echo base_url('resources/js/bootstrap.min.js'); ?>"></script>
<script src="<?php echo base_url('resources/js/npm.js'); ?>"></script>

</html>