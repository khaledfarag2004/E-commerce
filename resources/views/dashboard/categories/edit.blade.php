@extends('dashboard.layout.index')

@section('content')
    <div class="main">
        <div class="header">
            <h1>Edit Category</h1>
            <p>Update the form to edit category</p>
        </div>

        <form method="POST" action="">
            @method('PUT')
            @csrf

            <label>Name</label>
            <input type="text" name="name"
                   value="{{ old('name', $categorie->name) }}"
                   placeholder="Enter category name">

            <label>Status</label>
            <select name="status">
                <option value="1" {{ old('status', $categorie->status) == 1 ? 'selected' : '' }}>Active</option>
                <option value="0" {{ old('status', $categorie->status) == 0 ? 'selected' : '' }}>Inactive</option>
            </select>


            <button type="submit">Update Category</button>
        </form>

    </div>

    <style>
        body {
            margin: 0;
            font-family: 'Open Sans', sans-serif;
            background: #f4f6f9;
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

        form {
            background: #fff;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            max-width: 600px;
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #333;
        }
        input, select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 14px;
            transition: border 0.3s;
        }
        input:focus, select:focus {
            border-color: #2E7D32;
            outline: none;
        }

        button {
            background: #2E7D32;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
            transition: background 0.3s;
        }
        button:hover {
            background: #1B5E20;
        }
    </style>
@endsection
