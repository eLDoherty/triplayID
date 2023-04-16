<section class="triplay-game-detail">
    <div class="container">
        <div class="triplay-game-detail__banner">
            <img src="{{ asset('storage/uploads/product/' . $product->banner)}}" alt="{{ $product->name }}">
        </div>
        <div class="triplay-game-detail__description">
            <h2 class="product-title">{{ $product->name }}</h2>
            <p class="product-description">{{ $product->description }}</p>
            <p>Bingung cara topup? <a href="#">Lihat disini</a></p>
        </div>
    </div>
</section>