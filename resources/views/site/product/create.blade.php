
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Product - Fruitables</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f5fff5;
            font-family: 'Segoe UI', Arial, sans-serif;
        }
        .card {
            border-radius: 12px;
            box-shadow: 0 6px 15px rgba(0,0,0,0.1);
        }
        .card-header {
            background: linear-gradient(90deg, #4CAF50, #2e7d32);
            color: #fff;
            font-weight: bold;
            font-size: 18px;
            border-radius: 12px 12px 0 0;
        }
        .btn-submit {
            background: #FF9800;
            border: none;
            border-radius: 8px;
            padding: 10px 20px;
            font-weight: bold;
            color: #fff;
            transition: background 0.3s;
        }
        .btn-submit:hover {
            background: #e68900;
        }
    </style>
</head>
<body>
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


<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card">
                <div class="card-header text-center">
                    🛒 Add New Product
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('products.user.store') }}" enctype="multipart/form-data">
                        <!-- Product Name -->
                        <div class="mb-3">
                            <label class="form-label">Product Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter product name">
                        </div>

                        <!-- Price -->
                        <div class="mb-3">
                            <label class="form-label">Price</label>
                            <input type="number" name="price" class="form-control" step="0.01" placeholder="Enter product price">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Image</label>
                            <input type="file" name="image" class="form-control" >
                        </div>
                        <!-- Description -->
                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea class="form-control" name="description" rows="3" placeholder="Enter product description"></textarea>
                        </div>

                        <!-- Category -->
                        <div class="mb-3">
                            <label class="form-label">Category</label>
                                <select name="category_id" class="form-select">
                                    <option selected disabled>Choose category</option>
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}">
                                        {{ $category->name }}
                                    </option>
                                    @endforeach
                                </select>
                        </div>

                        <!-- Status -->
                        <div class="mb-3">
                            <label class="form-label fw-bold text-success">Status</label>
                            <select name="status" class="form-select border-success">
                                <option selected disabled>Choose status</option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>


                        <!-- Submit Button -->
                        <div class="text-center">
                            <button type="submit" class="btn-submit">Publish Product</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
