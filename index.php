<?php
require 'Function.php';

//pagination
$MaxData = 4;
$jumlahData = count(query("SELECT * FROM film"));
$jumlahHalaman = ceil($jumlahData / $MaxData);

if (isset($_GET["page"])) {
    $activePage = $_GET["page"];
} else {
    $activePage = 1;
}
//ternary
$activePage = (isset($_GET["page"])) ? $_GET["page"] : 1;
//data start
$dataStart = ($MaxData * $activePage) - $MaxData;

$user = query("SELECT * FROM film LIMIT $dataStart, $MaxData");
if (isset($_POST["cari"])) {
    $mahasiswa = cari($_POST["keyword"]);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title> Movie LIST APP</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <sricpt src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js">
        </script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap.js"></script>
        <style type="text/css">
            body{
                background-image: url("http://media.wbur.org/wp/2020/12/GettyImages-1150049038-1000x630.jpg");
            }
            .wrapper {
                width: 1080px;
                margin: 0 auto;
                opacity: 0,6;
            }

            page-header h1 {
                margin-top: 0;
            }

            h2{
                color: whitesmoke;
            }

            table tr td:last-child a {
                margin-right: 10px;
            }

            table {
                border-collapse: collapse;
                border-spacing: 0ch;
                width: 100%;
                border: 1px solid;
                background-color: whitesmoke;
            }

            th,td {
                text-align: left;
                padding: 18px;
                border-width: 10px;

            }
            
        </style>

        <script type="text/javascript">
            $(Document).ready(function() {
                $('[data-toggle="tooltip]').tooltip();
            });
        </script>
</head>

<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-13">
                    <div class="page-header clearfix">
                        <h2 class="pull-left"> Movie LIST APP</h2>
                    </div>

                    <!---Search-->
                    <form action="" method="post">
                        <a href="read.php" class="btn btn-primary"> USER MENU </a>
                    </form>
                    <a href="tambah.php" class="btn btn-success pull-right">Create a new list</a>
                    <!---Pagination-->

                    <table border="3" cellpadding="100" cellspacing="10" c>
                        <tr>
                            
                            <th>Settings</th>
                            <th>Judul</th>
                            <th>Detail </th>
                        </tr>

                        <?php foreach ($user as $row) : ?>
                            <tr>
                            
                                <td>
                                    <a href="ubah.php?id=<?= $row["id"]; ?>" class="bi bi-pencil-fill"> Edit </a>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                        <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                                    </svg>
                                    <a href="read.php?id=<?= $row["id"]; ?>"> Detail </a><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                        <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                        <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                    </svg>
                                    <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('Are u sure?');"> Delete </a>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                        <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                                    </svg>
                                <td><?= $row["judul"]; ?></td>
                                <td><?= $row["detail"]; ?></td>
                            </tr>
                        <?php endforeach; ?>

                    </table>
                </div>
            </div>
            <!-- <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="?page=">Previous</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
            </nav> -->


            <?php for ($i = 1; $i <= $jumlahHalaman; $i++) : ?>
                <?php if ($i == $activePage) : ?>
                    <li class="page-item"><a class="page-link" href="?page=<?= $i; ?>" style="font-weight: bold; color:"><?= $i; ?></a></li>
                <?php else : ?>
                    <li class="page-item"><a class="page-link" href="?page=<?= $i; ?>"><?= $i; ?></a></li>
                <?php endif; ?>
            <?php endfor; ?>
        </div>
    </div>
</body>

</html>