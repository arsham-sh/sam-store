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
                            <th>نام کاربر</th>
                            <th>هزینه سفارش</th>
                            <th>وضعیت سفارش</th>
                            <th>شماره پیگیری پستی</th>
                            <th>زمان ثبت سفارش</th>
                            <th>عملیات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $order->user->name }}</td>
                                <td>{{ $order->price }}</td>
                                @switch($order->status)
                                    @case('paid')
                                        <td class="text-success">پرداخت شده</td>
                                    @break

                                    @case('unpaid')
                                        <td class="text-warning">پرداخت نشده</td>
                                    @break

                                    @default
                                @endswitch
                                <td>{{ $order->tracking_serial ?? 'هنوز ثبت نشده' }}</td>
                                <td>{{ jdate($order->created_at)->ago() }}</td>
                                <td class="d-flex p-3">
                                    <a href="{{ route('orders.payments' , $order->id) }}" class="btn btn-primary ms-2">پرداخت ها</a>
                                    <a href="{{ route('orders.show', $order->id) }}" class="btn btn-info ms-2">جزییات</a>
                                    <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-success">ویرایش</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="mx-auto d-table">
            {{ $orders->render() }}
        </div>

    </div>
@endsection
