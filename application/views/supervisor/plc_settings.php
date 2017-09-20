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
            <h2 class="text-primary"><span class="glyphicons glyphicons-robot"></span> PLC Settings</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-5">

        </div>
        <div class="col-sm-2">
            <form class="form-group" name="edituser_form" method="post" action="<?php echo site_url('supervisor/supervisorcontroller/update_plc'); ?>">
                <?php foreach ($plcs as $plc): ?>
                    <input type="hidden" name="id_plc" value="<?php echo $plc->id_plc ?>">
                    <h3 class="text-primary text-uppercase text-center" style="margin-top: 10px"><?php echo $plc->name ?></h3>
                    <label class="text-primary" style="margin-top: 10px">Min Temp</label>
                    <input class="form-control text-center" type="text" name="temp_min" value="<?php echo $plc->temp_min ?>" autofocus style="margin-top: 10px">
                    <label class="text-primary" style="margin-top: 10px">Max Temp</label>
                    <input class="form-control text-center" type="text" name="temp_max"  value="<?php echo $plc->temp_max ?>" autofocus style="margin-top: 10px">
                    <label class="text-primary" style="margin-top: 10px">Min Hum</label>
                    <input class="form-control text-center" type="text" name="hum_min"  value="<?php echo $plc->hum_min ?>" style="margin-top: 10px">
                    <label class="text-primary" for="selectrole" style="margin-top: 10px">Max Hum</label>
                    <input class="form-control text-center" type="text" name="hum_max"  value="<?php echo $plc->hum_max ?>" style="margin-top: 10px">
                <?php endforeach; ?>

                <div class="row text-center" style="margin-top: 30px">
                    <button class="btn btn-lg btn-primary " type="submit">Save</button>
                    <button class="btn btn-lg" type="reset">Reset</button>
                </div>
            </form>
            <div class="row text-center">
                <a href="<?php echo site_url('supervisor/supervisorcontroller/index'); ?>"><span class="glyphicons glyphicons-arrow-left x2"></span></a>
            </div>
        </div>
        <div class="col-sm-5">

        </div>
    </div>
</div>

</body>

<script src="<?php echo base_url('resources/js/jquery-3.2.1.min.js'); ?>"></script>
<script src="<?php echo base_url('resources/js/bootstrap.min.js'); ?>"></script>
<script src="<?php echo base_url('resources/js/npm.js'); ?>"></script>

</html>