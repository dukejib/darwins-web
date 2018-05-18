@extends('layouts.master')

@section('title')
    {{ $settings->site_name }}
@endsection

@section('content')
<div class="col-md-12">

    @if($user->isUserAffiliate())

        <div class="panel panel-success">
            <div class="panel-heading">
                Edit Profile &nbsp; > &nbsp; Affiliate
    @else
        <div class="panel panel-primary">
            <div class="panel-heading">
                Edit Profile &nbsp; > &nbsp; Customer
    @endif
        </div>

        {{--  <div class="panel-body">  --}}

            <div class="profile_tabs">

                @if(count($errors)>0)
                    @include('includes.errors')
                    <br>
                @endif
                
                <ul class="nav nav-tabs" id="tabMenu">
                    <li class="active"><a data-toggle="tab" href="#basic">Basic Information</a></li>
                    <li><a data-toggle="tab" href="#account">Account Settings</a></li>
                    <li><a data-toggle="tab" href="#contact">Contact Details</a></li>
                    <li><a data-toggle="tab" href="#refferal">Referal</a></li>
                    <li><a data-toggle="tab" href="#orders">Orders</a></li>
                    @if($user->isUserAffiliate())
                        <li><a data-toggle="tab" href="#banners">Banners</a></li>
                        <li><a data-toggle="tab" href="#groups">Groups</a></li>
                    @endif
                </ul>
                            
                <div class="tab-content">
                    {{--  User Information  --}}
                    <div id="basic" class="tab-pane fade in active">
                        <div class="panel-body">
                            <br>
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
                        <br>
                        <div class="panel-body">
                            <form action="{{ route('user.profile.account') }}" method="post" class="form-horizontal">
                                {{--  Must USe This  --}}
                                {{ csrf_field() }} 
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
                        <br>
                        <div class="panel-body">
                            <form action="{{ route('user.profile.contact') }}" method="post" class="form-horizontal">
                                {{ csrf_field() }} 
            
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
                                        <input type="text" class="form-control" name="country" value="{{ $profile->country }}">
                                    </div>
                                </div>
    
                            
                                {{--  <div class="form-group">
                                    <label for="avatar" class="control-label col-xs-3">Upload New Avatar</label>
                                    <div class="col-xs-9">
                                        <input type="file" name="avatar" class="form-control">
                                    </div>
                                </div>  --}}
                                        
                                <div class="form-group">
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-success">Update Contact Information</button>
                                    </div>
                                </div>        
                            </form>
                        </div>
                    </div>

                    {{--  Referal Information  --}}
                    <div id="refferal" class="tab-pane fade">
                        <br>
                        <div class="panel-body">
                            @if($user->isUserAffiliate())
                            {{--  User Row/cols to properly show data  --}}
                            <div class="row">
                                <div class="col-md-8">
                                    
                                    <div class="panel panel-success">
                                        <div class="panel-heading">Referal Link</div>
                                        <div class="panel-body"> 
                                            <span class="text-success" style="font-size:14px;">
                                                {{url('/').'/referred?refferal='.$user->affiliate_id}}
                                            </span>
                                            <button id="refCopy" class="btn btn-xs btn-success copybtn" data-clipboard-text=<?php echo url('/').'/referred?refferal=' . $user->affiliate_id; ?> title="Copy the Referal Code" ><span class="fa fa-copy"></span></button>                                            
                                        </div>
                                    </div>

                                    <div class="panel panel-info">
                                        <div class="panel-heading">Your were Refered By</div>
                                        <div class="panel-body"> 
                                            <h5 class="text-info">Name : {{ $user->referredBy()->first_name . ' ' . $user->referredBy()->last_name  }}</h5>
                                            <h5 class="text-info">Email Address : {{ $user->referredBy()->email }}</h5>                                          
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="panel panel-primary">
                                        <div class="panel-heading text-center">You Sponsored</div>
                                        <div class="panel-body">
                                            <h1 class="text-center">{{ $user->totalAffiliates() }}</h1>
                                            <h5 class="text-center">Affiliates</h5>
                                        </div>
                                    </div>
                          
                                </div>
                            </div>
                            <br>
                            <hr>
                                @if(count($user->totalAffiliates())>0)
                                <p class="myp"><strong>List of Sponsored Affiliates</strong></p>
                                {{--  Start the Table Here  --}}
                                <table class="display" id="mya">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Profile</th>
                                            <th>Opted For Book</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    {{--  Get Our Affiliates  --}}
                                    @foreach($user->getMyAffiliates()  as $customer)
                                        <tr id ="{{ $customer->id }}">
                                            <td>{{ $customer->id }}</td>
                                            <td>{{ $customer->first_name . ' ' . $customer->last_name }}</td>
                                            <td>{{ $customer->email }}</td>
                                            <td>
                                            <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#userDetailsModal" data-customer="{{ $customer }}" data-profile="{{ $customer->getUserProfile($customer->id) }}">Details</button>
                                            </td>
                                            <td>
                                                @if($customer->book_optin)
                                                    <span class="text-success">Yes</span>
                                                @else
                                                    <span class="text-info">No</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                @endif
                            @else
                                @if($user->hasOptedForBook())
                                <div>
                                    <strong class="text-primary"><small>Your Book purchase is in process. Please check these page later on for updates</small></strong>
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

                    {{--  Groups  --}}
                    <div id="groups" class="tab-pane fade">
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="panel panel-success">
                                    <div class="panel-heading">Create a Group</div>
                                    <div class="panel-body">
                                    {{--  Create Group Form  --}}
                                    <form action="{{ route('user.group.create') }}" method="post">
                                        <div class="form-group">
                                            <label for="group_title">Title</label>
                                            <input type="text" name="group_title" id="group_title" class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Create Group</button>
                                        </div>
                                        {{ csrf_field() }}
                                    </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                            @if(count($groups)>0)
                            <table class="display">
                                <thead>
                                    <tr>
                                        <th>Group Name</th>
                                        <th>Status</th>
                                        <th>Operation</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($groups as $group)
                                    <tr>
                                        <td>{{ $group->group_title }}</td>
                                        <td>
                                        @if ($group->group_title == 0)
                                            <button class="btn btn-xs btn-success">Active</button>
                                        @elseif ($group->group_title == 1)
                                            <button class="btn btn-xs btn-warning">Deactive</button>
                                        @endif
                                        </td>
                                        <td>
                                        <button class="btn btn-xs btn-info"><i class="fa fa-pencil"></i> Edit</button>
                                        <button class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Delete</button>
                                        </td>
                                     </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @else
                                <p>You have not created any groups yet</p>
                            @endif
                            </div>
                        </div> 
                    </div>

                    {{--  Orders  --}}
                    <div id="orders" class="tab-pane fade">
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
                                    <th>Payment Status</th>
                                    <th>QR</th>
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
                                    <td>${{ $order->order_total_btc }}</td>
                                    <td>
                                        Pending
                                        {{--  <button type="button" class="btn btn-xs btn-success" data-toggle="modal" data-target="#payNowModal" data-order="{{$order}}">Pay Now</button>  --}}
                                    </td>
                                    <td>
                                    @if($order->btc_address != null)
                                        <button type="button" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#showQR" data-order="{{$order}}">Show QR</button>
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
                    
                    {{-- Banners Settings   --}}
                    <div id="banners" class="tab-pane fade">
                        <br>
                        <div class="panel-body">
                            <h4>Banners</h4>
                            @if(count($banners)>0)
                            <p>To Use these Banners, Copy and Paste the HTML Code Below Into Any HTML Area On Your Site. Just hover over the link and <kbd>right click</kbd> and select <kbd>Copy</kbd> from the menu</p>
                            <br>
                                @foreach($banners as $banner)
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="">Banner Preview :{{ $banner->title }}</label>
                                        <img src="{{ URL::to('/img/web_banners/' . $banner->image) }}"  width="450px" class="img img-responsive banner-img-responsive">
                                    </div>

                                    <div class="col-md-6">
                                    <!-- PHP CODE HERE -->
                                    <?php 
                                        $text = "<a href='";
                                        $text .= url('/') . '/referred?refferal=' . $user->affiliate_id . "'";
                                        $text .= " target='_blank'><img src='";
                                        $text .= URL::to('/img/web_banners/' . $banner->image);
                                        $text .= "' alt=''></a>" ;
                                    ?>
                                    <!-- PHP CODE ENDS HERE -->
                                        <textarea id="{{ $banner->title }}" class="form-control" rows="3" cols="10" onmouseover="this.select()">{{$text}}</textarea>
                                    </div>
                                
                                </div> <!-- Div Row End -->
                                <hr>
                                @endforeach
                            @endif
                        </div>
                    </div>

                    {{-- tab Content   --}}
                </div>
            
            {{--  End of profile_tabs  --}}
            </div> 
        {{--  End of row  --}}
      
    </div>
    
</div>
<br>
<br>
<br>
<br>

<!-- Modal Order Details -->
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

<!-- Modal User Details-->
<div id="userDetailsModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header text-primary">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">User Information</h4>
        </div>
        <div class="modal-body" id="userDetailBody">
            
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-success pull-right" data-dismiss="modal">ok</button>
        </div>
    </div>

    </div>
</div>

<!-- Modal Or Code-->
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

        //For Clipboard.js
        $('.copybtn').on('click',function(){
            $id = this.id;
            console.log('clicked ' + $id);
            var btn = document.getElementById($id);
            var clipboard = new ClipboardJS(btn);
        });
        
        //For Banner TextArea - just selects all data
        $('textarea').hover(function(){
            $(this).focus();
            $(this).select();
            var text = $(this).text();
            console.log('Text copied from TextArea');
        });

        //Ensure we are on exact Tab
        $('#tabMenu a[href="#{{old('tab')}}"]').tab('show');

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
       //For Modal userDetailsModal
    $('#userDetailsModal').on('show.bs.modal',function(event){
        var button = $(event.relatedTarget);
        var customer = button.data('customer');
        var profile = button.data('profile');
        //console.log(profile);
        //console.log(customer);
        //Profile is returned as an array of object . to access it use profile[0].address [first array > then object > then value]
        var html ='<h3>User Id : ' + customer.id + '</h3>'; 
        html += '<table class="table table-striped table-condensed"><tbody>'; 
        html += '<tr><td>Name</td><td>' + customer.first_name + ' ' + customer.last_name + '</td></tr>';
        html += '<tr><td>Affiliation Id</td><td>' + customer.affiliate_id + '</td></tr>';
        html += '<tr><td>Member Since</td><td>' + customer.created_at + '</td></tr>';
        html += '<tr><td>Email Address</td><td>' + customer.email + '</td></tr>';
        html += '<tr><td>Primary Contact #</td><td> ' + profile[0].primary_contact_no + '</td></tr>';
        html += '<tr><td>Secondary Contact #</td><td> ' + profile[0].secondary_contact_no + '</td></tr>';
        html += '<tr><td>Mailing Address #</td><td> ' + profile[0].address+ ' ' + profile[0].address_continued + '</td></tr>';
        html += '<tr><td>Postal Code</td><td> ' + profile[0].postal_code + '</td></tr>';
        html += '<tr><td>City</td><td> ' + profile[0].city + '</td></tr>';
        html += '<tr><td>Country</td><td>' + profile[0].country + '</td></tr>';
        html += '</tbody></table>';
        
        //Add the data to the body of modal
        $('#userDetailBody').html(html);
        
    });

    </script>
@endsection