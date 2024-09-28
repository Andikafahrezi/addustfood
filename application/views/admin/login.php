<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.min.css';?>">
    <script src="<?php echo base_url().'assets/js/jquery-3.6.0.min.js';?>"></script>
    <script src="<?php echo base_url().'assets/js/bootstrap.min.js';?>"></script>
    <link rel="stylesheet" href="<?php echo base_url().'/assets/css/dashboard.css';?>">
</head>

<body>

    <div class="conatiner">
        <h1 class="text-center mt-3">HALAMAN ADMINISTRATOR</h1>
        <p class="text-center mb-4">==SILAHKAN LOGIN==</p>
        <?php
        if (!empty($this->session->flashdata('msg'))) {
          echo "<div class='alert alert-danger mb-3 mx-auto' style='width:50%'>".$this->session->flashdata('msg')."</div>";
        }
      ?>
        <form action="<?php echo base_url().'admin/login/authenticate' ;?>" name="loginform" id="loginform"
            method="POST" class="form-container mx-auto">
            <div class="form-group">
                <label for="username">Enter Username</label>
                <input type="text" class="form-control my-2" name="username" id="username" placeholder="Username">
                <span></span>
            </div>
            <?php echo form_error('username'); ?>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control my-2" name="password" id="password" placeholder="Password">
                <span></span>
            </div>
            <?php echo form_error('password'); ?>
            <button type="submit" class="btn btn-info btn-block mb-2">Login</button>
        </form>
    </div>
    <script>
        const form = document.getElementById("loginform");
        const username = document.getElementById("username");
        const password = document.getElementById("password");

        form.addEventListener('submit',(event) => {
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
            for(var i = 0; i < formCon.length; i++) {
                if(formCon[i].className === "form-control my-2 success") {
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
            
            if(usernameVal === "") {
                setErrorMsg(username, 'username cannot be blank');
            } else {
                setSuccessMsg(username);
            }
            if(passwordVal === "") {
                setErrorMsg(password, 'password cannot be blank');
            } else {
                setSuccessMsg(password);
            }
            successMsg(usernameVal);
        }

        function setErrorMsg(ele, errormsgs) {
            const formGroup = ele.parentElement;
            const formInput = formGroup.querySelector('.form-control');
            const span = formGroup.querySelector('span');
            span.innerText = errormsgs;
            formInput.className = "form-control my-2 is-invalid";
            span.className = "invalid-feedback font-weight-bold";
        }

        function setSuccessMsg(ele) {
            const formGroup = ele.parentElement;
            const formInput = formGroup.querySelector('.form-control');
            formInput.className = "form-control my-2 success";
        }

    </script>
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <body class="hold-transition login-page" style="background:url(<?php echo base_url().'public/front/img/bg4.png';?>);
no-repeat center center fixed; background-size: cover;
 -webkit-background-size: cover; 
 -moz-background-size: cover; -o-background-size: cover;">


</body>

</html>