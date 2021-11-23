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
        $submit_selected = isset($_POST["submit_form"]);
        $delete_selected = isset($_POST["del_event"]);
        $edit_selected = isset($_POST["save_edit"]);

        if($submit_selected) {
            addData($_POST);
        }

        session_start();
        $id_num = $_SESSION['id_no'];

        if($delete_selected) {
            delData($id_num);
        }

        if($edit_selected) {
            editData($id_num);
        }

        $res_row = query("SELECT * FROM Buku_table");
        echo $res_row;
        $content_hm = '';
        
        if(empty($res_row)){
            $content_hm = 
            '<div class="container">
            <h3 class="text-center" style="margin-top:100px">Belum Ada Buku</h3>
            <hr style="height:7px; background-color:blue">
            <p class="text-center" style="font-size:20px">Silahkan Menambahkan Buku</p>
        </div>';
        }else{
            foreach ($res_row as $row) {
                $content_hm .= '
                <div class="card mr-4 mt-5" style="width: 18rem;">
                <img src="gambar/'.$row['gambar'].'" class="card-img-top"  alt="...">
                <div class="card-body">
                    <br>
                    <h3 class="fw-bold">'.$row['judul_buku'].'</h3>
                    <p class="card-text">'.$row['deskripsi'].'</p>
                    <a type="button" href="Ara_DetailBuku.php?id='.$row['id'].'" class="btn btn-primary">Tampilkan Lebih Lanjut</a>
                </div>
                </div>';
            }
        }
    ?>
    <!-- Content -->
    <div class="container-fluid text-center ">
        <br><br><br>
        <h5 style='font-weight:bold; color:black; margin-top:20px'>WELCOME TO EAD LIBRARY</h5>
        <div class="row justify-content-center align-content-center">
            <?=$content_hm?>
        </div>
    </div>

    <footer class="footer bg-light mt-5">
        <div class="text-center">
            <img src="http://hmsitel-u.id/wp-content/uploads/2021/01/logo-ead-1.png" alt="" width='150px' class='mt-5'>
            <h3 style='font-weight:bold; color:black; margin-top:20px'>Perpustakaan EAD</h3>
            Ara_1202194034
        </div>
    </footer>
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script> -->
</body>
</html>
