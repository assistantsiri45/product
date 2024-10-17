<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Product</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
        }
        .sidebar {
            width: 250px; /* Width of the sidebar */
            background-color: #343a40; 
            color: white;
            padding: 20px; 
            box-shadow: 2px 0 5px rgba(0,0,0,0.1);
            margin-right: 20px; 
        }
        .sidebar h3 {
            margin-top: 0;
        }
        .sidebar a {
            color: white;
            text-decoration: none;
            display: block;
            margin: 10px 0;
            padding: 10px; /* Padding for links */
        }
        .sidebar a:hover {
            background-color: #495057; /* Change background on hover */
        }
        .content {
            flex-grow: 1; /* Take the remaining space */
            padding: 20px;
            height: 100vh; /* Full height */
            overflow-y: auto; /* Scroll if needed */
        }
        h2 {
            text-align: center;
            color: #333;
        }
        form {
            background-color: #fff;
            border-radius: 5px;
            padding: 30px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: auto;
        }
        div {
            margin-bottom: 15px;
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
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
        }
        button {
            background-color: #28a745;
            color: #fff;
            border: none;
            padding: 15px;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }
        button:hover {
            background-color: #218838;
        }
        .error {
            color: red;
            font-size: 0.9em;
        }
        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            z-index: 1000;
            justify-content: center;
            align-items: center;
        }
        .popup {
            background-color: #007bff;
            color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
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
        <h2>Create Product</h2>

        @if ($errors->any())
            <div class="error" style="margin-bottom: 15px;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div id="overlay" class="overlay">
            <div class="popup">Product created successfully!</div>
        </div>

        <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data" onsubmit="showPopup(event)">
            @csrf
            <div>
                <label for="name">Product Name</label>
                <input type="text" name="name" value="{{ old('name') }}" required>
                @error('name')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label for="amount">Amount</label>
                <input type="number" step="0.01" name="amount" value="{{ old('amount') }}" required>
                @error('amount')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label for="description">Description</label>
                <textarea name="description" rows="5" required>{{ old('description') }}</textarea>
                @error('description')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label for="image">Image (optional)</label>
                <input type="file" name="image" accept="image/*">
                @error('image')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit">Create Product</button>
        </form>
    </div>

    <script>
        function showPopup(event) {
           
            event.preventDefault();

          
            const overlay = document.getElementById('overlay');
            overlay.style.display = 'flex';

            setTimeout(() => {
                overlay.style.display = 'none'; 
                event.target.submit(); 
            }, 2000); 
        }
    </script>
</body>
</html>









