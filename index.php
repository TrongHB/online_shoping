<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABC - TOY STORE</title>

    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/responsive.css">

    <!-- Tao menu cap -->
    <link href="csseshop/bootstrap.min.css" rel="stylesheet">
    <link href="csseshop/font-awesome.min.css" rel="stylesheet">
    <link href="csseshop/prettyPhoto.css" rel="stylesheet">
    <link href="csseshop/price-range.css" rel="stylesheet">
    <link href="csseshop/animate.css" rel="stylesheet">
    <link href="csseshop/main.css" rel="stylesheet">
    <link href="csseshop/responsive.css" rel="stylesheet">

    <link href="css/salomon.css" rel="stylesheet">

    <!--datatable-->
    <script src="js/jquery-3.2.0.min.js" />
    </script>
    <script src="js/jquery.dataTables.min.js" />
    </script>
    <script src="js/dataTables.bootstrap.min.js" />
    </script>

</head>

<body>

    <?php
    session_start();
    include_once("connection.php");
    ?>

    <header id="header">
        <!--header-->
        <div class="header_top">
            <!--header_top-->

        </div>
        <!--/header_top-->

        <div class="header-middle" style="background-color:#069">
            <!--header-middle-->
            <div class="container">
                <div>
                    <div class="col-sm-6">
                        <div class="logo pull-left">
                            <a href="index.php" style="background-color:#069;color:#FFF">TOY
                                <img src="images1/logoABC.png" width="70" height="70"></a>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="shop-menu pull-right">
                            <ul class="nav navbar-nav">
                                <li><a href="#" style="background-color:#069;color:#FFF">
                                        <i class="fa fa-user"></i> Account</a></li>
                                <li><a href="#" style="background-color:#069;color:#FFF">
                                        <i class="fa fa-shopping-cart"></i> Cart</a></li>
                                <?php
                                if (isset($_SESSION['us']) && $_SESSION['us'] != "") {
                                ?>
                                    <li><a href="?page=update_customer" style="background-color:#069;color:#FFF">
                                            <i class="fa fa-lock"></i>Hi, <?php echo $_SESSION['us'] ?></a></li>
                                    <li><a href="?page=logout" style="background-color:#069;color:#FFF">
                                            <i class="fa fa-crosshairs"></i>Logout</a></li>
                                <?php
                                } else {
                                ?>
                                    <li><a href="?page=login" style="background-color:#069;color:#FFF">
                                            <i class="fa fa-lock"></i>Login</a></li>
                                    <li><a href="?page=register" style="background-color:#069;color:#FFF">
                                            <i class="fa fa-star"></i>Register</a></li>
                                <?php
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/header-middle-->

        <div class="header-bottom">
            <!--header-bottom-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-9">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="mainmenu pull-left">
                            <ul class="nav navbar-nav collapse navbar-collapse">
                                <li><a href="index.php" class="active">Home</a></li>
                                <li class="dropdown"><a href="#">Management<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="?page=category_management">Category</a></li>
                                        <li><a href="?page=supplier_management">Supplier</a></li>
                                        <li><a href="?page=shop_management">Shop</a></li>
                                        <li><a href="?page=product_management">Product</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown"><a href="#">Category<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                    <?php
                                        $res = mysqli_query($conn, "SELECT * FROM category");
                                        if (!$res) {
                                            die("Invalid query:  " . mysqli_error($conn));
                                        }
                                        while ($row = mysqli_fetch_array($res)) {
                                        ?>
                                            <li><a href="?page=search&&cate_id=<?php echo $row['Cat_ID'] ?>"><?php echo $row['Cat_Name']; ?></a></li>
                                        <?php
                                        }
                                        ?>
                                    </ul>
                                </li>
                                <li class="dropdown"><a href="#">Supplier<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <?php
                                        $res = mysqli_query($conn, "SELECT * FROM supplier");
                                        if (!$res) {
                                            die("Invalid query:  " . mysqli_error($conn));
                                        }
                                        while ($row = mysqli_fetch_array($res)) {
                                        ?>
                                            <li><a href="?page=search&&sup_id=<?php echo $row['Sup_ID'] ?>"><?php echo $row['Sup_Name']; ?></a></li>
                                        <?php
                                        }
                                        ?>
                                    </ul>
                                </li>
                                <li><a href="#">Cart</a></li>
                                <li><a href="#">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/header-bottom-->
    </header>
    <!--/header-->

    <?php
    if (isset(($_GET['page']))) {
        $page = $_GET['page'];
        if ($page == "register") {
            include_once("Register.php");
        } elseif ($page == "login") {
            include_once("Login.php");
        } elseif ($page == "category_management") {
            include_once("Category_Management.php");
        } elseif ($page == "supplier_management") {
            include_once("Supplier_Management.php");
        } elseif ($page == "shop_management") {
            include_once("Shop_Management.php");
        } elseif ($page == "product_management") {
            include_once("Product_Management.php");
        } elseif ($page == "add_category") {
            include_once("Add_Category.php");
        } elseif ($page == "add_product") {
            include_once("Add_Product.php");
        } elseif ($page == "add_shop") {
            include_once("Add_Shop.php");
        } elseif ($page == "view") {
            include_once("View.php");
        } elseif ($page == "add_supplier") {
            include_once("Add_Supplier.php");
        } elseif ($page == "update_category") {
            include_once("Update_Category.php");
        } elseif ($page == "logout") {
            include_once("Logout.php");
        } elseif ($page == "search") {
            include_once("Search.php");
        } elseif ($page == "update_customer") {
            include_once("Update_customer.php");
        }
    } else {
        include("Content.php");
    }
    ?>

    <div class="footer-top-area mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="footer-about-us">
                        <h2>A<span>bc</span></h2>
                        <p>Electronics supermarket is one of the fast and stable electronics stores regardless of the favorable or difficult economic situation. Salomon supermarket chain was established in 2004 to retail mobile digital products including mobile phones, tablets, laptops and accessories with more than 1,000 supermarkets in 63 provinces and cities across Vietnam.</p>
                        <div class="footer-social">
                            <a href="#" target="_blank"><i class="fa fa-facebook"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-youtube"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="footer-menu">
                        <h2 class="footer-wid-title">User</h2>
                        <ul>
                            <li><a href="#">Account</a></li>
                            <li><a href="#">Bill</a></li>
                            <li><a href="#">Interests</a></li>
                            <li><a href="#">Supplier</a></li>
                            <li><a href="#">Other information</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="footer-menu">
                        <h2 class="footer-wid-title">Classify</h2>
                        <ul>
                            <li><a href="#">Phone</a></li>
                            <li><a href="#">Tablet</a></li>
                            <li><a href="#">Laptop</a></li>
                            <li><a href="#">Camera</a></li>
                            <li><a href="#">Other equipment</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="footer-newsletter">
                        <h2 class="footer-wid-title">News</h2>
                        <p>Sign up for our newsletter and get our exclusive deals.</p>
                        <div class="newsletter-form">
                            <form action="#">
                                <input type="email" placeholder="Enter Email Address">
                                <input type="submit" value="Submit">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End footer top area -->

    <div class="footer-bottom-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="copyright">
                        <p>&copy; 2022 ABC-Electronics supermarket</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="footer-card-icon">
                        <i class="fa fa-cc-discover"></i>
                        <i class="fa fa-cc-mastercard"></i>
                        <i class="fa fa-cc-paypal"></i>
                        <i class="fa fa-cc-visa"></i>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End footer bottom area -->

    <!-- Latest jQuery form server -->
    <script src="https://code.jquery.com/jquery.min.js"></script>

    <!-- Bootstrap JS form CDN -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

    <!-- jQuery sticky menu -->
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.sticky.js"></script>

    <!-- jQuery easing -->
    <script src="js/jquery.easing.1.3.min.js"></script>

    <!-- Main Script -->
    <script src="js/main.js"></script>

    <!-- Slider -->
    <script type="text/javascript" src="js/bxslider.min.js"></script>
    <script type="text/javascript" src="js/script.slider.js"></script>

    <!--data table - dat dung vi tri nay-->
    <script src="js/jquery.dataTables.min.js" />
    </script>
    <script src="js/dataTables.bootstrap.min.js" />
    </script>
    <script src="https://cdn.datatables.net/fixedheader/3.1.2/css/fixedHeader.bootstrap.min.css"></script>
    <script src="https://cdn.datatables.net/responsive/2.1.1/css/responsive.bootstrap.min.css"></script>


</body>

</html>