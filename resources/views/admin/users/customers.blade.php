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
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Orders</th>
                            <th>Affiliation</th>
                            <th>View</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($customers as $customer)
                            <tr id ="{{ $customer->id }}">
                                <td>{{ $customer->id }}</td>
                                <td>{{ $customer->first_name }}</td>
                                <td>{{ $customer->last_name }}</td>
                                <td>{{ $customer->email }}</td>
                                <td>{{ count($customer->orders) }}</td>
                                <td>
                                @if(!$customer->isUserAffiliate())
                                    <a href="{{ route('user.affiliate',['id' => $customer->id]) }}" class="btn btn-xs btn-warning">Make Affiliate</a>
                                @endif
                                </td>
                                <td>
                                    <a href="#" class="btn btn-xs btn-success">View User</a>
                                </td>
                                <td> 
                                    <a id="url" href="{{ route('user.delete',['id' => $customer->id]) }}" value="{{ $customer->id }}" hidden></a>
                                    <button type="button" id="deleteUser"  class="btn btn-danger btn-xs" data-toggle="modal" data-target="#deleteUserModal">
                                        Delete User
                                    </button>
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

<!-- Modal Affiliates -->
<div id="deleteUserModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-sm">

    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title text-danger">Delete User</h4>
        </div>
        <div class="modal-body">
            <p class="text-warning">Are you sure?</p>
            <i class="fa fa-close fa-trash" style="color:yellow;font-size:5em"></i> 
            By pressing DELETE PERMANENTLY , you would not be able to recover the User and related data anymore!
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger btn-xs pull-left" id="delete">Delete Permanently</button>
            <button type="button" class="btn btn-success btn-xs pull-right" data-dismiss="modal">Cancel</button>
        </div>
    </div>

    </div>
</div>

@endsection

@section('scripts')
    <script> 
        //For Data Table
        $(document).ready( function () {
            $('#customers').DataTable();
        });
    </script>
@endsection 