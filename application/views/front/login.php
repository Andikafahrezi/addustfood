<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.min.css';?>">
    <script src="<?php echo base_url().'assets/js/jquery-3.6.0.min.js';?>"></script>
    <script src="<?php echo base_url().'assets/js/bootstrap.min.js';?>"></script>
    <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('/assets/css/profile.css');?>">
</head>

<body>
<body class="hold-transition login-page" style="background:url(<?php echo base_url().'public/front/img/bglo1.jpeg';?>);
no-repeat center center fixed; background-size: cover;
 -webkit-background-size: cover; 
 -moz-background-size: cover; -o-background-size: cover;">
    <div class="wrapper mt-sm-5">
        <?php
        if (!empty($this->session->flashdata('success'))) {
          echo "<div class='alert alert-success m-3 mx-auto'>".$this->session->flashdata('success')."</div>";
        }
        ?>
        <?php
        if (!empty($this->session->flashdata('msg'))) {
          echo "<div class='alert alert-danger m-3 mx-auto'>".$this->session->flashdata('msg')."</div>";
        }
        ?>
        <h4 class="pb-4 border-bottom text-center">LOGIN</h4>
        <form action="<?php echo base_url().'login/authenticate' ;?>" name="loginform" id="loginform" method="POST">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control bg-light" name="username" id="username"
                    placeholder="Username">
                <span></span>
            </div>
            <?php echo form_error('username'); ?>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control bg-light" name="password" id="password"
                    placeholder="Password">
                <span></span>
            </div>
            <?php echo form_error('password'); ?>
            <div class="py-3 pb-4 border-bottom">
                <button type="submit" class="btn btn-success mr-3">Login</button>
                <a href="<?php echo base_url().'singup/index' ?>" class="btn btn-danger">Register</a>
            </div>
            
        </form>
    </div>
    <script>
    const form = document.getElementById('loginform');
    const username = document.getElementById('username');
    const password = document.getElementById('password');

    form.addEventListener('submit', (event) => {
        event.preventDefault();
        validate();
    })

    const sendData = (sRate, count) => {
        if(sRate === count) {
            event.currentTarget.submit();
        }
    }

    const successMsg = (usernameVal) => {
        let formCon = document.getElementsByClassName('form-control');
        var count = formCon.length - 1; 
        for (var i = 0; i < formCon.length; i++) {
            if (formCon[i].className === "form-control bg-light success") {
                var sRate = 0 + i;
                sendData(sRate, count);
            } else {
                return false;
            }
        }
    }

    const validate = () => {
        const usernameVal = username.value.trim();
        const passwordVal = password.value.trim();

        if (usernameVal === "") {
            setErrorMsg(username, 'username can be blank');
        } else {
            setSuccessMsg(username);
        }

        if (passwordVal === "") {
            setErrorMsg(password, 'password can not be blank');
        } else {
            setSuccessMsg(password);
        }

        successMsg();
    }

    function setErrorMsg(ele, msg) {
        const formCon = ele.parentElement;
        const formInput = formCon.querySelector('.form-control');
        const span = formCon.querySelector('span');
        span.innerText = msg;
        formInput.className = "form-control bg-light is-invalid";
        span.className = "invalid-feedback font-weight-bold";
    }

    function setSuccessMsg(ele) {
        const formCon = ele.parentElement;
        const formInput = formCon.querySelector('.form-control');
        formInput.className = "form-control bg-light success";
    }
    </script>
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
.floatwa {
position:fixed;
bottom:0px;
right: 0px;
background-color:#ffffff;
width:100%;
z-index:1000;
padding:2px;
margin:auto;
text-align:center;
float:none;
box-shadow: 0px -2px 10px #c0c0c0;
}
.tombolwa {
border: 1px #56aa71 solid;
background-color:#2f7e49;
width:90%;
padding:4px;
text-align:center;
margin:0;
border-radius: 5px;
margin:auto;
text-align:center;
float:none;
}
.floatwa a{
color:white;
}
</style>
<div class="floatwa">
<a href="https://api.whatsapp.com/send?phone=6281386607123&amp;text=Halo%20kak,%20Saya%20butuh%20bantuan" target="_blank"><div class="tombolwa">BUTUH BANTUAN ? CHAT CS DISINI</div></a></div>
</body>

</html>