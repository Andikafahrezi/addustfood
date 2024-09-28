<div class="conatiner">

    <form action="<?php echo base_url().'admin/user/edit/'.$user['u_id']; ?>" method="POST"
        class="form-container mx-auto shadow-container" id="myForm" style="width:80%">
        <h3 class="mb-3 p-2 text-center">Edit User "<?php echo $user['username']; ?>"</h3>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="username">Enter Username</label>
                    <input type="text" id="userName" class="form-control
                    <?php echo (form_error('username') != "") ? 'is-invalid' : '';?>" name="username"
                        value="<?php echo set_value('username', $user['username'])?>">
                    <?php echo form_error('username'); ?>
                    <span></span>
                </div>
                <div class="form-group">
                    <label for="firstname">Enter First Name</label>
                    <input type="text" id="firstName" class="form-control
                    <?php echo (form_error('firstname') != "") ? 'is-invalid' : '';?>" name="firstname"
                        value="<?php echo set_value('firstname', $user['f_name'])?>">
                    <?php echo form_error('firstname'); ?>
                    <span></span>
                </div>
                <div class="form-group">
                    <label for="lastname">Enter Last Name</label>
                    <input type="text" id="lastName" class="form-control 
                    <?php echo (form_error('lastname') != "") ? 'is-invalid' : '';?>" name="lastname"
                        value="<?php echo set_value('lastname', $user['l_name'])?>">
                    <?php echo form_error('lastname'); ?>
                    <span></span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" class="form-control
                    <?php echo (form_error('email') != "") ? 'is-invalid' : '';?>" name="email" placeholder="email"
                        value="<?php echo set_value('email', $user['email'])?>">
                    <?php echo form_error('email'); ?>
                    <span></span>
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="number" id="phone" class="form-control
                    <?php echo (form_error('phone') != "") ? 'is-invalid' : '';?>" name="phone" placeholder="Phone"
                        value="<?php echo set_value('phone', $user['phone'])?>">
                    <?php echo form_error('phone'); ?>
                    <span></span>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="pass" class="form-control
                    <?php echo (form_error('password') != "") ? 'is-invalid' : '';?>" name="password"
                        placeholder="Password" value="<?php echo set_value('password', $user['password'])?>">
                    <?php echo form_error('password'); ?>
                    <span></span>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <textarea name="address" id="address" type="text" style="height:70px;"
                class="form-control
            <?php echo (form_error('address') != "") ? 'is-invalid' : '';?>"><?php echo set_value('address', $user['address']);?></textarea>
            <?php echo form_error('address'); ?>
            <span></span>
        </div>
        <button type="submit" class="btn btn-success">Make Changes</button>
        <a href="<?php echo base_url().'admin/user/index'; ?>" class="btn btn-secondary">Back</a>
    </form>
</div>
<script>
const form = document.getElementById('myForm');
const userName = document.getElementById('userName');
const firstName = document.getElementById('firstName');
const lastName = document.getElementById('lastName');
const email = document.getElementById('email');
const pass = document.getElementById('pass');
const phone = document.getElementById('phone');
const address = document.getElementById('address');

form.addEventListener('submit', (event) => {
    event.preventDefault();
    validate();
})

const isEmail = (emailVal) => {
    var re =
        /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if (!re.test(emailVal)) {
        return "fail";
    }
}

const sendData = (sRate, count) => {
    if (sRate === count) {
        event.currentTarget.submit();
    }
}

const successMsg = () => {
    let formCon = document.getElementsByClassName('form-control');
    var count = formCon.length - 1;
    for (var i = 0; i < formCon.length; i++) {
        if (formCon[i].className === "form-control success") {
            var sRate = 0 + i;
            sendData(sRate, count);
        } else {
            return false;
        }
    }
}

const validate = () => {
    const userNameVal = userName.value.trim();
    const firstNameVal = firstName.value.trim();
    const lastNameVal = lastName.value.trim();
    const emailVal = email.value.trim();
    const passVal = pass.value.trim();
    const phoneVal = phone.value.trim();
    const addressVal = address.value.trim();

    //username validation
    if (userNameVal === "") {
        setErrorMsg(userName, 'username cannot be blank');
    } else if (userNameVal.length <= 4 || userNameVal.length >= 16) {
        setErrorMsg(userName, 'username length should be between 5 and 15"');
    } else if (!isNaN(userNameVal)) {
        setErrorMsg(userName, 'only characters are allowed');
    } else {
        setSuccessMsg(userName);
    }

    //firstname validation
    if (firstNameVal === "") {
        setErrorMsg(firstName, 'firstname cannot be blank');
    } else if (!isNaN(firstNameVal)) {
        setErrorMsg(firstName, 'only characters are allowed');
    } else {
        setSuccessMsg(firstName);
    }

    //lastname validation
    if (lastNameVal === "") {
        setErrorMsg(lastName, 'lastname cannot be blank');
    } else {
        setSuccessMsg(lastName)
    }

    //email validation
    if (emailVal === "") {
        setErrorMsg(email, 'email cannot be blank');
    } else if (isEmail(emailVal) === "fail") {
        setErrorMsg(email, 'enter valid email only');
    } else {
        setSuccessMsg(email);
    }

    //password validation
    if (passVal === "") {
        setErrorMsg(pass, 'password can not be blank');
    } else if (passVal.length <= 7 || passVal.length >= 16) {
        setErrorMsg(pass, 'password length should be between 8 and 15');
    } else {
        setSuccessMsg(pass);
    }

    //phone validation
    if (phoneVal === "") {
        setErrorMsg(phone, 'phone cannot be blank');
    } else if (phoneVal.length != 10) {
        setErrorMsg(phone, 'enter valid phone number only');
    } else {
        setSuccessMsg(phone);
    }

    //address validation
    if (addressVal === "") {
        setErrorMsg(address, 'address cannot be blank');
    } else if (addressVal.length < 5) {
        setErrorMsg(address, "Enter valid address only");
    } else {
        setSuccessMsg(address);
    }

    successMsg();
}

function setErrorMsg(ele, msg) {

    const formCon = ele.parentElement;
    const formInput = formCon.querySelector('.form-control');
    const span = formCon.querySelector('span');
    span.innerText = msg;
    formInput.className = "form-control is-invalid";
    span.className = "invalid-feedback font-weight-bold"
}

function setSuccessMsg(ele) {
    const formCon = ele.parentElement;
    const formInput = formCon.querySelector('.form-control');
    formInput.className = "form-control success";
}
</script>