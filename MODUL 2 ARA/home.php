<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VENUE BOOKING</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./asset/home.css">
</head>

<body>
<body style="background-color:pink;">
  <!--NAVBAR-->
  <nav class="navbar navbar-expand navbar-dark bg-dark fixed-top">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="booking.php">Booking</a>
                </li>
            </ul>
        </div>
    </nav>

      <!--PHP SECTION-->
      <?php 
        $img_src = [
          "1.png", 
          "2.png", 
          "3.png"
        ];
        ?>

<!--isi-->
<div class="content-container">
        <h2><b>WELCOME TO ESD VENUE RESERVATION</b></h2><br>
        <div class="container bg-dark">
        <p class="text-light text-center">Find your best deal for your event, here!</p>
        </div>
        
        <form action="booking.php" method="post">
            <div class="row justify-content-center align-content-center">
                <div class="col-md-auto">
                    <div class="card">
                        <img src=<?=$img_src[0]?> class="card-img-top" alt=" " width="250px" height="250px">
                        <div class="card-body text-center">
                        <h5 class="card-title text-left"><b>Kamaya Bali</b></h5>
            <p class="text-left">Outdoor</p>
            <p class="card-text text-primary text-left"><b>$1000/hours</b></p>
            <p class="text-left">200 pax </p>
                            <div class="card-header">
              <b>FACILITIES</b>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item text-success">Free Parking Space</li>
              <li class="list-group-item text-success">Full AC</li>
              <li class="list-group-item text-success">Cleaning Services</li>
              <li class="list-group-item text-success">Covid-19 Protocols</li>
            </ul>

                        </div>
                        <div class="card-footer">
                            <button name="" class="btn btn-primary">Book Now</button>
                        </div>
                    </div>
                </div>

                <div class="col-md-auto">
                    <div class="card">
                        <img src=<?=$img_src[1]?> class="card-img-top" alt=" " width="250px" height="250px">
                        <div class="card-body text-center">
                        <h5 class="card-title text-left"><b>Jeeva Resorts</b></h5>
            <p class="text-left">Outdoor</p>
            <p class="card-text text-primary text-left"><b>$850/hours</b></p>
            <p class="text-left">300 pax</p>
                            <div class="card-header ">
              <b>FACILITIES</b>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item text-danger">Free Parking Space</li>
              <li class="list-group-item text-danger">Full AC</li>
              <li class="list-group-item text-success">Cleaning Services</li>
              <li class="list-group-item text-success">Covid-19 Protocols</li>
            </ul>

                        </div>
                        <div class="card-footer">
                            <button name="card2" class="btn btn-primary">Book Now</button>
                        </div>
                    </div>
                </div>

                <div class="col-md-auto">
                    <div class="card">
                        <img src=<?=$img_src[2]?> class="card-img-top" alt=" " width="250px" height="250px">
                        <div class="card-body text-center">
                        <h5 class="card-title text-left"><b>Khayangan Estate</b></h5>
            <p class="text-left">Outdoor</p>
            <p class="card-text text-primary text-left"><b>$9500/hours</b></p>
            <p class="text-left">250 pax</p>
                            <div class="card-header">
                            <b>FACILITIES</b>
            </div>
            <ul class="list-group list-group-flush">
              <ul class="list-group list-group-flush">
                <li class="list-group-item text-success">Free Parking Space</li>
                <li class="list-group-item text-danger">Full AC</li>
                <li class="list-group-item text-success">Cleaning Services</li>
                <li class="list-group-item text-success">Covid-19 Protocols</li>
            </ul>

                        </div>
                        <div class="card-footer">
                            <button name="card3" class="btn btn-primary">Book Now</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

        <!--Footer-->
    <div class="text-center text-white p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        Created by: Ara_1202194034
    </div>

</body>

</html>