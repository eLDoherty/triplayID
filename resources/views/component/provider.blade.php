<section class="triplay-game">
    <div class="container">
        <div class="triplay-game__heading mb-5">
            <h2 class="heading-medium">Top Up <span class="blue-text">Kuota & Pulsa</span></h2>
            <p class="caption">Daftar kuota internet dan paket data
                All operator  </p>
        </div>
        @if($products)
            <div class="triplay-game__wrapper row mt-5 mb-5">
                @foreach($products as $product)
                    @if($product->type == "provider")
                        <div class="col-md-4">
                            <a href="/product/{{ $product->id }}">
                                <div class="triplay-card">
                                    <img src="{{ asset('storage/uploads/product/' . $product->thumbnail ) }}" alt="{{ $product->name }}">
                                    <div class="card-title">
                                        <h3>{{ $product->name }}</h3>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endif
                @endforeach
            </div>
        @endif
    </div>
</section>