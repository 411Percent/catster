<?php
include 'condb.php';
$type_id = $_GET['type_id'];

// ตรวจสอบว่ามีสินค้าที่เชื่อมโยงกับประเภทสินค้านั้นๆ อยู่หรือไม่
$check_sql = "SELECT COUNT(*) AS count FROM products WHERE type_id='$type_id'";
$result = mysqli_query($conn, $check_sql);
$row = mysqli_fetch_assoc($result);

if ($row['count'] > 0) {
    // หากมีสินค้าที่เชื่อมโยงกับประเภทสินค้านั้นๆ
    echo "<script>alert('ไม่สามารถลบประเภทสินค้าได้เนื่องจากยังมีสินค้าอยู่ในประเภทนี้');</script>";
    echo "<script>window.location='types.php';</script>";
} else {
    // หากไม่มีสินค้าที่เชื่อมโยงกับประเภทสินค้านั้นๆ
    $sql = "DELETE FROM product_type WHERE type_id='$type_id'";
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('ลบข้อมูลเรียบร้อย');</script>";
        echo "<script>window.location='types.php';</script>";
    } else {
        echo "<script>alert('ไม่สามารถลบข้อมูลได้');</script>";
        echo "<script>window.location='types.php';</script>";
    }
}

mysqli_close($conn);
