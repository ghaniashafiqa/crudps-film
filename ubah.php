<?php
require 'Function.php';

// ambil data dari url
$id = $_GET["id"];

// query data mahasiswa
$film = query("SELECT * FROM film Where id = $id")[0];

//check tombol button 
if (isset($_POST["submit"])) {

    //cek data berhasil / tidak diubah
    if (ubah($_POST) > 0) {
        echo "
        <script> 
            alert('data berhasil di ubah');
            document.location.href= 'read.php';
        </script>
    ";
    } else {
        echo "
        <script> 
            alert('data gagal di ubah');
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
    <title>Update</title>
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
                        <h1>Update Film</h1>

                        <form action="" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?= $film["id"]; ?>">


                            <div class="form-group">
                                <label for="judul">Judul :</label>
                                <input type="text" name="judul" id="judul" class="form-control" value="<?= $film["judul"]; ?>">
                            </div>

                            <div class="form-group">
                                <label for="detail"> Detail :</label>
                                <input type="" name="detail" id="detail" class="form-control" value="<?= $film["detail"]; ?>">
                            </div>

                            <div class="form-group">
                                <label> Foto Produk* </label>
                                <img src="img/<?= $film['gambar']; ?>" width="40"> <br>
                                <input type="file" class="form-control" name="gambar">
                            </div>

                            <div class="form-group">
                                <button type="submit" name="submit" class="btn btn-primary"> Ubah Data ! </button>
                            </div>



                        </form>
</body>

</html>