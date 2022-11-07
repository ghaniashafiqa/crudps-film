<?php
require 'Function.php';
$conn = mysqli_connect("localhost", "root", "", "tugas");
//check tombol button 
if (isset($_POST["submit"])) {


    //cek data
    if (tambah($_POST) > 0) {
        echo "
        <script> 
            alert('data berhasil di tambahkan');
            document.location.href= 'read.php';
        </script>
    ";
    } else {
        echo "
        <script> 
            alert('data gagal di tambahkan');
            document.location.href= 'read.php';
        </script>
    ";
    }
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="Asset/Css/style.css">
    <title>Add Film</title>
    <style>
        .page-header{
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
                            <li> <a href="index.php">Home</a> </li>
                            <li> <a href="read.php">Produk</a> </li>
                        </font>
                    </ul>
                </div>
                <div class="col-4">
                    <form method="get">
                        <div class="input-group">
                            <div class="form-outline">
                                <input type="search" name="search" id="form1" placeholder="mau cari apa?" class="form-control" />
                            </div>
                            <input type="submit" class="btn btn-primary" value="Search">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </header>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h1>Tambah Data </h1>

                        <form action="" method="post" enctype="multipart/form-data">


                            <div class="form-group">
                                <label for="nama">judul :</label>
                                <input type="text" name="judul" class="form-control" id="judul">
                            </div>
                            <div class="form-group">
                                <label for="nim">detail :</label>
                                <input type="text" name="detail" class="form-control" id="detail">
                            </div>
                            <div class="form-group">
                                <label> Foto Produk* </label>
                                <input type="file" class="form-control" name="gambar">
                            </div>
                            <div class="form-group">
                                <button type="submit" name="submit" class="btn btn-primary">Tambah Data ! </button>
                            </div>




                        </form>
</body>

</html>