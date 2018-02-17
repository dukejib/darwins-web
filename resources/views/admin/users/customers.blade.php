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
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($customers as $customer)
                            <tr>
                                <td><img src="{{ asset($customer->profile->avatar) }}" style="border-radius:50%" width="25px"></td>
                                <td>{{ $customer->first_name }}</td>
                                <td>{{ $customer->last_name }}</td>
                                <td>{{ $customer->email }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="text-center">There is no record for Customers</p>
                @endif
            </div>
        </div>

@endsection

