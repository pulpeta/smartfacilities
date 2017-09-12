<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('resources/css/bootstrap.min.css'); ?>" media="all"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('resources/css/glyphicons.css'); ?>" media="all">

</head>
<body>

<div class="container-fluid">

    <div class="row text-center">
        <div class="col-sm">
            <h2 class="text-primary"><span class="glyphicons glyphicons-building"></span> New Building</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">

        </div>
        <div class="col-sm-4">
            <form class="form-group" name="edituser_form" method="post" action="<?php echo site_url('admin/plccontroller/create_building'); ?>">
                <input class="form-control" type="text" name="building" placeholder="Building name" required autofocus style="margin-top: 10px">
                <input class="form-control" type="text" name="buildingcode" placeholder="Building code" style="margin-top: 10px">

                <div class="row text-center" style="margin-top: 10px">
                    <button class="btn btn-lg btn-primary " type="submit">Save</button>
                    <button class="btn btn-lg" type="reset">Reset</button>
                </div>
            </form>
            <div class="row text-center">
                <a href="<?php echo site_url('admin/plccontroller/index'); ?>"><span class="glyphicons glyphicons-arrow-left x2"></span></a>
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