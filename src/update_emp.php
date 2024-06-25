<?php
include 'condb.php';

// รับค่าจากฟอร์ม
$emp_username = $_POST['emp_username'];
$emp_firstname = $_POST['emp_firstname'];
$emp_lastname = $_POST['emp_lastname'];
$emp_address = $_POST['emp_address'];
$emp_email = $_POST['emp_email'];
$emp_tel = $_POST['emp_tel'];
$emp_password = $_POST['emp_password'];

// ตรวจสอบว่ามีการอัปโหลดไฟล์รูปหรือไม่
if (isset($_FILES['emp_picture']) && $_FILES['emp_picture']['error'] === UPLOAD_ERR_OK) {
    $emp_picture = $_FILES['emp_picture']['name'];
    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["emp_picture"]["name"]);
    move_uploaded_file($_FILES["emp_picture"]["tmp_name"], $target_file);
} else {
    // ถ้าไม่มีการอัปโหลดไฟล์ใหม่ใช้รูปภาพเดิม
    $emp_picture = $_POST['current_picture'];
}


// สร้างคำสั่ง SQL ด้วย Prepared Statements
$sql = "UPDATE employees SET 
        emp_firstname = ?,
        emp_lastname = ?,
        emp_address = ?,
        emp_email = ?,
        emp_tel = ?,
        emp_picture = ?";

// ตรวจสอบว่ามีการเปลี่ยนรหัสผ่านหรือไม่
if (!empty($_POST['newPassword'])) {
    // เพิ่ม emp_password ใน SQL query ถ้ามีการเปลี่ยนรหัสผ่าน
    $sql .= ", emp_password = ?";
}

$sql .= " WHERE emp_username = ?";

$stmt = mysqli_prepare($conn, $sql);

// ตรวจสอบการ bind parameters ตามเงื่อนไขการเปลี่ยนรหัสผ่าน
if (!empty($_POST['newPassword'])) {
    mysqli_stmt_bind_param($stmt, "ssssssss", $emp_firstname, $emp_lastname, $emp_address, $emp_email, $emp_tel, $emp_picture, $emp_password, $emp_username);
} else {
    mysqli_stmt_bind_param($stmt, "sssssss", $emp_firstname, $emp_lastname, $emp_address, $emp_email, $emp_tel, $emp_picture, $emp_username);
}

// Execute SQL statement
if (mysqli_stmt_execute($stmt)) {
    echo "<script>alert('แก้ไขข้อมูลสำเร็จ!');</script>";
    header("Location: form_edit_profile_admin.php");
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

mysqli_stmt_close($stmt);
mysqli_close($conn);
