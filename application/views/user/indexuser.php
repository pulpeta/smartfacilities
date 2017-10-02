<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>SF - Restricted Area</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('resources/css/bootstrap.min.css'); ?>" media="all"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('resources/css/glyphicons.css'); ?>" media="all">
</head>
<body>

<div class="container-fluid">

    <nav class="navbar bg-info" style="margin-top: 20px">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo site_url('user/usercontroller'); ?>"><span class="glyphicons glyphicons-factory"></span> SF</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="<?php echo site_url('user/usercontroller'); ?>"><span class="glyphicons glyphicons-group"></span> My PLCS <span class="sr-only">(current)</span></a></li>
                    <li><a href="<?php echo site_url('user/usercontroller'); ?>"><span class="glyphicons glyphicons-charts"></span> Reports and Charts</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <img src="<?php echo base_url('resources/img/coming.jpg'); ?>" class="img-circle" height="25" width="25">
                            My Account
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="<?php
                                $id_user = $this->session->userdata('id_user');
                                echo site_url("user/usercontroller/edit_profile/$id_user");
                                ?>">
                                    <span class="glyphicons glyphicons-user"></span>
                                    Edit Profile
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

    <div class="container-fluid">
        <div class="row text-center">
            <h2 class="text-primary">
                <span class="glyphicons glyphicons-robot"></span>
                <br/>My PLCS
            </h2>
        </div>

        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-10">
                <table class="table table-striped" style="margin-top: 30px">
                    <thead>
                    <tr>
                        <th>
                            PLC
                        </th>
                        <th>
                            Location
                        </th>
                        <th>
                            Info
                        </th>
                        <th>
                            Trends
                        </th>
                    </tr>

                    </thead>
                    <tbody>
                    <?php foreach($plcs as $plc): ?>
                        <tr>
                            <td>
                                <strong><a href="<?php
                                    echo site_url("user/usercontroller/plc_management/$plc->id_plc");
                                    ?>" style="text-decoration: none" class="text-uppercase">
                                        <?php echo $plc->name; ?>
                                    </a></strong>
                            </td>
                            <td>
                                <?php echo $plc->location; ?>
                            </td>
                            <td>
                                <p>min temp - max temp</p>
                                <p>min hum - max hum</p>
                                <p>
                                    realtime data: aaa aaa
                                </p>
                            </td>
                            <td>
                                <?php
                                    echo 'read actual data';
                                ?>
                                <br/>
                                <canvas id="<?php echo $plc->name; ?>" width="100" height="50"></canvas>
                                <script src="<?php echo base_url('resources/js/Chart.bundle.min.js'); ?>"></script>
                                <?php
                                    //legge i dat per il grafico
                                ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>

                <canvas id="myChart" width="150" height="50"></canvas>
                <script src="<?php echo base_url('resources/js/Chart.bundle.min.js'); ?>"></script>
                <script>
                    var ctx = document.getElementById("myChart").getContext('2d');
                    var myChart = new Chart(ctx, {
                        type: 'bar',
                        responsive: 'true',
                        data: {
                            labels: ["Red", "Blue"],
                            datasets: [{
                                label: '# of Votes',
                                data: [12, 19],
                                backgroundColor: [
                                    'rgba(255, 99, 132, 0.2)',
                                    'rgba(54, 162, 235, 0.2)',
                                ],
                                borderColor: [
                                    'rgba(255,99,132,1)',
                                    'rgba(54, 162, 235, 1)',
                                ],
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero:true
                                    }
                                }]
                            }
                        }
                    });
                </script>

            </div>
            <div class="col-sm-1">

            </div>
        </div>
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