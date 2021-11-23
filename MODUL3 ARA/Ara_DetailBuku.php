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


    <!-- PHP-->
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
            <img src="assets/<?= $row['gambar']?>" alt="...">

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

            <div class="card-footer text-center">
                    <div class="row">
                        <div class="col-md-6 text-right">
                            <input type="submit" class="btn btn-primary" name="edit_event" value="Edit"
                                data-toggle="modal" data-target="#edit_data_modal" style="width:10em;">
                        </div>

                        <div class="col-md-6 text-left">
                            <form action="Ara_Home.php" method="post" onsubmit="return confirm('Delete?');">
                                <input type="submit" class="btn btn-danger" name="del_event" value="Delete"
                                    style="width:10em;">
                            </form>
                        </div>
                    </div>
                </div>

    </div>

     <!-- Edit event -->
     <div class="modal" id="edit_data_modal" tabindex="1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Detail Buku</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="Ara_Home.php" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="row justify-content-center align-content-center">

                        <!-- edit form-->
                        <div class="container">
            <div class="content-page">
                <h4 class="bold text-center">Edit Data Buku</h4>
                <form action="Ara_Home.php" method="post" enctype="multipart/form-data">
                    <div class= "form-group mb-4">
                        <label class="bold" for="title">Judul Buku</label>
                        <input type="text" class="form-control mt-2" name="Judul_buku" value="<?= $row['judul_buku']?>">
                    </div>

                    <div class= "form-group mb-4">
                        <label class="bold" for="title">Penulis</label>
                        <input type="text" class="form-control mt-2" name="Penulis_buku" 
                                aria-describedby="titleHelp" placeholder="Ara_1202194034" value="Ara_1202194034" 
                                readonly autocomplete="off">
                    </div>

                    <div class= "form-group mb-4">
                        <label class="bold" for="title">Tahun Terbit</label>
                        <input type="text" class="form-control mt-2" name="Tahun_terbit" 
                                aria-describedby="titleHelp" value="<?= $row['tahun_terbit']?>"> 
                    </div>

                    <div class= "form-group mb-4">
                    <label class="bold" for="title">Deskripsi</label>
                    <textarea class="form-control" name="deskripsi" rows="7" ><?= $row['deskripsi']?></textarea>
                    </div>

                    <div class= "form-group mb-4">
                    <label class="bold" for="title">Bahasa</label>
                    <div class="form-check form-check-inline">
                                    <input class="form-check-inline" type="radio" value="Indonesia" name="bahasa"
                                    <?php if ($row['bahasa'] === 'Indonesia') { echo 'checked="checked"'; } ?>>
                                        <label class="form-check-label">Indonesia</label>
                                </div>
                                <div class="rform-check form-check-inline">
                                    <input class="form-check-inline" type="radio" value="Lainnya" name="bahasa"
                                    <?php if ($row['bahasa'] === 'Lainnya') { echo 'checked="checked"'; } ?>>
                                        <label class="form-check-label">Lainnya</label>
                                </div>
                    </div>

                    <div class= "form-group mb-4">
                    <label class="bold" for="title">Tag</label>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="Pemrograman" name="tag[]"
                    <?php if (strpos($detail['tag'],'Pemrograman') !== false) { echo 'checked'; } ?>>
                    <label class="form-check-label" for="inlineCheckbox1">Pemrograman</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="Website" name="tag[]"
                    <?php if (strpos($detail['tag'],'Pemrograman') !== false) { echo 'checked'; } ?>>
                    <label class="form-check-label" for="inlineCheckbox1">Website</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="Java" name="tag[]"
                    <?php if (strpos($detail['tag'],'Java') !== false) { echo 'checked'; }?>>
                    <label class="form-check-label" for="inlineCheckbox1">Java</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox4" value="OOP" name="tag[]"
                    <?php if (strpos($detail['tag'],'OOP') !== false) { echo 'checked'; } ?>>
                    <label class="form-check-label" for="inlineCheckbox1">OOP</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox5" value="MVC" name="tag[]"
                    <?php if (strpos($detail['tag'],'MVC') !== false) { echo 'checked'; } ?>>
                    <label class="form-check-label" for="inlineCheckbox1">MVC</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox6" value="Kalkulus" name="tag[]"
                    <?php if (strpos($detail['tag'],'Kalkulus') !== false) { echo 'checked'; } ?>>
                    <label class="form-check-label" for="inlineCheckbox1">Kalkulus</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox7" value="Lainnya" name="tag[]"
                    <?php if (strpos($detail['tag'],'Lainnya') !== false) { echo 'checked'; } ?>>
                    <label class="form-check-label" for="inlineCheckbox1">Lainnya</label>
                    </div>

                    <div class= "form-group mb-4">
                    <label class="bold" for="title">Gambar</label>
                    <input type="file" class="form-control" name="gambar" 
                                    accept="iimage/png, image/jpeg, image/jpg">
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-danger" value="Cancel" data-dismiss="modal"></input>
                        <input type="submit" name="update" class="btn btn-primary" value="Save Changes" ></input>
                    </div>
                </form>

<!-- 
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
    integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
    integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script> -->
    </body>
