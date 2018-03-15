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
                                <button type="button" id="makeAffiliate"  class="btn btn-success btn-xs" value="{{ $customer->id }}" url = "{{ route('customer.affiliate',['id' => $customer->id]) }}">Make Affiliate</button>
                                {{--  <a href="{{ route('customer.affiliate',['id' => $customer->id]) }}" class="btn btn-xs btn-success">Make Affiliate</a>  --}}
                                @endif
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


<!-- Modal -->
<div id="makeAffiliateModal" class="modal fade" role="dialog">
      <div class="modal-dialog modal-sm">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Make Affiliate</h4>
      </div>
      <div class="modal-body">
        <p>Are you sure?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success btn-xs pull-left" id="makeAffiliateProceed">Proceed</button>
        <button type="button" class="btn btn-warning btn-xs pull-right" data-dismiss="modal">Cancel</button>
      </div>
    </div>

    </div>
</div>


@endsection
