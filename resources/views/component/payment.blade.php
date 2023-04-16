<section class="triplay-payments">
    <div class="container">
        <div class="triplay-payments__heading mb-5">
            <h2>Bermacam <span class="blue-text">pembayaran</span></h2>
            <p class="caption">Jangan ragu untuk beli di Triplay.id
                dengan pembayaran melalui banyak cara ! 
            </p>
        </div>
        @if($payments)
            <div class="triplay-payments__slider-right swiper1 mb-4"> 
                <div class="slider-to-right swiper-wrapper">
                    @foreach($payments as $payment)
                        @if($payment->type == "bank")
                            <div class="triplay-paymnets__slider--item swiper-slide">
                                <img src="{{ asset('storage/uploads/payment/' . $payment->image)}}" alt="Triplay payment">
                            </div>
                            <div class="triplay-paymnets__slider--item swiper-slide">
                                <img src="{{ asset('storage/uploads/payment/' . $payment->image)}}" alt="Triplay payment">
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="triplay-payments__slider-left swiper2">
                <div class="slider-to-left swiper-wrapper">
                    @foreach($payments as $payment)
                        @if($payment->type == "virtual")
                            <div class="triplay-paymnets__slider--item swiper-slide">
                                <img src="{{ asset('storage/uploads/payment/' . $payment->image)}}" alt="Triplay payment">
                            </div>
                            <div class="triplay-paymnets__slider--item swiper-slide">
                                <img src="{{ asset('storage/uploads/payment/' . $payment->image)}}" alt="Triplay payment">
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</section>