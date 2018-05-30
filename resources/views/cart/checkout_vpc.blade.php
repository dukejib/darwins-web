@extends('layouts.master')

@section('title')
    Check Out
@endsection

@section('content')

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        
        <div class="panel panel-primary">

            <div class="panel-heading">Pay via African Express VPC</div>

            <div class="panel-body">
               <h3>Pay with African Express VPC</h3>
               <h3>Total Amount : {{ $total }}</h3>
               <h3>Order id : {{ $orderid }} </h3>
            </div>

        </div>

    </div>
</div>

@endsection

