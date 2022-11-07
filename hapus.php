<?php
require 'Function.php';
$id = $_GET["id"];


if( hapus($id) > 0 ) {
    echo "
    <script> 
        alert('data berhasil di hapus');
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
?>