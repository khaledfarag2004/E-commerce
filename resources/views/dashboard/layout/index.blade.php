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
<body>
<div class="sidebar">
    <h2><a href="{{ route('home') }}">Fruitables</a></h2>
    <a href="{{ route('dashboard') }}">Dashboard</a>
    <a href="{{ route('users') }}">Users</a>
    <a href="{{ route('roles') }}">Roles</a>
    <a href="{{ route('products') }}">Products</a>
    <a href="{{ route('categories') }}">Caterories</a>
    <a href="{{ route('admin.cart') }}">Carts</a>
    <a href="{{ route('offers') }}">Offers</a>
    <a href="{{ route('reviews') }}">Review</a>
    <a href="{{ route('admin.logout') }}">Logout</a>
</div>
@yield('content')

</body>
</html>
