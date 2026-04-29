<style>
body {
margin: 0;
font-family: 'Open Sans', sans-serif;
background: #f4f6f9;
}

/* Main Content */
.main {
margin-left: 220px;
padding: 20px;
}

/* Header */
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

/* Form */
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
input, textarea, select {
width: 100%;
padding: 10px;
margin-bottom: 15px;
border: 1px solid #ccc;
border-radius: 6px;
font-size: 14px;
transition: border 0.3s;
}
input:focus, textarea:focus, select:focus {
border-color: #2E7D32;
outline: none;
}

/* Buttons */
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


@extends('dashboard.layout.index')

@section('content')
    <div class="main">
        <div class="header">
            <h1>Add New Product</h1>
            <p>Fill in the form to add a new product</p>
        </div>

        <form action="{{ route('products.store') }}" method="POST"
              style="background:#fff;padding:25px;border-radius:8px;box-shadow:0 2px 5px rgba(0,0,0,0.1);max-width:600px;" enctype="multipart/form-data">
            @csrf

            <!-- Product Name -->
            <label style="display:block;margin-bottom:8px;font-weight:bold;color:#333;">Name</label>
            <input type="text" name="name" value="{{ old('name') }}"
                   style="width:100%;padding:10px;margin-bottom:15px;border:1px solid #ccc;border-radius:6px;">

            <!-- Price -->
            <label style="display:block;margin-bottom:8px;font-weight:bold;color:#333;">Price</label>
            <input type="number" name="price" step="0.01" value="{{ old('price') }}"
                   style="width:100%;padding:10px;margin-bottom:15px;border:1px solid #ccc;border-radius:6px;">

            <label>Image</label>
            <input type="file" name="image">

            <!-- Description -->
            <label style="display:block;margin-bottom:8px;font-weight:bold;color:#333;">Description</label>
            <textarea name="description" rows="3"
                      style="width:100%;padding:10px;margin-bottom:15px;border:1px solid #ccc;border-radius:6px;">{{ old('description') }}</textarea>


            <label>Category</label>
            <select name="category_id"
                    style="width:100%;padding:10px;margin-bottom:15px;border:1px solid #ccc;border-radius:6px;">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>




            <!-- Status -->
            <label style="display:block;margin-bottom:8px;font-weight:bold;color:#333;">Status</label>
            <select name="status"
                    style="width:100%;padding:10px;margin-bottom:15px;border:1px solid #ccc;border-radius:6px;">
                <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Active</option>
                <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Inactive</option>
            </select>

            <button type="submit"
                    style="background:#2E7D32;color:#fff;border:none;padding:10px 20px;border-radius:6px;cursor:pointer;font-weight:bold;">
                Save Product
            </button>
        </form>
    </div>
@endsection
