@extends('panel.layouts.main')

@section('main')
    <div class="col py-3">

        <div class="col-12 bg-light p-5">

            <div class="d-flex">

                <div class="pt-2">
                    <h5>لیست سفارشات</h5>
                </div>

            </div>

            <div class="table-responsive">

                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>نام محصول</th>
                            <th>تعداد محصول</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->pivot->quantity }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="mx-auto d-table">
            {{ $products->render() }}
        </div>

    </div>
@endsection
