<div class="container shadow-container">
    <h2 class="p-2 text-center">Add Restaurant Category</h2>
    <form action="<?php echo base_url().'admin/category/create_category';?>" class="container my-3" method="POST" id="myForm">
        <div class="form-group">
            <label for="category">Category</label>
            <input type="text" id="category" class="form-control" placeholder="Enter Category" name="category">
            <?php echo form_error('category'); ?>
            <span></span>
        </div>
        <button type="submit" class="btn btn-primary mr-2">Submit</button>
        <a class="btn btn-secondary" href="<?php echo base_url().'admin/category/index';?>">Back</a>
    </form>
</div>

<script>
    const form = document.getElementById('myForm');
    const category = document.getElementById('category');

    form.addEventListener('submit', (event) => {
        event.preventDefault();
        validate();
    })

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
        const categoryVal = category.value.trim();

        //username validation
        if (categoryVal === "") {
            setErrorMsg(category, 'category cannot be blank');
        } else if (categoryVal.length <= 3 || categoryVal.length >= 16) {
            setErrorMsg(category, 'category length should be between 3 and 15"');
        } else {
            setSuccessMsg(category);
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