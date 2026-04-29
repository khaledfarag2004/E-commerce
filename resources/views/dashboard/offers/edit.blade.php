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


    <div class="container">
        <h2>Edit Offer</h2>
        <form action="{{ route('offers.update', $offer->id) }}" method="POST">
            @csrf
            @method('PUT')

            <label>Offer Title</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $offer->name) }}">

            <label>Product</label>
            <select name="product_id" class="form-control">
                @foreach($products as $product)
                    <option value="{{ $product->id }}"
                        {{ $offer->product_id == $product->id ? 'selected' : '' }}>
                        {{ $product->name }}
                    </option>
                @endforeach
            </select>

            <label>Discount (%)</label>
            <input type="number" name="discount_percentage" class="form-control" step="0.01"
                   value="{{ old('discount_percentage', $offer->discount_percentage) }}">

            <label>Start Date</label>
            <input type="date" name="start_date" class="form-control"
                   value="{{ old('start_date', $offer->start_date) }}">

            <label>End Date</label>
            <input type="date" name="end_date" class="form-control"
                   value="{{ old('end_date', $offer->end_date) }}">

            <label>Status</label>
            <select name="status" class="form-control">
                <option value="1" {{ $offer->status == 1 ? 'selected' : '' }}>Active</option>
                <option value="0" {{ $offer->status == 0 ? 'selected' : '' }}>Expired</option>
            </select>


            <button type="submit" class="btn btn-success mt-2">Update Offer</button>
        </form>
    </div>

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
