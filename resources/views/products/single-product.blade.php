@extends('layouts.app')

@section('content')
    <section>
        <div class="container">
            <div class="row my-5">
                <div class="col-xl-6 order-xl-1 order-2">
                    <div class="my-2 single-product p-5 pb-2">
                        <h4>{{ $product->name }}</h4>

                        <p>
                            {!! $product->description !!}
                        </p>


                        <div class="checkboxes py-4">
                            <h6>انتخاب رنگ :</h6>
                            <div class="checkboxes__row">
                                @foreach ($colors as $color)
                                    <div class="checkboxes__item">
                                        <label class="checkbox" style="--color:{{ $color->code }}">
                                            <input type="checkbox" class="select-color" id="{{ $color->name }}" />
                                            <div class="checkbox__checkmark"></div>
                                            <div class="checkbox__body">{{ $color->name }}</div>
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="checkboxes pt-2 pb-5">
                            <h6>انتخاب سایز :</h6>
                            <div class="checkboxes__row">

                                @foreach ($sizes as $size)
                                    <div class="checkboxes__item">
                                        <label class="checkbox style-size">
                                            <input type="checkbox" class="select-size" />
                                            <div class="checkbox__checkmark"></div>
                                            <div class="checkbox__body">{{ $size->name }}</div>
                                        </label>
                                    </div>
                                @endforeach

                            </div>
                        </div>


                        <div class="d-flex price-mobile justify-content-between my-5">
                            <div class="">
                                <p class="pt-2">
                                    <span>قیمت : </span>
                                    <span>{{ number_format($product->price) }} تومان</span>
                                </p>

                            </div>

                            @if (App\Helpers\Cart\Cart::count($product) < $product->inventory)
                                <div class="">
                                    <form action="{{ route('cart.add', $product->id) }}" method="POST" id="add-to-cart">
                                        @csrf
                                    </form>
                                    <button class="btn btn-outline-success"
                                        onclick="document.getElementById('add-to-cart').submit();">
                                        <i class="fa fa-shopping-bag"></i>
                                        افزودن به سبد خرید
                                    </button>
                                </div>
                            @endif

                        </div>


                        <div class="text-start">
                            @foreach ($categories as $category)
                                <span class="text-muted">دسته بندی : {{ $category->name }}</span>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 order-xl-2 order-1">
                    <div class="my-2 product-img p-3 p-md-5">
                        <div class="card mb-3">
                            <img class="card-img img-fluid" src="{{ url($product->image) }}" alt="Card image cap"
                                id="product-detail">
                        </div>
                        <div class="row">
                            <!--Start Controls-->
                            <div class="col-1 align-self-center">
                                <a href="#multi-item-example" role="button" data-bs-slide="prev">
                                    <i class="text-dark fas fa-chevron-right"></i>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </div>
                            <!--End Controls-->
                            <!--Start Carousel Wrapper-->
                            <div id="multi-item-example" class="col-10 carousel slide carousel-multi-item"
                                data-bs-ride="carousel">
                                <!--Start Slides-->
                                <div class="carousel-inner product-links-wap" role="listbox">

                                    @foreach ($images->chunk(3) as $chunk)
                                        <!--First slide-->
                                        <div class="carousel-item {{ $loop->first ? 'active' : '' }}">

                                            <div class="row">

                                                @foreach ($chunk as $image)

                                                    <div class="col-4">
                                                        <a href="#">
                                                            <img class="card-img img-fluid" src="{{ url($image->image) }}"
                                                                alt="Product Image 1">
                                                        </a>
                                                    </div>
                                                    
                                                @endforeach

                                            </div>
                                        </div>
                                        <!--/.First slide-->
                                    @endforeach

                                </div>
                                <!--End Slides-->
                            </div>
                            <!--End Carousel Wrapper-->
                            <!--Start Controls-->
                            <div class="col-1 align-self-center">
                                <a href="#multi-item-example" role="button" data-bs-slide="next">
                                    <i class="text-dark fas fa-chevron-left"></i>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                            <!--End Controls-->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @auth

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-warning me-5 mb-5" data-bs-toggle="modal" data-bs-target="#exampleModal">
                نظرات
            </button>

        @endauth

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content modal-cm">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('send.comment') }}" method="post" id="sendCommentForm">
                            @csrf
                            <input type="hidden" name="commentable_id" value="{{ $product->id }}">
                            <input type="hidden" name="commentable_type" value="{{ get_class($product) }}">
                            <input type="hidden" name="parent_id">
                            <div class="">
                                <textarea cols="30" rows="10" class="form-control" name="comment" placeholder="دیدگاه خود را وارد نمایید"></textarea>
                            </div>
                            <button class="btn btn-success mt-2" type="submit">ثبت دیدگاه</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>




        @include('layouts.comments', [
            'comments' => $product->comments()->where('parent_id', null)->where('approved', 1)->get(),
        ])



    </section>
@endsection

@section('script')
    <script src="{{ asset('js/jquery-1.11.0.min.js') }}"></script>
    <script src="{{ asset('js/color.js') }}"></script>
    <script src="{{ asset('js/templatemo.min.js') }}"></script>
@endsection
