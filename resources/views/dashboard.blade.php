@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Admin Dashboard</h1>
    
    <div class="row">
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-4" style="height: 150px;">
                <div class="card-header text-center">Total Products</div>
                <div class="card-body text-center">
                    <h5 class="card-title">{{ $totalProducts }}</h5>
                    <p class="card-text">Manage your products efficiently.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-info mb-4" style="height: 150px;">
                <div class="card-header text-center">Listing Page</div>
                <div class="card-body text-center d-flex align-items-center justify-content-center">
                    <a href="{{ route('products') }}" class="btn btn-light">Go to Listing</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-info mb-4" style="height: 150px;">
                <div class="card-header text-center">Add New Product</div>
                <div class="card-body text-center d-flex align-items-center justify-content-center">
                    <a href="{{ route('products.create') }}" class="btn btn-light">Add New Product</a>
                </div>
            </div>
        </div>
    </div>

    <h2 class="mt-5 mb-3">Recent Products</h2>
    <table class="table table-hover">
        <thead class="thead-dark">
            <tr>
                <th>Name</th>
                <th>Amount</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>${{ $product->amount }}</td>
                    <td>{{ Str::limit($product->description, 50) }}</td>
                    <td>
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
