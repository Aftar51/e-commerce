@extends('layouts.parent')

@section('title', 'Dashbord')

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Dashbord {{ Auth::user()->name }}</h5>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><i class="bi bi-house-door"></i></a></li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="section dashboard">
        <div class="row">
            <div class="col-md-6">
                <div class="card info-card sales-card">
                    <div class="card-body">
                        <h5 class="card-title">Category</h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-cart"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ $category }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card info-card sales-card">
                    <div class="card-body">
                        <h5 class="card-title">Product</h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-cart-check-fill"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ $product }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card info-card sales-card">
                <div class="card-body">
                    <h5 class="card-title">User</h5>
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-file-person-fill"></i>
                        </div>
                        <div class="ps-3">
                            <h6>{{ $user }}</h6>
                        </div>
                    </div>
                </div>
                <table class="table md-2">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Email</th>
                            <th>Reset</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
