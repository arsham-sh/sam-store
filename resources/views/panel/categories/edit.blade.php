@extends('panel.layouts.main')
@section('main')
    <div class="col py-3">
        <div class="container-fluid p-5 bg-light">
            <h4>فرم ویرایش دسته</h4>
            <form action="{{ route('categories.update', $category->id) }}" method="POST">
                @csrf
                @method('patch')
                <div class="">
                    <label for="name" class="form-label pt-2">نام دسته</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                        placeholder="نام دسته" name="name" value="{{ $category->name }}">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="">
                    <label for="slug" class="form-label pt-2">نام انگلیسی</label>
                    <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug"
                        placeholder="نام انگلیسی" name="slug" value="{{ $category->slug }}">
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

                        @foreach ($parentCategories as $pcategory)
                            <option value="{{ $pcategory->id }}" @if ($pcategory->id === $category->category_id) selected @endif>
                                {{ $pcategory->name }}</option>

                            @foreach ($pcategory->children as $childCategory)
                                <option value="{{ $childCategory->id }}" @if ($childCategory->id === $category->category_id) selected @endif>{{ $childCategory->name }}</option>
                            @endforeach
                        @endforeach=



                    </select>
                    @error('category_id')
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

@section('script')
    <script>
        $('#colors').select2({
            placeholder: 'رنگ مورد نظر را انتخاب کنید'
        });
    </script>
@endsection
