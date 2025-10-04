@extends('panel.layouts.main')
@section('main')
    <div class="col py-3">
        <div class="container-fluid p-5 bg-light">

            <div class="d-flex">
                <div class="">
                    <h4>{{ $product->name }}</h4>
                </div>

            </div>
            <div class="col-12">
                <ul>
                    @foreach ($product->colors as $color)
                    <li>{{ $color->name }}</li>
                    @endforeach
                </ul>
            </div>
        </div>

    </div>
@endsection
