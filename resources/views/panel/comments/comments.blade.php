@extends('panel.layouts.main')
@section('main')
    <div class="col py-3">
        <div class="container-fluid p-5 bg-light">

            <div class="d-flex">
                <div class="">
                    <h4>لیست نظرات تایید شده</h4>
                </div>
                <div class="me-auto mb-3">
                    <a href="{{ route('comment.approved') }}" class="btn btn-warning">نظرات تایید نشده</a>
                </div>
            </div>
            <div class="col-12 table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>نام کاربر</th>
                            <th>متن</th>
                            <th>عملیات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($comments as $comment)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $comment->user->name }}</td>
                                <td>{{ $comment->comment }}</td>

                                <td class="d-flex">
                                    <form action="{{ route('comments.destroy', $comment->id) }}" method="post">
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
            {{ $comments->links() }}
        </div>

    </div>
@endsection
