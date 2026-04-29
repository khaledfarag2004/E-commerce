<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Fruitables - Register</title>
    <style>
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background: #f5fff5;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 420px;
            margin: 80px auto;
            background: #fff;
            border: 2px solid #4CAF50;
            border-radius: 12px;
            padding: 35px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
            color: #4CAF50;
            margin-bottom: 25px;
        }
        input[type="text"], input[type="password"], input[type="email"], input[type="phone"] {
            width: 100%;
            padding: 14px;
            margin: 12px 0;
            border: 1px solid #ccc;
            border-radius: 8px;
            transition: all 0.3s ease;
            font-size: 15px;
        }
        input:focus {
            border-color: #4CAF50;
            box-shadow: 0 0 8px rgba(76, 175, 80, 0.3);
            outline: none;
        }
        button {
            width: 100%;
            padding: 14px;
            background: linear-gradient(45deg, #FF9800, #e68900);
            border: none;
            border-radius: 8px;
            color: #fff;
            font-size: 17px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s ease;
        }
        button:hover {
            background: linear-gradient(45deg, #e68900, #d97706);
        }
        .link {
            text-align: center;
            margin-top: 20px;
        }
        .link a {
            color: #4CAF50;
            text-decoration: none;
            font-weight: bold;
        }
        .link a:hover {
            text-decoration: underline;
        }
    </style>

</head>
<body>
@extends('site.auth.layout.index')
@section('content')
<div class="container">

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


    <h2>Register</h2>
    <form method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="name" placeholder="Full Name" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="phone" name="phone" placeholder="Phone" required>
        <input type="text" name="address" placeholder="Address" required>
        <div class="mb-3">
            <label class="form-label">Image</label>
            <input type="file" name="avatar" class="form-control" >
        </div>
        <input type="password" name="password" placeholder="Password" required>
        <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
        <button type="submit">Register</button>
    </form>
    <br><br>
    <a href="{{ route('google.redirect') }}"
       style="display:block; text-align:center; background:#db4437; color:#fff; padding:12px; border-radius:8px; font-size:16px; font-weight:bold; text-decoration:none; margin-bottom:12px; transition:0.3s;">
        <i class="fab fa-google"></i> Register By Google
    </a>



    <div class="link">
        <p>Already have an account? <a href="{{ route('login') }}">Login</a></p>
    </div>
</div>
@endsection
</body>
</html>
