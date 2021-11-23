<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan WAD</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="assets/style.css">
</head>

<body>

        <!-- NAVBAR -->
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

    <!-- PHP Section -->

    <?php
        require 'db_connector.php';
    ?>

   <!-- Content -->
   <section>
   <div class="container container-fluid">
       <br><br><br>
       <section class='m-auto shadow p-3 mb-5 bg-body rounded w-75 mt-5 p-5' id='addData'>
       <div class="container">
            <div class="content-page">
                <h4 class="bold text-center">Tambah Data Buku</h4>
                <form action="Ara_Home.php" method="post" enctype="multipart/form-data">
                    <div class= "form-group mb-4">
                        <label class="bold" for="title">Judul Buku</label>
                        <input type="text" class="form-control mt-2" name="Judul_buku"
                                aria-describedby="titleHelp" placeholder="Contoh: Pemrograman Web Bersama EAD" 
                                autocomplete="off">
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
                                aria-describedby="titleHelp" placeholder="Contoh: 2021" 
                                autocomplete="off">
                    </div>

                    <div class= "form-group mb-4">
                    <label class="bold" for="title"><b>Deskripsi</b></label>
                    <textarea class="form-control" name="deskripsi" rows="5" ></textarea>
                    </div>

                    <div class= "form-group mb-4">
                    <label class="bold" for="title"><b>Bahasa</b></label>
                    <div class="form-check form-check-inline">
                                    <input class="form-check-inline" type="radio" value="Indonesia" name="bahasa"
                                        >
                                    Bahasa Indonesia
                                </div>
                                <div class="rform-check form-check-inline">
                                    <input class="form-check-inline" type="radio" value="Lainnya" name="bahasa"
                                        >
                                    Lainnya
                                </div>
                    </div>

                    <div class= "form-group mb-4">
                    <label class="bold" for="title"><b>Tag</b></label>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="Pemrograman" name="tag[]">
                    <label class="form-check-label" for="inlineCheckbox1">Pemrograman</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="Website" name="tag[]">
                    <label class="form-check-label" for="inlineCheckbox1">Website</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="Java" name="tag[]">
                    <label class="form-check-label" for="inlineCheckbox1">Java</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox4" value="OOP" name="tag[]">
                    <label class="form-check-label" for="inlineCheckbox1">OOP</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox5" value="MVC" name="tag[]">
                    <label class="form-check-label" for="inlineCheckbox1">MVC</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox6" value="Kalkulus" name="tag[]">
                    <label class="form-check-label" for="inlineCheckbox1">Kalkulus</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox7" value="Lainnya" name="tag[]">
                    <label class="form-check-label" for="inlineCheckbox1">Lainnya</label>
                    </div>

                    <div class= "form-group mb-4">
                    <label class="bold" for="title">Gambar</label>
                    <input type="file" class="form-control" name="gambar" 
                                    accept="image/png, image/jpeg, image/jpg">
                    </div>

                    <button type="submit" class="btn btn-primary btn-lg btn-block" name="submit_form">Tambahkan</button>
                </form>
            </div>
       </div>
    </div>
</section>

<div>
       <footer class="footer bg-light mt-5">
        <div class="text-center">
            <img src="http://hmsitel-u.id/wp-content/uploads/2021/01/logo-ead-1.png" alt="" width='150px' class='mt-5'>
            <h3 style='font-weight:bold; color:black; margin-top:20px'>Perpustakaan EAD</h3>
            Ara_1202194034
        </div>
    
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>  -->
</body>

</html>
