@extends('layouts.master2')

@section('content')

        <div class="panel panel-primary">
            <div class="panel-heading">
                Our Customers
            </div>

            <div class="panel-body">
                @if($customers->count() > 0)
                    <table class="table table-striped table-condensed" id="affiliates">
                        <thead>
                        <tr>
                            <td>Image</td>
                            <td>First Name</td>
                            <td>Last Name</td>
                            <td>Email</td>
                            <td>Affiliation</td>
                            <td>Delete User</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($customers as $customer)
                            <tr id ="{{ $customer->id }}"  >
                                <td><img src="{{ asset($customer->profile->avatar) }}" style="border-radius:50%" width="25px"></td>
                                <td>{{ $customer->first_name }}</td>
                                <td>{{ $customer->last_name }}</td>
                                <td>{{ $customer->email }}</td>
                                <td>
                                @if(!$customer->isUserAffiliate())
                               <a href="{{ route('user.affiliate',['id' => $customer->id]) }}" class="btn btn-xs btn-warning">Make Affiliate</a>
                                @endif
                                </td>
                                <td>
                                <button type="button" id="deleteUser"  class="btn btn-danger btn-xs" value="{{ $customer->id }}" 
                                url = "{{ route('user.delete',['id' => $customer->id]) }}">Delete User</button>
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
        <h4 class="modal-title">Delete User</h4>
      </div>
      <div class="modal-body">
        <p>Are you sure?</p>
        This means the user will be deleted permanently. This user will not be recoverable anymore.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-xs pull-left" id="delete">Delete Permanently</button>
        <button type="button" class="btn btn-default btn-xs pull-right" data-dismiss="modal">Cancel</button>
      </div>
    </div>

    </div>
</div>

@endsection
