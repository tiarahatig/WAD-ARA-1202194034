@extends('layout')
@section('main')
<div class="container">
    <div class="d-flex justify-content-center my-3">
        <h2>About Us</h2>
    </div>

    <div class="row gx-5 text-center">
        <div class="col-md-6">
            <img src="https://img.freepik.com/free-vector/health-professional-team_52683-36023.jpg?size=626&ext=jpg" alt="">
        </div>
        <div class="col-md-6">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloremque veritatis reiciendis soluta accusantium? Consectetur at sapiente accusamus voluptatem, dignissimos explicabo quas commodi voluptate cumque recusandae dicta quos voluptatum doloremque expedita rerum, aliquid omnis rem cupiditate totam nihil maiores ipsum nisi quod. </div>
    </div>
</div>

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
@endsection