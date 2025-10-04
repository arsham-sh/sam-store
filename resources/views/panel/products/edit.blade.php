@extends('panel.layouts.main')
@section('main')
    <div class="col py-3">
        <div class="container-fluid p-5 bg-light">
            <h4>فرم ویرایش محصول</h4>
            <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="">
                    <label for="name" class="form-label pt-2">نام محصول</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                        placeholder="نام محصول" name="name" value="{{ $product->name }}">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="">
                    <label for="slug" class="form-label pt-2">نام انگلیسی</label>
                    <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug"
                        placeholder="نام انگلیسی" name="slug" value="{{ $product->slug }}">
                    @error('slug')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="">
                    <label for="description" class="form-label pt-2">توضیحات</label>
                    <textarea id="editor-id" class="form-control @error('description') is-invalid @enderror" placeholder="توضیحات ..."
                        style="resize: none;" name="description">{{ $product->description }}</textarea>
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="">
                    <label for="inventory" class="form-label pt-2">تعداد محصول</label>
                    <input type="number" class="form-control @error('inventory') is-invalid @enderror" id="inventory"
                        placeholder="تعداد محصول" name="inventory" value="{{ $product->inventory }}">
                    @error('inventory')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="">
                    <label for="price" class="form-label pt-2">قیمت</label>
                    <input type="number" class="form-control @error('price') is-invalid @enderror" id="price"
                        placeholder="قیمت" name="price" value="{{ $product->price }}">
                    @error('price')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="">
                    <label for="colors" class="form-label pt-2">رنگ</label>
                    <select name="colors[]" id="colors" class="form-select @error('colors') is-invalid @enderror"
                        multiple>

                        @foreach ($colors as $color)
                            <option value="{{ $color->id }}" @if ($product->colors->contains($color->id)) selected @endif>
                                {{ $color->name }}
                            </option>
                        @endforeach

                    </select>
                    @error('colors')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="">
                    <label for="size" class="form-label pt-2">سایز</label>
                    <select name="size[]" id="size" class="form-select @error('size') is-invalid @enderror" multiple>

                        @foreach ($sizes as $size)
                            <option value="{{ $size->id }}" @if ($product->sizes->contains($size->id)) selected @endif>
                                {{ $size->name }}
                            </option>
                        @endforeach

                    </select>
                    @error('size')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="">
                    <label for="category" class="form-label pt-2">دسته بندی محصول</label>
                    <select name="category[]" id="category" class="form-select @error('category') is-invalid @enderror"
                        multiple>

                        @foreach (App\Models\Category::all() as $category)
                            <option value="{{ $category->id }}" @if ($product->categories->contains($category->id)) selected @endif>
                                {{ $category->name }}</option>
                        @endforeach

                    </select>
                    @error('category')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="">
                    <label for="image" class="form-label pt-2">آپلود عکس</label>
                    <div class="input-group">
                        <input type="text" id="image_label" class="form-control" name="image" aria-label="Image"
                            aria-describedby="button-image" value="{{ $product->image }}">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button" id="button-image">انتخاب</button>
                        </div>
                    </div>
                    @error('image')
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
        $('#category').select2({
            placeholder: 'دسته مورد نظر را انتخاب کنید'
        });
        $('#size').select2({
            placeholder: 'سایز مورد نظر را انتخاب کنید'
        });
    </script>

    <script>
        CKEDITOR.replace('editor-id', {
            filebrowserImageBrowseUrl: '/file-manager/ckeditor'
        });

        document.addEventListener("DOMContentLoaded", function() {

            document.getElementById('button-image').addEventListener('click', (event) => {
                event.preventDefault();

                window.open('/file-manager/fm-button', 'fm', 'width=1400,height=800');
            });
        });

        // set file link
        function fmSetLink($url) {
            document.getElementById('image_label').value = $url;
        }
    </script>
@endsection
