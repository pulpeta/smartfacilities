<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('resources/css/bootstrap.min.css'); ?>" media="all"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('resources/css/bootstrap-theme.min.css'); ?>" media="all"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('resources/css/glyphicons.css'); ?>" media="all">

</head>
<body>

<div class="container-fluid">

    <div class="row text-center">
        <div class="col-sm">
            <h2 class="text-primary" style="color: orange">
                <span class="glyphicons glyphicons-user"></span>+<span class="glyphicons glyphicons-robot"></span>
                <br/>New PLC Assignement
            </h2>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">

        </div>
        <div class="col-sm-4">
            <form class="form-group" name="assignement_form" method="post" action="<?php echo site_url('supervisor/supervisorcontroller/create_assignement'); ?>">

                <label class="text-primary" style="margin-top: 20px">Select User</label>
                <select class="form-control" name="user" style="margin-top: 10px">
                    <?php foreach ($users as $user): ?>
                        <?php echo '<option value="'.$user->id_user.'">'.$user->full_name.'</option>'; ?>
                    <?php endforeach; ?>
                </select>
                <label class="text-primary" style="margin-top: 20px">Select PLC</label>
                <select class="form-control" name="plc" style="margin-top: 10px">
                    <?php foreach ($plcs as $plc): ?>
                        <?php echo '<option value="'.$plc->id_plc.'">'.$plc->name.' ('.$plc->location.')</option>'; ?>
                    <?php endforeach; ?>
                </select>

                <div class="row text-center" style="margin-top: 10px">
                    <button class="btn btn-lg btn-primary " type="submit">Save</button>
                    <button class="btn btn-lg" type="reset">Reset</button>
                </div>
            </form>
            <div class="row text-center">
                <a href="<?php echo site_url('supervisor/supervisorcontroller/manage_plc_assignement'); ?>"><span class="glyphicons glyphicons-arrow-left x2"></span></a>
            </div>
        </div>
        <div class="col-sm-4">

        </div>
    </div>
</div>

</body>

<script src="<?php echo base_url('resources/js/jquery-3.2.1.min.js'); ?>"></script>
<script src="<?php echo base_url('resources/js/bootstrap.min.js'); ?>"></script>
<script src="<?php echo base_url('resources/js/npm.js'); ?>"></script>

</html>