<table class="table table-condensed">
    <tbody>
    <tr>
        <th style="width: 10px">#</th>
        <th>Name</th>
        <th>Avatar</th>
        <th>Price</th>
        <th>Qty</th>
        <th>Total</th>
        <th>Action</th>
    </tr>
    @foreach($orders as $item)
        <tr>
            <td>#{{ $item->id }}.</td>
            <td><a href="">{{ $item->product->pro_name ?? "[N\A]" }}</a></td>
            <td>
                <img alt="" style="width: 60px;height: 80px" src="{{ asset(pare_url_file($item->product->pro_avatar ?? "")) }}" >
            </td>
            <td>{{ number_format($item->od_price,0,',','.') }} đ</td>
            <td>{{ $item->od_qty }}</td>
            <td>{{ number_format($item->od_price * $item->od_qty,0,',','.') }} đ</td>
            <td>
                <a href="" class="btn btn-xs btn-danger js-delete-order-item">Delete</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
