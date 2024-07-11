<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Hotelier - Hotel HTML Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="assets/css/style.css" rel="stylesheet">
</head>

<body style="background-color: #fff;">

    <!-- Header -->
    <?php include('include/header.php') ?>


    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 p-0" style="background-image: url(img/carousel-1.jpg);">
        <div class="container-fluid page-header-inner py-5">
            <div class="container text-center pb-5">
                <h1 class="display-3 text-white mb-3 animated slideInDown">INFORM</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center text-uppercase">
                        <li class="breadcrumb-item"><a href="index.php">หน้าแรก</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">แจ้งพบแมวจร</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <div class="container-xxl bg-white p-0 mb-5">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- แจ้งพบแมวจร -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="section-title text-center text-primary text-uppercase">Inform</h6>
                    <h1 class="mb-5">แจ้งพบ <span class="text-primary text-uppercase">แมวจร</span></h1>
                </div>
                <div class="row g-4" style="justify-content: center;">
                    <form class="form" style="border-style: solid;">
                        <h2>ข้อมูลของสัตว์</h2>
                        <div class="flex">
                            <label>
                                <div class="coolinput">
                                    <label for="mem_username" class="text">Username:</label>
                                    <input type="text" placeholder="" name="mem_username" class="input" required="">
                                </div>
                            </label>
                            <label>
                                <div class="coolinput">
                                    <label for="input" class="text">Username:</label>
                                    <input type="text" placeholder="" name="input" class="input" required="">
                                </div>
                            </label>
                        </div>
                        <label>
                            <div class="coolinput">
                                <label for="email" class="text">Email:</label>
                                <input type="email" placeholder="" name="email" class="input" required="">
                            </div>
                        </label>
                        <label>
                            <div class="coolinput">
                                <label for="" class="text">Description:</label>
                                <textarea required="" rows="3" placeholder="" class="textarea"></textarea>
                            </div>
                        </label>

                        <button class="fancy mt-5" href="#">
                            <span class="top-key"></span>
                            <span class="text">submit</span>
                            <span class="bottom-key-1"></span>
                            <span class="bottom-key-2"></span>
                        </button>
                    </form>
                </div>
            </div>
        </div>



        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- Footer -->
    <?php include('include/footer.php') ?>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>

<style>
    .coolinput {
        display: flex;
        flex-direction: column;
        width: 100%;
        position: static;
    }

    .coolinput label.text {
        font-size: 0.75rem;
        color: #FFA559;
        font-weight: 700;
        position: relative;
        top: 0.5rem;
        margin: 0 0 0 7px;
        padding: 0 3px;
        background: #fff;
        width: fit-content;
    }

    .coolinput input[type=text].input,
    .coolinput input[type=email].input,
    .coolinput textarea.textarea {
        padding: 11px 10px;
        font-size: 0.75rem;
        border: 2px #FFA559 solid;
        border-radius: 5px;
        background: #fff;
        width: 100%;
        box-sizing: border-box;
    }

    .coolinput input[type=text].input:focus,
    .coolinput input[type=email].input:focus,
    .coolinput textarea.textarea:focus {
        outline: none;
    }

    .input,
    .textarea {
        font-family: "SF Pro";
        padding: 0.875rem;
        font-size: 1rem;
        border: 1.5px solid #eee;
        border-radius: 0.5rem;
        box-shadow: 2.5px 3px 0 #FFA559;
        outline: none;
        transition: ease 0.25s;
        width: 100%;
        box-sizing: border-box;
    }

    .input:focus,
    .textarea:focus {
        box-shadow: 5.5px 7px 0 #FFA559;
    }

    .form {
        display: flex;
        flex-direction: column;
        gap: 10px;
        max-width: 950px;
        background-color: #fff;
        padding: 20px;
        border-radius: 10px;
        position: relative;
    }

    .flex {
        display: flex;
        width: 100%;
        gap: 20px;
    }

    .form label {
        position: relative;
        width: 100%;
    }

    .form label .input {
        width: 100%;
        padding: 10px 10px 20px 10px;
        outline: 0;
        border: 1px solid rgba(105, 105, 105, 0.397);
        border-radius: 5px;
    }

    .form label .input+span {
        position: absolute;
        left: 10px;
        top: 15px;
        color: grey;
        font-size: 0.9em;
        cursor: text;
        transition: 0.3s ease;
    }

    .form label .input:placeholder-shown+span {
        top: 15px;
        font-size: 0.9em;
    }

    .form label .input:focus+span,
    .form label .input:valid+span {
        top: 30px;
        font-size: 0.7em;
        font-weight: 600;
    }

    .form label .input:valid+span {
        color: green;
    }

    .fancy {
        background-color: transparent;
        border: 2px solid #FFA559;
        border-radius: 0px;
        box-sizing: border-box;
        color: #fff;
        cursor: pointer;
        display: inline-block;
        font-weight: 390;
        letter-spacing: 2px;
        margin: 0;
        outline: none;
        overflow: visible;
        padding: 8px 30px;
        position: relative;
        text-align: center;
        text-decoration: none;
        text-transform: none;
        transition: all 0.3s ease-in-out;
        user-select: none;
        font-size: 13px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .fancy::before {
        content: " ";
        width: 1.7rem;
        height: 2px;
        background: #FFA559;
        top: 50%;
        left: 1.5em;
        position: absolute;
        transform: translateY(-50%);
        transform: translateX(230%);
        transform-origin: center;
        transition: background 0.3s linear, width 0.3s linear;
    }

    .fancy .text {
        font-size: 1.125em;
        line-height: 1.33333em;
        padding-left: 2em;
        display: block;
        text-align: left;
        transition: all 0.3s ease-in-out;
        text-transform: lowercase;
        text-decoration: none;
        color: #FFA559;
        transform: translateX(30%);
    }

    .fancy .top-key {
        height: 2px;
        width: 1.5625rem;
        top: -2px;
        left: 0.625rem;
        position: absolute;
        background: white;
        transition: width 0.5s ease-out, left 0.3s ease-out;
    }

    .fancy .bottom-key-1 {
        height: 2px;
        width: 1.5625rem;
        right: 1.875rem;
        bottom: -2px;
        position: absolute;
        background: white;
        transition: width 0.5s ease-out, right 0.3s ease-out;
    }

    .fancy .bottom-key-2 {
        height: 2px;
        width: 0.625rem;
        right: 0.625rem;
        bottom: -2px;
        position: absolute;
        background: white;
        transition: width 0.5s ease-out, right 0.3s ease-out;
    }

    .fancy:hover {
        color: white;
        background: #FFA559;
    }

    .fancy:hover::before {
        width: 1.5rem;
        background: white;
    }

    .fancy:hover .text {
        color: white;
        padding-left: 1.5em;
    }

    .fancy:hover .top-key {
        left: -2px;
        width: 0px;
    }

    .fancy:hover .bottom-key-1,
    .fancy:hover .bottom-key-2 {
        right: 0;
        width: 0;
    }
</style>