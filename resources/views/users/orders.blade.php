@extends('layouts.master')

@section('content')

<div class="well">

    <div class="page-header">   
        <h3>Your Orders
        <br>
        <small>list of all of your orders</small>
        </h3>
    </div>



{{--  Orders  --}}
<div id="orders">
    <br>
    <div class="panel-body">
    @if(count($orders)> 0)
        <table class="display">
            <thead>
            <tr>
                <th>Order Id</th>
                <th>SubTotal</th>
                <th>F.E.D</th>
                <th>Shipping</th>
                <th>Total (USD)</th>
                <th>Total (BTC)</th>
                <th>Status</th>
                <th>Details</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>${{ $order->sub_total }}</td>
                <td>${{ $order->tax }}</td>
                <td>${{ $order->shipping_charges }}</td>
                <td>${{ $order->order_total_usd }}</td>
                <td>{{ $order->order_total_btc }}</td>
                <td>
                @if( $order->status == 1)
                    <span class="text-success">Paid</span>
                @else
                    <span class="text-danger">Pending</span>
                @endif
                </td>
                <td>
                    <button type="button" class="btn btn-xs btn-info"
                    data-toggle="modal" data-target="#orderDetailsModal" data-details="{{$order->order_details}}" data-order="{{$order}}">
                        <i class="fa fa-binoculars"></i>
                    </button>
                </td>
                <td>
                    <button class="btn btn-danger btn-xs" disabled>Delete</button>
                </td>
            </tr>
            
            @endforeach
            </tbody>
            
        </table>

    @else
        <div class="text-center">There are no Orders Defined</div>
    @endif

    </div> 
</div>


</div>


{{--  Modal Order Details  --}}
<div id="orderDetailsModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title primary-text-color">Order Details</h3>
                
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

{{--  Modal Qr Code  --}}
<div id="showQR" class="modal fade" role="dialog">
    <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header text-primary">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Bitcoin Payment Adress</h4>
        </div>
        <div class="modal-body" id="qr">
            
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-success pull-right" data-dismiss="modal">ok</button>
        </div>
    </div>

    </div>
</div>


{{--  Modal Pay Now  --}}
<div id="payNowModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title primary-text-color">Select Payment Option</h3>
                
            </div>
            <div class="modal-body">

                <div class="form-group text-center">
                    <label class="btn btn-info">
                        <input type="radio" name="paymentoptions" value="1" class="hidden">
                        <img src="{{ asset('img/aevpclogo2.png') }}" class="img-responsive img-thumbnail img-check" width="100px">
                    </label>
                    <label class="btn btn-info">
                        <input type="radio" name="paymentoptions" value="2" class="hidden">
                        <img src="{{ asset('img/upsmoney.png') }}" class="img-responsive img-thumbnail img-check"  width="100px">
                    </label>
                    <label class="btn btn-info">
                        <input type="radio" name="paymentoptions" value="3" class="hidden">
                        <img src="{{ asset('img/bitcoin.png') }}" class="img-responsive img-thumbnail img-check" width="100px" >
                    </label>
                
                </div>
               
                <a href="#" id="hidden_id" hidden></a>
                <a href="#" id="hidden_total" hidden></a>
            
            </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-danger pull-right" data-dismiss="modal">Cancel</button>
            <button class="btn btn-success pull-left" id="payNowProceed" data-url="{{ route('cart.paynow',['orderid' => 0,'payment' => 0]) }}">Proceed</button>
        </div>

        </div>

    </div>
</div>

@endsection

@section('scripts')
<script>
//Global Variables
$bitcoins = 0;
$paymentoption = 0;
$url = '';

$(document).ready(function(){
    //For Datatables - To use multiple tables, just follow below
    $('table.display').DataTable();
    //$('#mya').Datatable();
});

//Modal Script orderDetailsModal
$('#orderDetailsModal').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget); // Button that triggered the modal
    var details = button.data('details');
    var order = button.data('order'); // Extract info from data-* attributes
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
    html += "<tr><td colspan='3' style='text-align:right;'><strong>Grand Total</strong></td><td><strong>$" + order.order_total_usd + "</strong></td></tr>"

    //console.log(html);
    $('#mytable caption').html("Order # : " + order.id); //Set Heading
    $('#mytable tbody').html(html);
});

//Modal script showQR
$('#showQR').on('show.bs.modal',function(event){
    //$img = '<img src="https://blockchain.info/qr?data={{ $order->btc_address }} &size=200" class="img img-thumbnail img-responsive">';
    var button = $(event.relatedTarget);
    var order = button.data('order');

    var html = "<div class='text-center'><p>Bitcoin Payment Address <strong>";
    html += order.btc_address + "</strong> </p>";
    html += "<img src='https://blockchain.info/qr?data=" + order.btc_address + "&size=200' class='img img-thumbnail img-responsive'>";
    html += "<p>Please scan and send your payments via Bitcoins</p></div>";

    $('#qr').html(html);
});

// For Payment Options
$(document).ready(function(e){
    $('.img-check').click(function(e) {
        $('.img-check').not(this).removeClass('check').siblings('input').prop('checked',false);
        $(this).addClass('check').siblings('input').prop('checked',true);
        $paymentoption = $('input[name=paymentoptions]:checked').val();
        console.log($paymentoption);
        //$url = $('#mylink').attr('href').slice(0,-4);
        //console.log($url);
        //$href = $url + "/" + $paymentoption + "/" + $bitcoins;
        //$('#mylink').attr('href',$href);
    });	
});
    
//Modal script payNowModal
$('#payNowModal').on('show.bs.modal',function(event){
    var button = $(event.relatedTarget); //button that triggered the modal
    var order = button.data('order'); // Extract info from data-* attributes
    $('input[name="paymentoptions"]:checked').prop('checked', false); //I'm doing this coz every time new popup opens redio button will be reset to none. If you don't need to do this remove this line
    var modal = $(this);
    $('#hidden_id').html(order.id);   //Dynamically pass the order id
    $('#hidden_total').html(order.order_total); //Dynamically pass the order
});

//Modal script PayNowModal Proceed is clicked
$('#payNowProceed').on('click',function(){
    // No Option Selected
    if($paymentoption == 0){
        alert('Select payment option first');
        return;
    }
    //Your Ajax Call here
    var button = $('#payNowProceed'); //Get button reference
    //var order = button.data('order');
    var order_id = $('#hidden_id').html();
    var total = $('#hidden_total').html();
    $paymentoption =  $('input[name="paymentoptions"]:checked').val();
    $url = button.data('url').slice(0,-3); //Remove the trailing 0 from the url (hack around)
    //console.log($paymentoption);
    //console.log($url);
    //console.log(order_id);
    //console.log(total);
    //
    $.ajax({
        type: "GET",
        url: $url + order_id + '/' + $paymentoption,
        // url : '/customer/makeaffiliate/' +userId,
        // data: { "id" :userId},
        dataType: "json",
        success: function (response) {
            //AdminController is sending json reply:answer
            //console.log(response.reply); 
            //Hide and remove the relevant TR
            //console.log('#' + $userId);
            document.write(response);
        },
        error:function(){
            //alert('There was an error');
        }            
    });
    $('#payNowModal').modal('hide');
});

</script>
    
@stop