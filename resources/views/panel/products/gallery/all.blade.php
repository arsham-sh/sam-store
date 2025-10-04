@extends('panel.layouts.main')
@section('main')
    <div class="col py-3">
        <div class="container-fluid p-5 bg-light">

            <div class="d-flex">
                <div class="">
                    <h4>لیست گالری</h4>
                </div>
                <div class="me-auto mb-3">
                    <a href="{{ route('products.gallery.create' , $product->id ) }}" class="btn btn-success">ایجاد تصویر</a>
                </div>

            </div>
            <div class="col-12 d-flex">
                @foreach ($images as $image)
                    <div class="">
                        <img src="{{ url($image->image) }}" alt="" width="200" height="200">
                    </div>
                    
                    <div class="">
                        <form action="{{ route('products.gallery.destroy' , ['product' => $product->id, 'gallery' => $image->id]) }}" method="POST" id="image-{{ $image->id }}">
                            @csrf
                            @method('delete')
                        </form>
    
                        <a href="#" class="btn btn-danger" onclick="document.getElementById('image-{{ $image->id }}').submit();">حذف</a>
                    </div>
                @endforeach
            </div>
        </div>


        <div class="mx-auto d-table my-5">
            {{-- {{ $users->render() }} --}}
            {{ $images->links() }}
        </div>

    </div>
@endsection
