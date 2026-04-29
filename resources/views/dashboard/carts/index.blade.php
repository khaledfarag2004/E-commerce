
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Fruitables - Users</title>
    <style>
        body {
            margin: 0;
            font-family: 'Open Sans', sans-serif;
            background: #f4f6f9;
        }

        /* Sidebar */
        .sidebar {
            width: 220px;
            height: 100vh;
            background: #2E7D32;
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
            color: #FFEB3B;
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

        /* Main Content */
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

        /* Table */
        table {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        th, td {
            padding: 14px;
            text-align: center;
            font-size: 15px;
        }
        th {
            background: #2E7D32;
            color: #fff;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        tr:nth-child(even) {
            background: #f9f9f9;
        }
        tr:hover {
            background: #e8f5e9;
            transition: background 0.3s;
        }

        /* Buttons */
        .btn {
            padding: 8px 14px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 14px;
            font-weight: bold;
            transition: all 0.3s;
        }
        .btn-edit {
            background: #FF9800;
            color: #fff;
        }
        .btn-edit:hover {
            background: #e68900;
        }
        .btn-delete {
            background: #e53935;
            color: #fff;
        }
        .btn-delete:hover {
            background: #c62828;
        }
    </style>
</head>
<body>
@extends('dashboard.layout.index')

@section('content')
    <div class="main">
        <div class="header">
            <h1>Carts List</h1>
            <p>Manage your carts</p>
        </div>

        <table>
            <tr>
                <th>ID</th>
                <th>Name Product</th>
                <th>price</th>
                <th>Name User</th>
                <th>quantity</th>
                <th>Created at</th>
                <th>Updated at</th>
            </tr>
            @foreach($carts as $cart)
                <tr>
                    <td>{{ $cart->id }}</td>
                    <td>{{ $cart->product->name }}</td>
                    <td>{{ $cart->product->price }}</td>
                    <td>{{ $cart->cart->user->name }}</td>
                    <td>{{ $cart->quantity }}</td>
                    <td>{{ $cart->created_at }}</td>
                    <td>{{ $cart->updated_at }}</td>
                    <style>
                        .status-active {
                            color: green;        /* أخضر */
                            font-size: 15px;     /* كبير */
                            font-weight: bold;   /* طخين */
                            text-align: center;  /* في النص */
                        }

                        .status-inactive {
                            color: red;          /* أحمر */
                            font-size: 15px;     /* كبير */
                            font-weight: bold;   /* طخين */
                            text-align: center;  /* في النص */
                        }
                    </style>


                </tr>
            @endforeach
        </table>
    </div>
@endsection
</body>
