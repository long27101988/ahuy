<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from responsiweb.com/themes/preview/ace/1.3.3/blank.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 13 May 2015 15:59:10 GMT -->
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title> <?php  echo @$title; ?></title>

    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <link rel="apple-touch-icon" sizes="57x57" href="img/favico/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="img/favico/apple-touch-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="img/favico/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="img/favico/apple-touch-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="img/favico/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="img/favico/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="img/favico/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="img/favico/apple-touch-icon-152x152.png">
    <link rel="icon" type="image/png" href="img/favico/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="img/favico/favicon-96x96.png" sizes="96x96">
    <link rel="icon" type="image/png" href="img/favico/favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="img/favico/manifest.json">
    <link rel="mask-icon" href="img/favico/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="msapplication-TileImage" content="img/favico/mstile-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <!-- bootstrap & fontawesome -->
    <?php
        echo \Theme::instance()->asset->css([
            'bootstrap.min.css',
            'font-awesome/4.2.0/css/font-awesome.min.css',
            'jquery-ui.custom.min.css',
            'datepicker.min.css',
            'bootstrap-timepicker.min.css',
            'select2.min.css',
            'ace.min.css',
            //'bootstrap-toastr/toastr.min.css',
        ]);
    ?>

    <?php
        echo \Theme::instance()->asset->js([
            '2.1.1/jquery.min.js',
            'tinymce/tinymce/tinymce.min.js'
        ]);

    ?>

    <!-- page specific plugin styles -->

    <!-- text fonts -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" />

    <!-- ace styles -->
    <?php
        echo \Theme::instance()->asset->css('ace.min.css', ['class' => 'ace-main-stylesheet', 'id' => 'main-ace-style']);
    ?>


    <!--[if lte IE 9]>
        <link rel="stylesheet" href="dist/css/ace-part2.min.css" class="ace-main-stylesheet" />
    <![endif]-->

    <!--[if lte IE 9]>
      <link rel="stylesheet" href="dist/css/ace-ie.min.css" />
    <![endif]-->

    <!-- inline styles related to this page -->

    <!-- ace settings handler -->
    <?php
        echo \Theme::instance()->asset->js([
            'ace-extra.min.js'
        ]);

    ?>

    <!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

    <!--[if lte IE 8]>
    <script src="dist/js/html5shiv.min.js"></script>
    <script src="dist/js/respond.min.js"></script>
    <![endif]-->
</head>
