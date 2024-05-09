@extends('layouts.parent')

@section('title', 'Product')

@section('content')

<div class="card">
    <div class="card-body">
        <h5 class="card-title">Product</h5>

        <nav class="">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashbord') }}">Dashbord</a></li>
                <li class="breadcrumb-item"><a href="#">Product</a></li>
                <li class="breadcrumb-item active">Data Product</li>
            </ol>
        </nav>

        {{-- Button Modal Crate Product --}}
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModalProduct">
            <i class="bi bi-plus"></i>
            Add Product
        </button>
        @include('pages.user.product.modal-create')

        <!-- Table with stripped rows -->
        <table class="table datatable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>description</th>
                    <th>price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($product as $row)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->category->name }}</td>
                        <td>{{ Str::limit(strip_tags($row->description)) }}</td>
                        <td>Rp{{ $row->price }}</td>
                        <td>
                            <a href="{{ route('admin.product.gallery.index', $row->id) }}" class="btn btn-info">
                                <i class="bi bi-card-image"></i>
                            </a>
                            <a class="btn btn-warning" data-bs-toggle="modal"
                                data-bs-target="#editModalProduct{{ $row->id }}">
                                <i class="bi bi-pencil"></i>
                            </a>
                            @include('pages.user.product.modal-edit')
                            <form action="{{ route('admin.product.destroy', $row->id) }}" method="post"
                                class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">Data Is Empty</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

    </div>
</div>
@endsection