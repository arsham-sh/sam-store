@extends('panel.layouts.main')

@section('main')
    <div class="col py-3">

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3">
                    <div class="bg-light p-5 text-center">
                        <i class="fs-4 fa fa-users"></i>
                        <br>
                        <span>تعداد کاربران</span>
                        <span>{{ $users_count }}</span>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="bg-light p-5 text-center">
                        <i class="fs-4 fas fa-shopping-bag"></i>
                        <br>
                        <span>تعداد محصولات</span>
                        <span>{{ $products_count }}</span>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="bg-light p-5 text-center">
                        <i class="fs-4 fas fa-comment"></i>
                        <br>
                        <span>تعداد نظرات</span>
                        <span>{{ $comments_count }}</span>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="bg-light p-5 text-center">
                        <i class="fs-4  fa fa-shopping-basket"></i>
                        <br>
                        <span>تعداد سفارشات</span>
                        <span>{{ $orders_count }}</span>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
