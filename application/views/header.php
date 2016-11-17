<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <link rel="stylesheet" href="<?= base_url() . 'css/bootstrap.min.css' ?>" type="text/css">
        <link rel="stylesheet" href="<?= base_url() . 'css/global.css' ?>" type="text/css">
        <script src="<?= base_url() . 'js/jquery-3.1.1.min.js' ?>"></script>
        <script src="<?= base_url() . 'js/bootstrap.min.js' ?>"></script>
        <script src="<?= base_url() . 'js/hightcharts/highcharts.js' ?>"></script>
        <script src="<?= base_url() . 'js/hightcharts/hightcharts_theme.js' ?>"></script>
    </head>

    <body>
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="<?php echo site_url() ?>"> WoW_API </a>
                </div>
                <div class="collapse navbar-collapse">
                    <?php
                        if ($this->session->userdata('is_logged') == 1) {
                            $this->load->view('menu_logged');
                        } else {
                            $this->load->view('menu_guest');
                        }
                    ?>
                </div>
            </div>
        </nav>

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php
                        if (!empty($breadcrumb)) {
                            $this->load->view('breadcrumb', array('breadcrumb', $breadcrumb));
                        } else {
                            $this->load->view('breadcrumb');
                        }
                    ?>
                </div>
            </div>

            <div class="row">