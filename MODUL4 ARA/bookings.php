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
</head>

<!--PHP section--> 
<?php

include("db_connect.php");

if (!isset($_SESSION["is_login"])) {
    header("location: login.php");
}

$user_id = $_SESSION["user_id"];

$message = "";
if (isset($_POST["delete"])) {
    $id = $_POST["id"];

    mysqli_query($conn, "DELETE FROM bookings WHERE id=$id");
    $message = "Behasil dihapus dari keranjang";
}

$daftarTempat = mysqli_query($conn, "SELECT * FROM bookings WHERE user_id=$user_id");

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
        <div class="container mt-4">
        <?php if ($message) : ?>
            <div class="row justify-content-center">
                <div class="alert alert-warning w-100" role="alert">
                    <?= $message ?>
                </div>
            </div>
        <?php endif; ?>

        <div class="row">
            <div class="table-responsive">
                <table class="table table-striped table-light">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Tempat</th>
                            <th scope="col">Lokasi</th>
                            <th scope="col">Tanggal Perjalanan</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        $total = 0; ?>
                        <?php while ($rinc = mysqli_fetch_assoc($daftarTempat)) : ?>
                            <?php $total += $rinc["harga"]; ?>
                            <tr>
                                <td><?= $i; ?></td>
                                <td><?= $rinc["nama_tempat"]; ?></td>
                                <td><?= $rinc["lokasi"]; ?></td>
                                <td><?= $rinc["tanggal"]; ?></td>
                                <td>Rp<?= number_format($rinc["harga"]); ?></td>
                                <td>
                                    <form action="" method="POST">
                                        <input type="hidden" name="id" value="<?= $rinc["id"] ?>">
                                        <button type=" submit" name="delete" class="btn btn-danger" onclick="return confirm('Anda yakin ingin menghapus?');">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            <?php $i++; ?>
                        <?php endwhile; ?>
                        <tr>
                            <td colspan="4" class="font-weight-bold">Total</td>
                            <td colspan="8" class="font-weight-bold">Rp<?= number_format($total); ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>

</html>