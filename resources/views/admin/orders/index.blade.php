@extends('layouts.master2')

@section('title')
    Newsletters Subscriptions
@endsection

@section('content')

    <div class="panel panel-primary">
        <div class="panel-heading">
            Orders
        </div>

        <div class="panel-body">
              @if(count($transactions)> 0)
                <table class="table table-striped table-condensed">
                    <thead>
                    <tr>
                        <th>Value</th>
                        <th>Hash</th>
                        <th>Order Id</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($transactions as $photo)
                        <tr>
                            {{--  using url::to because we need the exact url , which is needed in service pages  --}}
                            <td>{{ $photo->value }}</td>
                            <td>{{ $photo->transaction_hash }}</td>
                            <td>
                               {{ $photo->order_id }}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            {{--  <td colspan="5" class="text-center"> {{ $photos->links()}}</td>  --}}
                        </tr>
                    </tfoot>
                </table>
             
            @else
                <div class="text-center">There are no transactions Defined</div>
            @endif
        </div>

    </div>
@endsection

