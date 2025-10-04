@extends('layouts.app')

@section('content')
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-9 p-4">

                    <div class="row">

                        @foreach ($products as $product)
                            <div class="col products">
                                <a href="/products/{{ $product->slug }}">
                                    <img src="{{ url($product->image) }}" alt="{{ $product->name }}" class="card-img-top">
                                    <h4>{{ $product->name }}</h4>
                                    <span>{{ number_format($product->price) }} تومان</span>
                                </a>
                            </div>
                        @endforeach

                    </div>

                    <div class="d-table mx-auto my-5">
                        {{ $products->links() }}
                    </div>

                </div>
                <div class="col-lg-3">
                    <div class="p-4 text-center">
                        <h5>دسته بندی محصولات</h5>
                        <ul class="list-group list-group-flush pt-3">
                            @foreach ($categories as $category)
                                <li class="list-group-item">
                                    <a href="{{ route('show.category' , $category->slug) }}" class="text-decoration-none text-dark">
                                        {{ $category->name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
