<div class="conatiner">
    <form action="<?php echo base_url().'admin/menu/create_menu';?>" method="POST" id="myForm" name="myForm"
        class="form-container mx-auto  shadow-container" style="width:80%" enctype="multipart/form-data">
        <h3 class="mb-3 text-center">Tambah Item Masakan</h3>
        <div class="form-group">
            <label class="control-label">Pilih Meja</label>
            <select name="rname" id="resname"
                class="form-control <?php echo (form_error('rname') != "") ? 'is-invalid' : '';?>">
                <option>--Pilih Meja--</option>
                <?php 
                if (!empty($stores)) { 
                    foreach($stores as $store) {
                        ?>
                <option value="<?php echo $store['r_id'];?>">
                    <?php echo set_select('resname');?>
                    <?php echo $store['name'];?>
                </option>
                <?php }
                }
                ?>
            </select>
            <?php echo form_error('rname');?>
            <span></span>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">Nama Menu</label>
                    <input type="text" class="form-control my-2 
                    <?php echo (form_error('name') != "") ? 'is-invalid' : '';?>" name="name" id="name"
                        placeholder="Masukkan nama menu" value="<?php echo set_value('name'); ?>">
                    <?php echo form_error('name'); ?>
                    <span></span>
                </div>
                <div class="form-group">
                    <label for="price">Harga</label>
                    <input type="number" class="form-control my-2
                    <?php echo (form_error('price') != "") ? 'is-invalid' : '';?>" id="price" name="price"
                        placeholder="Masukkan Harga Rp" value="<?php echo set_value('price'); ?>">
                    <?php echo form_error('price'); ?>
                    <span></span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="about">Ket</label>
                    <input type="text" class="form-control my-2
                    <?php echo (form_error('about') != "") ? 'is-invalid' : '';?>" id="about" name="about"
                        placeholder="About" value="<?php echo set_value('about'); ?>">
                    <?php echo form_error('about'); ?>
                    <span></span>
                </div>
                <div class="form-group">
                    <label for="img">Food Image</label>
                    <input type="file" id="image" name="image" placeholder="Enter Image" class="form-control my-2
                    <?php echo(!empty($errorImageUpload))  ? 'is-invalid' : '';?>">
                    <?php echo (!empty($errorImageUpload)) ? $errorImageUpload : '';?>
                    <span></span>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary ml-2">Submit</button>
        <a href="<?php echo base_url().'admin/menu/index'?>" class="btn btn-secondary">Back</a>
    </form>
</div>
<script>
    const form = document.getElementById('myForm');
    const resname = document.getElementById("resname");
    const dishname = document.getElementById("name");
    const price = document.getElementById("price");
    const about = document.getElementById("about");
    const image = document.getElementById("image");

    form.addEventListener('submit', (event) => {
        event.preventDefault();
        validate();
    })

    const sendData = (sRate, count) => {
        if (sRate === count) {
            event.currentTarget.submit();
        }
    }

    const isImage = (imageVal) => {
        fType = imageVal.substring(imageVal.indexOf('.') + 1);
        if(fType === "gif" || fType === "jpg" || fType === "png" || fType ==="jpeg") {
            return "pass";   
        } else {
            return "fail";
        }
    }

    const successMsg = () => {
        let formCon = document.getElementsByClassName('form-control');
        var count = formCon.length - 1;
        for (var i = 0; i < formCon.length; i++) {
            if (formCon[i].className === "form-control my-2 success") {
                var sRate = 0 + i;
                sendData(sRate, count);
            } else {
                return false;
            }
        }
    }

    const validate = () => {
        const resnameVal = resname.value.trim();
        const dishnameVal = dishname.value.trim();
        const priceVal = price.value.trim();
        const aboutVal = about.value.trim();
        const imageVal = image.value.trim();

        if (resnameVal === "--Select Restaurant--") {
            setErrorMsg(resname, 'select restaurant name');
        } else {
            setSuccessMsg(resname);
        }
        if (dishnameVal === "") {
            setErrorMsg(dishname, 'dish name cannot be blank');
        } else {
            setSuccessMsg(dishname);
        }
        if (priceVal === "") {
            setErrorMsg(price, 'price cannot be blank');
        } else {
            setSuccessMsg(price);
        }
        if (aboutVal === "") {
            setErrorMsg(about, 'about name cannot be empty');
        } else {
            setSuccessMsg(about);
        }
        if (imageVal == "") {
            setErrorMsg(image, 'select image');
        } else if(isImage(imageVal) === "fail"){
            setErrorMsg(image, 'file format is not valid');
        } else {
            setSuccessMsg(image);
        }

        successMsg();

    }

    function setErrorMsg(ele, errormsgs) {
        const formCon = ele.parentElement;
        const formInput = formCon.querySelector('.form-control');
        const span = formCon.querySelector('span');
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