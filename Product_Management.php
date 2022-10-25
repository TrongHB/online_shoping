    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script>
        function deleteConfirm() {
            if (confirm("Are you sure to delete!")) {
                return true;
            } else {
                return false;
            }
        }
    </script>
    <?php
    include_once("connection.php");
    if (isset($_GET["function"]) == "del") {
        if (isset($_GET["id"])) {
            $id = $_GET["id"];
            $sq = "SELECT * FROM product WHERE pro_id = '$id'";
            $res = pg_query($conn, $sq);
            $row = pg_fetch_array($res);
            $filePic = $row['pro_img'];
            unlink("product-imgs/" . $filePic);
            pg_query($conn, "DELETE FROM product WHERE pro_id = '$id'");    
            echo '<meta http-equiv="refresh" content = "10; URL=?page=product_management"/>';
        }
    }
    ?>

    <form name="frm" method="post" action="">
        <h1>Product Management</h1>
        <p>
            <a href="?page=add_product">
                <img src="images/add.png" alt="Thêm mới" width="16" height="16" border="0" /> Add new</a>
        </p>
        <table id="tableproduct" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th><strong>Product ID</strong></th>
                    <th><strong>Product Name</strong></th>
                    <th><strong>Quantity</strong></th>
                    <th><strong>Price</strong></th>
                    <th><strong>Description</strong></th>
                    <th><strong>Category</strong></th>
                    <th><strong>Supplier</strong></th>
                    <th><strong>Shop</strong></th>
                    <th><strong>Image</strong></th>
                    <th><strong>Delete</strong></th>
                </tr>
            </thead>

            <tbody>
                <?php
                include_once("connection.php");
                $No = 1;
                $result = pg_query($conn, "SELECT * FROM product a, category b, supplier c, shop s
                WHERE a.cate_id = b.cate_id AND a.shop_id = s.shop_id AND a.sup_id = c.sup_id");
                while ($row = pg_fetch_array($result)) {
                ?>
                    <tr>
                        <td><?php echo $row["pro_id"]; ?></td>
                        <td><?php echo $row["pro_name"]; ?></td>
                        <td><?php echo $row["quantity"]; ?></td>
                        <td><?php echo $row["price"]; ?></td>
                        <td><?php echo $row["description"]; ?></td>
                        <td><?php echo $row["cate_name"]; ?></td>
                        <td><?php echo $row["sup_name"]; ?></td>
                        <td><?php echo $row["shop_name"]; ?></td>

                        <td align='center' class='cotNutChucNang'>
                            <img src='product-imgs/<?php echo $row["pro_img"] ?>' border='0' width="50" height="50" />
                        </td>

                        <td align='center' class='cotNutChucNang'>
                            <a href="?page=product_management&&function=del&&id=<?php echo $row["pro_id"] ?>" onclick="return deleteConfirm()">
                                <img src='images/delete.png' border='0' />
                            </a>
                        </td>
                    </tr>
                <?php
                    $No++;
                }
                ?>
            </tbody>

        </table>

    </form>