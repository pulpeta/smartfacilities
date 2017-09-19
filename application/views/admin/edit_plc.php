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
            <h2 class="text-primary"><span class="glyphicons glyphicons-robot"></span> Edit PLC</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">

        </div>
        <div class="col-sm-4">
            <form class="form-group" name="edituser_form" method="post" action="<?php echo site_url('admin/plccontroller/update_plc'); ?>">
                <?php foreach ($plcs as $plc): ?>
                    <input type="hidden" name="id_plc" value="<?php echo $plc->id_plc ?>">
                    <label class="text-primary" style="margin-top: 10px">PLC Name</label>
                    <input class="form-control" type="text" name="name" value="<?php echo $plc->name ?>" required autofocus style="margin-top: 10px">
                    <label class="text-primary" style="margin-top: 10px">Location</label>
                    <input class="form-control" type="text" name="location" value="<?php echo $plc->location ?>" required autofocus style="margin-top: 10px">
                    <label class="text-primary" style="margin-top: 10px">IP Address</label>
                    <input class="form-control" type="text" name="ipaddress"  value="<?php echo $plc->ip_address ?>" required autofocus style="margin-top: 10px">
                    <label class="text-primary" style="margin-top: 10px">Note</label>
                    <input class="form-control" type="text" name="note"  value="<?php echo $plc->note ?>" style="margin-top: 10px">
                    <label class="text-primary" for="selectrole" style="margin-top: 10px">Select Building</label>

                    <select class="form-control" name="building_id" style="margin-top: 10px">
                        <?php foreach ($buildings as $building): ?>
                            <?php echo '<option value="'.$building->id_building.'" ';
                            if($building->id_building == $plc->building_id){
                                echo 'selected="selected"';
                            }
                            echo   '>'.$building->building.'</option>'; ?>
                        <?php endforeach; ?>
                    </select>

                    <label class="text-primary" for="selectrole" style="margin-top: 10px">Select Function</label>

                    <select class="form-control" name="function_plc_id" style="margin-top: 10px">
                        <?php foreach ($functions as $function): ?>
                            <?php echo '<option value="'.$function->id_function_plc.'" ';
                            if($function->id_function_plc == $plc->function_plc_id){
                                echo 'selected="selected"';
                            }
                            echo   '>'.$function->function_plc.'</option>'; ?>
                        <?php endforeach; ?>
                    </select>

                <?php endforeach; ?>

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