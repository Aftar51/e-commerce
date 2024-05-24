@extends('layouts.parent')

@section('title', 'Transition')

@section('content')

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Transaction</h5>

            <nav class="">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashbord') }}">Dashbord</a></li>
                    <li class="breadcrumb-item"><a href="#">Transaction</a></li>
                    <li class="breadcrumb-item active">Transaction</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="card-title"><i class="bi bi-cart"></i> List Transaction</div>

            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name Account</th>
                        <th>Reciever Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Total Price</th>
                        <th>payment URL</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($transaction as $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $row->user->name }}</td>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->email }}</td>
                            <td>{{ $row->phone }}</td>
                            <td>{{ $row->total_price }}</td>
                            <td><a href="{{ $row->payment_url }}">MIDTRANS</a></td>
                            <td>
                                @if ($row->status == 'EXPIRED')
                                    <span class="badge bg-danger text-uppercase">EXPIRED</span>
                                @elseif ($row->status == 'PENDING')
                                    <span class="badge bg-warning text-uppercase">PENDING</span>
                                @elseif ($row->status == 'SETTLEMENT')
                                    <span class="badge bg-info text-uppercase">SETTLEMENT</span>
                                @else
                                    <span class="badge bg-success text-uppercase">SUCCESS</span>
                                @endif
                            </td>
                            <td>
                                <a href="" class="btn btn-info"><i class="bi bi-image"></i></a>
                            </td>
                        </tr>
                    @empty
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection
