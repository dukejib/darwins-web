@extends('layouts.master')

@section('title')
    Check Out
@endsection

@section('content')

<div class="row">
    <div class="col-md-8 col-xs-offset-2">
        
        <div class="panel panel-primary">
            <div class="panel-heading">
                @if($option == 1)
                    Pay Now with African Express VPC
                @elseif($option == 2)
                    Pay Now with USPS Money Order
                @elseif($option == 3)
                    Pay Now with Bitcoin
                @endif
            </div>

            <div class="panel-body">
                @if($option == 1)
                    <h3>Pay with African Express VPC</h3>
                @elseif($option == 2)
                    <h4>Please make your USPS money order payable on the following name & addreess</h4> 
                    <pre>
                    <h3>
                    Tarik C. Richards
                    More Credit Card Services
                    22078 Arbor Avenue Suite #234
                    Hayward, California 94541 
                    </h3>
                    </pre>

                @elseif($option == 3)
                    <h3>Pay by Bitcoin</h3>
                @endif
            </div>

            <div class="panel-footer">
                <button class="btn btn-success btn-block"  data-toggle="modal" data-target="#refillModal">Payment Procedure</button>
            </div>

        </div>

    </div>
</div>

<!-- Modal Refill Statement -->
<div id="refillModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Payment Refill Statement</h4>
        </div>
        <div class="modal-body">
            {!! $settings->refill_statement  !!}
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Cancel</button>
        </div>
    </div>

    </div>
</div>

@endsection