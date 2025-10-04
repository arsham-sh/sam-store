@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="main-body">

            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb" class="main-breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html" class="text-dark">صفحه اصلی</a></li>/
                    <li class="breadcrumb-item"><a href="javascript:void(0)" class="text-dark">پروفایل</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ auth()->user()->name }}</li>
                </ol>
            </nav>
            <!-- /Breadcrumb -->

            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin"
                                    class="rounded-circle" width="150">
                                <div class="mt-3">
                                    <h4>{{ auth()->user()->name }}</h4>
                                    <p class="text-secondary mb-1">{{ auth()->user()->email }}</p>
                                   
                                    <a href="{{ route('profile') }}" class="btn btn-primary">پروفایل</a>

                                    <a href="{{ route('profile.orders') }}" class="btn btn-outline-primary">سفارشات</a>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                

                @yield('profile')


            </div>

        </div>
    </div>
@endsection