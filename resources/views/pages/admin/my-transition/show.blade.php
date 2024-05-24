@extends('layouts.parent')

@section('title', 'My Transaction')

@section('content')

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">My Transaction</h5>

            <nav>
                <ol class="breadcrumb">
                    @if (Auth::user()->role == 'admin')
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashbord') }}">Dashbord</a></li>
                    @else
                        <li class="breadcrumb-item"><a href="{{ route('user.dashbord') }}">Dashbord</a></li>
                    @endif
                    <li class="breadcrumb-item"><a href="#">Transaction</a></li>
                    <li class="breadcrumb-item active">My Transaction</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="card-title">Detail Transaction</div>

            <!-- Table with stripped rows -->
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Name Account</th>
                        <th>Name</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>1</th>
                        <td>brandon jacob</td>
                    </tr>
                </tbody>
            </table>
            <!-- End Table with stripped rows -->

        </div>
    </div>

@endsection
