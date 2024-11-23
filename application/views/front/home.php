<div id="slides" class="carousel slide carousel-cus" data-ride="carousel">
    <ul class="carousel-indicators">
        <li data-target="#slides" data-slide-to="0" class="active"></li>
        <li data-target="#slides" data-slide-to="1"></li>
        <li data-target="#slides" data-slide-to="2"></li>
    </ul>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="<?php echo base_url().'public/front/img/home.jpeg';?>" alt="FriesBrgrImg">
            <div class="carousel-caption text-left">
                <h1 class="display-2">> Lengkap untuk setiap selera!</h1>
                <h3>addustfood siap melayanimu!</h3>
                <a href="<?php echo base_url().'restaurant/index'?>" class="btn btn-outline-light btn-lg">Order Now</a>
                <a href="<?php echo base_url().'restaurant/index'?>" class="btn btn-primary btn-lg">View Menu</a>
            </div>
        </div>
        <div class="carousel-item">
            <img src="<?php echo base_url().'public/front/img/rak2.jpg';?>" alt="Spaghetti">
            <div class="carousel-caption text-right">
                <h1 class="display-2">> Satu tempat dengan berbagai macam rasa!</h1>
                <h3>addustfood siap melayanimu</h3>
                <a href="<?php echo base_url().'restaurant/index'?>" class="btn btn-outline-light btn-lg">Order Now</a>
                <a href="<?php echo base_url().'restaurant/index'?>" class="btn btn-primary btn-lg">View Menu</a>
            </div>
        </div>
        <div class="carousel-item">
            <img src="<?php echo base_url().'public/front/img/rak3.jpg';?>" alt="corn">
            <div class="carousel-caption text-right">
            <h1 class="display-2">> Addustfood Siap Meladeni Ke BM-an Mu!</h1>
            <h3>Tunggu apa lagi? Pesan sekarang!</h3>
                <a href="<?php echo base_url().'restaurant/index'?>" class="btn btn-outline-light btn-lg">Order Now</a>
                <a href="<?php echo base_url().'restaurant/index'?>" class="btn btn-primary btn-lg">View Menu</a>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid padding">
    <div class="row text-center welcome">
        <div class="col-12">
            <h1 class="display-4">3 Langkah Mudah Untuk Diikuti</h1>
        </div>
        <hr>
        <div class="col-12">
            <p class="lead">Basah, Kering, Ringan dan berat. Semua ada ditempat ini, Cara termudah untuk membeli makanan kesukaan Anda. Sistem Pemesanan Makanan menyediakan pengiriman segar
                dan sedap!.  Jadi jangan menunggu dan mulai memesan sekarang juga!</p>
        </div>
    </div>
</div>
<div class="container-fluid padding">
    <div class="row text-center padding">
        <div class="col-xs-12 col-sm-6 col-md-4">
           <i class="fa-solid fa-bowl-food fa-5x" style="color: #0849ba;"></i>        
          <h3>Pilih Jenis Makakanan</h3>
            <p>Hal pertama yang dapat Anda lakukan adalah memilih jenis makanan kesukaan anda!</p>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-4">
        <i class="fa-solid fa-bullseye fa-5x" style="color: #165cd4;"></i>
            <h3>Pilih makanan favorit</h3>
            <p>Kami membantu Anda dengan menu dari berbagai jenis makanan!</p>
        </div>
        <div class="col-sm-12 col-md-4">
        <i class="fa-solid fa-truck fa-5x" style="color: #0c56d4;"></i>
            <h3>Penjemputan atau Pengiriman</h3>
            <p>Bagaimanapun, makanan akan dikirim atau Anda dapat mengambilnya sesuai pilihan Anda!</p>
        </div>
    </div>
    <hr class="my-4">
</div>
<div class="container-fluid padding">
    <div class="row welcome text-center welcome">
        <div class="col-12">
            <h1 class="display-4">Makanan Favorite</h1>
        </div>
        <hr>
    </div>
</div>
<div class="container-fluid padding dish-card">
    <div class="row">
        <?php if(!empty($dishesh)) { ?>
        <?php foreach($dishesh as $dish) { ?>
        <div class="col-md-6 col-lg-4 d-flex align-items-stretch">
            <div class="card mb-4 shadow-sm">
                <?php $image = $dish['image'];?>
                <img class="card-img-top" src="<?php echo base_url().'public/uploads/dishesh/display/'.$image; ?>">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="card-title"><?php echo $dish['name']; ?></h4>
                        <h4 class="text-muted"><b>Rp.<?php echo $dish['price']; ?></b></h4>
                    </div>
                    <p class="card-text"><?php echo $dish['about']; ?></p>
                    
                </div>
            </div>
        </div>
        <?php } ?>
        <?php } else { ?>
        <div class="jumbotron">
            <h1>Tidak ada catatan yang ditemukan</h1>
        </div>
        <?php } ?>
    </div>
    <hr class="my-4">
</div>
<div class="container-fluid padding">
    <div class="row text-center padding">
        <div class="col-12">
            <h2>Terhubung Dengan Kami</h2>
        </div>
        <div class="col-12 social padding">
            <a href="https://facebook.com/astrowin.jendraltempur"><i class="fab fa-facebook"></i></a>
            <a href="https://x.com/Avalonn22"><i class="fab fa-twitter"></i></a>
            <a href="mailto:maiklenakram@gmail.com"><i class="fab fa-google-plus-g"></i></a>
            <a href="https://instragram.com/andikafahrezzi"><i class="fab fa-instagram"></i></a>
            <a href="https://www.youtube.com/@NugrahaDarmawan"><i class="fab fa-youtube"></i></a>
        </div>
    </div>
</div>
<hr class="my-4">
<section id="contact-us" class="container shadow my-4 p-4">
    <!--Section heading-->
    <?php if($this->session->flashdata('msg') != ""):?>
    <div class="alert alert-success">
        <?php echo $this->session->flashdata('msg');?>
    </div>
    <?php endif ?>
    <h2 class="text-center my-2 font-weight-bold">Kontak Kami</h2>
    <p class="text-center">Selalu bersama anda</p>
    <!--Section description-->
    <p class="text-center mx-auto mb-5"></p>
    <form name="contact-form" action="<?php echo base_url().'home/sendMail'; ?>" id="myForm" method="POST">
        <div class="row">
            <div class="col-md-6">
                <div class="mb-2">
                    <label class="mb-0" for="name" class="">Nama lengkap*</label>
                    <input type="text" id="name" name="name" class="form-control" required <?php set_value("name");?>>
                    <span></span>
                </div>
            </div>
            <div class="col-md-6">
                <div>
                    <label class="mb-0" for="email" class="">Email*</label>
                    <input type="text" id="email" name="email" class="form-control" required <?php set_value("email");?>>
                    <span></span>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="mb-2">
                    <label class="mb-0" for="subject" class="">Subyek</label>
                    <input type="text" id="subject" name="subject" class="form-control" <?php set_value("subject");?>>
                    <span></span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="mb-2">
                    <label class="mb-0" for="message">Pesan Anda*</label>
                    <textarea type="text" id="message" name="message" rows="2"
                        class="form-control" required><?php set_value("message");?></textarea>
                    <span></span>
                </div>
            </div>
        </div>
        <div class="status text-danger font-weight-bold my-2"></div>
        <button class="btn btn-info" type="submit">Submit</button>
    </form>

</section>
<script>
const form = document.getElementById('myForm');
const userName = document.getElementById('name');
const email = document.getElementById('email');
const subject = document.getElementById('subject');
const message = document.getElementById('message');

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
    const emailVal = email.value.trim();
    const subjectVal = subject.value.trim();
    const messageVal = message.value.trim();

    //username validation
    if (userNameVal === "") {
        setErrorMsg(userName, 'name cannot be blank');
    } else if (!isNaN(userNameVal)) {
        setErrorMsg(userName, 'only characters are allowed');
    } else {
        setSuccessMsg(userName);
    }

    //email validation
    if (emailVal === "") {
        setErrorMsg(email, 'email cannot be blank');
    } else if (isEmail(emailVal) === "fail") {
        setErrorMsg(email, 'enter valid email only');
    } else {
        setSuccessMsg(email);
    }

    //subject can not
    if (subjectVal === "") {
        setErrorMsg(subject, 'subject cannot be blank');
    } else {
        setSuccessMsg(subject);
    }

    //message validation
    if (messageVal === "") {
        setErrorMsg(message, 'message cannot be blank');
    } else {
        setSuccessMsg(message);
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