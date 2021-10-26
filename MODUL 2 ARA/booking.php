<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VENUE BOOKING</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./asset/book.css">
</head>

<body style="background-color:pink;">
<!-- navbar -->
<body> 
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
                    <a class="nav-link" href="">Booking <span class="sr-only">(current)</span></a>
                </li>
            </ul>
        </div>
    </nav>
<br><br><br>

    <?php
        $method_selected = '';
        $image_selected = '';
        $veneu1 = isset($_POST['veneu1']);
        $veneu2 = isset($_POST['veneu2']);
        $veneu3 = isset($_POST['veneu3']);
        $img_src = [
            "1.png",
            "2.png",
            "3.png"
        ];

// Book Now buttons
        if ($veneu1) {
            $method_selected = '
                <select class="custom-select" name="roomtype" disabled>
                <option value="Kamaya Bali">Kamaya Bali</option>
                <input type="hidden" name="roomtype" value="Kamaya Bali">
                </select>';
            $image_selected = $img_src[0];
        } else if ($veneu2){
            $method_selected = '
                <select class="custom-select" name="roomtype" disabled>
                <option value="Jeeva Resorts">Jeeva Resorts</option>
                <input type="hidden" name="roomtype" value="Jeeva Resorts">
                </select>';
            $image_selected = $img_src[1];
        }else if ($veneu3){
            $method_selected = '
                <select class="custom-select" name="roomtype" disabled>
                <option value="Khayangan Estate">Khayangan Estate</option>
                <input type="hidden" name="roomtype" value="Khayangan Estate">
                </select>';
            $image_selected = $img_src[2];
        }else {
            $method_selected = '
                <select class="custom-select" name="roomtype">
                <option value="Kamaya Bali">Kamaya Bali</option>
                <option value="Jeeva Resorts">Jeeva Resorts</option>
                <option value="Khayangan Estate">Khayangan Estate</option>
                </select>';
            $image_selected = $img_src[0];
        }
    ?>

<!-- tulisan atas -->
    <div class="container-fluid">
        <div class="row justify-content-center align-content-center">
        <div class="container bg-dark">
        <p class="text-light text-center">Find your best deal for your event, here! <br></p>
        </div>
            <!-- foto kiri -->
            <div class="col-md-auto">
            <img src=<?=$image_selected?> alt="Preview Bedroom" class="image-preview">
                
            </div>

            <!--form -->
            <div class="col-md-6">
            <form action="mybooking.php" method="post">
                    <div class="form-group">
                        Name
                        <input type="text" class="form-control" name="name" value="Ara_1202194034">
                    </div>
                    <div class="form-group">
                        Event Date
                        <input type="date" class="form-control" name="eventdate">
                    </div>
                    <div class="form-group">
                        Start Time 
                        <input type="time" class="form-control" name="starttime">
                    </div>
                    <div class="form-group">
                        Duration(hours)
                        <input type="number" class="form-control" name="duration" aria-describedby="dur_info" value=0>
                    </div>
                    <div class="form-group">
                        Building Type
                        <?=$method_selected?>
                    </div>
                    <div class="form-group">
                        Phone Number
                        <input type="number" class="form-control" name="phone_num">
                        <br>
                    <div class="form-group">
                        Add Service(s)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="service[]" value="Catering"
                                id="service_check1">
                            Catering / $700
                            <br/>
                            <input class="form-check-input" type="checkbox" name="service[]" value="Decoration"
                                id="service_check2">
                            Decoration / $450
                            <br/>
                            <input class="form-check-input" type="checkbox" name="service[]" value="Sound System"
                                id="service_check1">
                            Sound System / $250
                            <br/>
                        </div>
                    </div>
                    </div>
                    <div class="form-group">
                        <input type="reset" class="btn btn-primary btn-block" value="Book"></input>
                    </div>
                </form>
            </div>

        </div>
    </div>

        <!--Footer-->
    <div class="text-center text-white p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        Created by: Ara_1202194034
    </div>

</body>

</html>