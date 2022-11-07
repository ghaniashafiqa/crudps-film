<?php
require "Function.php";
	if($_GET['id'] != null){
		$id = $_GET['id']; 
		$script = "SELECT * FROM film WHERE id=$id"; 
		$query = mysqli_query($conn, $script);
		$data = mysqli_fetch_array($query);
	}else{
		header("location: read.php");
	}

	$query2 = null;

	if(isset($_POST['hapus'])) {
		$script2 = "DELETE FROM film WHERE id = $id"; 
		$query2 = mysqli_query($conn, $script2);
	}

	if($query2 != null){
		header("location:read.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" href="Asset/Css/style.css">
	<title>Produk</title>
	<style>
		.box-detail-produk{
			color: white;
		}
	</style>
</head>
<body>
	<header>
		<div class="wrapper"> 
			<div class="row">
				<div class="col-8"></div> 
				<div class="col-5">
					<ul>
						<font face="Sans-serif" color="black" size="4"> 
						<ul><ul><li> <a href="index.php">Home</a> </li> 
						<li> <a href="read.php">Produk</a> </li> 
						</font>
					</ul> 
				</div> 
				<div class="col-4"> 
					<form method="get"> 
						<div class="input-group"> 
							<div class="form-outline">
								<input type="search" name="search" id="formi" placeholder="mau cari apa?" class="form-control" />
							</div>
							<input type="submit" class="btn btn-primary" value="Search"> 
						</div> 
					</form>
				</div> 
			</div>
		</div> 
	</header> 
	<br> 
	<ul>
		<a href="read.php" type="submit" class="btn btn-primary">Back to menu</a>
	</ul>
		<div class="wrapper"> 
			<div class="row"> 
				<div class="col-5"> 
					<img src="img/<?= $data['gambar'] ?>" width="90%" alt=""> 
				</div> 
				<div class="col-7"> 
					<div class="box-detail-produk">
                        <h1><?= $data['judul']?></h1>
                        <h6><?= $data['detail']?></h6>

					</div> 
					<div class="box-detail-produk">
					<h2>Option </h2> 
					<form method="post">
						<a href="ubah.php?id=<?= $data['id'] ?>" class="btn btn-warning">Update </a>
                        <a href="hapus.php?id=<?= $row["id"]; ?>" class="btn btn-danger" onclick="return confirm('Are u sure want to Delete this item?');"> Delete </a>
					</form> 
				</div>
			</div>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>