@extends('profile.layout')

@section('profile')
    <div class="col-md-8">
        <div class="card mb-3">
            
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>شناسه محصول</th>
                            <th>عنوان محصول</th>
                            <th>تعداد سفارش</th>
                            <th>هزینه نهایی</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->pivot->quantity }}</td>
                                <td>{{ $product->pivot->quantity * $product->price }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>

    </div>
@endsection
