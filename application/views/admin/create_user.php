<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>SF - DB Management</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('resources/css/bootstrap.min.css'); ?>" media="all"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('resources/css/glyphicons.css'); ?>" media="all">

</head>
<body>

<div class="container-fluid">

    <div class="row text-center">
        <div class="col-sm">
            <h2 class="text-primary"><span class="glyphicons glyphicons-user-add"></span> New User</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">

        </div>
        <div class="col-sm-4">
            <form class="form-group" name="edituser_form" method="post" action="<?php echo site_url('admin/admincontroller/create_user'); ?>">
                <input class="form-control" type="text" name="name" placeholder="Name" required autofocus style="margin-top: 10px">
                <input class="form-control" type="text" name="username" placeholder="Username" style="margin-top: 10px">
                <input class="form-control" type="password" name="password"  placeholder="Password" style="margin-top: 10px">
                <input class="form-control" type="password" name="confirmpassword"  placeholder="Confirm password" style="margin-top: 10px">
                <label class="text-primary" for="selectrole" style="margin-top: 10px">User's Role</label>

                <select class="form-control" name="role_id" style="margin-top: 10px">
                    <?php foreach ($roles as $role): ?>
                        <?php echo '<option value="'.$role->id_role.'">'.$role->role.'</option>'; ?>
                    <?php endforeach; ?>
                </select>

                <div class="row text-center" style="margin-top: 10px">
                    <button class="btn btn-lg btn-primary " type="submit">Save</button>
                    <button class="btn btn-lg" type="reset">Reset</button>
                </div>
            </form>
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