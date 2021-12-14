@extends('layout')
@section('main')

<div class="container mt-3">
    <div class="d-flex justify-content-center">
        <h3>Vaccine List</h3>
    </div>

    <div class="row mt-3">
        @foreach ($vaccines as $vaccine)
        <div class="col-md-4 justify-content-center">
            <div class="card">
                {{-- <img src="..." class="card-img-top" alt="..."> --}}
                <div class="card-body">
                    <h5 class="card-title">{{$vaccine->name}}</h5>
                    <p class="text-secondary">{{$vaccine->price}}</p>
                    <p class="card-text">{{$vaccine->description}}</p>
                    <button type="button" data-bs-toggle="modal" data-bs-target="#registerpatient{{$vaccine->id}}" class="btn btn-success">Vaccine Now</button>
                </div>
            </div>
        </div>

        <!-- register patient vaccine -->
        <div class="modal fade" id="registerpatient{{$vaccine->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Register {{$vaccine->name}} Patient</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="/patient/{{$vaccine->id}}" method="post">
                        @csrf
                        <div class="modal-body">
                            <label for="basic-url" class="form-label">Vaccine Name</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" value="{{$vaccine->name}}" disabled>
                            </div>

                            <label for="basic-url" class="form-label">Patient Name</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="name">
                            </div>

                            <label for="basic-url" class="form-label">NIK</label>
                            <div class="input-group mb-3">
                                <input type="number" class="form-control" name="nik">
                            </div>

                            <label for="basic-url" class="form-label">Alamat</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="alamat">
                            </div>

                            <label for="basic-url" class="form-label">Image</label>
                            <div class="input-group mb-3">
                                <input type="file" class="form-control" name="image_ktp">
                            </div>

                            <label for="basic-url" class="form-label">No HP</label>
                            <div class="input-group mb-3">
                                <input type="number" class="form-control" name="no_hp">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="d-flex justify-content-center mt-5">
        <h3>List Patient</h3>
    </div>

    @if ($patients->isNotEmpty())
    <table class="table table-striped mt-3">
        <thead class="table-dark">
            <tr>
                <th class="col-md-1">id</th>
                <th class="col">Nama Pasien</th>
                <th class="col">Vaccine</th>
                <th class="col">NIK</th>
                <th class="col">Alamat</th>
                <th class="col">No HP</th>
                <th class="col-md-2">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($patients as $patient)
            <tr>
                <th>{{$patient->id}}</th>
                <th>{{$patient->name}}</th>
                <td>{{$patient->vaccine->name}}</td>
                <td>{{$patient->nik}}</td>
                <td>{{$patient->alamat}}</td>
                <td>{{$patient->no_hp}}</td>
                <td>
                    <button type="button" data-bs-toggle="modal" data-bs-target="#editpatient{{$patient->id}}" class="btn btn-primary mr-5">Edit</button>
                    <button type="button" data-bs-toggle="modal" data-bs-target="#deletepatient{{$patient->id}}" class="btn btn-danger">Delete</button>
                </td>
            </tr>

             <!-- edit patient vaccine -->
            <div class="modal fade" id="editpatient{{$patient->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Patient</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="/patient/update/{{$patient->id}}" method="post">
                            @csrf
                            @method('patch')
                            <div class="modal-body">
                                <label for="basic-url" class="form-label">Vaccine Name</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" value="{{$patient->vaccine->name}}" disabled>
                                </div>

                                <label for="basic-url" class="form-label">Patient Name</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="name" value="{{$patient->name}}">
                                </div>

                                <label for="basic-url" class="form-label">NIK</label>
                                <div class="input-group mb-3">
                                    <input type="number" class="form-control" name="nik" value="{{$patient->nik}}">
                                </div>

                                <label for="basic-url" class="form-label">Alamat</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="alamat" value="{{$patient->alamat}}">
                                </div>

                                <label for="basic-url" class="form-label">Image</label>
                                <div class="input-group mb-3">
                                    <input type="file" class="form-control" name="image_ktp" value="{{$patient->image_ktp}}">
                                </div>

                                <label for="basic-url" class="form-label">No HP</label>
                                <div class="input-group mb-3">
                                    <input type="number" class="form-control" name="no_hp" value="{{$patient->no_hp}}">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

            <!-- delete patient vaccine -->
            <div class="modal fade" id="deletepatient{{$patient->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Vaccine</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="/patient/delete/{{$patient->id}}" method="post">
                            @csrf
                            @method('delete')
                            <div class="modal-body">
                                <h3>Are you sure delete?"{{$patient->name}}"</h3>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            @endforeach
        </tbody>
    </table>

    @else
    <div class="d-flex justify-content-center mt-3">
     no patient vaccines
    </div>
    @endif
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