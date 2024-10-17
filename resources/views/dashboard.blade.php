@extends('layouts.app')

@section('content')
<div class="container-fluid mt-5">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3 sidebar">
            <h3>Dashboard</h3>
            <ul>
                <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li><a href="{{ route('products') }}">Product Listing</a></li>
                <li><a href="{{ route('products.create') }}">Add New Product</a></li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="col-md-9 main-content">
            <h1 class="text-center mb-4">Admin Dashboard</h1>
            
            <div class="row">
                <div class="col-md-4">
                    <div class="card text-white bg-primary mb-4" style="height: 200px; border-radius: 10px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);">
                        <div class="card-header text-center" style="border-bottom: 2px solid #fff;">Total Products</div>
                        <div class="card-body text-center">
                            <h5 class="card-title" style="font-size: 2rem;">{{ $totalProducts }}</h5>
                            <p class="card-text">Manage your products efficiently.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-white bg-info mb-4" style="height: 200px; border-radius: 10px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);">
                        <div class="card-header text-center" style="border-bottom: 2px solid #fff;">Listing Page</div>
                        <div class="card-body text-center d-flex align-items-center justify-content-center">
                            <a href="{{ route('products') }}" class="btn btn-light">Go to Listing</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-white bg-success mb-4" style="height: 200px; border-radius: 10px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);">
                        <div class="card-header text-center" style="border-bottom: 2px solid #fff;">Add New Product</div>
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
    </div>
</div>

<style>
    body {
        height: 100vh; /* Full screen height */
        margin: 0;
        background: linear-gradient(to right, #6a11cb, #2575fc); /* Gradient background */
        color: #333; /* Default text color */
    }
    .sidebar {
        background-color: #343a40; /* Dark sidebar */
        color: white;
        padding: 15px;
        height: 100%; /* Full height of the viewport */
        position: fixed; /* Fixed to the left */
        left: 0;
        top: 0;
    }
    .sidebar h3 {
        margin-bottom: 20px;
        color: #fff;
    }
    .sidebar ul {
        list-style: none;
        padding: 0;
    }
    .sidebar ul li {
        margin: 15px 0;
    }
    .sidebar a {
        color: #fff;
        text-decoration: none;
        padding: 10px 15px;
        display: block;
        border-radius: 5px;
        transition: background 0.3s;
    }
    .sidebar a:hover {
        background: rgba(255, 255, 255, 0.1);
    }
    .main-content {
        margin-left: 25%; /* Adjusted to account for sidebar width */
        padding: 15px;
    }
    .card {
        transition: transform 0.3s;
    }
    .card:hover {
        transform: scale(1.05);
    }
    .table {
        background-color: #fff; /* White table background */
        border-radius: 8px;
        overflow: hidden; /* Rounded corners for table */
    }
    .thead-dark th {
        background-color: #343a40; /* Dark table header */
        color: white;
    }
</style>

@endsection








