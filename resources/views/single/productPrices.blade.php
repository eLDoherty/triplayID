<section class="triplay-product-prices mb-5">
    <div class="container">
        <div class="triplay-product-prices__header">
            <h2>Pilih <span class="blue-text">Item</span></h2>
        </div>
        <div class="row">
            @foreach($variant as $item)
            @if(strlen($item->price) < 1)
            <div class="col-md-3 col-xs-3 col-sm-3 mb-3">
                <button class="button-price" type="button" value="{{ $item->price }}">{{ $item->name }} <div class="overlay">Habis</div></button>
            </div>
            <div class="col-md-3 col-xs-3 col-sm-3 mb-3">
                <button class="button-price" type="button" value="{{ $item->price }}">{{ $item->name }} <div class="overlay">Habis</div></button>
            </div>
            @else
            <div class="col-md-3 col-xs-3 col-sm-3 mb-3">
                <button class="button-price" type="button" value="{{ $item->price }}">{{ $item->name }}</button>
            </div>
            <div class="col-md-3 col-xs-3 col-sm-3 mb-3">
                <button class="button-price" type="button" value="{{ $item->price }}">{{ $item->name }}</button>
            </div>
            @endif
            @endforeach
        </div>
    </div>
</section>