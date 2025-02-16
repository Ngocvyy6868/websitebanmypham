<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi Tiết Sản Phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
    /* Product Detail */
    .product-detail {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        margin-top: 20px;
    }

    /* Product Image */
    .product-image img {
        max-width: 100%;
        height: auto;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    /* Product Information */
    .product-info {
        max-width: 600px;
        padding: 20px;
    }

    .product-title {
        font-size: 2rem;
        font-weight: bold;
        margin-bottom: 15px;
        color: #333;
    }

    .product-price {
        font-size: 1rem;
        margin-bottom: 20px;
        font-weight: bold;
    }

    .product-price span {
        font-size: 1.5rem;
        color: #d9534f;
        margin-bottom: 20px;
        font-weight: bold;
    }

    .product-actions a {
        width: 100%;
        margin: 10px 0;
    }

    /* Related Products */
    .related-products {
        margin-top: 40px;
    }

    .related-products-list {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 20px;
    }

    .related-product-item {
        width: 23%;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border-radius: 8px;
        overflow: hidden;
        background-color: #fff;
    }

    .related-product-item:hover {
        transform: scale(1.05);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
    }

    .related-product-item img {
        max-width: 100%;
        height: auto;
        object-fit: cover;
        margin-bottom: 10px;
    }

    .related-product-item h3 {
        font-size: 1.1rem;
        font-weight: bold;
        margin-bottom: 10px;
        color: #333;
        text-align: center;
    }

    .related-product-item p {
        margin-bottom: 10px;
        font-size: 1rem;
        color: #d9534f;
        font-weight: bold;
        text-align: center;
    }

    .toast {
        position: absolute;
        top: 20px;
        right: 20px;
        z-index: 9999;
        padding: 15px;
        background-color: #28a745;
        color: white;
        border-radius: 5px;
        display: none;
    }

    .toast.show {
        display: block;
    }

    /* Product Actions */
    .product-actions {
        display: flex;
        gap: 20px;
        justify-content: center;
        align-items: center;
        margin-top: 20px;
        width: 100%;
        padding: 0 10px;
    }

    /* Add to Cart Button */
    .btn-add-to-cart {
        font-size: 1.2rem;
        padding: 12px 25px;
        background-color: #d9534f;
        color: white;
        border-radius: 8px;
        text-align: center;
        width: 100%;
        transition: background-color 0.3s ease, transform 0.2s ease;
    }

    .btn-add-to-cart:hover {
        background-color: #c9302c;
        transform: scale(1.05);
    }

    /* Back Button */
    .btn-back {
        position: absolute;
        top: 20px;
        /* Đặt khoảng cách từ trên cùng */
        left: 20px;
        /* Đặt khoảng cách từ bên trái */
        font-size: 1.2rem;
        padding: 12px 25px;
        background-color: #f39c12;
        color: white;
        border-radius: 8px;
        text-align: center;
        transition: background-color 0.3s ease, transform 0.2s ease;
    }

    .btn-back:hover {
        background-color: #e67e22;
        transform: scale(1.05);
    }

    /* Icon size inside buttons */
    .btn-icon i {
        font-size: 1.5rem;
        vertical-align: middle;
    }

    /* Reviews Section */
    .reviews-section {
        display: flex;
        justify-content: space-between;
        gap: 30px;
        margin-top: 40px;
    }

    /* Left side: existing reviews */
    .reviews-left {
        flex: 1;
        padding-right: 20px;
    }

    .review-card {
        background-color: #f8f8f8;
        border-radius: 8px;
        padding: 20px;
        margin-bottom: 15px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
    }

    .review-card:hover {
        transform: scale(1.02);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
    }

    .review-author {
        font-weight: bold;
        font-size: 1.1rem;
        color: #333;
    }

    .review-rating {
        margin-top: 10px;
    }

    .review-rating .fa-star {
        font-size: 1.2rem;
    }

    .review-comment {
        margin-top: 10px;
        font-size: 1rem;
        color: #666;
    }

    .review-date {
        margin-top: 10px;
        font-size: 0.9rem;
        color: #999;
    }

    /* Right side: Review form */
    .reviews-right {
        flex: 1;
        padding-left: 20px;
        border-left: 2px solid #ddd;
    }

    .reviews-right form {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .reviews-right .form-group {
        margin-bottom: 20px;
    }

    .reviews-right .form-control {
        padding: 12px;
        border-radius: 8px;
        border: 1px solid #ddd;
    }

    .reviews-right button {
        padding: 12px 20px;
        background-color: #d9534f;
        color: white;
        border-radius: 8px;
        width: 100%;
        border: none;
        transition: background-color 0.3s ease, transform 0.3s ease;
    }

    .reviews-right button:hover {
        background-color: #c9302c;
        transform: scale(1.05);
    }

    /* Responsive design */
    @media (max-width: 768px) {
        .reviews-section {
            flex-direction: column;
        }

        .reviews-left,
        .reviews-right {
            padding: 0;
            border-left: none;
        }
    }

    .modal-body {
        text-align: center;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100%;
    }

    .modal-body img {
        max-width: 90%;
        height: auto;
    }
    </style>
</head>

<body>
    <div class="container">
        <!-- Hiển thị thông báo khi có flash message -->
        @if(session('success'))
        <div id="toast" class="toast show">
            {{ session('success') }}
        </div>
        @endif
        <a href="{{ url('/') }}" class="btn-icon btn-back" title="Quay lại trang chủ">
            <i class="fa fa-home"></i>
        </a>
        <!-- Product Detail -->
        <div class="product-detail">
            <!-- Product Image -->
            <div class="product-image col-md-5">
                <img src="{{ asset($product->product_img) }}" alt="Sản phẩm {{ $product->product_name }}"
                    id="productImage">
            </div>
            <!-- Product Information -->
            <div class="product-info col-md-6">
                <h1 class="product-title">{{ $product->product_name }}</h1>
                <p class="product-price">Giá ưu đãi: <span>{{ number_format($product->product_price, 0, ',', '.') }},000
                        VNĐ</span></p>
                <p class="product-description"><strong>Mô Tả:</strong> {{ $product->product_des }}</p>
                <div class="product-actions">
                    <!-- Add to Cart Button with Icon -->
                    <a href="{{ route('cart.add', ['id' => $product->product_ID]) }}" class="btn-icon btn-add-to-cart"
                        title="Thêm vào giỏ">
                        <i class="fa fa-cart-plus"></i>
                    </a>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="imageModalLabel">Hình ảnh sản phẩm</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <img src="{{ asset($product->product_img) }}" alt="Sản phẩm {{ $product->product_name }}">
                    </div>
                </div>
            </div>
        </div>
        <!-- danh gia -->
        <div class="reviews-section">
            <div class="reviews-left">
                <h3
                    style="text-align:center;color: #d4af37; font-family: 'Times New Roman', serif; font-weight: bold; font-size: 2rem; margin-bottom: 30px;">
                    Đánh giá sản phẩm</h3>
                @foreach ($reviews as $review)
                <div class="review-card">
                    <div class="review-author">
                        <strong>{{ $review->user ? $review->user->fullname : 'Người dùng không xác định' }}</strong>
                    </div>
                    <div class="review-rating">
                        @for ($i = 1; $i <= 5; $i++) <i
                            class="fa fa-star {{ $i <= $review->rating ? 'text-warning' : 'text-muted' }}"></i>
                            @endfor
                    </div>
                    <p class="review-comment">{{ $review->comment }}</p>
                    @if ($review->image_path)
                    <div class="review-image">
                        <img src="{{ asset('storage/' . $review->image_path) }}" alt="Review Image"
                            style="max-width: 100px; max-height: 100px;">
                    </div>
                    @endif
                    <p class="review-date">Đánh giá vào: {{ $review->created_at->format('d-m-Y') }}</p>
                </div>
                @endforeach

            </div>

            <div class="reviews-right">
                <h3
                    style="text-align:center;color: #d4af37; font-family: 'Times New Roman', serif; font-weight: bold; font-size: 2rem; margin-bottom: 30px;">
                    Gửi đánh giá
                </h3>
                <form action="{{ route('product.submitReview', ['id' => $product->product_ID]) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="rating">Đánh giá:</label>
                        <select name="rating" id="rating" required class="form-control">
                            <option value="1">1 sao</option>
                            <option value="2">2 sao</option>
                            <option value="3">3 sao</option>
                            <option value="4">4 sao</option>
                            <option value="5">5 sao</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="comment">Bình luận:</label>
                        <textarea name="comment" id="comment" rows="4" required class="form-control"></textarea>
                    </div>

                    <!-- Thêm trường tải ảnh -->
                    <div class="form-group">
                        <label for="image">Tải ảnh (nếu có):</label>
                        <input type="file" name="image" id="image" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-primary">Gửi đánh giá</button>
                </form>

            </div>
        </div>
    </div>
    <!-- Related Products -->
    <div class="related-products">
        <h2
            style="text-align:center; color: #f39c12; font-family: 'Times New Roman', serif; font-weight: bold; font-size: 2rem; margin-bottom: 30px;">
            Sản phẩm liên quan
        </h2>
        @if ($relatedProducts->isEmpty())
        <p style="text-align:center;">Hiện không có sản phẩm liên quan.</p>
        @else
        <div class="related-products-list">
            @foreach ($relatedProducts as $related)
            <div class="related-product-item">
                <a href="{{ route('product.detail', ['id' => $related->product_ID]) }}" class="text-decoration-none">
                    <div class="product-card">
                        <img src="{{ asset($related->product_img) }}" alt="{{ $related->product_name }}"
                            class="img-fluid rounded mb-3">
                        <h3 class="product-name">{{ $related->product_name }}</h3>
                        <p class="product-price">{{ number_format($related->product_price, 0, ',', '.') }},000 VNĐ</p>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
        @endif
    </div>

    </div>

    <!-- Bootstrap JS (for modal functionality) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>

    <!-- JavaScript to show toast notification -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const toast = document.getElementById('toast');
        if (toast) {
            setTimeout(function() {
                toast.classList.remove('show');
            }, 4000); // Toast sẽ ẩn sau 4 giây
        }
    });

    document.addEventListener('DOMContentLoaded', function() {
        const productImage = document.getElementById('productImage');
        const imageModal = new bootstrap.Modal(document.getElementById('imageModal'));

        productImage.addEventListener('click', function() {
            imageModal.show();
        });
    });
    </script>
</body>

</html>