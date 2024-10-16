<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            display: flex;
            height: 100vh; /* Full viewport height */
        }
        .sidebar {
            width: 250px; /* Wider sidebar */
            background-color: #007bff;
            color: white;
            padding: 20px;
            height: 100%; /* Full height */
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        }
        .sidebar a {
            color: white;
            text-decoration: none;
            display: block;
            margin: 10px 0;
            padding: 10px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .sidebar a:hover {
            background-color: #0056b3;
        }
        .content {
            flex: 1;
            padding: 20px;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #fff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #007bff;
            color: #fff;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        img {
            border-radius: 5px;
        }
        .create-btn {
            display: block;
            width: 200px;
            margin: 20px auto;
            padding: 10px;
            text-align: center;
            background-color: #28a745;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .create-btn:hover {
            background-color: #218838;
        }
    </style>
    <script>
        function confirmDelete(event) {
            // Prevent the default form submission
            event.preventDefault();
            
            // Show confirmation dialog
            if (confirm("Are you sure you want to delete this product?")) {
                // If the user confirms, submit the form
                event.target.closest('form').submit();
            }
        }
    </script>
</head>
<body>
    <div class="sidebar">
        <h3>Dashboard</h3>
        <a href="{{ route('dashboard') }}">Dashboard</a>
        <a href="{{ route('products') }}">Product Listing</a>
        <a href="{{ route('products.create') }}">Add New Product</a>
    </div>
    <div class="content">
        <h2>Product List</h2>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Amount</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>${{ number_format($product->amount, 2) }}</td>
                        <td>{{ $product->description }}</td>
                        <td>
                            @if ($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" width="100">
                            @else
                                No Image
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('products.edit', $product->id) }}">Edit</a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="color: red; border: none; background: none; cursor: pointer;" onclick="confirmDelete(event)">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>




