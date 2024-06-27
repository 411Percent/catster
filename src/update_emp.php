<?php
include 'condb.php';

// รับค่าจากฟอร์ม
$emp_username = mysqli_real_escape_string($conn, $_POST['emp_username']);
$emp_firstname = mysqli_real_escape_string($conn, $_POST['emp_firstname']);
$emp_lastname = mysqli_real_escape_string($conn, $_POST['emp_lastname']);
$emp_address = mysqli_real_escape_string($conn, $_POST['emp_address']);
$emp_email = mysqli_real_escape_string($conn, $_POST['emp_email']);
$emp_tel = mysqli_real_escape_string($conn, $_POST['emp_tel']);
$current_picture = mysqli_real_escape_string($conn, $_POST['current_picture']);

// ตรวจสอบว่ามีการอัปโหลดไฟล์รูปหรือไม่
if (isset($_FILES['emp_picture']) && $_FILES['emp_picture']['error'] === UPLOAD_ERR_OK) {
    $emp_picture = $_FILES['emp_picture']['name'];
    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["emp_picture"]["name"]);

    // Move uploaded file
    if (move_uploaded_file($_FILES["emp_picture"]["tmp_name"], $target_file)) {
        // If upload is successful, use the new picture
        $emp_picture = basename($_FILES["emp_picture"]["name"]);
    } else {
        // If upload fails, use the current picture
        $emp_picture = $current_picture;
    }
} else {
    // ถ้าไม่มีการอัปโหลดไฟล์ใหม่ใช้รูปภาพเดิม
    $emp_picture = $current_picture;
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
    $newPassword = $_POST['newPassword'];

    // เพิ่ม emp_password ใน SQL query ถ้ามีการเปลี่ยนรหัสผ่าน
    $sql .= ", emp_password = ?";
}

$sql .= " WHERE emp_username = ?";

$stmt = mysqli_prepare($conn, $sql);

// ตรวจสอบการ bind parameters ตามเงื่อนไขการเปลี่ยนรหัสผ่าน
if (!empty($_POST['newPassword'])) {
    mysqli_stmt_bind_param($stmt, "ssssssss", $emp_firstname, $emp_lastname, $emp_address, $emp_email, $emp_tel, $emp_picture, $newPassword, $emp_username);
} else {
    mysqli_stmt_bind_param($stmt, "sssssss", $emp_firstname, $emp_lastname, $emp_address, $emp_email, $emp_tel, $emp_picture, $emp_username);
}

// Execute SQL statement
if (mysqli_stmt_execute($stmt)) {
    echo "<script>alert('แก้ไขข้อมูลสำเร็จ!');</script>";
    header("Location: form_edit_profile_admin.php");
    exit();
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

mysqli_stmt_close($stmt);
mysqli_close($conn);
