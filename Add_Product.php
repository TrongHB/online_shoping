    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script type="text/javascript" src="scripts/ckeditor/ckeditor.js"></script>
    <?php
	include_once("connection.php");
	function bind_Category_List($conn)
	{
		$sqlstring = "SELECT * FROM category";
		$result = mysqli_query($conn, $sqlstring);
		echo "<select name='CategoryList' class='form-control'>
					<option value='0'>Choose category</option>";
		while ($row = mysqli_fetch_array($result)) {
			echo "<option value='" . $row['Cat_ID'] . "'>" . $row['Cat_Name'] . "</option>";
		}
		echo "</select>";
	}
	function bind_Supplier_List($conn)
	{
		$sqlstring = "SELECT * FROM supplier";
		$result = mysqli_query($conn, $sqlstring);
		echo "<select name='SupplierList' class='form-control'>
					<option value='0'>Choose supplier</option>";
		while ($row = mysqli_fetch_array($result)) {
			echo "<option value='" . $row['Sup_ID'] . "'>" . $row['Sup_Name'] . "</option>";
		}
		echo "</select>";
	}
	function bind_Shop_List($conn)
	{
		$sqlstring = "SELECT * FROM shop";
		$result = mysqli_query($conn, $sqlstring);
		echo "<select name='ShopList' class='form-control'>
					<option value='0'>Choose shop</option>";
		while ($row = mysqli_fetch_array($result)) {
			echo "<option value='" . $row['Shop_ID'] . "'>" . $row['Shop_Name'] . "</option>";
		}
		echo "</select>";
	}
	if(isset($_POST["btnAdd"]))
	{
		$proname = $_POST["txtName"];
		$detail = $_POST["txtDetail"];
		$price = $_POST["txtPrice"];
		$qty = $_POST["txtQty"];
		$pic = $_FILES["txtImage"];
		$category = $_POST["CategoryList"];
		$supplier = $_POST["SupplierList"];
		$shop = $_POST["ShopList"];
		$err = "";

		if(trim($proname) == "")
		{
			$err.="<li>Enter product Name, please</li>";
		}
		if($category == "0")
		{
			$err.="<li>Choose product category, please</li>";
		}
		if(!is_numeric($price))
		{
			$err.="<li>Product price must be number</li>";
		}
		if(!is_numeric($qty))
		{
			$err.="<li>Product quantity must be number</li>";
		}
		if($err != "")
		{
			echo "<ul>$err</ul>";
		}
		else
		{
			if($pic["type"] == "image/jpg" || $pic["type"] == "image/jpeg" || $pic["type"] == "image/png" || $pic["type"] == "image/gif")
			{
				if($pic["size"] < 614400)
				{
					$sq = "SELECT * FROM product WHERE Product_Name = '$proname'";
					$result = mysqli_query($conn, $sq);
					if(mysqli_num_rows($result) == 0)
					{
						copy($pic['tmp_name'], "product-imgs/".$pic['name']);
						$filePic = $pic['name'];
						$sqlstring = "INSERT INTO product (Product_Name, Pro_qty, Price, DetailDesc, Shop_ID, Sup_ID, Pro_image, Cat_ID)
													VALUES ('$proname', $qty, $price, '$detail', '$shop', '$supplier', '$filePic', '$category')";
						mysqli_query($conn, $sqlstring);
						echo '<meta http-equiv="refresh" content = "0; URL=?page=product_management"/>';
					}
					else
					{
						echo "<li>Duplicate category ID or Name</li>";
					}
				}
				else
				{
					echo "Size of image too big";
				}
			}
			else
			{
				echo "Image format is not correct";
			}
		}
	}
	?>
    <div class="container">
    	<h2>Adding new Product</h2>

    	<form id="frmProduct" name="frmProduct" method="post" enctype="multipart/form-data" action="" class="form-horizontal" role="form">
    		<div class="form-group">
    			<label for="txtTen" class="col-sm-2 control-label">Product Name(*): </label>
    			<div class="col-sm-10">
    				<input type="text" name="txtName" id="txtName" class="form-control" placeholder="Product Name" value='' />
    			</div>
    		</div>
    		<div class="form-group">
    			<label for="" class="col-sm-2 control-label">Product category(*): </label>
    			<div class="col-sm-10">
    				<?php
					bind_Category_List($conn);
					?>
    			</div>
    		</div>
			<div class="form-group">
    			<label for="" class="col-sm-2 control-label">Product supplier(*): </label>
    			<div class="col-sm-10">
    				<?php
					bind_Supplier_List($conn);
					?>
    			</div>
    		</div><div class="form-group">
    			<label for="" class="col-sm-2 control-label">Shop(*): </label>
    			<div class="col-sm-10">
    				<?php
					bind_Shop_List($conn);
					?>
    			</div>
    		</div>
    		<div class="form-group">
    			<label for="lblGia" class="col-sm-2 control-label">Price(*): </label>
    			<div class="col-sm-10">
    				<input type="text" name="txtPrice" id="txtPrice" class="form-control" placeholder="Price" value='' />
    			</div>
    		</div>

    		<div class="form-group">
    			<label for="lblDetail" class="col-sm-2 control-label">Description(*): </label>
    			<div class="col-sm-10">
    				<textarea name="txtDetail" rows="4" class="ckeditor"></textarea>
    				<script language="javascript">
    					CKEDITOR.replace('txtDetail', {
    						skin: 'kama',
    						extraPlugins: 'uicolor',
    						uiColor: '#eeeeee',
    						toolbar: [
    							['Source', 'DocProps', '-', 'Save', 'NewPage', 'Preview', '-', 'Templates'],
    							['Cut', 'Copy', 'Paste', 'PasteText', 'PasteWord', '-', 'Print', 'SpellCheck'],
    							['Undo', 'Redo', '-', 'Find', 'Replace', '-', 'SelectAll', 'RemoveFormat'],
    							['Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField'],
    							['Bold', 'Italic', 'Underline', 'StrikeThrough', '-', 'Subscript', 'Superscript'],
    							['OrderedList', 'UnorderedList', '-', 'Outdent', 'Indent', 'Blockquote'],
    							['JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyFull'],
    							['Link', 'Unlink', 'Anchor', 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent'],
    							['Image', 'Flash', 'Table', 'Rule', 'Smiley', 'SpecialChar'],
    							['Style', 'FontFormat', 'FontName', 'FontSize'],
    							['TextColor', 'BGColor'],
    							['UIColor']
    						]
    					});
    				</script>

    			</div>
    		</div>

    		<div class="form-group">
    			<label for="lblSoLuong" class="col-sm-2 control-label">Quantity(*): </label>
    			<div class="col-sm-10">
    				<input type="number" name="txtQty" id="txtQty" class="form-control" placeholder="Quantity" value="" />
    			</div>
    		</div>

    		<div class="form-group">
    			<label for="sphinhanh" class="col-sm-2 control-label">Image(*): </label>
    			<div class="col-sm-10">
    				<input type="file" name="txtImage" id="txtImage" class="form-control" value="" />
    			</div>
    		</div>

    		<div class="form-group">
    			<div class="col-sm-offset-2 col-sm-10">
    				<input type="submit" class="btn btn-primary" name="btnAdd" id="btnAdd" value="Add new" />
    				<input type="button" class="btn btn-primary" name="btnIgnore" id="btnIgnore" value="Ignore" onclick="window.location='Product_Management.php'" />

    			</div>
    		</div>
    	</form>
    </div>