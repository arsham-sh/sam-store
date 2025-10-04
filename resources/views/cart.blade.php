@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 py-5">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>نام محصول</th>
                                <th>قیمت</th>
                                <th>تعداد</th>
                                <th>قیمت نهایی</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (App\Helpers\Cart\Cart::instance('cart-shop')->all() as $cart)
                                @if (isset($cart['product']))
                                    @php
                                        $product = $cart['product'];
                                    @endphp

                                    <tr>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ number_format($product->price) }}</td>
                                        <td>
                                            <select class="form-select"
                                                onchange="changeQuantity(event,'{{ $cart['id'] }}' , 'cart-shop')">

                                                @foreach (range(1, $product->inventory) as $item)
                                                    <option value="{{ $item }}"
                                                        {{ $cart['quantity'] == $item ? 'selected' : '' }}>
                                                        {{ $item }}</option>
                                                @endforeach

                                            </select>
                                        </td>
                                        <td>{{ number_format($product->price * $cart['quantity']) }}</td>
                                        <td class="text-center">
                                            <form action="{{ route('cart.destroy' , $cart['id']) }}" method="POST" id="delete-cart-{{ $product->id }}">
                                                @csrf
                                                @method('delete')
                                            </form>
                                            <a href="#" onclick="event.preventDefault();document.getElementById('delete-cart-{{ $product->id }}').submit();">
                                                <i class="fa fa-remove text-danger"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="">
                    @php
                        $totalPrice = App\Helpers\Cart\Cart::all()->sum(function ($cart) {
                            return $cart['product']->price * $cart['quantity'];
                        });
                    @endphp


                    قیمت کل :{{ number_format($totalPrice) }}
                </div>

                <div class="">
                    <form action="{{ route('cart.payment') }}" method="POST" id="cart-payment">
                        @csrf
                    </form>
                    <button type="button" onclick="document.getElementById('cart-payment').submit();" class="btn btn-success mt-3">پرداخت</button>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('script')

    <script>
        function changeQuantity(event, id, cartName = null) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content,
                    'Content-Type': 'application/json',
                }
            });

            $.ajax({
                type: 'POST',
                url: 'cart/quantity/change',
                data: JSON.stringify({
                    id: id,
                    quantity: event.target.value,
                    cart: cartName,
                    _method: 'patch',
                }),
                success: function(res) {
                    location.reload();
                }
            });
        }
    </script>
@endsection
