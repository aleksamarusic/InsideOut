<!doctype html>
<html>

<script>
    <?php
    if (isset($bad_login))
        echo "window.location = '#log-in'";
    ?>
</script>

<head>

    <?php
    $link = array('href' => '', 
        'rel'   => 'stylesheet',
        'type'  => 'text/css',
        'media' => 'all');
    ?>

    <meta charset="utf-8">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url()?>assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="<?php echo base_url()?>assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <meta content="width=device-width, initial-scale=1, user-scalable=no" name="viewport">

    <title>Inside Out</title>

    <!--Google Material icon-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />

    <!--Bootstrap css-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" type="text/css" media="all"
    />    

    <!--Propeller css-->
    <?php 
    $link['href'] = "assets/css/propeller.min.css";
    echo link_tag($link);
    ?>

    <!--Owl Carousel css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/assets/owl.carousel.css" type="text/css"
        media="all" />

    <!--Quantify css-->
    <?php 
    $link['href'] = "assets/css/quantify-theme.css";
    echo link_tag($link);
    ?>

    <?php 
    $link['href'] = "assets/css/quantify.css";
    echo link_tag($link);
    ?>
</head>