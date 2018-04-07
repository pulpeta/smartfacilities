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

    <nav class="navbar navbar-inverse" style="margin-top: 20px">
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
                    <li class="active"><a href="<?php echo site_url('user/usercontroller'); ?>"><span class="glyphicons glyphicons-robot"></span> My PLCS <span class="sr-only">(current)</span></a></li>
                    <li><a href="<?php echo site_url('user/usercontroller'); ?>"><span class="glyphicons glyphicons-charts"></span> Reports and Charts</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <img src="<?php echo base_url('resources/img/coming.jpg'); ?>" class="img-circle" height="25" width="25">
                            My Account
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="<?php echo site_url("user/usercontroller/wiki") ?>">
                                    <span class="glyphicons glyphicons-question-sign"></span> Wiki
                                </a>
                            </li>
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
                            <li>
                                <a href="<?php echo site_url("login/user_logout"); ?>" style="text-decoration: none">
                                    <span class="glyphicons glyphicons-log-out"></span> Logout
                                </a>
                            </li>
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
                        <th>

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
                            <td class="text-primary">
                                <p>
                                    Temp range: <strong>16°  22°</strong>
                                </p>
                                <p>
                                    Hum range: <strong>35%  45%</strong>
                                </p>
                            </td>
                            <td class="text-primary">
                                Realtime data:
                                <p class="text-center">

                                    <strong class="badge" style="padding: 10px; background-color: red; margin: 10px">21.5°</strong>
                                    <strong class="badge" style="padding: 10px; background-color: cornflowerblue; margin: 10px">35.7%</strong>
                                </p>
                            </td>
                            <td>
                                <div style="width: 500px; height: 100px;">
                                    <canvas id="<?php echo $plc->name; ?>" width="700" height="100"></canvas>
                                    <script src="<?php echo base_url('resources/js/Chart.bundle.min.js'); ?>"></script>
                                    <script>
                                        var ctx = document.getElementById("<?php echo $plc->name; ?>");
                                        var <?php echo $plc->name; ?> = new Chart(ctx, {
                                            type: 'line',
                                            data: {
                                                labels: [
                                                    "Red", "Blue", "Yellow", "Green", "Purple", "Orange"
                                                ],
                                                datasets: [{
                                                    label: 'Temperatures',
                                                    data: [
                                                        12, 19, 3, 5, 2, 3
                                                    ],

                                                    borderColor: [
                                                        'rgba(255,99,132,1)',
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
                                    <?php
                                    //legge i dat per il grafico
                                    ?>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
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