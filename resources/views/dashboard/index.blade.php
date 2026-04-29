<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Fruitables - Dashboard</title>
    <style>
        body {
            margin: 0;
            font-family: 'Open Sans', sans-serif;
            background: #f4f6f9;
        }
        .sidebar {
            width: 220px;
            height: 100vh;
            background: #2E7D32; /* أخضر غامق */
            color: #fff;
            position: fixed;
            top: 0;
            left: 0;
            padding: 20px 0;
        }
        .sidebar h2 {
            text-align: center;
            margin-bottom: 30px;
            font-size: 22px;
            color: #FFEB3B; /* أصفر */
        }
        .sidebar a {
            display: block;
            color: #fff;
            text-decoration: none;
            padding: 12px 20px;
            margin: 5px 0;
            transition: background 0.3s;
        }
        .sidebar a:hover {
            background: #1B5E20;
        }
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
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .header h1 {
            color: #2E7D32;
            margin: 0;
        }
        .stats {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }
        .card {
            background: #fff;
            border-radius: 8px;
            padding: 20px;
            text-align: center;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .card h3 {
            color: #FF9800;
            margin-bottom: 10px;
        }
        .card p {
            font-size: 18px;
            font-weight: bold;
            color: #333;
        }
        .products {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            gap: 20px;
        }
        .product-card {
            background: #fff;
            border-radius: 8px;
            padding: 15px;
            text-align: center;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .product-card img {
            width: 100%;
            height: 150px;
            object-fit: cover;
            border-radius: 6px;
            margin-bottom: 10px;
        }
        .product-card h4 {
            color: #2E7D32;
            margin: 10px 0;
        }
        .product-card p {
            color: #555;
            font-size: 14px;
        }
    </style>
</head>
<div>

@extends('dashboard.layout.index')
@section('content')

<div class="main">
    <div class="header">
        <h1>Dashboard</h1>
        <p>Welcome, {{ auth()->user()->name  }}</p>
    </div>

    <div class="stats">
        <div class="card">
            <h3>Total Users</h3>
            <p>{{ $total_users }}</p>
        </div>
        <div class="card">
            <h3>Total Products</h3>
            <p>{{ $total_products }}</p>
        </div>
        <div class="card">
            <h3>Total Offers</h3>
            <p>{{ $total_offers }}</p>
        </div>
        <div class="card">
            <h3>Revenue</h3>
            <p>$12,500</p>
        </div>
    </div>

    <h2>Latest Products</h2>

    <div class="products">
        @foreach($products as $product)
        <div class="product-card">
            <img src="{{ Str::startsWith($product->image, 'img/')
    ? asset($product->image)
    : asset('storage/'.$product->image) }}"  style="width:80px; height:80px; object-fit:cover; border-radius:8px; border:2px solid #4CAF50;">

            <h4>{{ $product->name }}</h4>
            <p>Category:{{ $product->category ? $product->category->name : 'No Category' }}
            </p>
            <p>Status:</p>
            @if($product->status == 1)
                <span class="status-active">Active</span>
            @else
                <span class="status-inactive">Disactive</span>
            @endif

            <style>
                .status-active {
                    color: green;        /* أخضر */
                    font-size: 15px;     /* كبير */
                    font-weight: bold;   /* طخين */
                }

                .status-inactive {
                    color: red;          /* أحمر */
                    font-size: 15px;     /* كبير */
                    font-weight: bold;   /* طخين */
                }
            </style>

            <h5>{{ $product->description }}</h5>

        </div>
        @endforeach
    </div>
</div>

@endsection
</body>
</html>
