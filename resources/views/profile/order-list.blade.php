@extends('profile.layout')

@section('profile')
    <div class="col-md-8">
        <div class="card mb-3">

            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>شماره سفارش</th>
                            <th>تاریخ ثبت</th>
                            <th>وضعیت سفارش</th>
                            <th>کد رهگیری پستی</th>
                            <th>اقدامات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ jdate($order->created_at)->format('%d %B %Y') }}</td>
                                @switch($order->status)
                                    @case('paid')
                                        <td>پرداخت شده</td>
                                    @break

                                    @case('unpaid')
                                        <td>پرداخت نشده</td>
                                    @break

                                    @default
                                @endswitch

                                <td>{{ $order->tracking_serial ?? 'هنوز ثبت نشد' }}</td>

                                <td>
                                    <a href="{{ route('profile.order.detail', $order->id) }}" class="btn btn-info">جزییات
                                        سفارش</a>

                                    @if ($order->status == 'unpaid')
                                        <a href="{{ route('profile.order.payment', $order->id) }}"
                                            class="btn btn-warning">پرداخت</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>

    </div>
@endsection
