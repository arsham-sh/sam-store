@extends('panel.layouts.main')
@section('main')
    <div class="col py-3">
        <div class="container-fluid p-5 bg-light">

            <div class="d-flex">
                <div class="">
                    <h4>لیست دسته بندی</h4>
                </div>
                <div class="me-auto mb-3">
                    <a href="{{ route('categories.create') }}" class="btn btn-warning">ایجاد دسته</a>
                </div>
            </div>
            <div class="col-12 table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>نام دسته</th>
                            <th>دسته پدر</th>
                            <th>عملیات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->getParentName() }}</td>
                                
                                <td class="d-flex">

                                    <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary">ویرایش</a>

                                    <form action="{{ route('categories.destroy', $category->id) }}" method="post">
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
            {{ $categories->links() }}
        </div>

    </div>
@endsection
