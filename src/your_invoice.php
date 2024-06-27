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
    }

    // Check if order_id is set in the URL
    if (isset($_GET['order_id'])) {
        // Sanitize the input to prevent SQL injection
        $order_id = mysqli_real_escape_string($conn, $_GET['order_id']);

        // SQL query to retrieve orders based on username and specific order_id
        $order_sql = "SELECT * FROM orders WHERE mem_username = '$username' AND order_id = '$order_id'";
        $order_result = $conn->query($order_sql);

        // SQL query to retrieve payment info based on order_id
        $payment_sql = "SELECT * FROM payment WHERE order_id = '$order_id'";
        $payment_result = $conn->query($payment_sql);
        $payment_row = $payment_result->fetch_assoc();

        // SQL query to retrieve order details based on order_id
        $order_details_sql = "SELECT od.*, p.product_name, p.product_price, p.product_desc 
                              FROM order_details od 
                              JOIN products p ON od.product_id = p.product_id 
                              WHERE od.order_id = '$order_id'";
        $order_details_result = $conn->query($order_details_sql);
    } else {
        // If order_id is not set in the URL, fetch all orders for the user
        $order_sql = "SELECT * FROM orders WHERE mem_username = '$username'";
        $order_result = $conn->query($order_sql);
    }
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
                                <div class="content-wrapper">
                                    <div class="pad margin no-print" id="invoice">
                                        <section class="invoice">
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <h3 class="page-header"> <img src="images/logo.png" width="75px"> Catster, by Kingdoms of Tigers </h3>
                                                </div>
                                            </div>
                                            <?php if ($order_result && $order_result->num_rows > 0) : ?>
                                                <?php while ($order_row = $order_result->fetch_assoc()) : ?>
                                                    <div class="row invoice-info">
                                                        <div class="col-sm-8 invoice-col">
                                                            <address>
                                                                <strong><?php echo $row['mem_firstname'] . " " . $row['mem_lastname'] ?></strong><br>
                                                                เบอร์โทรศัพท์: <?php echo $order_row['order_tel']; ?><br>
                                                                อีเมล: <?php echo $row['mem_email'] ?><br>
                                                                ที่อยู่: <?php echo $order_row['order_address']; ?><br>
                                                                หมายเหตุ: <?php echo $order_row['order_note']; ?><br>
                                                            </address>
                                                        </div>
                                                        <div class="col-sm-4 invoice-col">
                                                            <b>Invoice #<?php echo isset($payment_row['pay_id']) ? $payment_row['pay_id'] : ''; ?></b><br>
                                                            <br>
                                                            <b>Order ID:</b> <?php echo $order_row['order_id']; ?><br>
                                                            <b>Order Due:</b> <?php echo date('j F Y', strtotime($order_row['order_date'])); ?><br>
                                                            <b>Username:</b> <?php echo $row['mem_username'] ?><br>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-xs-12 table-responsive">
                                                            <table class="table">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Qty</th>
                                                                        <th>Product</th>
                                                                        <th>Price</th>
                                                                        <th>Description</th>
                                                                        <th>Total</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php if ($order_details_result && $order_details_result->num_rows > 0) : ?>
                                                                        <?php while ($order_details_row = $order_details_result->fetch_assoc()) : ?>
                                                                            <tr>
                                                                                <td><?php echo $order_details_row['quantity']; ?></td>
                                                                                <td><?php echo $order_details_row['product_name']; ?></td>
                                                                                <td><?php echo $order_details_row['product_price']; ?></td>
                                                                                <td><?php echo $order_details_row['product_desc']; ?></td>
                                                                                <td><?php echo $order_details_row['quantity'] * $order_details_row['product_price']; ?></td>
                                                                            </tr>
                                                                        <?php endwhile; ?>
                                                                    <?php endif; ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-xs-6">
                                                            <!-- Empty column -->
                                                        </div>
                                                        <div class="col-xs-6">
                                                            <div class="table-responsive">
                                                                <table class="table">
                                                                    <tr>
                                                                        <th>Total:</th>
                                                                        <td><?php echo $order_row['order_total']; ?></td>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endwhile; ?>
                                            <?php endif; ?>
                                        </section>
                                        <div class="clearfix">
                                        </div>
                                    </div>
                                </div>
                                <div class="row no-print">
                                    <div class="col-xs-1">
                                        <a href="your_orders.php" class="btn btn-default">
                                            <i class="fa fa-arrow-left"></i> Back
                                        </a>
                                    </div>
                                    <div class="col-xs-11">
                                        <button onclick="printInvoice()" class="btn btn-default">
                                            <i class="fa fa-print"></i> Print
                                        </button>
                                    </div>
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

    <script>
        function printInvoice() {
            // Get the content of the invoice section
            var invoiceContent = document.querySelector('.invoice').outerHTML;

            // Open a new window
            var printWindow = window.open('', '_blank', 'height=600,width=800');

            // Write the content to the new window
            printWindow.document.write('<html><head><title>Invoice</title>');
            // Optional: Include the CSS if needed
            printWindow.document.write('<link rel="stylesheet" type="text/css" href="assets/css/style.css">');
            printWindow.document.write('<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">');
            printWindow.document.write('</head><body >');
            printWindow.document.write('<br>');
            printWindow.document.write(invoiceContent);
            printWindow.document.write('</body></html>');

            // Close the document to finish writing to the new window
            printWindow.document.close();

            // Wait for the content to load and then print
            printWindow.onload = function() {
                printWindow.print();
                printWindow.close();
            };
        }
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