<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Event</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="">
</head>

<body?>

        <!-- HEADER NAVBAR -->
        <div class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <nav class="d-flex flex-wrap justify-content-between align-items-center w-100">
            <div class="col-md-4 d-flex align-items-start px-2">
                <span class="logo"><a href="Ara_Home.php"><img src="assets/ead.png" alt="logo" width="130px"></a></span>
            </div>
            <div class="col-md-4 justify-content-end d-flex px-2">
                <a href="Ara_tambahBuku.php" class="btn btn-primary">
                    Tambah Buku
                </a>
            </div>
        </nav>
    </div>


    <!-- PHP section -->
    <?php
        require 'db_connector.php';
        session_start();
        if(isset($_GET['id'])) {
            $id_num = $_GET['id'];
            $row = query("SELECT * FROM Buku_table WHERE id=$id_num")[0];
            $_SESSION['id_no'] = $id_num;
        }
    ?>


    <!-- Content -->
    <div class="container-fluid" style="margin-top:100px">
        
        <div class="m-auto shadow p-3 mb-5 bg-body rounded w-75 mt-5 p-5">
        <h4 class="text-center">Detail Buku</h4>
            <img src="assets/"<?= $row['gambar']?> alt="...">

            <hr style="height:7px; background-color:blue">
            <br>
            <h5>Judul Buku : </h5>
            <p><?= $row['judul_buku']?></p>
            <h5>Penulis : </h5>
            <p><?= $row['penulis_buku']?></p>
            <h5>Tahun Terbit : </h5>
            <p><?= $row['tahun_terbit']?></p>
            <h5>Deskripsi : </h5>
            <p><?= $row['deskripsi']?></p>
            <h5>Bahasa : </h5>
            <p><?= $row['bahasa']?></p>
            <h5>Tags : </h5>
            <p><?= $row['tag']?></p>

            <div class="modal-footer p-2 pb-5 border-bottom-0" style="width: 100% ;margin: 0px auto; border-style: none; justify-content: center;">
                <button type="button" class="btn btn-primary" style="width: 40% ;max-width: 500px;" data-bs-toggle="modal" data-bs-target="#sunting">Edit</button>
                <button type="button" class="btn btn-danger" style="width: 40% ;max-width: 500px;" data-bs-toggle="modal" data-bs-target="#hapus">Delete</button>
            </div>
        </div>

    </div>

    </body>
