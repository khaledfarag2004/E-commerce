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
            <div class="header">
                <h1>Edit Role</h1>
                <p>Update the Role information</p>
            </div>

            <form class="form-box" method="POST" action="{{ route('roles.update', $role->id) }}">
                @csrf
                @method('PUT')
                <!-- Product Name -->
                <label>Name</label>
                <input type="text" name="name" value=" {{ old('name', $role->name) }}">
                <select name="status">
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>

                <!-- Status -->
                <button type="submit" class="btn-update">Update Product</button>
            </form>
        </div>
    @endsection

</div>
</body>
</html>
