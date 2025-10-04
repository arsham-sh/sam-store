@extends('panel.layouts.main')

@section('main')
    <div class="col py-3">
        <div class="container-fluid p-5 bg-light">
            <h4>فرم ویرایش کاربر</h4>
            <div class="col-12 table-responsive">
                <form action="{{ route('users.update' , $user->id ) }}" method="POST">
                    @csrf
                    @method('patch')
                    <div class="">
                        <label for="name" class="form-label pt-2">نام کاربر</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            placeholder="نام کاربر" name="name" value="{{ $user->name }}">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="">
                        <label for="email" class="form-label pt-2">ایمیل</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                            placeholder="ایمیل" name="email" value="{{ $user->email }}">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="">
                        <label for="password" class="form-label pt-2">رمز عبور</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                            placeholder="رمز عبور" name="password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="">
                        <label for="password_confirmation" class="form-label pt-2">تکرار رمز عبور</label>
                        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                            id="password_confirmation" placeholder="تکرار رمز عبور" name="password_confirmation">
                        @error('password_confirmation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <button class="btn btn-info mt-4">ثبت</button>
                    <a href="{{ route('users.index') }}" class="btn btn-danger mt-4">لغو</a>
                </form>
            </div>
        </div>

    </div>
@endsection
