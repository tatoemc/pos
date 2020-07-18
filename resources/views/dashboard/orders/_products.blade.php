<div id="print-area">
    <table class="table table-hover table-bordered">

        <thead>
            <tr>
                <th colspan="3">المطلوب من السيد : {{$clientname['name']}}</th>
                <th >رقم الفاتورة : 0000{{$invoice}}</th>
            </tr>
        <tr>
            <th>@lang('site.name')</th>
            <th>@lang('site.unit_price')</th>
            <th>@lang('site.quantity')</th>
            <th>الجملة</th>
        </tr>
        </thead>
  
        <tbody>
        @foreach ($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->sale_price }}</td>
                <td>{{ $product->pivot->quantity }}</td>
                <td>{{ number_format($product->pivot->quantity * $product->sale_price, 2) }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <h3>@lang('site.total') <span>{{ number_format($order->total_price, 2) }}</span></h3>

</div>

<button class="btn btn-block btn-primary print-btn"><i class="fa fa-print"></i> @lang('site.print')</button>
