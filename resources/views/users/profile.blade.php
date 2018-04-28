@extends('layouts.master')

@section('title')
    {{ $settings->site_name }}
@endsection

@section('content')
    <div class="col-md-10 col-md-offset-1">

        <div class="panel panel-primary">

            <div class="panel-heading">
                Edit User Profile 
                @if($user->isUserAffiliate())
                    Affiliate
                @else
                    Customer
                @endif
            </div>

            <div class="row">

                <div class="profile_tabs">

                    @if(count($errors)>0)
                        @include('includes.errors')
                        <br>
                    @endif
                    
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#basic">Basic Information</a></li>
                        <li><a data-toggle="tab" href="#account">Account Settings</a></li>
                        <li><a data-toggle="tab" href="#contact">Contact Details</a></li>
                        <li><a data-toggle="tab" href="#referal">Referal</a></li>
                        <li><a data-toggle="tab" href="#orders">My Orders</a></li>
                    </ul>
                              
                    <div class="tab-content">
                        {{--  User Information  --}}
                        <div id="basic" class="tab-pane fade in active">
                            <h3>Basic Information</h3>
                            <div class="panel-body">
                                <form action="{{ route('user.profile.basic') }}" method="post" class="form-horizontal">
                                    {{ csrf_field() }} 
                                    <div class="form-group">
                                        <label for="first_name" class="control-label col-xs-3">First Name</label>
                                        <div class="col-xs-9">
                                            <input type="text" class="form-control" name="first_name" value="{{ $user->first_name }}">
                                        </div>
                                    </div>
                
                                    <div class="form-group">
                                        <label for="last_name" class="control-label col-xs-3">Last Name</label>
                                        <div class="col-xs-9">
                                            <input type="text" class="form-control" name="last_name" value="{{ $user->last_name }}">
                                        </div>
                                    </div>
                                            
                                    <div class="form-group">
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-success">Update Basic Data</button>
                                        </div>
                                    </div>
                
                                </form>
                            </div>
                        </div>

                        {{-- Account Settings   --}}
                        <div id="account" class="tab-pane fade">
                            <h3>Account Settings</h3>
                            <div class="panel-body">
                                <form action="{{ route('user.profile.account') }}" method="post" class="form-horizontal">
                                    {{ csrf_field() }} <!-- Must use this -->
                
                                    <div class="form-group">
                                        <label for="password" class="control-label col-xs-3">New Password</label>
                                        <div class="col-xs-9">
                                            <input type="password" class="form-control " name="password" value="">
                                        </div>
                                    </div>
        
                                    <div class="form-group">
                                        <label for="password_confirmation" class="control-label col-xs-3">Confirm Password</label>
                                        <div class="col-xs-9">
                                            <input type="password" class="form-control" name="password_confirmation" value="">
                                        </div>
                                    </div>
                                            
                                    <div class="form-group">
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-success">Update Account</button>
                                        </div>
                                    </div>
                
                                </form>
                            </div>
                        </div>

                        {{--  Contact Information  --}}
                        <div id="contact" class="tab-pane fade">
                            <h3>Contact Information</h3>
                            <div class="panel-body">
                                <form action="{{ route('user.profile.contact') }}" method="post" class="form-horizontal">
                                    {{ csrf_field() }} <!-- Must use this -->
                
                                    <div class="form-group">
                                        <label for="primary_contact_no" class="control-label col-xs-3">Primary Contact *</label>
                                        <div class="col-xs-9">
                                            <input type="text" class="form-control" name="primary_contact_no" value="{{ $profile->primary_contact_no}}">
                                        </div>
                                    </div>
        
                                    <div class="form-group">
                                        <label for="secondary_contact_no" class="control-label col-xs-3">Secondary Contact</label>
                                        <div class="col-xs-9">
                                            <input type="text" class="form-control" name="secondary_contact_no" value="{{ $profile->secondary_contact_no}}">
                                        </div>
                                    </div>
        
                                    <div class="form-group">
                                        <label for="postal_code" class="control-label col-xs-3">Postal Code</label>
                                        <div class="col-xs-9">
                                            <input type="text" class="form-control" name="postal_code" value="{{ $profile->postal_code}}">
                                        </div>
                                    </div>
        
                                    <div class="form-group">
                                        <label for="address" class="control-label col-xs-3">Address *</label>
                                        <div class="col-xs-9">
                                            <input type="text" class="form-control" name="address" value="{{ $profile->address }}">
                                        </div>
                                    </div>
        
                                    <div class="form-group">
                                        <label for="address_continued" class="control-label col-xs-3">Address Continued *</label>
                                        <div class="col-xs-9">
                                            <input type="text" class="form-control" name="address_continued" value="{{ $profile->address_continued}}">
                                        </div>
                                    </div>
        
                                    <div class="form-group">
                                        <label for="city" class="control-label col-xs-3">City *</label>
                                        <div class="col-xs-9">
                                            <input type="text" class="form-control" name="city" value="{{ $profile->city}}">
                                        </div>
                                    </div>
        
                                    <div class="form-group">
                                        <label for="country" class="control-label col-xs-3">Country *</label>
                                        <div class="col-xs-9">
                                            <input type="text"" class="form-control" name="country" value="{{ $profile->country }}  ">
                                        </div>
                                    </div>
        
                                    <!--
                                    <div class="form-group">
                                        <label for="avatar" class="control-label col-xs-3">Upload New Avatar</label>
                                        <div class="col-xs-9">
                                            <input type="file" name="avatar" class="form-control">
                                        </div>
                                    </div>
                                    -->
                                            
                                    <div class="form-group">
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-success">Update Contact Information</button>
                                        </div>
                                    </div>        
                                </form>
                            </div>
                        </div>

                        {{--  Referal Information  --}}
                        <div id="referal" class="tab-pane fade">
                           
                            <h3>Your Referal Link</h3>
                            <div class="panel-body">
                                @if($user->isUserAffiliate())
                                <div class="form-control">
                                    <label for="">{{url('/').'/referred?refferal='.$user->affiliate_id}}</label>
                                </div>
                                <div class="form-control">
                                    <label for="">Reffered By</label>
                                    {{ $user->referredBy() }}
                                </div>
                                <div class="form-control">
                                    <label for="">Total Affiliates</label>
                                    {{ $user->totalAffiliates() }}
                                </div>
                                @else
                                    @if($user->hasOptedForBook())
                                    <div>
                                        <strong class="text-primary"><h4>Your Book purchase is in process. Please check these page later on for updates</h4></strong>
                                    </div>
                                    @else
                                    <div>
                                        <a href="{{ route('user.profile.become_affiliate') }}" class="btn btn-success">Become Our Affiliate</a>
                                    </div>
                                    <div>
                                        Read more about our <a href="{{ route('affiliate.document') }}" target="_blank">Affiliate</a> progarm.
                                    </div>
                                    @endif
                                @endif
                            </div>

                        </div>

                        {{--  Orders  --}}
                        <div id="orders" class="tab-pane fade">
                            <h3>My Orders</h3>  
                            <div class="panel-body">
                            
                            @if(count($orders)> 0)
                                <table class="table table-striped table-condensed display" id="ordersTable">
                                    <thead>
                                    <tr>
                                        <th>Order Id</th>
                                        <th>SubTotal</th>
                                        <th>F.E.D</th>
                                        <th>Shipping</th>
                                        <th>Total</th>
                                        <th>Delivery Status</th>
                                        <th>Payment Status</th>
                                        <th>Details</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($orders as $order)
                                    <tr>
                                        <td>{{ $order->id }}</td>
                                        <td>${{ $order->sub_total }}</td>
                                        <td>${{ $order->tax }}</td>
                                        <td>${{ $order->shipping_charges }}</td>
                                        <td>${{ $order->order_total }}</td>
                                        <td>
                                            @if($order->delivery_status == 1) 
                                                <span class="text-warning">Pending</span> 
                                            @elseif($order->delivery_status == 2) 
                                                <span class="text-info">Transit</span> 
                                            @elseif($order->delivery_status == 3) 
                                                <span class="text-success">Delivered</span> 
                                            @endif
                                        </td>
                                        <td>
                                            @if($order->delivery_status == 1)
                                                <button type="button" class="btn btn-xs btn-success" title="You haven't paid against your order yet." data-toggle="modal" data-target="#payNowModal" data-orderid="{{$order->id}}">Pay Now</button>
                                            @elseif($order->delivery_status == 2) 
                                                <a href="#" class="btn btn-xs btn-warning"  title="You have partially paid us, please complete your payment">Complete Payment</a>
                                                <span class="text-info">Partial Paid</span> 
                                            @elseif($order->delivery_status == 3) 
                                                <span class="text-success" title="we have received full payment against your order">Fully Paid</span> 
                                            @endif
                                        </td> 
                                        <td>
                                            <button type="button" class="btn btn-xs btn-info"
                                            data-toggle="modal" data-target="#orderDetailsModal" data-details="{{$order->order_details}}" data-who="{{$order}}">
                                                <i class="fa fa-binoculars"></i>
                                            </button>
                                        </td>
                                    </tr>
                                   
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Order Id</th>
                                            <th>SubTotal</th>
                                            <th>F.E.D</th>
                                            <th>Shipping</th>
                                            <th>Total</th>
                                            <th>Delivery Status</th>
                                            <th>Payment Status</th>
                                            <th>Details</th>
                                        </tr>
                                    </tfoot>
                                </table>
             
                            @else
                                <div class="text-center">There are no Orders Defined</div>
                            @endif
                            <br>
                            <br>
                            <br>
                            <br>
                            </div> 
                        </div>

                     {{-- tab Content   --}}
                    </div>
                
                {{--  End of profile_tabs  --}}
                </div> 
            {{--  End of row  --}}
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br><br>

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

<!-- Modal Pay Now -->
<div id="payNowModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title text-danger">Select Payment Option</h3>
                
            </div>
            <div class="modal-body">
                
                <div class="radio text-center">
                    <label>
                        <input type="radio" name="paymentoptions" value="1">African Express VPC&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" name="paymentoptions" value="2">USPS Money Orders&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" name="paymentoptions" value="3">Bitcoin Payment&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </label>
                </div>

            </div>

        <div class="modal-footer">
                <?php 
                    $paymentoption = 0; //Hack for proper route - actual value is changed from jquery
                ?>
            <button type="button" class="btn btn-danger pull-right" data-dismiss="modal">Cancel</button>
            <button class="btn btn-success pull-left" id="payNowProceed" data-url="{{ route('cart.checkout',['toggle' => 1,'pay' => $paymentoption ]) }}">Proceed</button>
        </div>

        </div>

    </div>
</div>

@endsection

@section('scripts')
    <script>
    //For Datatable
    $(document).ready( function () {
        $('#ordersTable').DataTable();
    });
    
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
        html += "<tr><td colspan='3' style='text-align:right;'><strong>Grand Total</strong></td><td><strong>$" + order.order_total + "</strong></td></tr>"

        //console.log(html);
        $('#mytable caption').html("Order # : " + order.id); //Set Heading
        $('#mytable tbody').html(html);
    });
    
    //Modal script payNowModal
    $('#payNowModal').on('show.bs.modal',function(event){
        var button = $(event.relatedTarget); //button that triggered the modal
        $('input[name="paymentoptions"]:checked').prop('checked', false); //I'm doing this coz every time new popup opens redio button will be reset to none. If you don't need to do this remove this line
        var orderId = button.data('orderid');
        //
        var modal = $(this);
    });
    // Read radio button changes
    // These variables will be used
    $paymentoption = 0;
    $url = '';
    //Modal script PayNowModal Proceed is clicked
    $('#payNowProceed').on('click',function(){
        //Your Ajax Call here
        var button = $('#payNowProceed'); //Get button reference
        $paymentoption =  $('input[name="paymentoptions"]:checked').val();
        $url = button.data('url').slice(0,-1); //Remove the trailing 0 from the url (hack around)
        console.log($paymentoption);
        console.log($url);
    });
    </script>
@endsection