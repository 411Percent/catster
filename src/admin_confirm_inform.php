<?php
// Include database connection file
include_once "condb.php";

// Check if order_id is set through GET request
if (isset($_GET['inform_id'])) {
    // Get order_id from GET request
    $inform_id = $_GET['inform_id'];

    // Check if action is set through GET request
    if (isset($_GET['action'])) {
        // Get action from GET request
        $action = $_GET['action'];

        // Prepare SQL query to update order_status based on action
        if ($action == 'confirm') {
            $update_query = "UPDATE informs SET inform_status = 'confirm' WHERE inform_id = '$inform_id'";
        } elseif ($action == 'refuse') {
            // Fetch order details to get product information
            $order_details_sql = "SELECT * FROM order_details WHERE order_id = '$inform_id'";
            $order_details_result = mysqli_query($conn, $order_details_sql);

            // Update stock for each product in the order
            while ($order_details_row = mysqli_fetch_assoc($order_details_result)) {
                $product_id = $order_details_row['product_id'];
                $quantity = $order_details_row['quantity'];

                // Update stock in the products table
                $update_stock_sql = "UPDATE products SET product_remain = product_remain + $quantity WHERE product_id = '$product_id'";
                mysqli_query($conn, $update_stock_sql);
            }

            // Update order status to refused
            $update_query = "UPDATE orders SET order_status = 'refuse' WHERE order_id = '$order_id'";
        }

        // Execute query to update order status
        if (mysqli_query($conn, $update_query)) {
            // Redirect back to the page where the order details were viewed
            header("Location: orders.php");
            exit(); // Stop script execution
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }
    } else {
        echo "Error: Action not specified.";
    }
} else {
    // If order_id is not set, redirect back to orders.php
    header("Location: orders.php");
    exit(); // Stop script execution
}
