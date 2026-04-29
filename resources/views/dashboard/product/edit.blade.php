<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Product</title>
    <style>
        .main {
            margin-left: 220px;
            padding: 20px;
        }

        .header {
            background: #fff;
            padding: 15px 25px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            margin-bottom: 25px;
        }
        .header h1 {
            color: #2E7D32;
            margin: 0;
        }
        .header p {
            color: #555;
            margin: 5px 0 0;
        }

        .form-box {
            background: #fff;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            max-width: 600px;
        }
        .form-box label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #333;
        }
        .form-box input,
        .form-box textarea,
        .form-box select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 14px;
            transition: border 0.3s;
        }
        .form-box input:focus,
        .form-box textarea:focus,
        .form-box select:focus {
            border-color: #2E7D32;
            outline: none;
        }
        .btn-update {
            background: #FF9800;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
            transition: background 0.3s;
        }
        .btn-update:hover {
            background: #e68900;
        }

    </style>
</head>
<body>

    @extends('dashboard.layout.index')

    @section('content')

        <div class="main">
            @csrf
            @if ($errors->any())
                <div class="alert alert-danger p-2">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif



            <div class="header">
                <h1>Edit Product</h1>
                <p>Update the product information</p>
            </div>

            <form class="form-box" method="POST" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <!-- Product Name -->
                <label>Name</label>
                <input type="text" name="name" value=" {{ old('name', $product->name) }}">

                <!-- Price -->
                <label>Price</label>
                <input type="number" name="price" step="0.01" value="{{ old('price', $product->price) }}">

                <label>image</label>
                <input type="file" name="image">

                <!-- Description -->
                <label>Description</label>
                <textarea name="description" rows="3"> {{ old('description', $product->description) }}</textarea>

                <!-- Category -->
                <label>Category</label>
                <select name="category_id">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ old('category_id', $category->category_id) == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                <!-- Status -->
                <label>Status</label>
                <select name="status">
                    <option value="1" selected>Active</option>
                    <option value="0">Inactive</option>
                </select>

                <button type="submit" class="btn-update">Update Product</button>
            </form>
        </div>
    @endsection

</div>
</body>
</html>
