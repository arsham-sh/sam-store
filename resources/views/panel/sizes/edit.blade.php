@extends('panel.layouts.main')
@section('main')
    <div class="col py-3">
        <div class="container-fluid p-5 bg-light">
            <h4>فرم ویرایش سایز</h4>
            <form action="{{ route('sizes.update' , $size->id) }}" method="POST">
                @csrf
                @method('patch')
                <div class="">
                    <label for="name" class="form-label pt-2">سایز</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                        placeholder="سایز" name="name" value="{{ $size->name }}">
                    @error('name')
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