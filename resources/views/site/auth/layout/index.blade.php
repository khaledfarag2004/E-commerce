<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Fruitables - Auth</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5fff5;
            margin: 0;
            padding: 0;
        }
        header {
            background: #4CAF50;
            padding: 15px 30px;
            display: flex;
            align-items: center;
        }
        header a.logo {
            color: #fff;
            font-size: 22px;
            font-weight: bold;
            text-decoration: none;
        }
    </style>
</head>
<body>
<header>
    <a href="{{ route('home') }}" class="logo">Fruitables</a>
</header>

@yield('content')

</body>
</html>
