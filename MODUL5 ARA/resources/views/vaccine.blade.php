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
<div class="container mt-3">
    <div class="d-flex justify-content-center">
        <h3>List Vaccine</h3>
    </div>

    <div class="d-flex justify-content-center">
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addvaccine">
            Add Vaccine
        </button>
    </div>

    @if ($vaccines->isNotEmpty())
    <table class="table table-striped mt-3">
        <thead class="table-dark">
            <tr>
                <th class="col-md-1">#</th>
                <th class="col">Name</th>
                <th class="col-md-3">Image</th>
                <th class="col-md-3">Price</th>
                <th class="col-md-2">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($vaccines as $vaccine)
            <tr>
                <th>{{$vaccine->id}}</th>
                <td>{{$vaccine->name}}</td>
                <td>{{$vaccine->image}}</td>
                <td>{{$vaccine->price}}</td>
                <td>
                    <button type="button" data-bs-toggle="modal" data-bs-target="#editvaccine{{$vaccine->id}}" class="btn btn-success mr-5">Edit</button>
                    <button type="button" data-bs-toggle="modal" data-bs-target="#deletevaccine{{$vaccine->id}}" class="btn btn-danger">Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <div class="d-flex justify-content-center mt-3">
        Theres no data vaccine yet.
    </div>
    @endif

    {{-- modal add vaccine --}}
    <div class="modal fade" id="addvaccine" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Vaccine</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/vaccine" method="post">
                    @csrf
                    <div class="modal-body">
                        <label for="basic-url" class="form-label">Vaccine Name</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="name">
                        </div>

                        <label for="basic-url" class="form-label">Price</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Rp</span>
                            <input type="number" class="form-control" name="price">
                        </div>

                        <label for="basic-url" class="form-label">Description</label>
                        <div class="input-group mb-3">
                            <input type="textarea" class="form-control" name="description">
                        </div>

                        <label for="basic-url" class="form-label">Image</label>
                        <div class="input-group mb-3">
                            <input type="file" class="form-control" name="image">
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

    @foreach ($vaccines as $vaccine)
    {{-- modal edit vaccine --}}
    <div class="modal fade" id="editvaccine{{$vaccine->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Vaccine</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/vaccine/update/{{$vaccine->id}}" method="post">
                    @csrf
                    @method('patch')
                    <div class="modal-body">
                        <label for="basic-url" class="form-label">Vaccine Name</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="name" value="{{$vaccine->name}}">
                        </div>

                        <label for="basic-url" class="form-label">Price</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Rp</span>
                            <input type="number" class="form-control" name="price" value="{{$vaccine->price}}">
                        </div>

                        <label for="basic-url" class="form-label">Description</label>
                        <div class="input-group mb-3">
                            <input type="textarea" class="form-control" name="description" value="{{$vaccine->description}}">
                        </div>

                        <label for="basic-url" class="form-label">Image</label>
                        <div class="input-group mb-3">
                            <input type="file" class="form-control" name="image">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    {{-- modal delete vaccine --}}
    <div class="modal fade" id="deletevaccine{{$vaccine->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Vaccine</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/vaccine/delete/{{$vaccine->id}}" method="post">
                    @csrf
                    @method('delete')
                    <div class="modal-body">
                        <h3>Are you sure delete "{{$vaccine->name}}"</h3>
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
</div>