<?php
// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "tugas");

function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result) ) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data) {
    global $conn;

     // ambil data tiap elemen
    $judul = htmlspecialchars($data["judul"]);
    $detail = htmlspecialchars($data["detail"]);
    
    //upload gambar
    $gambar = upload();
    if ( !$gambar ) {
        return false;
    }

     //query insert data
    $query = " INSERT INTO film 
    VALUES ('','$judul', '$detail', '$gambar' ) ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
 
}


function upload(){
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    // cek gambar upload
    if( $error === 4 ){
        echo"<script>
            alert('pilih gambar terlebih dahulu!');
            </script>";
        return false;
    }

    // check yg di upload adalah gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if( !in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo"<script>
        alert('yang anda upload bukan gambar');
        </script>";
    return false;
    }

    // cek ukuran jika terlalu besar
    if($ukuranFile > 1000000000) {
        echo"<script>
        alert('ukuran gambar terlalu besar');
        </script>";
    return false;
    }

    // lolos pengecheckan
    
    //generate nama gambar
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName,'img/'. $namaFileBaru);
    return $namaFileBaru;
}



function hapus($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM film WHERE id = $id");
    return mysqli_affected_rows($conn);
}

function ubah($data) {
    global $conn;

    // ambil data tiap elemen
    $id = $data["id"];
    $judul = htmlspecialchars($data["judul"]);
    $detail = htmlspecialchars($data["detail"]);
    $oldimg = htmlspecialchars($data["oldimg"]);

    //check apakah gambar baru atau tidak
    if($_FILES['gambar']['error'] == 4 ){
        $gambar = $oldimg;
    } else {
        $gambar = upload();
    }
    
    $gambar = htmlspecialchars($data["gambar"]);

    //query insert data
   $query = " UPDATE film SET
            judul = '$judul',
            detail = '$detail'
        WHERE id = $id
            ";

   mysqli_query($conn, $query);

   return mysqli_affected_rows($conn);
}

function cari ($search) {
    $query = "SELECT * FROM film
                WHERE
            judul LIKE '$search%' OR 
            detail LIKE '$search   %'
            ";
    return query($query);
}       

