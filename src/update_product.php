<?php
include 'condb.php';

// รับข้อมูลจากฟอร์ม
$product_id = mysqli_real_escape_string($conn, $_POST['product_id']);
$product_name = mysqli_real_escape_string($conn, $_POST['product_name']);
$product_unit = mysqli_real_escape_string($conn, $_POST['product_unit']);
$product_cost = mysqli_real_escape_string($conn, $_POST['product_cost']) ?: 0;
$product_price = mysqli_real_escape_string($conn, $_POST['product_price']) ?: 0;
$product_remain = mysqli_real_escape_string($conn, $_POST['product_remain']);
$product_desc = mysqli_real_escape_string($conn, $_POST['product_desc']);
$type_id = mysqli_real_escape_string($conn, $_POST['type_id']);

// ตรวจสอบว่ามีการอัปโหลดไฟล์รูปหรือไม่
$product_picture = '';
if (isset($_FILES['product_picture']) && $_FILES['product_picture']['error'] === UPLOAD_ERR_OK) {
    $target_dir = "images/";
    $product_picture = basename($_FILES["product_picture"]["name"]);
    $target_file = $target_dir . $product_picture;
    if (!move_uploaded_file($_FILES["product_picture"]["tmp_name"], $target_file)) {
        echo "<script>alert('เกิดข้อผิดพลาดในการอัปโหลดไฟล์รูปภาพ.');</script>";
        echo "<script>window.location='products.php';</script>";
        exit();
    }
}

// ดึงข้อมูลปัจจุบันของสินค้า
$query_product = mysqli_query($conn, "SELECT * FROM products WHERE product_id = '{$product_id}'");
$result = mysqli_fetch_assoc($query_product);

if (!$result) {
    echo "<script>window.location='products.php';</script>";
    exit();
}

// ถ้าไม่มีการอัปโหลดไฟล์ใหม่ ให้ใช้รูปเดิม
if (empty($product_picture)) {
    $product_picture = $result['product_picture'];
} else {
    // ลบรูปเดิมออก
    @unlink($target_dir . $result['product_picture']);
}

// แก้ไขข้อมูลสินค้าในฐานข้อมูล
$sql = "UPDATE products 
        SET product_name = '{$product_name}', 
            product_unit = '{$product_unit}',
            product_cost = '{$product_cost}',
            product_price = '{$product_price}', 
            product_remain = '{$product_remain}', 
            product_picture = '{$product_picture}', 
            product_desc = '{$product_desc}', 
            type_id = '{$type_id}' 
        WHERE product_id = '{$product_id}'";

if (mysqli_query($conn, $sql)) {
    echo "<script>alert('แก้ไขสินค้าสำเร็จ!');</script>";
    echo "<script>window.location='products.php';</script>";
} else {
    echo "<script>alert('ไม่สามารถบันทึกข้อมูลสินค้าได้: " . mysqli_error($conn) . "');</script>";
    echo "<script>window.location='products.php';</script>";
}

mysqli_close($conn);
