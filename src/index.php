<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Catster - หน้าแรก</title>
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
    <?php include('include/header.php'); ?>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">กำลังโหลด...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Carousel Start -->
        <!-- <div class="container-fluid p-0 mb-5">
            <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="w-100" src="img/carousel-1.jpg" alt="Image">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 700px;">
                                <h6 class="section-title text-white text-uppercase mb-3 animated slideInDown">Luxury Living</h6>
                                <h1 class="display-3 text-white mb-4 animated slideInDown">Discover A Brand Luxurious Hotel</h1>
                                <a href="" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Our Rooms</a>
                                <a href="" class="btn btn-light py-md-3 px-md-5 animated slideInRight">Book A Room</a>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="w-100" src="img/carousel-2.jpg" alt="Image">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 700px;">
                                <h6 class="section-title text-white text-uppercase mb-3 animated slideInDown">Luxury Living</h6>
                                <h1 class="display-3 text-white mb-4 animated slideInDown">Discover A Brand Luxurious Hotel</h1>
                                <a href="" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Our Rooms</a>
                                <a href="" class="btn btn-light py-md-3 px-md-5 animated slideInRight">Book A Room</a>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="w-100" src="img/carousel-3.jpg" alt="Image">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 700px;">
                                <h6 class="section-title text-white text-uppercase mb-3 animated slideInDown">Luxury Living</h6>
                                <h1 class="display-3 text-white mb-4 animated slideInDown">Discover A Brand Luxurious Hotel</h1>
                                <a href="" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Our Rooms</a>
                                <a href="" class="btn btn-light py-md-3 px-md-5 animated slideInRight">Book A Room</a>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div> -->
        <!-- Carousel End -->


        <!-- Booking Start -->
        <!-- <div class="container-fluid booking pb-5 wow fadeIn" data-wow-delay="0.1s" style="position: sticky; top: 0;">
            <div class="container">
                <div class="bg-white shadow" style="padding: 35px;">
                    <div class="row g-2">
                        <div class="col-md-10">
                            <div class="row g-2">
                                <div class="col-md-3">
                                    <div class="date" id="date1" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input"
                                            placeholder="Check in" data-target="#date1" data-toggle="datetimepicker" />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="date" id="date2" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" placeholder="Check out" data-target="#date2" data-toggle="datetimepicker"/>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <select class="form-select">
                                        <option selected>Adult</option>
                                        <option value="1">Adult 1</option>
                                        <option value="2">Adult 2</option>
                                        <option value="3">Adult 3</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <select class="form-select">
                                        <option selected>Child</option>
                                        <option value="1">Child 1</option>
                                        <option value="2">Child 2</option>
                                        <option value="3">Child 3</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-primary w-100">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- Booking End -->


        <!-- เกี่ยวกับ -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6">
                        <h6 class="section-title text-start text-primary text-uppercase">About</h6>
                        <h1 class="mb-4">ยินดีต้อนรับ <span class="text-primary text-uppercase">แคสเตอร์</span></h1>
                        <p class="mb-4">
                            มันคงจะดีถ้าวันนึงจะมีศูนย์กลางความช่วยเหลือให้สัตว์ในไทยบนโลกออนไลน์ ที่ทุกคนสามารถเข้ามาขอหรือให้ความช่วยเหลือสัตว์ได้
                        </p>
                        <div class="row g-3 pb-4">
                            <div class="col-sm-4 wow fadeIn" data-wow-delay="0.1s">
                                <div class="border rounded p-1">
                                    <div class="border rounded text-center p-4">
                                        <i class="fa fa-hotel fa-2x text-primary mb-2"></i>
                                        <h2 class="mb-1" data-toggle="counter-up">100</h2>
                                        <p class="mb-0">ทั้งหมด</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 wow fadeIn" data-wow-delay="0.3s">
                                <div class="border rounded p-1">
                                    <div class="border rounded text-center p-4">
                                        <i class="fa fa-users-cog fa-2x text-primary mb-2"></i>
                                        <h2 class="mb-1" data-toggle="counter-up">48</h2>
                                        <p class="mb-0">ได้บ้าน</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 wow fadeIn" data-wow-delay="0.5s">
                                <div class="border rounded p-1">
                                    <div class="border rounded text-center p-4">
                                        <i class="fa fa-users fa-2x text-primary mb-2"></i>
                                        <h2 class="mb-1" data-toggle="counter-up">52</h2>
                                        <p class="mb-0">หาบ้าน</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a class="btn btn-primary py-3 px-5 mt-2" href="">อุปการะแคทสเตอร์!</a>
                    </div>
                    <div class="col-lg-6">
                        <div class="row g-3">
                            <div class="col-6 text-end">
                                <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.1s" src="images/c-2.jfif" style="margin-top: 25%;">
                            </div>
                            <div class="col-6 text-start">
                                <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.3s" src="images/c-3.jfif">
                            </div>
                            <div class="col-6 text-end">
                                <img class="img-fluid rounded w-50 wow zoomIn" data-wow-delay="0.5s" src="images/c-5.jfif">
                            </div>
                            <div class="col-6 text-start">
                                <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.7s" src="images/c-7.jfif">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- แคทสเตอร์ -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="section-title text-center text-primary text-uppercase">Our Catster</h6>
                    <h1 class="mb-5">สมาชิกของ <span class="text-primary text-uppercase">แคทสเตอร์</span></h1>
                </div>
                <div class="row g-4">
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <a class="service-item rounded" href="">
                            <center><img width="110" height="110" src="images/c-4.jfif" role="img" aria-labelledby="title desc" class="center circular-image" style="border-radius: 50%;"></center>
                            <h5 class="mb-3 mt-4">Rooms & Appartment</h5>
                            <p class="text-body mb-0">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet diam sed stet lorem.</p>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
                        <a class="service-item rounded" href="">
                            <center><img width="110" height="110" src="images/c-4.jfif" role="img" aria-labelledby="title desc" class="center circular-image" style="border-radius: 50%;"></center>
                            <h5 class="mb-3 mt-4">Food & Restaurant</h5>
                            <p class="text-body mb-0">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet diam sed stet lorem.</p>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                        <a class="service-item rounded" href="">
                            <center><img width="110" height="110" src="images/c-4.jfif" role="img" aria-labelledby="title desc" class="center circular-image" style="border-radius: 50%;"></center>
                            <h5 class="mb-3 mt-4">Spa & Fitness</h5>
                            <p class="text-body mb-0">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet diam sed stet lorem.</p>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.4s">
                        <a class="service-item rounded" href="">
                            <center><img width="110" height="110" src="images/c-4.jfif" role="img" aria-labelledby="title desc" class="center circular-image" style="border-radius: 50%;"></center>
                            <h5 class="mb-3 mt-4">Sports & Gaming</h5>
                            <p class="text-body mb-0">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet diam sed stet lorem.</p>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                        <a class="service-item rounded" href="">
                            <center><img width="110" height="110" src="images/c-4.jfif" role="img" aria-labelledby="title desc" class="center circular-image" style="border-radius: 50%;"></center>
                            <h5 class="mb-3 mt-4">Event & Party</h5>
                            <p class="text-body mb-0">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet diam sed stet lorem.</p>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.6s">
                        <a class="service-item rounded" href="">
                            <center><img width="110" height="110" src="images/c-4.jfif" role="img" aria-labelledby="title desc" class="center circular-image" style="border-radius: 50%;"></center>
                            <h5 class="mb-3 mt-4">GYM & Yoga</h5>
                            <p class="text-body mb-0">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet diam sed stet lorem.</p>
                        </a>
                    </div>
                </div>
            </div>
            <center><a class="btn btn-primary py-3 px-5 mt-4" href="catster.php">รายชื่อแคทสเตอร์ทั้งหมด</a></center>
        </div>


        <!-- วีดิโอ -->
        <div class="container-xxl py-5 px-0 wow zoomIn" data-wow-delay="0.1s">
            <div class="row g-0">
                <div class="col-md-6 d-flex align-items-center" style="background-color: #313131;">
                    <div class="p-5">
                        <h6 class="section-title text-start text-white text-uppercase mb-3">Cater by Kingdomoftigers</h6>
                        <h1 class="text-white mb-4">โรงพยาบาลสนามแมว เพื่อดูแลน้องแมวที่เจ้าของดูแลต่อไม่ไหวในวิกฤตโควิด</h1>
                        <p class="text-white mb-4">“Catster by Kingdomoftigers” ที่นี่เป็นทั้งคาเฟ่ของคนรักแมวและบ้านพักแมวจร แมวจรทุกตัวที่เข้ามาที่นี่ได้รับการดูแลในมาตรฐานเดียวกันกับแมวของเจ้าของกิจการ รักษาโรค ทำหมัน ฉีดวัคซีน มีห้องน้ำ อาหารอย่างดี มีที่พักที่สะอาด และแวดล้อมด้วยเครื่องเล่นนานาชนิด รอให้ผู้อุปการะมารับไปดูแลฟรีๆ ที่นี่ได้ดูแล และหาบ้านมาแล้วมากกว่า 1,700 ตัว </p>
                        <a href="" class="btn btn-primary py-md-3 px-md-5 me-3">รับเลี้ยงแคทสเตอร์</a>
                        <a href="" class="btn btn-light py-md-3 px-md-5">บริจาคสมทบทุน</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="video">
                        <button type="button" class="btn-play" data-bs-toggle="modal" data-src="https://www.youtube.com/embed/lmQUu-pcE20" data-bs-target="#videoModal">
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content rounded-0">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Youtube</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- 16:9 aspect ratio -->
                        <div class="ratio ratio-16x9">
                            <iframe class="embed-responsive-item" id="video" allowfullscreen allowscriptaccess="always" allow="autoplay"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            var videoModal = document.getElementById('videoModal');
            videoModal.addEventListener('show.bs.modal', function(event) {
                var button = event.relatedTarget;
                var videoSrc = button.getAttribute('data-src');
                var iframe = videoModal.querySelector('iframe');
                iframe.src = videoSrc;
            });

            videoModal.addEventListener('hide.bs.modal', function(event) {
                var iframe = videoModal.querySelector('iframe');
                iframe.src = '';
            });
        </script>


        <!-- สินค้า -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="section-title text-center text-primary text-uppercase">Pet Shop</h6>
                    <h1 class="mb-5">สินค้าจาก <span class="text-primary text-uppercase">แคทสเตอร์</span></h1>
                </div>
                <div class="row g-4">
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="room-item shadow rounded overflow-hidden">
                            <div class="position-relative">
                                <img class="img-fluid" src="img/bg.jpg" alt="">
                                <small class="position-absolute start-0 top-100 translate-middle-y text-white rounded py-1 px-3 ms-4" style="background-color: #313131;">$100/Night</small>
                            </div>
                            <div class="p-4 mt-2">
                                <div class="d-flex justify-content-between mb-3">
                                    <h5 class="mb-0">Junior Suite</h5>
                                </div>
                                <p class="text-body mb-3">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet diam sed stet lorem.</p>
                                <div class="d-flex justify-content-between">
                                    <a class="btn btn-sm btn-primary rounded py-2 px-4" href="">View Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="room-item shadow rounded overflow-hidden">
                            <div class="position-relative">
                                <img class="img-fluid" src="img/bg.jpg" alt="">
                                <small class="position-absolute start-0 top-100 translate-middle-y text-white rounded py-1 px-3 ms-4" style="background-color: #313131;">$100/Night</small>
                            </div>
                            <div class="p-4 mt-2">
                                <div class="d-flex justify-content-between mb-3">
                                    <h5 class="mb-0">Junior Suite</h5>
                                </div>
                                <p class="text-body mb-3">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet diam sed stet lorem.</p>
                                <div class="d-flex justify-content-between">
                                    <a class="btn btn-sm btn-primary rounded py-2 px-4" href="">View Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="room-item shadow rounded overflow-hidden">
                            <div class="position-relative">
                                <img class="img-fluid" src="img/bg.jpg" alt="">
                                <small class="position-absolute start-0 top-100 translate-middle-y text-white rounded py-1 px-3 ms-4" style="background-color: #313131;">$100/Night</small>
                            </div>
                            <div class="p-4 mt-2">
                                <div class="d-flex justify-content-between mb-3">
                                    <h5 class="mb-0">Junior Suite</h5>
                                </div>
                                <p class="text-body mb-3">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet diam sed stet lorem.</p>
                                <div class="d-flex justify-content-between">
                                    <a class="btn btn-sm btn-primary rounded py-2 px-4" href="">View Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <center><a class="btn btn-primary py-3 px-5 mt-4" href="shop.php">สินค้าทั้งหมด</a></center>
                </div>
            </div>
        </div>


        <!-- สมาชิก -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="section-title text-center text-primary text-uppercase">Our Team</h6>
                    <h1 class="mb-5">Explore Our <span class="text-primary text-uppercase">Staffs</span></h1>
                </div>
                <div class="row g-4">
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="rounded shadow overflow-hidden">
                            <div class="position-relative">
                                <img class="img-fluid" src="img/team-1.jpg" alt="">
                                <div class="position-absolute start-50 top-100 translate-middle d-flex align-items-center">
                                    <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                            <div class="text-center p-4 mt-3">
                                <h5 class="fw-bold mb-0">Full Name</h5>
                                <small>Designation</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="rounded shadow overflow-hidden">
                            <div class="position-relative">
                                <img class="img-fluid" src="img/team-2.jpg" alt="">
                                <div class="position-absolute start-50 top-100 translate-middle d-flex align-items-center">
                                    <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                            <div class="text-center p-4 mt-3">
                                <h5 class="fw-bold mb-0">Full Name</h5>
                                <small>Designation</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="rounded shadow overflow-hidden">
                            <div class="position-relative">
                                <img class="img-fluid" src="img/team-3.jpg" alt="">
                                <div class="position-absolute start-50 top-100 translate-middle d-flex align-items-center">
                                    <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                            <div class="text-center p-4 mt-3">
                                <h5 class="fw-bold mb-0">Full Name</h5>
                                <small>Designation</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                        <div class="rounded shadow overflow-hidden">
                            <div class="position-relative">
                                <img class="img-fluid" src="img/team-4.jpg" alt="">
                                <div class="position-absolute start-50 top-100 translate-middle d-flex align-items-center">
                                    <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                            <div class="text-center p-4 mt-3">
                                <h5 class="fw-bold mb-0">Full Name</h5>
                                <small>Designation</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Newsletter Start -->
        <div class="container newsletter mt-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="row justify-content-center">
                <div class="col-lg-10 border rounded p-1">
                    <div class="border rounded text-center p-1">
                        <div class="bg-white rounded text-center p-5">
                            <h4 class="mb-4">Subscribe Our <span class="text-primary text-uppercase">Newsletter</span></h4>
                            <div class="position-relative mx-auto" style="max-width: 400px;">
                                <input class="form-control w-100 py-3 ps-4 pe-5" type="text" placeholder="Enter your email">
                                <button type="button" class="btn btn-primary py-2 px-3 position-absolute top-0 end-0 mt-2 me-2">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Newsletter Start -->




        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>
    <!-- Footer -->
    <?php include('include/footer.php'); ?>

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
    /********** Template CSS **********/

    /* อัพเถ๊อะ*/
    :root {
        --primary: #FFA559;
        --light: #F1F8FF;
        --dark: #313131;
    }

    .fw-medium {
        font-weight: 500 !important;
    }

    .fw-semi-bold {
        font-weight: 600 !important;
    }

    .back-to-top {
        position: fixed;
        display: none;
        right: 45px;
        bottom: 45px;
        z-index: 99;
    }


    /*** Spinner ***/
    #spinner {
        opacity: 0;
        visibility: hidden;
        transition: opacity .5s ease-out, visibility 0s linear .5s;
        z-index: 99999;
    }

    #spinner.show {
        transition: opacity .5s ease-out, visibility 0s linear 0s;
        visibility: visible;
        opacity: 1;
    }


    /*** Button ***/
    .btn {
        font-weight: 500;
        text-transform: uppercase;
        transition: .5s;
    }

    .btn.btn-primary,
    .btn.btn-secondary {
        color: #FFFFFF;
    }

    .btn-square {
        width: 38px;
        height: 38px;
    }

    .btn-sm-square {
        width: 32px;
        height: 32px;
    }

    .btn-lg-square {
        width: 48px;
        height: 48px;
    }

    .btn-square,
    .btn-sm-square,
    .btn-lg-square {
        padding: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: normal;
        border-radius: 2px;
    }


    /*** Navbar ***/
    .navbar-dark .navbar-nav .nav-link {
        margin-right: 30px;
        padding: 25px 0;
        color: #FFFFFF;
        font-size: 15px;
        text-transform: uppercase;
        outline: none;
    }

    .navbar-dark .navbar-nav .nav-link:hover,
    .navbar-dark .navbar-nav .nav-link.active {
        color: var(--primary);
    }

    @media (max-width: 991.98px) {
        .navbar-dark .navbar-nav .nav-link {
            margin-right: 0;
            padding: 10px 0;
        }
    }


    /*** Header ***/
    .carousel-caption {
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: #313131;
        z-index: 1;
    }

    .carousel-control-prev,
    .carousel-control-next {
        width: 10%;
    }

    .carousel-control-prev-icon,
    .carousel-control-next-icon {
        width: 3rem;
        height: 3rem;
    }

    @media (max-width: 768px) {
        #header-carousel .carousel-item {
            position: relative;
            min-height: 450px;
        }

        #header-carousel .carousel-item img {
            position: absolute;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    }

    .page-header {
        background-position: center center;
        background-repeat: no-repeat;
        background-size: cover;
    }

    .page-header-inner {
        background: #313131;
    }

    .breadcrumb-item+.breadcrumb-item::before {
        color: var(--light);
    }

    .booking {
        position: relative;
        margin-top: -100px !important;
        z-index: 1;
    }


    /*** Section Title ***/
    .section-title {
        position: relative;
        display: inline-block;
    }

    .section-title::before {
        position: absolute;
        content: "";
        width: 45px;
        height: 2px;
        top: 50%;
        left: -55px;
        margin-top: -1px;
        background: var(--primary);
    }

    .section-title::after {
        position: absolute;
        content: "";
        width: 45px;
        height: 2px;
        top: 50%;
        right: -55px;
        margin-top: -1px;
        background: var(--primary);
    }

    .section-title.text-start::before,
    .section-title.text-end::after {
        display: none;
    }


    /*** Service ***/
    .service-item {
        height: 320px;
        padding: 30px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        text-align: center;
        background: #FFFFFF;
        box-shadow: 0 0 45px rgba(0, 0, 0, .08);
        transition: .5s;
    }

    .service-item:hover {
        background: var(--primary);
    }

    .service-item .service-icon {
        margin: 0 auto 30px auto;
        width: 65px;
        height: 65px;
        transition: .5s;
    }

    .service-item i,
    .service-item h5,
    .service-item p {
        transition: .5s;
    }

    .service-item:hover i,
    .service-item:hover h5,
    .service-item:hover p {
        color: #FFFFFF !important;
    }


    /*** Youtube Video ***/
    .video {
        position: relative;
        height: 100%;
        min-height: 500px;
        background: linear-gradient(rgba(15, 23, 43, .1), rgba(15, 23, 43, .1)), url('../../images/bg.jpg');
        background-position: center center;
        background-repeat: no-repeat;
        background-size: cover;
    }


    .video .btn-play {
        position: absolute;
        z-index: 3;
        top: 50%;
        left: 50%;
        transform: translateX(-50%) translateY(-50%);
        box-sizing: content-box;
        display: block;
        width: 32px;
        height: 44px;
        border-radius: 50%;
        border: none;
        outline: none;
        padding: 18px 20px 18px 28px;
    }

    .video .btn-play:before {
        content: "";
        position: absolute;
        z-index: 0;
        left: 50%;
        top: 50%;
        transform: translateX(-50%) translateY(-50%);
        display: block;
        width: 100px;
        height: 100px;
        background: var(--primary);
        border-radius: 50%;
        animation: pulse-border 1500ms ease-out infinite;
    }

    .video .btn-play:after {
        content: "";
        position: absolute;
        z-index: 1;
        left: 50%;
        top: 50%;
        transform: translateX(-50%) translateY(-50%);
        display: block;
        width: 100px;
        height: 100px;
        background: var(--primary);
        border-radius: 50%;
        transition: all 200ms;
    }

    .video .btn-play img {
        position: relative;
        z-index: 3;
        max-width: 100%;
        width: auto;
        height: auto;
    }

    .video .btn-play span {
        display: block;
        position: relative;
        z-index: 3;
        width: 0;
        height: 0;
        border-left: 32px solid var(--dark);
        border-top: 22px solid transparent;
        border-bottom: 22px solid transparent;
    }

    @keyframes pulse-border {
        0% {
            transform: translateX(-50%) translateY(-50%) translateZ(0) scale(1);
            opacity: 1;
        }

        100% {
            transform: translateX(-50%) translateY(-50%) translateZ(0) scale(1.5);
            opacity: 0;
        }
    }

    #videoModal {
        z-index: 99999;
    }

    #videoModal .modal-dialog {
        position: relative;
        max-width: 800px;
        margin: 60px auto 0 auto;
    }

    #videoModal .modal-body {
        position: relative;
        padding: 0px;
    }

    #videoModal .close {
        position: absolute;
        width: 30px;
        height: 30px;
        right: 0px;
        top: -30px;
        z-index: 999;
        font-size: 30px;
        font-weight: normal;
        color: #FFFFFF;
        background: #000000;
        opacity: 1;
    }


    /*** Testimonial ***/
    .testimonial {
        background: linear-gradient(rgba(15, 23, 43, .7), rgba(15, 23, 43, .7)), url(../img/carousel-2.jpg);
        background-position: center center;
        background-repeat: no-repeat;
        background-size: cover;
    }

    .testimonial-carousel {
        padding-left: 65px;
        padding-right: 65px;
    }

    .testimonial-carousel .testimonial-item {
        padding: 30px;
    }

    .testimonial-carousel .owl-nav {
        position: absolute;
        width: 100%;
        height: 40px;
        top: calc(50% - 20px);
        left: 0;
        display: flex;
        justify-content: space-between;
        z-index: 1;
    }

    .testimonial-carousel .owl-nav .owl-prev,
    .testimonial-carousel .owl-nav .owl-next {
        position: relative;
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #FFFFFF;
        background: var(--primary);
        border-radius: 2px;
        font-size: 18px;
        transition: .5s;
    }

    .testimonial-carousel .owl-nav .owl-prev:hover,
    .testimonial-carousel .owl-nav .owl-next:hover {
        color: var(--primary);
        background: #FFFFFF;
    }


    /*** Team ***/
    .team-item,
    .team-item .bg-primary,
    .team-item .bg-primary i {
        transition: .5s;
    }

    .team-item:hover {
        border-color: var(--secondary) !important;
    }

    .team-item:hover .bg-primary {
        background: var(--secondary) !important;
    }

    .team-item:hover .bg-primary i {
        color: var(--secondary) !important;
    }


    /*** Footer ***/
    .newsletter {
        position: relative;
        z-index: 1;
    }

    .footer {
        position: relative;
        margin-top: -110px;
        padding-top: 180px;
    }

    .footer .btn.btn-social {
        margin-right: 5px;
        width: 35px;
        height: 35px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--light);
        border: 1px solid #FFFFFF;
        border-radius: 35px;
        transition: .3s;
    }

    .footer .btn.btn-social:hover {
        color: var(--primary);
    }

    .footer .btn.btn-link {
        display: block;
        margin-bottom: 5px;
        padding: 0;
        text-align: left;
        color: #FFFFFF;
        font-size: 15px;
        font-weight: normal;
        text-transform: capitalize;
        transition: .3s;
    }

    .footer .btn.btn-link::before {
        position: relative;
        content: "\f105";
        font-family: "Font Awesome 5 Free";
        font-weight: 900;
        margin-right: 10px;
    }

    .footer .btn.btn-link:hover {
        letter-spacing: 1px;
        box-shadow: none;
    }

    .footer .copyright {
        padding: 25px 0;
        font-size: 15px;
        border-top: 1px solid rgba(256, 256, 256, .1);
    }

    .footer .copyright a {
        color: var(--light);
    }

    .footer .footer-menu a {
        margin-right: 15px;
        padding-right: 15px;
        border-right: 1px solid rgba(255, 255, 255, .3);
    }

    .footer .footer-menu a:last-child {
        margin-right: 0;
        padding-right: 0;
        border-right: none;
    }
</style>