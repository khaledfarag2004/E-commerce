@extends('dashboard.layout.index')
@section('content')
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


    <form action="{{ route('offers.store') }}" method="POST">
    @csrf
    <label>Offer Title</label>
    <input type="text" name="name" class="form-control">

    <label>Name Product</label>
    <select name="product_id" class="form-control">
        @foreach($products as $product)
            <option value="{{ $product->id }}">{{ $product->name }}</option>
        @endforeach
    </select>

    <label>Discount (%)</label>
        <input type="number" name="discount_percentage" class="form-control" step="0.01">

    <label>Start Date</label>
        <input type="date" name="start_date" class="form-control">

    <label>End Date</label>
        <input type="date" name="end_date" class="form-control">

    <button type="submit" class="btn btn-success mt-2">Save Offer</button>
</form>

    <style>
        form {
            background: #fff;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            max-width: 600px;
            margin: auto;
        }

        form label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
            color: #333;
        }

        form input,
        form select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 14px;
            background-color: #f9f9f9;
            transition: all 0.3s ease;
        }

        form input:focus,
        form select:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0,123,255,0.5);
            outline: none;
        }

        button {
            background: #28a745;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
            transition: background 0.3s ease;
        }

        button:hover {
            background: #218838;
        }

    </style>
@endsection
