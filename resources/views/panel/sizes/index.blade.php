@extends('panel.layouts.main')
@section('main')
    <div class="col py-3">
        <div class="container-fluid p-5 bg-light">
        
            <div class="d-flex">
                <div class="">
                    <h4>لیست سایز ها</h4>
                </div>
                <div class="me-auto mb-3">
                    <a href="{{ route('sizes.create') }}" class="btn btn-warning">ایجاد سایز</a>
                </div>
            </div>
            <div class="col-12 table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>نام سایز</th>
                            <th>عملیات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sizes as $size)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $size->name }}</td>
                            
                            <td class="d-flex">
                                
                                <a href="{{ route('sizes.edit' , $size->id) }}" class="btn btn-primary">ویرایش</a>

                                <form action="{{ route('sizes.destroy' , $size->id) }}" method="post">
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
            {{ $sizes->links() }}
        </div>

    </div>
@endsection