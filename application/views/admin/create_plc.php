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
            <h2 class="text-primary"><span class="glyphicons glyphicons-robot"></span> New PLC</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">

        </div>
        <div class="col-sm-4">
            <form class="form-group" name="edituser_form" method="post" action="<?php echo site_url('admin/plccontroller/create_plc'); ?>">
                <input class="form-control" type="text" name="name" placeholder="Name" required autofocus style="margin-top: 10px">
                <input class="form-control" type="text" name="location" placeholder="Location" required autofocus style="margin-top: 10px">
                <input class="form-control" type="text" name="ipaddress"  placeholder="IP Address" required autofocus style="margin-top: 10px">
                <input class="form-control" type="text" name="note"  placeholder="Note" style="margin-top: 10px">
                <label class="text-primary" for="selectrole" style="margin-top: 10px">Select Building</label>

                <select class="form-control" name="building_id" style="margin-top: 10px">
                    <?php foreach ($buildings as $building): ?>
                        <?php echo '<option value="'.$building->id_building.'">'.$building->building.'</option>'; ?>
                    <?php endforeach; ?>
                </select>

                <label class="text-primary" for="selectrole" style="margin-top: 10px">Select Function</label>

                <select class="form-control" name="function_plc_id" style="margin-top: 10px">
                    <?php foreach ($functions as $function): ?>
                        <?php echo '<option value="'.$function->id_function_plc.'">'.$function->function_plc.'</option>'; ?>
                    <?php endforeach; ?>
                </select>

                <div class="row text-center" style="margin-top: 10px">
                    <button class="btn btn-lg btn-primary " type="submit">Save</button>
                    <button class="btn btn-lg" type="reset">Reset</button>
                </div>
            </form>
            <div class="row text-center">
                <a href="<?php echo site_url('admin/plccontroller/indexplc'); ?>"><span class="glyphicons glyphicons-arrow-left x2"></span></a>
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