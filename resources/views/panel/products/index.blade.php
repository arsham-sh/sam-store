@extends('panel.layouts.main')
@section('main')
    <div class="col py-3">
        <div class="container-fluid p-5 bg-light">

            <div class="d-flex">
                <div class="">
                    <h4>لیست محصولات</h4>
                </div>
                <div class="me-auto mb-3">
                    <a href="{{ route('sizes.create') }}" class="btn btn-success">ایجاد سایز</a>
                    <a href="{{ route('colors.create') }}" class="btn btn-danger">ایجاد رنگ</a>
                    <a href="{{ route('products.create') }}" class="btn btn-warning">ایجاد محصول</a>
                </div>
            </div>
            <div class="col-12 table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>نام محصول</th>
                            <th>توضیحات</th>
                            <th>قیمت</th>
                            <th>عکس</th>
                            <th>عملیات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <a href="{{ route('products.show', $product->id) }}" class="text-decoration-none">
                                        {{ $product->name }}
                                    </a>
                                </td>
                                <td>{!! $product->description !!}</td>
                                <td>{{ $product->price }}</td>
                                <td>
                                    <img src="{{ $product->image }}" alt="" width="40" height="40">
                                </td>
                                <td class="d-flex">
                                    
                                    <a href="{{ route('products.gallery.index' , $product->id ) }}" class="btn btn-warning ms-2">گالری تصاویر</a>

                                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary">ویرایش</a>

                                    <form action="{{ route('products.destroy', $product->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger me-2"
                                            onclick="return confirm('میخواهید حذف شود؟')">حذف</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>


        <div class="mx-auto d-table my-5">
            {{-- {{ $users->render() }} --}}
            {{ $products->links() }}
        </div>

    </div>
@endsection
