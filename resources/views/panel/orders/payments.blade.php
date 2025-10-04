@extends('panel.layouts.main')

@section('main')
    <div class="col py-3">

        <div class="col-12 bg-light p-5">

            <div class="d-flex">

                <div class="pt-2">
                    <h5>لیست پرداخت</h5>
                </div>

            </div>

            <div class="table-responsive">

                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>شماره پرداخت</th>
                            <th>وضعیت پرداخت</th>
                            <th>زمان ثبت پرداخت</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($payments as $payment)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $payment->resnumber }}</td>
                                <td>{{ $payment->status ? 'پرداخت شده' : 'پرداخت نشده' }}</td>
                                <td>{{ jdate($payment->created_at)->format('%Y-%m-%d') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="mx-auto d-table">
            {{ $payments->render() }}
        </div>

    </div>
@endsection
