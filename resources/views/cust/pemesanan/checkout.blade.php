@extends('layouts.app')

@section('content')
<script type="text/javascript"
      src="{{config('midtrans.snap_url'}}"
      data-client-key="{{ config('midtrans.client_key')}}"></script>    
    <div class="container mt-5">
        <h1 style="margin-top: 100px;">Detail Pesanan</h1>
        <div class="order-details">
        <table>
        <tr>
            <td>Nama penyedia</td>
            <td> : {{ $order->nama_penyedia }}</td>
            </tr>
            <tr>
            <td>Harga</td>
            <td> : {{ $order->total_bayar }}</td>
            </tr>
            <tr>
            <td>Nama customer</td>
            <td> : {{ $order->nama_customer }}</td>
            </tr>
            <tr>
            <td>No telpon</td>
            <td> : {{ $order->phone }}</td>
            </tr>
            <tr>
            <td>Alamat</td>
            <td> : {{ $order->alamat }}</td>
            </tr>
            <tr>
            <td>Status Pembayaran</td>
            <td> : {{ $order->status }}</td>
            </tr>
            <tr>
        </table>
        <button class="btn btn-primary" id="pay-button">Bayar Sekarang</button>
    </div>

<script type="text/javascript">
  var payButton = document.getElementById('pay-button');
  payButton.addEventListener('click', function () {
    // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
    window.snap.pay('{{ $snapToken }}', {
      onSuccess: function(result){
        /* You may add your own implementation here */
        alert("payment success!"); 
        window.location.href = '/invoice/{{$order->id}}'
        console.log(result);
      },
      onPending: function(result){
        /* You may add your own implementation here */
        alert("wating your payment!"); console.log(result);
      },
      onError: function(result){
        /* You may add your own implementation here */
        alert("payment failed!"); console.log(result);
      },
      onClose: function(){
        /* You may add your own implementation here */
        alert('you closed the popup without finishing the payment');
      }
    })
  });
</script>
@endsection
