@extends('layouts.parent')

@section('title', 'Dashbord')

@section('content')
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

    Hello {{ Auth::user()->name }}
@endsection
