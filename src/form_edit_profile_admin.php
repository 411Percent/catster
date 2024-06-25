<?php
// Check if session is not already started and then start the session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include 'condb.php';

// ตรวจสอบการเชื่อมต่อฐานข้อมูล
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$user_data = null;

// Check if the username session variable is set
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $sql = "SELECT * FROM employees WHERE emp_username = '$username'";

    // Execute the query and fetch the result
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Fetch the user data
        $user_data = $result->fetch_assoc();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- My CSS -->
    <link rel="stylesheet" href="assets/css/admin_style.css">
    <script src="https://kit.fontawesome.com/5f1b7c0a83.js" crossorigin="anonymous"></script>

    <title>AdminHub</title>
</head>

<body>


    <!-- SIDEBAR -->
    <section id="sidebar">
        <a href="#" class="brand">
            <i class='bx bxs-smile'></i>
            <span class="text">AdminHub</span>
        </a>
        <ul class="side-menu top">
            <li class="active">
                <a href="admin.php">
                    <i class='bx bxs-dashboard'></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="admin_manage.php">
                    <i class='bx bxs-group'></i>
                    <span class="text">Manage</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class='bx bxs-shopping-bag-alt'></i>
                    <span class="text">My Store</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class='bx bxs-doughnut-chart'></i>
                    <span class="text">Analytics</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class='bx bxs-message-dots'></i>
                    <span class="text">Message</span>
                </a>
            </li>
        </ul>
        <ul class="side-menu">
            <li>
                <a href="#">
                    <i class='bx bxs-cog'></i>
                    <span class="text">Settings</span>
                </a>
            </li>
            <li>
                <a href="logout.php" class="logout">
                    <i class='bx bxs-log-out-circle'></i>
                    <span class="text">Logout</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- SIDEBAR -->

    <!-- CONTENT -->
    <section id="content">
        <!-- NAVBAR -->
        <nav>
            <i class='bx bx-menu'></i>
            <a href="#" class="nav-link">Dashboard</a>
            <form action="#">
                <div class="form-input">
                    <input type="search" placeholder="Search...">
                    <button type="submit" class="search-btn"><i class='bx bx-search'></i></button>
                </div>
            </form>
            <input type="checkbox" id="switch-mode" hidden>
            <label for="switch-mode" class="switch-mode"></label>
            <a href="#" class="notification">
                <i class='bx bxs-bell'></i>
                <span class="num">8</span>
            </a>
            <a href="#" class="profile">
                <img src="images/<?php echo isset($user_data['emp_picture']) ? $user_data['emp_picture'] : 'noimage.png'; ?>">
            </a>
        </nav>
        <!-- NAVBAR -->

        <!-- MAIN -->
        <main>
            <div class="head-title">
                <div class="left">
                    <h1>แก้ไขข้อมูลส่วนตัว</h1>
                </div>
            </div>

            <div class="table-data">
                <div class="todo">
                    <div class="head">
                        <h3><?php echo isset($user_data['emp_firstname']) ? $user_data['emp_firstname'] : ''; ?> <?php echo isset($user_data['emp_lastname']) ? $user_data['emp_lastname'] : ''; ?></h3>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="text-center">
                                <!-- Avatar Upload -->
                                <form class="form-horizontal" role="form" action="update_emp.php" method="POST" enctype="multipart/form-data">
                                    <div class="avatar-upload">
                                        <div class="avatar-edit">
                                            <input type="file" name="emp_picture" id="imageUpload" accept=".png, .jpg, .jpeg" onchange="previewImage(this)" />
                                            <label for="imageUpload"><i class="fa-solid fa-gear" style="color: #fff;"></i></label>
                                            <input type="hidden" name="current_picture" value="<?php echo isset($user_data['emp_picture']) ? $user_data['emp_picture'] : 'default.png'; ?>">
                                        </div>
                                        <div class="avatar-preview">
                                            <div id="imagePreview" style="background-image: url('images/<?php echo isset($user_data['emp_picture']) ? $user_data['emp_picture'] : 'default.png'; ?>');">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Avatar Upload -->

                                    <h4 style="margin-top: 50px;">User Info</h4>
                                    <input type="text" name="emp_username" value="<?php echo isset($user_data['emp_username']) ? $user_data['emp_username'] : ''; ?>" style="margin-top: 5px; background-color: #FFA559; color: #fff;" readonly>
                                    <input type="text" name="emp_firstname" value="<?php echo isset($user_data['emp_firstname']) ? $user_data['emp_firstname'] : ''; ?>" style="margin-top: 5px;">
                                    <input type="text" name="emp_lastname" value="<?php echo isset($user_data['emp_lastname']) ? $user_data['emp_lastname'] : ''; ?>" style="margin-top: 5px;">
                                    <input type="email" name="emp_email" value="<?php echo isset($user_data['emp_email']) ? $user_data['emp_email'] : ''; ?>" style="margin-top: 5px;">
                                    <input type="text" name="emp_tel" value="<?php echo isset($user_data['emp_tel']) ? $user_data['emp_tel'] : ''; ?>" style="margin-top: 5px;">
                                    <textarea rows="4" name="emp_address"><?php echo isset($user_data['emp_address']) ? $user_data['emp_address'] : ''; ?></textarea>

                                    <h4 style="margin-top: 50px;">Change Password</h4>
                                    <input type="hidden" name="emp_password">
                                    <input type="password" name="oldPassword" style="margin-top: 5px;" placeholder="Old Password">
                                    <input type="password" name="newPassword" style="margin-top: 5px;" placeholder="New Password">
                                    <input type="password" name="cfPassword" style="margin-top: 5px;" placeholder="Confirm Password">

                                    <button type="submit" class="button-two"> SUBMIT </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </main>
        <!-- MAIN -->
    </section>
    <!-- CONTENT -->

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script>
        function previewImage(input) {
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
            previewImage(this);
        });
    </script>


    <!-- JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <script src="assets/js/script_admin.js"></script>
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
        display: flex;
        flex-direction: column;
        align-items: center;
        /* Center the form elements horizontally */
        max-width: 100%;
        /* Define the maximum width of the form */
        margin: 0 auto;
        /* Center the form within its parent container */
        padding: 20px;
        /* Add padding for visual spacing */
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

    input,
    select,
    textarea {
        margin-bottom: 10px;
        width: 40%;
        height: 40px;
        font-size: 16px;
        transition: border-bottom 0.6s;
        /* Added transition for consistency */
        border: 1px solid #CCC;
        /* Added default border for consistency */
        background-color: transparent;
        border-radius: 4px;
        /* Added border-radius for consistency */
        padding: 8px;
        /* Added padding for consistency */
    }

    input:focus,
    select:focus,
    textarea:focus {
        outline: none;
        border-color: #FFA559;
        border-bottom: 1px solid #FFA559;
        /* Adjusted to match input field behavior */
    }

    .button-two {
        border-radius: 4px;
        background-color: #FFA559;
        font-size: 18px;
        border: none;
        padding: 10px;
        width: 200px;
        transition: all 0.5s;
    }

    .button-two span {
        cursor: pointer;
        display: inline-block;
        position: relative;
        transition: 0.5s;
    }

    .button-two span:after {
        content: '»';
        position: absolute;
        opacity: 0;
        top: 0;
        right: -20px;
        transition: 0.5s;
    }

    .button-two:hover span {
        padding-right: 25px;
    }

    .button-two:hover span:after {
        opacity: 1;
        right: 0;
    }

    .row {
        justify-content: center;
    }
</style>