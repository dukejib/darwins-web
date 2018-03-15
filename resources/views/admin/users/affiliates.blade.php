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
                       <td>Id</td>
                       <td>First Name</td>
                       <td>Last Name</td>
                       <td>Email</td>
                       <td>Affiliation</td>
                   </tr>
                   </thead>
                   <tbody>
                   @foreach($affiliates as $affiliate)
                       <tr id = "{{ $affiliate->id }}">
                           <td><img src="{{ asset($affiliate->profile->avatar) }}" style="border-radius:50%" width="25px"></td>
                           <td>{{ $affiliate->first_name }}</td>
                           <td>{{ $affiliate->last_name }}</td>
                           <td>{{ $affiliate->email }}</td>
                           <td>
                            @if(!$affiliate->isUserAffiliate())
                             <button type="button" class="btn btn-danger btn-xs" id="unAffiliate" value="{{ $affiliate->id }}"  url = "{{ route('customer.unaffiliate',['id' => $affiliate->id]) }}">Unaffiliate</button>
                            {{--  <a href="{{ route('customer.unaffiliate',['id' => $affiliate->id]) }}" class="btn btn-xs btn-warning">Unaffiliate</a>  --}}
                            @endif
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

<!-- Modal -->
<div id="unAffiliateModal" class="modal fade" role="dialog">
      <div class="modal-dialog modal-sm">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Un Affiliate</h4>
      </div>
      <div class="modal-body">
        <p>Are you sure?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-xs pull-left" id="unAffiliateProceed">Proceed</button>
        <button type="button" class="btn btn-warning btn-xs pull-right" data-dismiss="modal">Cancel</button>
      </div>
    </div>

    </div>
</div>


@endsection

