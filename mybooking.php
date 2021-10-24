<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VENUE BOOKING</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./asset/mybook.css">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand navbar-dark bg-dark fixed-top">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link" href="home.php">Home</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="booking.php">Booking <span class="sr-only">(current)</span></a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- PHP Section -->
    <?php
        $book_num = rand();
        $nama = $_POST['name'];
        $checkin = $_POST['eventdate']." " . $_POST['starttime'];
        $displayCheckin = '';
        $durasi = $_POST['duration'];
        $checkout = '';
        $roomtype = $_POST['roomtype'];
        $phone = $_POST['phone_num'];
        $service = $_POST['service'];
        $displayService = 'no service';
        $totPrice = 0;

        if(!empty($checkin)){
            $displayCheckin = date('d/m/Y H:i:s', strtotime($checkin));     
            $checkout = date('d/m/Y H:i:s', strtotime($checkin) + 60 * 60 * $_POST['duration']);
        }

        //Total Price
        if($roomtype == 'Kamaya Bali'){
            $totPrice = $durasi*1000;
        } else if($roomtype == 'Jeeva Resorts'){
            $totPrice = $durasi*850;
        } else if($roomtype == 'Khayangan Estate'){
            $totPrice = $durasi*9500;
        }

        //Ptice Serivice
        if (isset($_POST['service'])){
            foreach ($_POST['service'] as $service){
                if ($service == 'Catering') $totPrice += 700;
                if ($service == 'Decoration') $totPrice += 450;
                if ($service == 'Sound System') $totPrice += 250;
            }
        }

        if(!empty($service)){
            $displayService = '';
            foreach($service as $srv){
                $displayService == "<li> $srv </li>";
                $srv++;
            }
        }
    ?>

    <!-- invoice -->
    <div class="container-fluid">
        <div class="row justify-content-center align-content-center">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Booking Number</th>
                        <th scope="col">Name</th>
                        <th scope="col">Check-in</th>
                        <th scope="col">Check-out</th>
                        <th scope="col">Room Type</th>
                        <th scope="col">Phone Number</th>
                        <th scope="col">Service</th>
                        <th scope="col">Total Price</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row"><?=$book_num?></th>
                        <td><?= $nama?></td>
                        <td><?= $displayCheckin?></td>
                        <td><?= $checkout?></td>
                        <td><?= $roomtype?></td>
                        <td><?= $phone?></td>
                        <td>
                            <ul>
                                <?=$displayService?>
                            </ul>
                        </td>
                        <td>$<?= $totPrice?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

        <!--Footer-->
    <div class="text-center text-white p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        Created by: Ara_1202194034
    </div>
</body>

</html>