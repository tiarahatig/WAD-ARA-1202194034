<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WAD Travel</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/datepicker.css">
    <script src="js/datepicker.js"></script>

    <title>EAD Travel</title>
</head>

<!--PHP section-->
<?php
session_start();
include("db_connect.php");

if (!isset($_SESSION["is_login"])) {
    header("location: login.php");
}
$message = "";
if (isset($_POST["add1"])) {
    $user_id = $_SESSION["user_id"];
    $nama_tempat = $_POST["nama_tempat"];
    $lokasi = $_POST["lokasi"];
    $harga = (int)$_POST["harga"];
    $date = $_POST["eventdate"];

    $query = "INSERT INTO bookings VALUES ('', $user_id, 'Taman Laut Bunaken', 'Sulewesi Utara', 150000, '$date')";
    $result = mysqli_query($conn, $query);
    $message = "Berhasil ditambahkan ke keranjang";
}

if (isset($_POST["add2"])) {
    $nama_tempat = $_POST["nama_tempat2"];
    $user_id = $_SESSION["user_id"];
    $lokasi = $_POST["lokasi2"];
    $harga = $_POST["harga2"];
    $date = $_POST["eventdate2"];

    $query = "INSERT INTO bookings VALUES ('', $user_id, '$nama_tempat', '$lokasi', '$harga', '$date')";
    $result = mysqli_query($conn, $query);
    $message = "Berhasil ditambahkan ke keranjang";
}

if (isset($_POST["add3"])) {
    $nama_tempat = $_POST["nama_tempat3"];
    $user_id = $_SESSION["user_id"];
    $lokasi = $_POST["lokasi3"];
    $harga = $_POST["harga3"];
    $date = $_POST["eventdate3"];

    $query = "INSERT INTO bookings VALUES ('', $user_id, 'Nusa Penida', 'Bali', 155000, '$date')";
    $result = mysqli_query($conn, $query);
    $message = "Berhasil ditambahkan ke keranjang";
}

?>

<!-- navbar -->
<body class= "bg-secondary">
        <nav class="navbar navbar-expand-sm navbar-light bg-success">
            <a class="navbar-brand mb-0 h1" href="index.php">EAD Travel</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav mr-auto">
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="bookings.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                    </li>
                    <li class="nav-item">
                        <span class="navbar-text text-light">Selamat Datang, </span>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-dark" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= $_SESSION["nama"] ?></a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="profile.php">Profile</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="logout.php">Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>


<!--content-->
<div class="container mt-3">
        <?php if ($message) : ?>
                <div class="alert alert-warning" role="alert">
                    <?= $message ?>
                </div>
            </div>
        <?php endif; ?>

    <table class="table table-light table-bordered">
        <thead class="bg-info text-center">
                <tr>
                    <th colspan="3">
                        <h2>EAD TRAVEL</h2>
                    </th>
                </tr>
            </thead>
            <tbody class="text-dark">
                <tr>
                    <td>
                        <!-- Bunaken -->
                        <div class="card">
                            <form method="POST">
                                <img class="card-img-top" src="assets/TamanLautBunaken4.jpg" height="270px">
                                <div class="card-body">
                                    <h3 class="card-title">Taman Laut Bunaken, Sulewesi Utara</h3>
                                    <p class="card-text">Taman Laut Bunaken menjadi salah satu lokasi darmawisata keindahan Indonesia yang lagi-lagi ditetapkan oleh UNESCO sebagai kekayaan keajaiban dunia, persisnya pada tahun 2005. Keadaan ini lantaran kekayaan serta keindahan biota lautnya yang luar biasa mulai dari terumbu karang, rumput laut hingga keaneragaman jenis ikan yang unik ada disini.</p>
                                    <hr>
                                    <p class="text-danger">Rp 150.000</p>
                                </div>
                                <div class="card-footer">
                                    <input type="hidden" name="nama_tempat" value='Taman Laut Bunaken'>
                                    <input type="hidden" name="lokasi" value='Sulewesi Utara'>
                                    <input type="hidden" name="harga" value=150000>
                                    <button type="button" data-target="#modalDate" data-toggle="modal" class="btn btn-info btn-block">Tambahkan ke Keranjang</button>
                                </div>
                    <!-- modal 1 -->
                                <div class="modal fade" id="modalDate" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Pilih Tanggal Perjalanan</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">Event Date
                                                <input type="date" class="form-control" name='eventdate'></input>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="hidden" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" name="add1" class="btn btn-primary">Tambahkan</button>
                                        </div>
                                        </div>
                                    </div>
                                </div>   
                            </form>
                        </div>
                    </td>

                    <td>
                        <!-- Gili Trawangan -->
                        <div class="card">
                            <form method="POST">
                                <img class="card-img-top" src="assets/giliTrawangan.jpg" height="270px">
                                <div class="card-body">
                                    <h3 class="card-title">Gili Trawangan, NTB</h3>
                                    <p class="card-text">Pulau Gili Trawangan berada dalam wilayah provinsi NTB (Nusa Tenggara Barat).Daya tarik utama dari pulau Gili Trawangan sebagai tempat liburan, terdapat pada pemandangan pantai pasir putih, tidak ada kendaraan bermotor dan kehidupan malam.</p>
                                    <hr>
                                    <p class="text-danger">Rp 190.000</p>
                                </div>
                                <div class="card-footer">
                                    <input type="hidden" name="nama_tempat2" value="Gili Trawangan">
                                    <input type="hidden" name="lokasi2" value="Nusa Tenggara Barat">
                                    <input type="hidden" name="harga2" value=190000>
                                    <button type="button" data-target="#modal2" data-toggle="modal" class="btn btn-info btn-block">Tambahkan ke Keranjang</button>
                                </div>
                        <!-- modal 2 -->
                        <div class="modal fade" id="modal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Pilih Tanggal Perjalanan</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">Event Date
                                                <input type="date" class="form-control" name='eventdate2'></input>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="hidden" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" name="add2" class="btn btn-primary">Tambahkan</button>
                                        </div>
                                        </div>
                                    </div>
                                </div>   
                            </form>
                        </div>
                    </td>
                    <td>
                        <!-- Nusa Penida -->
                        <div class="card">
                            <form method="POST">
                                <img class="card-img-top" src="assets/NusaPenida.jpg" height="270px">
                                <div class="card-body">
                                    <h3 class="card-title">Nusa Penida, Bali</h3>
                                    <p class="card-text">Nusa Penida adalah sebuah pulau yang berada di bagian tenggara pulau Bali. Antara pulau Bali dengan pulau Nusa Penida terpisahkan oleh lautan yang diberi nama Selat Badung. Di dekat pulau Nusa Penida juga terdapat pulau kecil lainya, seperti pulau Nusa Lembongan dan pulau Nusa Ceningan.</p>
                                    <hr>
                                    <p class="text-danger">Rp 155.000</p>
                                </div>
                                <div class="card-footer">
                                    <input type="hidden" name="nama_tempat3" value="Nusa Penida">
                                    <input type="hidden" name="lokasi3" value="Bali">
                                    <input type="hidden" name="harga3" value=155000>
                                    <button type="button" data-target="#modal3" data-toggle="modal" class="btn btn-info btn-block">Tambahkan ke Keranjang</button>
                                </div>
                            <!-- modal 3 -->
                                <div class="modal fade" id="modal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Pilih Tanggal Perjalanan</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">Event Date
                                                <input type="date" class="form-control" name='eventdate3'></input>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="hidden" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" name="add3" class="btn btn-primary">Tambahkan</button>
                                        </div>
                                        </div>
                                    </div>
                                </div>   
                            </form>
                        </div>
                    </td> 
                </tr>
                </form>
            </tbody>
        </table>
</div>

</body>

        <!--footer-->
    <footer>
    <div class=" text-center text-white p-3 bg-dark">
        <button type="button" class="btn" data-toggle="modal" data-target="#myModal"> <a class="text-white">
        © 2021 Copyright:  Tiara Hati Giwangkara 1202194034</a> </button>
    </div>

    <!-- copyright -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Created by</h5>
      </div>
      <div class="modal-body text-align">
        <p>Nama   :  Tiara Hati Giwangkara</p>
        <p>NIM    :  1202194034</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
        </footer>

</html>