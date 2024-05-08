@extends('layouts.parent')

@section('title', 'Dashbord')

@section('content')
    Hello {{ Auth::user()->name }}
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Dashbord</h5>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><i class="bi bi-house-door"></i></a></li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
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
        <div class="col-md-4">
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
        <div class="col-md-4">
            <div class="card info-card sales-card">
                <div class="card-body">
                    <h5 class="card-title">User</h5>
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bxs-user-rectangle"></i>
                        </div>
                        <div class="ps-3">
                            <h6>{{ $user }}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section dashboard">
        <div class="row">

        </div>
    </div>

@endsection
