<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>SF - Login</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('resources/css/bootstrap.min.css'); ?>" media="all"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('resources/css/glyphicons.css'); ?>" media="all">
</head>

<body>

<div class="container-fluid" style="margin-top: 10%">
    <div class="row">

        <div class="col-sm-4"></div>

        <div class="col-sm-4">
            <form class="form-signin" style="border-radius: 10px; background-color: lightgray; padding: 10px 10px 20px 10px;">
                <h2 class="form-signin-heading" align="center"><span class="glyphicons glyphicons-factory x2"></span><br/>Smart Facility</h2>
                <label for="inputUsername" class="sr-only">Username</label>
                <input type="Username" id="inputUsername" class="form-control" placeholder="Username" required autofocus>
                <label for="inputPassword" class="sr-only">Password</label>
                <input type="password" id="inputPassword" class="form-control" placeholder="Password"  style="margin-top: 10px">
                <div class="checkbox">
                </div>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Log in <span class="glyphicons glyphicons-log-in"></span></button>
            </form>
        </div>

        <div class="col-sm-4"></div>

    </div>
    <div class="row" style="margin-top: 20px">

        <div class="col-sm-5"></div>

        <div class="col-sm-2 text-center">
            <p><a href="/smartfacilities">home</a></p>
        </div>

        <div class="col-sm-5"></div>

    </div>
</div>

</body>

<script src="<?php echo base_url('resources/js/jquery-3.2.1.min.js'); ?>"></script>
<script src="<?php echo base_url('resources/js/bootstrap.min.js'); ?>"></script>
<script src="<?php echo base_url('resources/js/npm.js'); ?>"></script>

</html>