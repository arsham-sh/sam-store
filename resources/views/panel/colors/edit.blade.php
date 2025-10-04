@extends('panel.layouts.main')
@section('main')
    <div class="col py-3">
        <div class="container-fluid p-5 bg-light">
            <h4>فرم ویرایش رنگ</h4>
            <form action="{{ route('colors.update' , $color->id) }}" method="POST">
                @csrf
                @method('patch')
                <div class="">
                    <label for="name" class="form-label pt-2">نام رنگ</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                        placeholder="نام رنگ" name="name" value="{{ $color->name }}">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="">
                    <label for="code" class="form-label pt-2">کد  رنگ</label>
                    <input type="color" class="form-control @error('code') is-invalid @enderror" id="code"
                        placeholder="نام رنگ" name="code"  value="{{ $color->code }}">
                    @error('code')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <button class="btn btn-info mt-4">ویرایش</button>
            </form>
        </div>
    </div>
@endsection