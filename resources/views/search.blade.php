@extends('layouts.app')

@section('content')
    <section>
        <div class="swiper my-5">
            <h5 class="pb-3 fw-bold">محتوای جستجو</h5>
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">

                @foreach ($products as $product)
                    <!-- Slides -->
                    <div class="swiper-slide">
                        <div class="col">
                            <a href="/products/{{ $product->slug }}">
                                <img src="{{ url($product->image) }}" alt="" class="card-img-top">
                                <h4>{{ $product->name }}</h4>
                                <span>{{ number_format($product->price) }} تومان</span>
                            </a>
                        </div>
                    </div>
                @endforeach

            </div>

            <!-- If we need navigation buttons -->
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>

        </div>
    </section>
@endsection
