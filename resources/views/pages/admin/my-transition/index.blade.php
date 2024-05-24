@extends('layouts.parent')

@section('title', 'My Transition')

@section('content')

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">My Transaction</h5>

            <nav class="">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashbord') }}">Dashbord</a></li>
                    <li class="breadcrumb-item"><a href="#">Transaction</a></li>
                    <li class="breadcrumb-item active">My Transaction</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="card-title"><i class="bi bi-cart"></i> List Transaction</div>

            <table class="table table-stripedtable-hover table-bordered datatable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name Account</th>
                        <th>Reciever Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Status</th>
                        <th>Total Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($myTransaction as $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $row->user->name }}</td>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->user->email }}</td>
                            <td>{{ $row->phone }}</td>
                            <td>
                                @if ($row->status == 'EXPIRED')
                                    <span class="badge bg-danger">EXPIRED</span>
                                @elseif ($row->status == 'PENDING')
                                    <span class="badge bg-warning">PENDING</span>
                                @elseif ($row->status == 'SETTLEMENT')
                                    <span class="badge bg-info">SETTLEMENT</span>
                                @else
                                    <span class="badge bg-success">SUCCESS</span>
                                @endif
                            </td>
                            <td>Rp.{{ $row->total_price }}</td>
                            <td>
                                @if (Auth::user()->role == 'admin')
                                    <a href="{{ route('admin.my-transition.show', $row->name) }}" class="btn btn-info btn-sm"><i
                                            class="bi bi-eye"></i></a> Details
                                @else
                                    <a href="{{ route('user.my-transition.show', $row->name) }}" class="btn btn-info btn-sm"><i
                                            class="bi bi-eye"></i></a> Details
                                @endif
                            </td>
                        </tr>
                    @empty
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection
