@extends('layouts.master2')

@section('content')

<div class="panel panel-primary">
    <div class="panel-heading">
        Our Customers
    </div>

    <div class="panel-body">
        @if($customers->count() > 0)
            <table class="table table-striped table-condensed" id="customers">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Orders</th>
                    <th>Opted for Book</th>
                    <th>Affiliation</th>
                    <th>View</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach($customers as $customer)
                    <tr id ="{{ $customer->id }}">
                        <td>{{ $customer->id }}</td>
                        <td>{{ $customer->first_name . ' ' . $customer->last_name }}</td>
                        <td>{{ $customer->email }}</td>
                        <td>{{ count($customer->orders) }}</td>
                        <td>
                        @if($customer->book_optin)
                            <span class="text-success">Yes</span>
                        @else
                            <span class="text-info">No</span>
                        @endif
                        </td>
                        <td>
                            <button class="btn btn-warning btn-xs" data-toggle="modal" data-target="#makeAffiliateModal"  data-url="{{ route('user.affiliate',['id' => $customer->id]) }}" data-userid="{{ $customer->id }}">Make Affiliate</button>
                        </td>
                        <td>
                            <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#userDetailsModal" data-details="{{ $customer }}">Details</button>
                        </td>
                        <td> 
                            <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#deleteUserModal" data-url="{{ route('user.delete',['id' => $customer->id]) }}" data-userid="{{ $customer->id }}">Delete User</button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <p class="text-center">There is no record for Customers</p>
        @endif
    </div>
</div>

<!-- Modal Delete Customer -->
<div id="deleteUserModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Delete User</h4>
        </div>
        <div class="modal-body">
            <p class="text-warning">Are you sure?</p>
            By pressing <strong class="text-warning">DELETE PERMANENTLY</strong> , you would not be able to recover the User and related data anymore!
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger pull-left" id="delete">Delete Permanently</button>
            <button type="button" class="btn btn-success pull-right" data-dismiss="modal">Cancel</button>
        </div>
    </div>

    </div>
</div>

<!-- Modal Show User Info -->
<div id="userDetailsModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
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

<!-- Modal Make Affiliate -->
<div id="makeAffiliateModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Make Affiliate</h4>
        </div>
        <div class="modal-body">
            <p class="text-warning">Are you sure?</p>
            Only make the user an <strong class="text-info">Affiliate</strong> if he/she has purchased our book <strong class="text-info">Affiliate Crowdfunding</strong> and submitted the amount.
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger pull-left" id="makeAffiliate">Make Affiliate</button>
            <button type="button" class="btn btn-success pull-right" data-dismiss="modal">Cancel</button>
        </div>
    </div>

    </div>
</div>

@endsection

@section('scripts')
<script> 
    //Globally Used Variables
    $userId = "";
    $url = "";

    //For Data Table
    $(document).ready( function () {
        $('#customers').DataTable();
    });

    //For Modal deleteUserModal
    $('#deleteUserModal').on('show.bs.modal',function(event){
        var button = $(event.relatedTarget); //Get Reference to the Button
        $url = button.data('url');
        $userId = button.data('userid');
        console.log($url);
        console.log($userId);
        //This uses Modal Proceed Button
        $('#delete').on('click', function () {
            //
            $.ajax({
                type: "GET",
                url: $url,
                // url : '/customer/makeaffiliate/' +userId,
                // data: { "id" :userId},
                dataType: "json",
                success: function (response) {
                    //AdminController is sending json reply:answer
                    //console.log(response.reply); 
                    //Hide and remove the relevant TR
                    //console.log('#' + $userId);
                    $('#' + $userId).fadeOut(1000,function(){
                        $('#' + $userId).remove();
                    });
                    //document.write(response);
                },
                error:function(){
                    //alert('There was an error');
                }            
            });
            $('#deleteUserModal').modal('hide');
        });
    });

    //For Modal userDetailsModal
    $('#userDetailsModal').on('show.bs.modal',function(event){
        var button = $(event.relatedTarget);
        var details = button.data('details');
        console.log(details);
        var html ='<h3>User Id : ' + details.id + '</h3>'; 
        html += '<table class="table table-striped table-condensed"><tbody>'; 
        html += '<tr><td>Name</td><td>' + details.first_name + ' ' + details.last_name + '</td></tr>';
        html += '<tr><td>Affiliation Id</td><td>' + details.affiliate_id + '</td></tr>';
        html += '<tr><td>Member Since</td><td>' + details.created_at + '</td></tr>';
        html += '<tr><td>Email Address</td><td>' + details.email + '</td></tr>';
        html += '<tr><td># of Orders</td><td>' + details.orders.length + '</td></tr>';
        html += '<tr><td>Has Opted for Book</td><td id="optin"> ' + details.book_optin + '</td></tr>';
        html += '</tbody></table>';
        html += '<h5>For Orders, Please check Orders Page</h5>';
        //Add the data to the body of modal
        $('#userDetailBody').html(html);
        
    });

    //For Modal makeAffliateModal
    $('#makeAffiliateModal').on('show.bs.modal',function(event){
        var button = $(event.relatedTarget); //Get the reference to the button 
        $url = button.data('url');
        $userId = button.data('userid');
        console.log($url);
        console.log($userId);
        //This uses Modal Make Affiliate Button
        $('#makeAffiliate').on('click',function(){
            //
            $.ajax({
                type: "GET",
                url: $url,
                // url : '/customer/makeaffiliate/' +userId,
                // data: { "id" :userId},
                dataType: "json",
                success: function (response) {
                    //AdminController is sending json reply:answer
                    //console.log(response.reply); 
                    //Hide and remove the relevant TR
                    //console.log('#' + $userId);
                    $('#' + $userId).fadeOut(1000,function(){
                        $('#' + $userId).remove();
                    });
                    //document.write(response);
                },
                error:function(){
                    //alert('There was an error');
                }            
            });
            $('#makeAffiliateModal').modal('hide');
        })
    });
</script>
@endsection 