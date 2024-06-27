<?php
include 'condb.php';

// Sanitize input data
$product_id = mysqli_real_escape_string($conn, $_POST['product_id']);
$product_name = mysqli_real_escape_string($conn, $_POST['product_name']);
$product_unit = mysqli_real_escape_string($conn, $_POST['product_unit']);
$product_cost = mysqli_real_escape_string($conn, $_POST['product_cost'] ?: 0);
$product_price = mysqli_real_escape_string($conn, $_POST['product_price'] ?: 0);
$product_remain = mysqli_real_escape_string($conn, $_POST['product_remain']);
$product_desc = mysqli_real_escape_string($conn, $_POST['product_desc']);
$type_id = mysqli_real_escape_string($conn, $_POST['type_id']);

// Handle file upload
$product_picture = '';
if (isset($_FILES['product_picture']) && $_FILES['product_picture']['error'] === UPLOAD_ERR_OK) {
    $target_dir = "images/";
    $product_picture = basename($_FILES["product_picture"]["name"]);
    $target_file = $target_dir . $product_picture;
    if (move_uploaded_file($_FILES["product_picture"]["tmp_name"], $target_file)) {
        // File upload successful
    } else {
        // Handle file upload error
        echo "<script>alert('เกิดข้อผิดพลาดในการอัปโหลดไฟล์รูปภาพ.');</script>";
        echo "<script>window.location='products.php';</script>";
        exit();
    }
}

// Prepare SQL query to insert data into products table
$sql = "INSERT INTO products (product_id, product_name, product_unit, product_cost, product_price, product_remain, product_picture, product_desc, type_id) 
        VALUES ('$product_id', '$product_name', '$product_unit', '$product_cost', '$product_price', '$product_remain', '$product_picture', '$product_desc', '$type_id')";

if (mysqli_query($conn, $sql)) {
    echo "<script>alert('เพิ่มสินค้าสำเร็จ!');</script>";
    echo "<script>window.location='products.php';</script>";
} else {
    echo "<script>alert('ไม่สามารถบันทึกข้อมูลสินค้าได้: " . mysqli_error($conn) . "');</script>";
    echo "<script>window.location='products.php';</script>";
}

mysqli_close($conn);
