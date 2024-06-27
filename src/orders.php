<?php
include 'condb.php';
session_start();
if (!isset($_SESSION['username'])) {
    header("location:login.php");
}
$sql = "SELECT * FROM orders";
$result = mysqli_query($conn, $sql);

$user_data = null;

// Check if the username session variable is set
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $sql = "SELECT * FROM employees WHERE emp_username = '$username'";

    // Execute the query and fetch the result_user
    $result_user = $conn->query($sql);

    if ($result_user->num_rows > 0) {
        // Fetch the user data
        $user_data = $result_user->fetch_assoc();
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/admin_style.css">

    <title>AdminHub</title>

    <style>
        #sidebar {
            text-align: left !important;
        }

        .side-menu {
            padding-left: 0 !important;
        }
    </style>

</head>

<body>


    <!-- SIDEBAR -->
    <section id="sidebar">
        <a href="#" class="brand">
            <i class='bx bxs-smile'></i>
            <span class="text">AdminHub</span>
        </a>
        <ul class="side-menu top">
            <li>
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
            <li class="active">
                <a href="orders.php">
                    <i class='bx bxs-shopping-bag-alt'></i>
                    <span class="text">Orders</span>
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
                <a href="form_edit_profile_admin.php">
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
                <img src="images/<?php echo $user_data['emp_picture']; ?>">
            </a>
        </nav>
        <!-- NAVBAR -->

        <!-- MAIN -->
        <main>
            <div class="head-title">
                <div class="left">
                    <h1>Orders</h1>
                </div>
                <a href="#" class="btn-download">
                    <i class='bx bxs-cloud-download'></i>
                    <span class="text">Download PDF</span>
                </a>
            </div>

            <div class="table-data">
                <div class="order">
                    <div class="head">
                        <h3>Recent Orders</h3>
                        <i class='bx bx-search'></i>
                        <i class='bx bx-filter'></i>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>#ORDER ID</th>
                                <th>Customer</th>
                                <th>Date Order</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Manage</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                <tr>
                                    <td><?php echo $row['order_id']; ?></td>
                                    <td>
                                        <p><?php echo $row['mem_username']; ?></p>
                                    </td>
                                    <td><?php echo $row['order_date']; ?></td>
                                    <td><?php echo $row['order_total']; ?></td>
                                    <td><span class="status completed"><?php echo $row['order_status']; ?></span></td>
                                    <td>
                                        <button type="button" class="w3-button w3-amber" data-bs-toggle="modal" data-bs-target="#orderDetails<?php echo $row['order_id']; ?>">
                                            <i class="fa-regular fa-eye"></i>
                                        </button>
                                        <!-- Modals -->
                                        <div class="modal fade" id="orderDetails<?php echo $row['order_id']; ?>" tabindex="-1" aria-labelledby="orderDetailsLabel<?php echo $row['order_id']; ?>" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header border-bottom-0">
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body text-start p-4">
                                                        <h5 class="modal-title text-uppercase mb-5" id="orderDetailsLabel<?php echo $row['order_id']; ?>">#<?php echo " " . $row['order_id']; ?></h5>
                                                        <?php
                                                        $order_id = $row['order_id'];
                                                        $payment_sql = "SELECT * FROM payment WHERE order_id = '$order_id'";
                                                        $payment_result = mysqli_query($conn, $payment_sql);
                                                        while ($payment_row = mysqli_fetch_assoc($payment_result)) { ?>
                                                            <img src="images/<?php echo $payment_row['pay_slip']; ?>" style="width: 450px; height: 450px;">
                                                        <?php } ?>

                                                        <strong class="mb-0">Payment summary</strong>
                                                        <hr class="mt-2 mb-4" style="height: 0; background-color: transparent; opacity: .75; border-top: 2px dashed #9e9e9e;">
                                                        <?php
                                                        $order_details_sql = "SELECT * FROM order_details WHERE order_id = '$order_id'";
                                                        $order_details_result = mysqli_query($conn, $order_details_sql);
                                                        while ($order_details_row = mysqli_fetch_assoc($order_details_result)) { ?>
                                                            <div class="d-flex justify-content-between">
                                                                <p class="fw-small mb-0"><?php echo $order_details_row['quantity'] . " "; ?><?php echo " " . $order_details_row['product_name']; ?></p>
                                                                <p class="text-muted mb-0">฿<?php echo $order_details_row['sub_total']; ?></p>
                                                            </div>
                                                        <?php } ?>
                                                        <hr class="mt-2 mb-4" style="height: 0; background-color: transparent; opacity: .75; border-top: 2px dashed #9e9e9e;">

                                                        <!-- Order total -->
                                                        <div class="d-flex justify-content-between">
                                                            <p class="fw-bold">Total</p>
                                                            <p class="fw-bold">฿<?php echo $row['order_total']; ?></p>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer d-flex justify-content-center border-top-0 py-4">
                                                        <?php if ($row['order_status'] == 'wait') { ?>
                                                            <a href="admin_confirm_order.php?action=confirm&order_id=<?php echo $row['order_id']; ?>" class="btn btn-lg mb-1" style="background-color: #FFA931;">
                                                                ยืนยัน
                                                            </a>
                                                            <a href="admin_confirm_order.php?action=refuse&order_id=<?php echo $row['order_id']; ?>" class="btn btn-lg mb-1" style="background-color: #D1274B; color: #fff;">
                                                                ปฏิเสธ
                                                            </a>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
        <!-- MAIN -->
    </section>
    <!-- CONTENT -->


    <script src="assets/js/script_admin.js"></script>
</body>

</html>