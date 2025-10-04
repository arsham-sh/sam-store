@extends('panel.layouts.main')
@section('main')
    <div class="col py-3">
        <div class="container-fluid p-5 bg-light">
        
            <div class="d-flex">
                <div class="">
                    <h4>لیست رنگ ها</h4>
                </div>
                <div class="me-auto mb-3">
                    <a href="{{ route('colors.create') }}" class="btn btn-warning">ایجاد رنگ</a>
                </div>
            </div>
            <div class="col-12 table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>نام رنگ</th>
                            <th>عملیات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($colors as $color)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $color->name }}</td>
                            
                            <td class="d-flex">
                                
                                <a href="{{ route('colors.edit' , $color->id) }}" class="btn btn-primary">ویرایش</a>

                                <form action="{{ route('colors.destroy' , $color->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger me-2" onclick="return confirm('میخواهید حذف شود؟')">حذف</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        
        <div class="mx-auto d-table my-5">
            {{ $colors->links() }}
        </div>

    </div>
@endsection