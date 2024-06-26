<?php
session_start();
include 'condb.php';

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$productIDs = [];
foreach (($_SESSION['cart'] ?? []) as $cartID => $cartQty) {
    $productIDs[] = "'" . mysqli_real_escape_string($conn, $cartID) . "'";
}

$IDs = '';
if (count($productIDs) > 0) {
    $IDs = implode(', ', $productIDs);
}

$rows = 0;
$products = [];

if (!empty($IDs)) {
    $product_sql = "SELECT products.*, product_type.type_name FROM products
                        INNER JOIN product_type ON products.type_id = product_type.type_id 
                        WHERE product_id IN ($IDs)";
    $product_result = mysqli_query($conn, $product_sql);
    if ($product_result) {
        while ($row = mysqli_fetch_assoc($product_result)) {
            $products[] = $row;
        }
        $rows = count($products);
    }
}
?>

<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="utf-8">
    <title>Catster - ตะกร้าสินค้า</title>
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
    <?php include 'include/header.php'; ?>
    <div class="container" style="margin-bottom: 100px;">
        <section class="h-100">
            <div class="container h-100 py-5">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-10">
                        <form action="update_cart.php" method="POST">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <h3>ตะกร้าสินค้า</h3>
                                <button type="submit" class="btn btn-warning text-end" style="background-color: #FFA559;"><i class="fa-solid fa-arrows-rotate"></i></button>
                            </div>

                            <?php if ($rows > 0) : ?>
                                <?php foreach ($products as $product) : ?>
                                    <div class="card rounded-3 mb-4">
                                        <div class="card-body p-4">
                                            <div class="row d-flex justify-content-between align-items-center">
                                                <div class="col-md-2 col-lg-2 col-xl-2">
                                                    <?php if (!empty($product['product_picture'])) : ?>
                                                        <img src="images/<?php echo htmlspecialchars($product['product_picture']); ?>" class="img-fluid rounded-3" alt="<?php echo htmlspecialchars($product['product_name']); ?>">
                                                    <?php else : ?>
                                                        <img src="images/noimage.png" class="img-fluid rounded-3" alt="">
                                                    <?php endif; ?>
                                                </div>
                                                <div class="col-md-3 col-lg-3 col-xl-3">
                                                    <p class="lead fw-normal mb-2"><?php echo htmlspecialchars($product['product_name']); ?></p>
                                                    <p><span class="text-muted"><?php echo htmlspecialchars($product['product_desc']); ?></span></p>
                                                </div>
                                                <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                                    <input type="number" id="quantity-<?php echo htmlspecialchars($product['product_id']); ?>" name="product[<?php echo htmlspecialchars($product['product_id']); ?>][quantity]" value="<?php echo htmlspecialchars($_SESSION['cart'][$product['product_id']]); ?>" class="form-control" onchange="updateQuantity('<?php echo htmlspecialchars($product['product_id']); ?>')" min="1">
                                                    <input type="hidden" id="price-<?php echo htmlspecialchars($product['product_id']); ?>" value="<?php echo htmlspecialchars($product['product_price']); ?>">
                                                </div>
                                                <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                                    <h5 class="mb-0" id="total-price-<?php echo htmlspecialchars($product['product_id']); ?>"><i class="fa-solid fa-baht-sign"></i> <?php echo number_format($product['product_price'] * $_SESSION['cart'][$product['product_id']], 2); ?></h5>
                                                </div>
                                                <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                                    <a href="delete_from_cart.php?product_id=<?php echo htmlspecialchars($product['product_id']); ?>" onclick="return confirm('ต้องการลบสินค้าออกจากตะกร้า ?');" class="text-danger"><i class="fas fa-trash fa-lg"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                                <div class="card-body d-grid gap-2">
                                    <a href="form_checkout.php" type="button" class="btn btn-warning btn-block btn-md" style="background-color: #FFA559;">Check out</a>
                                </div>
                            <?php else : ?>
                                <div class="row">
                                    <div class="col text-center">
                                        <p>ไม่มีรายการสินค้า.</p>
                                    </div>
                                </div>
                                <div class="card-body d-grid gap-2">
                                    <a href="shop.php" type="button" class="btn btn-block btn-md" style="background-color: #FFA559;">เลือกสินค้าเลย! <i class="fa-solid fa-cart-plus ms-2"></i></a>
                                </div>
                            <?php endif; ?>
                        </form>

                    </div>
                </div>
            </div>
        </section>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function updateQuantity(productId) {
            let quantityInput = document.getElementById('quantity-' + productId);
            let quantity = parseInt(quantityInput.value);
            let price = parseFloat(document.getElementById('price-' + productId).value);

            // ส่งข้อมูลไปยังเซิร์ฟเวอร์เพื่ออัพเดตตะกร้าสินค้า
            $.ajax({
                url: 'update_cart.php',
                type: 'POST',
                data: {
                    product: {
                        [productId]: {
                            quantity: quantity
                        }
                    }
                },
                success: function(response) {
                    // อัพเดตราคาในหน้าเว็บ
                    let totalPriceElement = document.getElementById('total-price-' + productId);
                    totalPriceElement.innerHTML = '<i class="fa-solid fa-baht-sign"></i> ' + (price * quantity).toFixed(2);
                }
            });
        }
    </script>

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
    
</body>



</html>