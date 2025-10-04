@extends('panel.layouts.main')

@section('main')
    <div class="col py-3">

        <div class="col-12 bg-light p-5">
            <h5>فرم ویرایش سفارش</h5>
            <form action="{{ route('orders.update', $order->id) }}" method="POST">
                @csrf
                @method('patch')
                <div class="">
                    <label for="id" class="pt-2 pb-2">شماره سفارش</label>
                    <input type="text" id="id" class="form-control" value="{{ $order->id }}" disabled>
                </div>
                <div class="">
                    <label for="price" class="pt-2 pb-2">هزینه سفارش</label>
                    <input type="text" id="price" class="form-control" value="{{ $order->price }}" disabled>
                </div>

                <div class="">
                    <label for="status" class="pt-2 pb-2">وضعیت سفارش</label>

                    <select name="status" id="status" class="form-select">
                        <option value="paid" {{ old('status', $order->status === 'paid' ? 'selected' : '') }}>
                            پرداخت شده
                        </option>
                        <option value="unpaid" {{ old('status', $order->status === 'unpaid' ? 'selected' : '') }}>
                            پرداخت نشده
                        </option>
                        <option value="preperation" {{ old('status', $order->status === 'preperation' ? 'selected' : '') }}>
                            در حال پردازش
                        </option>
                    </select>

                </div>

                <div class="">
                    <label for="tracking_serial" class="pt-2 pb-2">کد پیگیری</label>
                    <input type="text" id="tracking_serial" class="form-control" value="{{ old('tracking_serial' , $order->tracking_serial) }}" placeholder="کد پیگیری را وارد کنید" name="tracking_serial">
                </div>

                <button class="btn btn-info mt-5">ویرایش</button>

            </form>
        </div>

    </div>
@endsection
