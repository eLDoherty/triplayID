<div class="triplay-slider">
    <div class="container">
        <div class="triplay-slider__banner">
            <img src="{{ asset('storage/uploads/banner/' . $banner[0]->image) }}" alt="Triplay banner">
        </div>
        <div class="triplay-slider__swiper swiper">
            <div class="swiper-wrapper">
                @foreach ($sliders as $item)
                    <div class="triplay-slider__swiper--item swiper-slide">
                        <img src="{{ asset('storage/uploads/slider/' . $item->image) }}" alt="Triplay slider">
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>