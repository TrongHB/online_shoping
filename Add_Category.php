<!-- Bootstrap -->
<link rel="stylesheet" type="text/css" href="style.css" />
<meta charset="utf-8" />
<link rel="stylesheet" href="css/bootstrap.min.css">

<?php
include_once("connection.php");
if (isset($_POST["btnAdd"])) {
	$name = $_POST["txtName"];
	$des = $_POST["txtDes"];
	$err = "";
	if ($name == "") {
		$err .= "<li>Enter Category Name, please</li>";
	}
	if ($err != "") {
		echo "<li>$err</li>";
	} else {
		include_once("connection.php");
		$sq = "SELECT * FROM public.category where cate_name = '$name'";
		$result = mysqli_query($conn, $sq);
		if (mysqli_num_rows($result) == 0) {
			mysqli_query($conn, "INSERT INTO category (cate_name, des) VALUES ('$name', '$des')");
			echo '<meta http-equiv="refresh" content = "0; URL=?page=category_management"/>';
		} else {
			echo "<li>Duplicate category ID or Name</li>";
		}
	}
}
?>

<div class="container">
	<h2>Adding Category</h2>
	<form id="form1" name="form1" method="post" action="" class="form-horizontal" role="form">
		
		<div class="form-group">
			<label for="txtTen" class="col-sm-2 control-label">Category Name(*): </label>
			<div class="col-sm-10">
				<input type="text" name="txtName" id="txtName" class="form-control" placeholder="Catepgy Name" value='<?php echo isset($_POST["txtName"]) ? ($_POST["txtName"]) : ""; ?>'>
			</div>
		</div>

		<div class="form-group">
			<label for="txtMoTa" class="col-sm-2 control-label">Description(*): </label>
			<div class="col-sm-10">
				<input type="text" name="txtDes" id="txtDes" class="form-control" placeholder="Description" value='<?php echo isset($_POST["txtDes"]) ? ($_POST["txtDes"]) : ""; ?>'>
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<input type="submit" class="btn btn-primary" name="btnAdd" id="btnAdd" value="Add new" />
				<input type="button" class="btn btn-primary" name="btnIgnore" id="btnIgnore" value="Ignore" onclick="window.location='Category_Management.php'" />

			</div>
		</div>
	</form>
</div>