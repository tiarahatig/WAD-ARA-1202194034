<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>EAD Vaccine</title>
</head>
<body>

<nav class="navbar navbar-light navbar-expand-md bg-light justify-content-md-center justify-content-start">
    <button class="navbar-toggler ml-1" type="button" data-toggle="collapse" data-target="#collapsingNavbar2">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-collapse collapse justify-content-between align-items-center w-100" id="collapsingNavbar2">
        <ul class="navbar-nav mx-auto">
            <li class="nav-item">
                <a class="nav-link{{ request()->is('/') ? ' active' : ''}}" href="/">HOME</a>
            </li>
            <li class="nav-item">
                <a class="nav-link{{ request()->is('vaccine') ? ' active' : ''}}" href="/vaccine">VACCINE</a>
            </li>
            <li class="nav-item">
                <a class="nav-link{{ request()->is('patient') ? ' active' : ''}}" href="/patient">PATIENT</a>
        </ul>
    </div>
</nav>
<div class="container">
    <div class="d-flex justify-content-center my-3">
        <h2>About Us</h2>
    </div>

    <div class="row gx-5 text-center">
        <div class="col-md-6">
            <img src="https://images.everydayhealth.com/homepage/health-topics-2.jpg?sfvrsn=757370ae_2" alt="" width="650" height="350">
        </div>
        <div class="col-md-6">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloremque veritatis reiciendis soluta accusantium? Consectetur at sapiente accusamus voluptatem, dignissimos explicabo quas commodi voluptate cumque recusandae dicta quos voluptatum doloremque expedita rerum, aliquid omnis rem cupiditate totam nihil maiores ipsum nisi quod. </div>
    </div>
</div>


<div class="d-flex justify-content-center my-3">
    @include('components/session')
</div>
@yield('main')
 <!-- Footer -->
 <footer>
            <br><br><br><br><br>
            <div class=" text-center text-white p-3 bg-dark">
                <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#myModal"> <a class="text-white">
                © 2021 Copyright:  Tiara Hati Giwangkara 1202194034 SI 43 04</a> </button>
            </div>
        
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Kesan Pesan Praktikum</h5>
              </div>
              <div class="modal-body text-align">
                <p>Kesan   :  Sangat Pusing sekali</p>
                <p>Pesan   :  Semoga bisa diberikan video penjelesan biar lebih paham</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
                </footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>