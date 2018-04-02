@extends('layouts.master2')

@section('title')
    Newsletters Subscriptions
@endsection

@section('content')

    <div class="panel panel-primary">
        <div class="panel-heading">
            Orders
            {{--  Orders - Total : ({{ $orders->total()}}) Records  --}}
        </div>

        <div class="panel-body">
              @if(count($orders)> 0)
                <table class="table table-striped table-condensed" id="orders">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>User</th>
                        <th>SubTotal</th>
                        <th>F.E.D</th>
                        <th>Shipping</th>
                        <th>Total</th>
                        <th>Delivery Status</th>
                        <th>Payment Status</th>
                        <th>Details</th>
                        <th>Edit</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                        <tr>
                            {{--  using url::to because we need the exact url , which is needed in service pages  --}}
                            <td>{{ $order->id }}</td>
                            <td>
                                {{ $order->user->first_name . ' ' . $order->user->last_name }}
                            </td>
                            <td>${{ $order->sub_total }}</td>
                            <td>${{ $order->tax }}</td>
                            <td>${{ $order->shipping_charges }}</td>
                            <td>${{ $order->order_total }}</td>
                            <td>
                                @if($order->delivery_status == 1) 
                                    <span class="text-warning">PENDING</span> 
                                @elseif($order->delivery_status == 2) 
                                    <span class="text-info">Transit</span> 
                                @elseif($order->delivery_status == 3) 
                                    <span class="text-success">Delivered</span> 
                                @endif
                            </td>
                            <td>
                                @if($order->delivery_status == 1) 
                                    <span class="text-warning">Not Paid Yet</span> 
                                @elseif($order->delivery_status == 2) 
                                    <span class="text-info">Partial Paid</span> 
                                @elseif($order->delivery_status == 3) 
                                    <span class="text-success">Fully Paid</span> 
                                @endif
                            </td>
                            <td>
                                <a href="#" class="btn btn-xs btn-success"><i class="fa fa-binoculars"></i></a>
                            </td>
                            <td>
                                <a href="#" class="btn btn-xs btn-info"><i class="fa fa-pencil icon-edit"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    {{--  <tfoot>
                        <tr>
                            <td colspan="5" class="text-center"> {{ $orders->links()}}</td>
                        </tr>
                    </tfoot>  --}}
                </table>
             
            @else
                <div class="text-center">There are no Orders Defined</div>
            @endif
        </div>

    </div>
@endsection


@section('scripts')
    <script>
    $(document).ready( function () {
        $('#orders').DataTable();
    } );
    </script>
@endsection


