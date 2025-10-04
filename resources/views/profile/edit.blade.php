@extends('profile.layout')

@section('profile')
    <div class="col-md-8">
        <div class="card mb-3">
            <div class="card-body">
                <form action="{{ route('update', $user->id) }}" method="POST">
                    @csrf
                    @method('patch')
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">نام و نام خانوادگی</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="text" placeholder="نام و نام خانوادگی"
                                class="form-control @error('name') is-invalid @enderror" name="name"
                                value="{{ $user->name }}">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">ایمیل</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="text" placeholder="ایمیل"
                                class="form-control @error('email') is-invalid @enderror" name="email"
                                value="{{ $user->email }}" disabled>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">رمز عبور</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="password" placeholder="رمز عبور"
                                class="form-control @error('password') is-invalid @enderror" name="password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">تکرار رمز عبور</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="password" placeholder="تکرار رمز عبور"
                                class="form-control @error('password_confirmation') is-invalid @enderror"
                                name="password_confirmation">
                            @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-12">
                            <button class="btn btn-info">ویرایش</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection
