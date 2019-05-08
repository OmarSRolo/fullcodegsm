<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="<?php echo site_url() ?>assets/img/fav.png">
    <!-- Author Meta -->
    <meta name="author" content="fullcodesGSM">
    <!-- Meta Description -->
    <meta name="description" content="Desbloqueo de Celulares">
    <!-- Meta Keyword -->
    <meta name="keywords" content="desbloqueo">
    <!-- meta character set -->
    <meta charset="UTF-8">

    <link rel="stylesheet" href="<?php echo site_url() ?>assets/css/linearicons.css">
    <link rel="stylesheet" href="<?php echo site_url() ?>assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo site_url() ?>assets/css1/jquery.dataTables.css">
    <link rel="stylesheet" href="<?php echo site_url() ?>assets/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo site_url() ?>assets/css/magnific-popup.css">
    <link rel="stylesheet" href="<?php echo site_url() ?>assets/css/nice-select.css">
    <link rel="stylesheet" href="<?php echo site_url() ?>assets/css/animate.min.css">
    <link rel="stylesheet" href="<?php echo site_url() ?>assets/css/owl.carousel.css">
    <link rel="stylesheet" href="<?php echo site_url() ?>assets/css/main.css">
    <link rel="stylesheet" href="<?php echo site_url() ?>assets/css/jquery.dataTables.css">

    <script type="application/javascript" src="<?php echo site_url() ?>assets/js/jquery.min.js"></script>
    <script type="application/javascript" src="<?php echo site_url() ?>assets/js/vendor/bootstrap.min.js"></script>
    <script type="application/javascript" src="<?php echo site_url() ?>assets/js/easing.min.js"></script>
    <script type="application/javascript" src="<?php echo site_url() ?>assets/js/jquery.ajaxchimp.min.js"></script>
    <script type="application/javascript" src="<?php echo site_url() ?>assets/js/jquery.magnific-popup.min.js"></script>
    <script type="application/javascript" src="<?php echo site_url() ?>assets/js/owl.carousel.min.js"></script>
    <script type="application/javascript" src="<?php echo site_url() ?>assets/js/jquery.sticky.js"></script>
    <script type="application/javascript" src="<?php echo site_url() ?>assets/js/jquery.nice-select.min.js"></script>
    <script type="application/javascript" src="<?php echo site_url() ?>assets/js/main.js"></script>
    <script type="application/javascript" src="<?php echo site_url() ?>assets/js1/navBar.js"></script>
    <script type="application/javascript" src="<?php echo site_url() ?>assets/js/jquery.dataTables.js"></script>



    <!-- Site Title -->
    <title>fullcodesgsm</title>
</head>
<body>

<div class="protfolio-wrap">
    <!-- Start Header Area -->
    <header class="default-header">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="<?php echo base_url() ?>">
                    <img src="<?php echo site_url() ?>assets/img/logo.png" alt="">
                </a>

                <div class="collapse navbar-collapse justify-content-end align-items-left"
                     id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="dropdown">
                            <a class="dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                                Services
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="<?php echo base_url("services/all/") ?>">Services
                                    IMEI</a>
                                <a class="dropdown-item" href="elements.html">Services Server</a>
                            </div>
                        </li>
                        <li><a href="#support">Soporte</a></li>
                        <li><a><?php
                                $userdata = $this->session->userdata('username');
                                if (isset($userdata)) {
                                    echo '<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user">' . $this->session->userdata("username") . '</span></a>';
                                    echo '<ul class="dropdown-menu">';
                                    echo '<li><a href="' . base_url("profile/get/" . $this->session->userdata('id')) . '">Profile</a></li>';
                                    echo '<li><a href="#">Contactar</a></li>';
                                    echo '<li><a href="auth/logout" id="id_logout">Salir</a></li>';
                                    echo '</ul> </li>';

                                } else {
                                    echo '<li><a href="#" id="modal_reg">Registrarse</a></li>';
                                    echo '<li><a href="#" id="modal_login"><span class="glyphicon glyphicon-log-in"></span>Entrar</a></li>';
                                }
                                ?></a></li>
                    </ul>
                </div>
            </div>
        </nav>

    </header>
    <!-- End Header Area -->


