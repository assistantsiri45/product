<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            display: flex;
            height: 100vh; /* Full height */
        }
        .sidebar {
            width: 250px; /* Increased width */
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
            display: flex;
            align-items: center; /* Center vertically */
            justify-content: center; /* Center horizontally */
        }
        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px; /* Space below the heading */
        }
        form {
            background-color: #fff;
            border-radius: 5px;
            padding: 40px; /* Increased padding */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            max-width: 700px; /* Increased max width */
            width: 100%; /* Full width */
            margin: auto;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"],
        input[type="number"],
        textarea,
        input[type="file"] {
            width: 100%;
            padding: 12px; /* Increased padding */
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
            margin-bottom: 15px;
        }
        button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 12px; /* Increased padding */
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            font-size: 16px; /* Increased font size */
        }
        button:hover {
            background-color: #0056b3;
        }
        .error {
            color: red;
            font-size: 0.9em;
            margin-top: -10px;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h3>Dashboard</h3>
        <a href="{{ route('dashboard') }}">Dashboard</a>
        <a href="{{ route('products') }}">Product Listing</a>
        <a href="{{ route('products.create') }}">Add New Product</a>
    </div>
    <div class="content">
        <form method="POST" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <h2>Edit Product</h2>

            <label>Name</label>
            <input type="text" name="name" value="{{ old('name', $product->name) }}" required>
            @error('name') <div class="error">{{ $message }}</div> @enderror

            <label>Amount</label>
            <input type="number" name="amount" value="{{ old('amount', $product->amount) }}" step="0.01" required>
            @error('amount') <div class="error">{{ $message }}</div> @enderror

            <label>Description</label>
            <textarea name="description" rows="4" required>{{ old('description', $product->description) }}</textarea>
            @error('description') <div class="error">{{ $message }}</div> @enderror

            <label>Image (optional)</label>
            <input type="file" name="image">
            @error('image') <div class="error">{{ $message }}</div> @enderror

            <button type="submit">Update Product</button>
        </form>
    </div>
</body>
</html>
