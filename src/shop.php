<?php
session_start();
include 'condb.php';

// Product All
$product_sql = "SELECT products.*, product_type.type_name FROM products
                INNER JOIN product_type ON products.type_id = product_type.type_id";
$product_result = mysqli_query($conn, $product_sql);
$products = mysqli_fetch_all($product_result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="utf-8">
    <title>Catster - ร้านค้า</title>
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
</head>

<body style="background-color: #fff;">
    <?php include('include/header.php'); ?>


    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-2 p-0" style="background-image: url(img/carousel-1.jpg);">
        <div class="container-fluid page-header-inner py-5">
            <div class="container text-center pb-5">
                <h1 class="display-3 text-white mb-3 animated slideInDown">ร้านค้า</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center text-uppercase">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Shop</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <div class="container-fluid booking pb-5 wow fadeIn" data-wow-delay="0.1s" style="position: sticky; top: 0;">
        <div class="container">
            <div class="bg-white shadow" style="padding: 35px;">
                <div class="row g-2">
                    <div class="col-md-10">
                        <div class="row g-2">
                            <div class="col-md-6">
                                <div class="date" id="date1" data-target-input="nearest">
                                    <input id="txt_search" type="text" class="form-control datetimepicker-input" placeholder="Search something..." />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <select id="product_type" class="form-select">
                                    <option value="all">สินค้าทั้งหมด</option>
                                    <option value="TYPE1">อาหาร</option>
                                    <option value="TYPE2">ของเล่น</option>
                                    <option value="TYPE3">อุปกรณ์</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-primary w-100" onclick="filterProducts()">ค้นหา</button>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <div class="row">
        <div class="col-10"></div>
        <div class="col-2">
            <div class="cart-container">
                <a href="cart.php"><span class="badge border rounded-pill cart-badge" style="background-color: #D04925; color: #E9E5DD;"><?php echo $cart_count; ?></span>
                    <i class="fas fa-cart-shopping" style="color: #696464;"></i></a>
            </div>
        </div>
    </div>
    <div class="container" style="margin-bottom: 150px;">
        <!-- Product list -->
        <div id="productlist" class="product">
            <?php while ($product = mysqli_fetch_assoc($product_result)) : ?>
                <!-- Individual product item -->
                <div onclick="openProductDetail(<?= $product['product_id']; ?>)" class="product-items <?= $product['type_id']; ?>">
                    <!-- Product image -->
                    <img class="product-img" src="images/<?= htmlspecialchars($product['product_picture']); ?>" alt="">
                    <!-- Product name -->
                    <p style="font-size: 1.2vw;"><?= htmlspecialchars($product['product_name']); ?></p>
                    <!-- Product price -->
                    <p style="font-size: 1vw;"><?= htmlspecialchars(number_format($product['product_price'])); ?> THB</p>
                </div>
            <?php endwhile ?>
        </div>
    </div>



    <div id="modalDesc" class="modal" style="display: none;">
        <div onclick="closeModal()" class="modal-bg"></div>
        <div class="modal-page">
            <div class="modaldesc-content">
                <img id="mdd-img" class="modaldesc-img" src="" alt="">
                <div class="modaldesc-detail">
                    <p id="mdd-name" style="font-size: 1.5vw;"></p>
                    <p id="mdd-price" style="font-size: 1.2vw;"></p>
                    <br>
                    <p id="mdd-desc" style="color: #adadad;"></p>
                    <br>
                    <div class="btn-control">
                        <button onclick="closeModal()" class="btn">Close</button>
                        <a id="mdd-add-to-cart" href="#" class="btn btn-buy">Add to cart</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        var product = <?= json_encode($products); ?>;
        var productindex = 0;

        $(document).ready(() => {
            var html = '';
            for (let i = 0; i < product.length; i++) {
                html += `<div onclick="openProductDetail(${i})" class="product-items ${product[i].type_id}">
                            <img class="product-img" src="images/${product[i].product_picture}" alt="">
                            <p style="font-size: 1.2vw;">${product[i].product_name}</p>
                            <p style="font-size: 1vw;">${ numberWithCommas(product[i].product_price) } THB</p>
                        </div>`;
            }
            $("#productlist").html(html);
        });

        function numberWithCommas(x) {
            x = x.toString();
            var pattern = /(-?\d+)(\d{3})/;
            while (pattern.test(x))
                x = x.replace(pattern, "$1,$2");
            return x;
        }

        function searchsomething(elem, products) {
            var value = elem.value.trim();
            var html = '';
            for (let i = 0; i < products.length; i++) {
                if (products[i].product_name.includes(value)) {
                    html += `<div onclick="openProductDetail(${products[i].product_id})" class="product-items ${products[i].type_id}">
                                <img class="product-img" src="images/${products[i].product_picture}" alt="">
                                <p style="font-size: 1.2vw;">${products[i].product_name}</p>
                                <p style="font-size: 1vw;">${numberWithCommas(products[i].product_price)} THB</p>
                            </div>`;
                }
            }
            if (html === '') {
                $("#productlist").html(`<p>Not found product</p>`);
            } else {
                $("#productlist").html(html);
            }
        }

        function searchproduct(param) {
            var items = document.getElementsByClassName('product-items');
            if (param === 'all') {
                // แสดงทุกรายการสินค้า
                for (var i = 0; i < items.length; i++) {
                    items[i].style.display = 'block';
                }
            } else {
                // กรองและแสดงเฉพาะรายการสินค้าที่มีคลาสตรงกับ param
                for (var i = 0; i < items.length; i++) {
                    if (items[i].classList.contains(param)) {
                        items[i].style.display = 'block';
                    } else {
                        items[i].style.display = 'none';
                    }
                }
            }
        }


        function openProductDetail(index) {
            productindex = index;
            $("#modalDesc").css('display', 'flex');
            $("#mdd-img").attr('src', 'images/' + product[index].product_picture);
            $("#mdd-name").text(product[index].product_name);
            $("#mdd-price").text(numberWithCommas(product[index].product_price) + ' THB');
            $("#mdd-desc").text(product[index].product_desc);
            $("#mdd-add-to-cart").attr('href', 'add_to_cart.php?product_id=' + product[index].product_id);
        }


        function closeModal() {
            $(".modal").css('display', 'none');
        }


        function myFunction() {
            // Get the value from the search input
            var input = document.getElementById('txt_search');
            var filter = input.value.toUpperCase();
            var productList = document.getElementById('productlist');
            var productItems = productList.getElementsByClassName('product-items');

            // Loop through all product items and hide those who don't match the search query
            for (var i = 0; i < productItems.length; i++) {
                var productName = productItems[i].getElementsByTagName('p')[0];
                if (productName.innerHTML.toUpperCase().indexOf(filter) > -1) {
                    productItems[i].style.display = "";
                } else {
                    productItems[i].style.display = "none";
                }
            }
        }

        function filterProducts() {
            // Get the value from the search input and the selected product type
            var input = document.getElementById('txt_search').value.toUpperCase();
            var selectedType = document.getElementById('product_type').value;
            var productList = document.getElementById('productlist');
            var productItems = productList.getElementsByClassName('product-items');

            // Loop through all product items
            for (var i = 0; i < productItems.length; i++) {
                var productName = productItems[i].getElementsByTagName('p')[0].innerHTML.toUpperCase();
                var matchesSearch = productName.indexOf(input) > -1;
                var matchesType = selectedType === 'all' || productItems[i].classList.contains(selectedType);

                // Show or hide the product item based on the search and type filter
                if (matchesSearch && matchesType) {
                    productItems[i].style.display = "";
                } else {
                    productItems[i].style.display = "none";
                }
            }
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




<style>
    *::-webkit-scrollbar {
        display: none;
    }

    .fa-cart-shopping {
        font-size: 2vw;
        color: #fff;
    }

    .cartcount {
        position: absolute;
        top: -15px;
        right: -15px;
        width: 25px;
        height: 25px;
        background: red;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        color: #fff;
    }

    .product {
        width: 100%;
        padding: 10px;
        height: 100%;
        display: grid;
        grid-template-columns: repeat(5, 1fr);
        grid-gap: 25px;
    }

    .product-items {
        cursor: pointer;
        transition: 0.3s;
    }

    .product-items:hover {
        transform: scale(1.03);
    }

    .product-img {
        width: 100%;
        height: 17vw;
        object-fit: cover;
        border-radius: 10px;
    }

    .modal,
    .modal-bg {
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        position: fixed;
        top: 0;
        left: 0;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .modal-page {
        z-index: 99;
        min-width: 30vw;
        max-width: 60vw;
        max-height: 30vw;
        overflow: scroll;
        background-color: #fff;
        border-radius: 15px;
        padding: 20px;
    }

    .modaldesc-content {
        width: 100%;
        display: flex;
    }

    .modaldesc-detail {
        margin-left: 20px;
    }

    .modaldesc-img {
        width: 20vw;
        height: 20vw;
        object-fit: cover;
        border-radius: 10px;
    }

    .btn-control {
        display: flex;
        justify-content: flex-end;
    }

    .btn {
        padding: 10px 20px;
        cursor: pointer;
        border: #fff;
        border-radius: 5px;
        transition: 0.3s;
    }

    .btn-buy {
        background: linear-gradient(125deg, #D79771, #D79771);
        color: #fff;
        margin-left: 10px;
    }

    .cartlist-items {
        width: 50vw;
        display: flex;
        margin-bottom: 20px;
        justify-content: space-between;
    }

    .cartlist-left {
        display: flex;
    }

    .cartlist-right {
        display: flex;
        align-items: center;
    }

    .cartlist-left img {
        width: 5vw;
        height: 5vw;
        object-fit: cover;
        border-radius: 5px;
        margin-right: 10px;
    }

    .btnc {
        width: 30px;
        height: 30px;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        border: 1px solid #000;
        cursor: pointer;
    }

    .cart-container {
        position: relative;
        display: inline-block;
    }

    .cart-badge {
        position: absolute;
        top: -10px;
        right: -10px;
        font-size: 0.75rem;
        /* Adjust font size if needed */
    }
</style>