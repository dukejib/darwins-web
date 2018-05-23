@extends('layouts.master')

@section('title')
    {{ $settings->site_name }}
@endsection

@section('content')

<div class="well">

    <div class="page-header">
        <h3>MCCS Referal Program
        <br>
        <small>Your referred contacts list</small>
        </h3>
    </div>

  {{--  Referal Information  --}}
<div id="refferal">

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
        <legend>
            <h4>List of Sponsored Affiliates</h4>
        </legend>
        {{--  Start the Table Here  --}}
        <table class="display">
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
            <legend class="text-success">
                <h4>Congratulations! on purchasing Affiliate Crowdfunding Book</h4>
                <small>Your Book purchase is in process.You will be given a download link to the book shortly</small>
            </legend>
            
        </div>
        @else
        <div>
            <a href="{{ route('user.profile.become_affiliate') }}" class="btn btn-success">Become Our Affiliate</a>
        </div>
        <br>
        <div>
            Read more about our <a href="{{ route('affiliate.document') }}" target="_blank">Affiliate</a> progarm.
        </div>
        @endif
    @endif

</div>


</div>


{{--  Modal User Details  --}}
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

@endsection

@section('scripts')
<script>

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
    
@stop