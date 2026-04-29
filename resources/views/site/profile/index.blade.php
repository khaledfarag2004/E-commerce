<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Fruitables - Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background: #f0fdf4;
            margin: 0;
            padding: 0;
        }
        header {
            background: linear-gradient(90deg, #4CAF50, #2e7d32);
            padding: 15px 30px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            color: #fff;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
        header a.logo {
            color: #fff;
            font-size: 24px;
            font-weight: bold;
            text-decoration: none;
        }
        header nav a {
            color: #fff;
            margin-left: 20px;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s;
        }
        header nav a:hover {
            color: #FF9800;
        }
        .profile-container {
            width: 90%;
            margin: 40px auto;
            background: #fff;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 6px 20px rgba(0,0,0,0.1);
        }
        .profile-header {
            display: flex;
            align-items: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #4CAF50;
            padding-bottom: 20px;
        }
        .profile-header img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            border: 3px solid #4CAF50;
            margin-right: 20px;
        }
        .profile-details h2 {
            margin: 0;
            color: #4CAF50;
            font-weight: bold;
        }
        .profile-details p {
            margin: 5px 0;
            font-size: 15px;
            color: #555;
        }
        .products-grid {
            margin-top: 30px;
        }
        .card {
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
        }
        .btn-view {
            background: #FF9800;
            border: none;
            border-radius: 20px;
            padding: 8px 15px;
            color: #fff;
            font-weight: bold;
            transition: background 0.3s;
        }
        .btn-view:hover {
            background: #e68900;
        }
    </style>
</head>
<body>

<header>
    <a href="{{ route('home') }}" class="logo">Fruitables</a>
    <nav>
        <a href="#">Home</a>
        <a href="#">Logout</a>
    </nav>
</header>

<div class="profile-container">
    <div class="profile-header">
        <img
            src="{{ $user->avatar
        ? asset('storage/' . $user->avatar)
        : asset('storage/avatars/default.webp') }}"
            style="width:200px; height:200px; object-fit:cover; border-radius:8px; border:2px solid #4CAF50;">
        <div class="profile-details">
            <h2>{{ auth()->user()->name }}</h2>
            <p><strong>Address:</strong> {{ auth()->user()->address }}</p>
            <p><strong>Phone:</strong> {{ auth()->user()->phone }}</p>
            <p><strong>Email:</strong> {{ auth()->user()->email }}</p>
            <p><strong>Role:</strong> {{ auth()->user()->role->name }}</p>
        </div>
    </div>

    <h2 class="mb-4">My Products..</h2>

    <div class="row products-grid">
        @forelse($products as $product)
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="card h-100 shadow-sm">
                    <img src="{{ Str::startsWith($product->image, 'img/')
    ? asset($product->image)
    : asset('storage/'.$product->image) }}"  style="width:100%; height:200px; object-fit:cover; border-radius:8px; border:2px solid #4CAF50;">

                    <div class="card-body text-center">
                        <h4 class="card-title">{{ $product->name }}</h4>
                        <p class="text-muted">{{ Str::limit($product->description, 80) }}</p>
                        <a href="{{ route('products.show', $product->id) }}" class="btn-view">View</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info">No Product..📭</div>
            </div>
        @endforelse
    </div>
</div>

</body>
</html>
