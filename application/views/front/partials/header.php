<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ADDUST FOOD</title>
    <link rel="icon" href="<?php echo base_url().'public/front/img/logo.png';?>">    
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.min.css';?>">
    <script src="<?php echo base_url().'assets/js/jquery-3.6.0.min.js';?>"></script>
    <script src="<?php echo base_url().'assets/js/bootstrap.min.js';?>"></script>
    <!-- <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script> -->
    <script src="https://kit.fontawesome.com/94214cb168.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?php echo base_url('/assets/css/style.css'); ?>">
    <style>
    
</style>
</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-md navbar-light bg-light sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?php echo base_url().'home/index';?>"><i class="fa-solid fa-stroopwafel fa-lg" style="color: #390cc0;"></i> ADDUST FOOD</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarRes">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarRes">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="<?php echo base_url().'home/index';?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="<?php echo base_url().'restaurant/index';?>">Menu</a>
                    </li>
                    <?php $user = $this->session->userdata('user'); 
                    if(empty($user)) {
                    ?>
                    <li class="nav-item active">
                        <a class="nav-link" href="<?php echo base_url().'login';?>">Login</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="<?php echo base_url().'singup/index'?>">Register</a>
                    </li>
                    <?php } else {?>
                    <li class="nav-item dropdown active">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php echo ucfirst($user['username']); ?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="<?php echo base_url().'profile';?>"><i
                                    class="fas fa-user-circle"></i> My Profile</a>
                            <hr>
                            <a class="dropdown-item" href="<?php echo base_url().'orders/';?>"><i class="fas fa-shopping-bag"></i> Orders</a>
                            <hr>
                            <a class="dropdown-item" href="<?php echo base_url().'login/logout';?>"><i class="fas fa-power-off"></i> Logout</a>
                        </div>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="<?php echo base_url().'cart';?>"><i class="fas fa-cart-arrow-down"></i> My Cart</a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>
    
    <script>
    $(document).ready(function() {
        $(".dropdown").hover(function() {
            var dropdownMenu = $(this).children(".dropdown-menu");
            if (dropdownMenu.is(":visible")) {
                dropdownMenu.parent().toggleClass("open");
            }
        })
    });
    </script>