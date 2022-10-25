<div class="product-widget-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <h2 class="section-title">ALL PRODUCTS</h2>
            <?php
            if (isset($_GET['cate_id'])) {
                $id = $_GET['cate_id'];
                $result = pg_query($conn, "SELECT * FROM product WHERE cate_id = '$id'");
                if (!$result) {
                    die('Invalid query: ' . pg_errormessage($conn));
                }
                while ($row = pg_fetch_array($result)) {
            ?>
                    <div class="col-md-4">
                        <div class="single-product-widget">
                            <div class="single-wid-product">
                                <a href="?page=view&&id=<?php echo $row['pro_id']; ?>"><img src="product-imgs/<?php echo $row['pro_img'] ?>" alt="" class="product-thumb"></a>
                                <h2><a href="?page=view&&id=<?php echo $row['pro_id']; ?>"><?php echo  $row['pro_name'] ?></a></h2>
                                <div class="product-wid-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="product-wid-price">
                                    <ins><?php echo  $row['price'] ?></ins>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php
                }
            }
            ?>

            <?php
            if (isset($_GET['sup_id'])) {
                $id = $_GET['sup_id'];
                $result = pg_query($conn, "SELECT * FROM product WHERE sup_id = '$id'");
                if (!$result) {
                    die('Invalid query: ' . pg_errormessage($conn));
                }
                while ($row = pg_fetch_array($result)) {
            ?>
                    <div class="col-md-4">
                        <div class="single-product-widget">
                            <div class="single-wid-product">
                                <a href="?page=view&&id=<?php echo $row['pro_id']; ?>"><img src="product-imgs/<?php echo $row['pro_img'] ?>" alt="" class="product-thumb"></a>
                                <h2><a href="?page=view&&id=<?php echo $row['pro_id']; ?>"><?php echo  $row['pro_name'] ?></a></h2>
                                <div class="product-wid-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="product-wid-price">
                                    <ins><?php echo  $row['price'] ?></ins>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php
                }
            }
            ?>
        </div>
    </div>
</div>