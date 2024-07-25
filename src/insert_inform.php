<?php
include 'condb.php';
session_start();

$inform_desc = $_POST['inform_desc'];
$inform_status = 'wait';

function generateInformID($conn, $length = 7)
{
    $characters = '0123456789';
    $charactersLength = strlen($characters);
    do {
        $informID = '';
        for ($i = 0; $i < $length; $i++) {
            $informID .= $characters[rand(0, $charactersLength - 1)];
        }
        $check_query = mysqli_query($conn, "SELECT * FROM informs WHERE inform_id = '{$informID}'");
    } while (mysqli_num_rows($check_query) > 0);
    return $informID;
}

$inform_id = "INF" . generateInformID($conn);
$inform_date = date('Y-m-d H:i:s');

// Check if file upload is successful (if applicable)
$inform_image = 'images/noimage.png'; // Default value if no file uploaded
if (isset($_FILES['inform_image']) && $_FILES['inform_image']['error'] === UPLOAD_ERR_OK) {
    $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
    $file_type = mime_content_type($_FILES['inform_image']['tmp_name']);

    if (!in_array($file_type, $allowed_types)) {
        echo "<script>alert('ประเภทไฟล์ไม่ถูกต้อง'); window.location='login.php';</script>";
        exit();
    }

    $inform_image = basename($_FILES['inform_image']['name']);
    $target_dir = "images/";
    $target_file = $target_dir . $inform_image;

    if (!move_uploaded_file($_FILES['inform_image']['tmp_name'], $target_file)) {
        echo "<script>alert('ไม่สามารถอัปโหลดรูปภาพได้'); window.location='inform.php';</script>";
        exit();
    }
}

if (isset($_POST['mem_username'])) {
    $mem_username = $_POST['mem_username'];
    $sql = "INSERT INTO informs (inform_id, inform_image, inform_date, inform_desc, inform_status, mem_username) VALUES ('{$inform_id}', '{$inform_image}', '{$inform_date}', '{$inform_desc}', '{$inform_status}', '{$mem_username}')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('บันทึกข้อมูลเรียบร้อย'); window.location='index.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
} else {
    echo "<script>alert('ไม่มีข้อมูลผู้ใช้'); window.location='inform.php';</script>";
}

mysqli_close($conn);
