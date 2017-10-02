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
            <h2 class="text-primary"><span class="glyphicons glyphicons-user-asterisk"></span> Edit profile</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">

        </div>
        <div class="col-sm-4">
            <form class="form-group" name="edituser_form" method="post" action="<?php echo site_url('user/usercontroller/update_profile'); ?>">
                <?php foreach ($users as $user): ?>
                    <input type="hidden" name="id_user" value="<?php echo $user->id_user ?>">
                    <label class="text-primary" style="margin-top: 10px">Name</label>
                    <input class="form-control" type="text" name="full_name" value="<?php echo $user->full_name ?>" required autofocus style="margin-top: 10px">
                    <label class="text-primary" style="margin-top: 10px">Username</label>
                    <input class="form-control" type="text" name="username" value="<?php echo $user->username ?>" required autofocus style="margin-top: 10px">
                    <label class="text-primary" style="margin-top: 10px">Password</label>
                    <input class="form-control" type="password" name="password"  value="<?php echo $user->password ?>" required autofocus style="margin-top: 10px">
                    <label class="text-primary" style="margin-top: 10px">Confirm password</label>
                    <input class="form-control" type="password" name="confirmpassword"  value="<?php echo $user->password ?>" required autofocus style="margin-top: 10px">
                <?php endforeach; ?>
                <div class="row text-center" style="margin-top: 30px">
                    <button class="btn btn-lg btn-primary " type="submit">Save</button>
                    <button class="btn btn-lg" type="reset">Reset</button>
                </div>
            </form>
            <div class="row text-center">
                <a href="<?php echo site_url('user/usercontroller'); ?>"><span class="glyphicons glyphicons-arrow-left x2"></span></a>
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