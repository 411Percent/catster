<?php
// Start session
session_start();

include 'condb.php';

// Check database connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if session data exists
if (isset($_SESSION['username'])) {
    // Get username from session
    $username = $_SESSION['username'];

    // SQL query to retrieve user data based on username
    $sql = "SELECT * FROM members WHERE mem_username = '$username'";
    $result = $conn->query($sql);

    // Check if user data exists
    if ($result->num_rows > 0) {
        // Fetch user data
        $row = $result->fetch_assoc();

        // Set session variables for first name and last name
        $_SESSION['firstname'] = $row['mem_firstname'];
        $_SESSION['lastname'] = $row['mem_lastname'];
    }

    // SQL query to retrieve orders based on username
    $order_sql = "SELECT * FROM orders WHERE mem_username = '$username'";
    $order_result = $conn->query($order_sql);
} else {
    // If session data doesn't exist, display an error message
    echo "Session not found";
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Catster - เกี่ยวกับเรา</title>
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
    <script src="https://kit.fontawesome.com/5f1b7c0a83.js" crossorigin="anonymous"></script>

</head>

<body style="background-color: #fff;">
    <!-- Header -->
    <?php include('include/header.php'); ?>

    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Team Start -->
        <div class="container-xxl py-3" style="margin-bottom: 200px;">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="section-title text-center text-primary text-uppercase">Your orders</h6>
                    <h1 class="mb-5">ประวัติ <span class="text-primary text-uppercase">การสั่งซื้อ</span></h1>
                </div>
                <div class="row g-4">
                    <div class="container">
                        <div class="row justify-content-center align-items-center">
                            <div class="col-md-10 personal-info">
                                <div class="content-panel">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">#Order ID</th>
                                                <th scope="col">Amount</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Invoice</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-group-divider">
                                            <?php if ($order_result && $order_result->num_rows > 0) { ?>
                                                <?php while ($order_row = $order_result->fetch_assoc()) : ?>
                                                    <?php
                                                    // SQL query to retrieve order details based on order ID
                                                    $order_details_sql = "SELECT * FROM order_details WHERE order_id = '{$order_row['order_id']}'";
                                                    $order_details_result = mysqli_query($conn, $order_details_sql);
                                                    ?>
                                                    <tr>
                                                        <th scope="row"><?= htmlspecialchars($order_row['order_id'], ENT_QUOTES, 'UTF-8') ?></th>
                                                        <td><?= htmlspecialchars($order_row['order_total'], ENT_QUOTES, 'UTF-8') ?></td>
                                                        <td><?= htmlspecialchars($order_row['order_status'], ENT_QUOTES, 'UTF-8') ?></td>
                                                        <td><a class="btn" href="your_invoice.php?order_id=<?= htmlspecialchars($order_row['order_id'], ENT_QUOTES, 'UTF-8'); ?>" style="background-color: #F88020; color: #FFFFFF;">Invoice</a></td>
                                                    </tr>
                                                <?php endwhile; ?>
                                            <?php } else { ?>
                                                <tr>
                                                    <td colspan="4" class="text-center">ไม่มีประวัติการสั่งซื้อ</td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>

                                    <span class="badge rounded-pill" style="background-color: #F88020;">Success</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Team End -->

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

    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
                    $('#imagePreview').hide();
                    $('#imagePreview').fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#imageUpload").change(function() {
            readURL(this);
        });
    </script>
</body>

</html>



<style>
    .avatar-upload {
        position: relative;
        max-width: 205px;
        margin: 0 auto;
        /* ทำให้อยู่ตรงกลางหน้าจอ */
    }

    /* เพิ่มเติมเพื่อการ Responsive */
    @media (max-width: 768px) {
        .avatar-upload {
            width: 100%;
            max-width: 205px;
            /* จำกัดขนาดสูงสุดไม่เกิน 205px */
        }
    }


    .avatar-upload .avatar-edit {
        position: absolute;
        right: 20px;
        z-index: 1;
        top: 20px;
    }

    .avatar-upload .avatar-edit input {
        display: none;
    }

    .avatar-upload .avatar-edit input+label {
        display: inline-flex;
        justify-content: center;
        align-items: center;
        width: 34px;
        height: 34px;
        margin-bottom: 0;
        border-radius: 100%;
        background: #FFA559;
        border: 1px solid transparent;
        cursor: pointer;
        font-weight: normal;
        transition: all 0.2s ease-in-out;
    }

    .avatar-upload .avatar-edit input+label:hover {
        background: #f1f1f1;
        border-color: #d6d6d6;
    }


    .avatar-upload .avatar-edit input+label:after {
        position: absolute;
        top: 10px;
        left: 0;
        right: 0;
        text-align: center;
        margin: auto;
    }

    .avatar-upload .avatar-preview {
        width: 192px;
        height: 192px;
        position: relative;
        border-radius: 100%;
        border: 6px;
    }

    .avatar-upload .avatar-preview>div {
        width: 100%;
        height: 100%;
        border-radius: 100%;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
    }

    @import url(https://fonts.googleapis.com/css?family=Open+Sans:300);



    .jumbotron-flat {
        background-color: solid #4DB8FF;
        height: 100%;
        border: 1px solid #4DB8FF;
        background: white;
        width: 100%;
        text-align: center;
        overflow: auto;
        color: var(--dark-color);
    }

    .paymentAmt {
        color: var(--dark-color);
        font-size: 80px;
    }

    .centered {
        text-align: center;
    }

    .title {
        padding-top: 15px;
        color: var(--dark-color);
    }

    .form-horizontal {
        position: relative;
        max-width: 100%;
        /* กำหนดความกว้างสูงสุดของแบบฟอร์ม */
        margin: 0 auto;
        /* ทำให้อยู่ตรงกลาง */
        padding: 20px;
        /* เพิ่ม padding เพื่อให้มีขอบที่สวยงาม */

    }

    @media (max-width: 768px) {
        .form-horizontal {
            width: 100%;
            /* กำหนดความกว้างเต็มหน้าจอใน responsive mode */
            max-width: 100%;
            /* กำหนดความกว้างสูงสุดเป็น 100% */
            padding: 10px;
            /* ลด padding ในโหมด responsive เพื่อให้แบบฟอร์มมีขนาดเล็กลง */
        }
    }

    .form-group {
        margin-bottom: 10px;
    }
</style>