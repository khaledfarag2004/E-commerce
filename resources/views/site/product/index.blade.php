<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Fruitables - Product</title>
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
            justify-content: space-between;
        }
        header a.logo {
            color: #fff;
            font-size: 22px;
            font-weight: bold;
            text-decoration: none;
        }
        header nav a {
            color: #fff;
            margin-left: 20px;
            text-decoration: none;
            font-weight: bold;
        }
        .profile-container {
            width: 80%;
            margin: 40px auto;
            background: #fff;
            border: 2px solid #4CAF50;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }
        .profile-header {
            display: flex;
            align-items: center;
            margin-bottom: 30px;
        }
        .profile-header img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            border: 3px solid #4CAF50;
            margin-right: 20px;
        }
        .profile-details h2 {
            margin: 0;
            color: #4CAF50;
        }
        .profile-details p {
            margin: 5px 0;
            font-size: 15px;
            color: #555;
        }
        .products {
            margin-top: 30px;
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            gap: 20px;
        }
        .product-card {
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 15px;
            background: #fafafa;
            text-align: center;
            box-shadow: 0 0 8px rgba(0,0,0,0.05);
        }
        .product-card img {
            width: 100%;
            height: 150px;
            object-fit: cover;
            border-radius: 6px;
            margin-bottom: 10px;
        }
        .product-card h3 {
            color: #4CAF50;
            margin: 10px 0;
        }
        .product-card p {
            font-size: 14px;
            color: #555;
        }
        .product-card button {
            margin-top: 10px;
            padding: 8px 12px;
            background: #FF9800;
            border: none;
            border-radius: 6px;
            color: #fff;
            cursor: pointer;
        }
        .product-card button:hover {
            background: #e68900;
        }
    </style>
</head>
<body>

<header>
    <a href="{{ route('home') }}" class="logo">Fruitables</a>
    <nav class="navbar-custom">
        <a href="{{ route('home') }}" class="nav-link-custom">Home</a>
        @auth
            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                @csrf
                <button type="submit" class="btn-logout">Logout</button>
            </form>
        @endauth
    </nav>

    <style>
        .navbar-custom {
            background: #4CAF50; /* أخضر */
            padding: 12px 25px;
            display: flex;
            justify-content: flex-start;
            align-items: center;
            gap: 20px;
        }

        .nav-link-custom {
            color: #fff;
            text-decoration: none;
            font-weight: bold;
            font-size: 16px;
            transition: color 0.3s;
        }

        .nav-link-custom:hover {
            color: #FF9800; /* برتقالي عند الـ hover */
        }

        .btn-logout {
            background: #FF9800; /* برتقالي */
            border: none;
            padding: 8px 15px;
            border-radius: 6px;
            color: #fff;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s;
        }

        .btn-logout:hover {
            background: #e68900; /* برتقالي غامق عند الـ hover */
        }
        .btn-order {
            background: #4CAF50; /* أخضر */
            border: none;
            padding: 12px 25px;
            border-radius: 8px;
            color: #fff;
            font-weight: bold;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 15px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.15);
        }

        .btn-order:hover {
            background: #45a049; /* أخضر أغمق عند الـ hover */
            transform: translateY(-2px);
        }
        .rating-box {
            background: #f9fff9;
            border: 1px solid #4CAF50;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        }

        .stars {
            display: flex;
            gap: 5px;
            font-size: 28px;
            cursor: pointer;
        }

        .stars input {
            display: none;
        }

        .stars label {
            color: #ccc;
            transition: color 0.3s;
        }

        .stars input:checked ~ label,
        .stars label:hover,
        .stars label:hover ~ label {
            color: #FFD700; /* دهبي */
        }
        .comment-box {
            border-radius: 10px;
            border: 1px solid #4CAF50;
            padding: 12px;
            font-size: 15px;
            resize: none; /* يمنع تكبير/تصغير غير مرغوب */
            transition: all 0.3s ease;
        }

        .comment-box:focus {
            outline: none;
            border-color: #FF9800;
            box-shadow: 0 0 10px rgba(255, 152, 0, 0.4);
        }

        .reviews {
            background: #f9fff9;
            border: 1px solid #4CAF50;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        }

        .review-card {
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 15px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.05);
        }

        .review-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 8px;
        }

        .review-user {
            color: #4CAF50;
            font-weight: bold;
            font-size: 16px;
        }

        .review-rating {
            color: #FFD700; /* دهبي للنجوم */
            font-size: 18px;
        }

        .review-comment {
            font-size: 14px;
            color: #555;
            margin-bottom: 5px;
        }

    </style>

</header>
<div class="profile-container">
    <div class="profile-header">
        <img src="{{ Str::startsWith($product->image, 'img/')
    ? asset($product->image)
    : asset('storage/'.$product->image) }}"  style="width:150px; height:150px; object-fit:cover; border-radius:8px; border:2px solid #4CAF50;">


        <div class="profile-details">
            <h2>{{ $product->name }}</h2>
            <p><strong>Description:</strong> {{ $product->description }}</p>
            <p><strong>Price:</strong> {{ $product->price }} $</p>
            <p><strong>Category:</strong> {{ $product->category->name }}</p>
            <button class="btn-order">Order Now</button>
        </div>
    </div>

    <!-- Rating Form -->
    <div class="rating-box mt-4">
        <h3 class="text-success">Rate this product</h3>
        <form action="{{ route('products.rate', $product->id) }}" method="POST">
            @csrf
            <!-- Stars -->
            <div class="stars mb-3">
                @for($i = 1; $i <= 5; $i++)
                    <input type="radio" id="star{{ $i }}" name="rating" value="{{ $i }}">
                    <label for="star{{ $i }}">★</label>
                @endfor
            </div>

                <!-- Comment Box -->
                <div class="mb-3">
                    <label for="comment" class="form-label fw-bold text-success">Your Review</label>
                    <textarea name="comment" id="comment" class="form-control comment-box" rows="4" placeholder="Write your review here..."></textarea>
                </div>

            <button type="submit" class="btn btn-success">Submit Review</button>
        </form>

    </div>
<br><br><br>
    <div class="reviews mt-5">
        <h3 class="text-success mb-4">Customer Reviews</h3>
        @forelse($reviews as $review)
            <div class="review-card mb-3">
                <div class="review-header">
                    <strong class="review-user">{{ $review->user->name }}</strong>
                    <span class="review-rating">
                    @for($i = 1; $i <= 5; $i++)
                            @if($i <= $review->rating)
                                ★
                            @else
                                ☆
                            @endif
                        @endfor
                </span>
                </div>
                <p class="review-comment">{{ $review->comment }}</p>
                <small class="text-muted">Product: {{ $review->product->name }}</small>
            </div>
        @empty
            <p class="text-muted">No reviews yet 📭</p>
        @endforelse
    </div>


</div>

</div>
</body>
</html>
