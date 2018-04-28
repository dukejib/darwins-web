@extends('layouts.master2')

@section('content')

    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6">
        <div class="panel panel-success">
            <div class="panel-heading text-center">
                Global Categories
            </div>

            <div class="panel-body">
                <h1 class="text-center">{{ $global_categories }}</h1>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6">
        <div class="panel panel-success">
            <div class="panel-heading text-center">
                Sub Categories
            </div>

            <div class="panel-body">
                <h1 class="text-center">{{ $sub_categories }}</h1>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6">
        <div class="panel panel-success">
            <div class="panel-heading text-center">
                Local Categories
            </div>

            <div class="panel-body">
                <h1 class="text-center">{{ $local_categories }}</h1>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6">
        <div class="panel panel-warning">
            <div class="panel-heading text-center">
                Subscriptions
            </div>

            <div class="panel-body">
                <h1 class="text-center">{{ $subscriptions }}</h1>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6">
        <div class="panel panel-warning">
            <div class="panel-heading text-center">
                Articles
            </div>

            <div class="panel-body">
                <h1 class="text-center">{{ $articles }}</h1>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6">
        <div class="panel panel-info">
            <div class="panel-heading text-center">
                Customers
            </div>

            <div class="panel-body">
                <h1 class="text-center">{{ $customers }}</h1>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6">
        <div class="panel panel-info">
            <div class="panel-heading text-center">
                Affiliations
            </div>

            <div class="panel-body">
                <h1 class="text-center">{{ $affiliations }}</h1>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6">
        <div class="panel panel-info">
            <div class="panel-heading text-center">
                Pending Orders
            </div>

            <div class="panel-body">
                <h1 class="text-center">{{ $pending_orders }}</h1>
            </div>
        </div>
    </div>

@endsection