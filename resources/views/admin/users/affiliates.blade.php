@extends('layouts.master2')

@section('title')
    Our Affiliates
@endsection

@section('content')
   <div class="panel panel-primary">
       <div class="panel-heading">
           Our Affiliates
       </div>

       <div class="panel-body">
           @if($affiliates->count() > 0)
               <table class="table table-striped table-condensed" id="affiliates">
                   <thead>
                   <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Un Affiliate</th>
                        <th>View User</th>
                        <th>Delete User</th>
                   </tr>
                   </thead>
                   <tbody>
                   @foreach($affiliates as $affiliate)
                       <tr id = "{{ $affiliate->id }}">
                           <td>{{ $affiliate->first_name }}</td>
                           <td>{{ $affiliate->last_name }}</td>
                           <td>{{ $affiliate->email }}</td>
                           <td>
                            @if(!$affiliate->isUserAffiliate())
                            <a href="{{ route('user.unaffiliate',['id' => $affiliate->id]) }}" class="btn btn-xs btn-warning">Unaffiliate</a>
                            @endif
                            </td>
                            <td>
                                <a href="#" class="btn btn-xs btn-success">View User</a>
                            </td>
                            <td>
                                <button type="button" id="deleteUser"  class="btn btn-danger btn-xs" value="{{ $affiliate->id }}" url = "{{ route('user.delete',['id' => $affiliate->id]) }}">Delete User</button>
                            </td>
                       </tr>
                   @endforeach
                   </tbody>
               </table>
           @else
               <p class="text-center">There are no record for Affiliates</p>
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

@section('scripts')
    <script>
    $(document).ready( function () {
        $('#affiliates').DataTable();
    } );
    </script>
@endsection 