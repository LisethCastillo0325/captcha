<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Captcha</title>
    <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    -->

    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css'>
    <link rel='stylesheet' href='https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css'>
    <link rel='stylesheet' href='https://cdn.datatables.net/buttons/1.5.2/css/buttons.bootstrap4.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.css'>
    <link rel="stylesheet" href="<?=constant('URL')?>public/css/table.css">
    <link rel="stylesheet" href="<?=constant('URL')?>public/css/estilos.css">
    <link rel="stylesheet" href="<?=constant('URL')?>public/css/animate.css">
</head>

<body>

<?php 
    if(! isset($_SESSION['user'])){
        header ("Location: ".constant('URL')."");
    }
    include 'navbar.php'; 
?>
    
<div class="container" id="wrapper">
