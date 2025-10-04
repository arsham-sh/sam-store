@extends('panel.layouts.main')
@section('main')
    <div class="col py-3">
        <div class="container-fluid p-5 bg-light">
            <h4>فرم ثبت دسته</h4>
            <form action="{{ route('categories.store') }}" method="POST">
                @csrf
                <div class="">
                    <label for="name" class="form-label pt-2">نام دسته</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                        placeholder="نام دسته" name="name">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="">
                    <label for="slug" class="form-label pt-2">نام انگلیسی</label>
                    <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug"
                        placeholder="نام انگلیسی" name="slug">
                    @error('slug')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="">
                    <label for="category_id" class="form-label pt-2">دسته والد</label>
                    <select name="category_id" id="category_id"
                        class="form-select @error('category_id') is-invalid @enderror">

                        <option value="">ندارد</option>

                        @foreach ($parentCategories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>

                            @foreach ($category->children as $childCategory)
                                <option value="{{ $childCategory->id }}">{{ $childCategory->name }}</option>
                            @endforeach
                            
                        @endforeach

                    </select>
                    @error('category_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <button class="btn btn-info mt-4">ثبت</button>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $('#colors').select2({
            placeholder: 'رنگ مورد نظر را انتخاب کنید'
        });
    </script>
@endsection
