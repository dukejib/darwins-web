@extends('layouts.master2')

@section('title')
    Newsletters Subscriptions
@endsection

@section('content')

    <div class="panel panel-primary">
        <div class="panel-heading">
            Orders
            {{--  Orders - Total : ({{ $orders->total()}}) Records  --}}
        </div>

        <div class="panel-body">
              @if(count($orders)> 0)
                <table class="table table-striped table-condensed" id="orders">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>User</th>
                        <th>SubTotal</th>
                        <th>F.E.D</th>
                        <th>Shipping</th>
                        <th>Total (USD)</th>
                        <th>Total (BTC)</th>
                        <th>QR Address</th>
                        <th>Details</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                        <tr>
                            {{--  using url::to because we need the exact url , which is needed in service pages  --}}
                            <td>{{ $order->id }}</td>
                            <td>
                                {{ $order->user->first_name . ' ' . $order->user->last_name }}
                            </td>
                            <td>${{ $order->sub_total }}</td>
                            <td>${{ $order->tax }}</td>
                            <td>${{ $order->shipping_charges }}</td>
                            <td>${{ $order->order_total_usd }}</td>
                            <td>{{ $order->order_total_btc }}</td>
                            <td>{{ $order->btc_address }}</td>
                            <td>
                                <button type="button" class="btn btn-xs btn-info"
                                    data-toggle="modal" data-target="#orderDetailsModal" data-details="{{$order->order_details}}" data-who="{{$order}}">
                                    <i class="fa fa-binoculars"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    {{--  <tfoot>
                        <tr>
                            <td colspan="5" class="text-center"> {{ $orders->links()}}</td>
                        </tr>
                    </tfoot>  --}}
                </table>
             
            @else
                <div class="text-center">There are no Orders Defined</div>
            @endif
        </div>

    </div>

<!-- Modal Order Details -->
<div id="orderDetailsModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title text-danger">Order Details</h3>
                
            </div>
            <div class="modal-body">
                <table class="table table-striped table-condensed" id="mytable">
                    <caption style="font-weight:bold;"></caption>
                    <br>
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Item</th>
                                <th>Qty</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                        {{--  Your Content will come here via jquery  --}}
                        </tbody>
                </table>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Ok</button>
            </div>
        </div>

    </div>
</div>

@endsection


@section('scripts')
    <script>
    //For Datatables
    $(document).ready( function () {
        $('#orders').DataTable();
    } );
    
    //Modal Script orderDetailsModal
    $('#orderDetailsModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var details = button.data('details');
        var order = button.data('who'); // Extract info from data-* attributes
          // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
          // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this);
        var html = "";
        //console.log(details);
        for (i = 0 ; i < details.length ; i++){
            //console.log(details[i].item_qty);
            html += "<tr><td>" + details[i].item_id + "</td><td>" + details[i].item_name + "</td><td>" + details[i].item_qty + "</td><td>$" + details[i].item_price * details[i].item_qty + "  [" + details[i].item_price + "]</td></tr>";
        }
        //Now show the order details
        html += "<tr><td colspan='3' style='text-align:right;'><strong>Sub Total</strong></td><td><strong>$" + order.sub_total + "</strong></td></tr>"
        html += "<tr><td colspan='3' style='text-align:right;'>F.E.D Tax</td><td>$" + order.tax + "</td></tr>"
        html += "<tr><td colspan='3' style='text-align:right;'>Shipping Charges</td><td>$" + order.shipping_charges + "</td></tr>"
        html += "<tr><td colspan='3' style='text-align:right;'><strong>Grand Total (USD)</strong></td><td><strong>$" + order.order_total_usd + "</strong></td>"
        html += "<tr><td colspan='3' style='text-align:right;'><strong>Grand Total (BTC)</strong></td><td><strong>" + order.order_total_btc + "</strong></td></tr>"

        //console.log(html);
        $('#mytable caption').html("Order # : " + order.id); //Set Heading
        $('#mytable tbody').html(html);
    });

    </script>
@endsection


