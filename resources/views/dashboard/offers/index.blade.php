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
            <h1>Offers List</h1>
            <p>Manage your offers</p>
        </div>
        <a href="{{ route('offers.create') }}">
            <button class="btn btn-edit">Add Offers</button>
        </a>

        <table>
            <tr>
                <th>ID</th>
                <th>Name Of Offers</th>
                <th>Product Name</th>
                <th>Discount Percentage</th>
                <th>Status</th>
                <th>start_date</th>
                <th>end_date</th>

                <th>Actions</th>
            </tr>
            @foreach($offers as $offer)
                <tr>
                    <td>{{ $offer->id }}</td>
                    <td>{{ $offer->name }}</td>
                    <td>{{ $offer->product->name }}</td>
                    <td>{{ $offer->discount_percentage }}</td>
                    @if( $offer->status == 1 )
                        <td class="status-active">Active</td>
                        @else
                        <td class="status-inactive">Disactive</td>
                    @endif
                    <td>{{ $offer->start_date }}</td>
                    <td>{{ $offer->end_date }}</td>

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
                        .stars {
                            display: flex;
                            gap: 4px;
                        }

                        .star {
                            font-size: 22px;
                            color: #ccc; /* لون النجمة الفاضية */
                        }

                        .star.filled {
                            color: gold; /* لون النجمة الممتلئة */
                        }

                    </style>

                    <td>
                        <!-- Edit -->
                        <a href="{{ route('offers.edit', $offer->id) }}">
                            <button class="btn btn-edit">Edit</button>
                        </a>

                        <!-- Delete -->
                        <form action="{{ route('offers.destroy', $offer->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-delete">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
</body>
