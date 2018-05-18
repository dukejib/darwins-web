@extends('layouts.master2')

@section('content')
 
    {{--  Widgets  --}}
    <div class="row">
    
    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-6 col-xs-6">
                        <i class="fa fa-list fa-5x">
                        </i>
                    </div>
                    <div class="col-md-6 col-xs-6 text-right">
                        <div style="font-size:42px;padding-down:15px;">{{ $global_categories }}</div>
                        <div style="font-size:28;">Global Categories</div>
                    </div>
                </div>
            </div>
            <a href="{{ route('admin.global.index') }}">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>

    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-6 col-xs-6">
                        <i class="fa fa-list-alt fa-5x">
                        </i>
                    </div>
                    <div class="col-md-6 col-xs-6 text-right">
                        <div style="font-size:42px;padding-down:15px;">{{ $local_categories }}</div>
                        <div style="font-size:28;">Local Categories</div>
                    </div>
                </div>
            </div>
            <a href="{{ route('admin.local.index') }}">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    
    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-6 col-xs-6">
                        <i class="fa fa-list-ul fa-5x">
                        </i>
                    </div>
                    <div class="col-md-6 col-xs-6 text-right">
                        <div style="font-size:42px;padding-down:15px;">{{ $sub_categories }}</div>
                        <div style="font-size:28;">Sub Categories</div>
                    </div>
                </div>
            </div>
            <a href="{{ route('admin.sub.index') }}">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>

    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
        <div class="panel panel-warning">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-6 col-xs-6">
                        <i class="fa fa-bookmark fa-5x">
                        </i>
                    </div>
                    <div class="col-md-6 col-xs-6 text-right">
                        <div style="font-size:42px;padding-down:15px;">{{ $subscriptions }}</div>
                        <div style="font-size:28;">Subscriptions</div>
                    </div>
                </div>
            </div>
            <a href="{{ route('subscriptions') }}">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>

    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
        <div class="panel panel-warning">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-6 col-xs-6">
                        <i class="fa fa-user fa-5x">
                        </i>
                    </div>
                    <div class="col-md-6 col-xs-6 text-right">
                        <div style="font-size:42px;padding-down:15px;">{{ $customers }}</div>
                        <div style="font-size:28;">Customers</div>
                    </div>
                </div>
            </div>
            <a href="{{ route('customers') }}">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>

    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
        <div class="panel panel-warning">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-6 col-xs-6">
                        <i class="fa fa-subscript fa-5x">
                        </i>
                    </div>
                    <div class="col-md-6 col-xs-6 text-right">
                        <div style="font-size:42px;padding-down:15px;">{{ $affiliations }}</div>
                        <div style="font-size:28;">Affiliates</div>
                    </div>
                </div>
            </div>
            <a href="{{ route('affiliates') }}">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>

    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
        <div class="panel panel-success">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-6 col-xs-6">
                        <i class="fa fa-edit fa-5x">
                        </i>
                    </div>
                    <div class="col-md-6 col-xs-6 text-right">
                        <div style="font-size:42px;padding-down:15px;">{{ $articles }}</div>
                        <div style="font-size:28;">Articles</div>
                    </div>
                </div>
            </div>
            <a href="{{ route('admin.article.index') }}">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>

    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
        <div class="panel panel-success">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-6 col-xs-6">
                        <i class="fa fa-window-restore fa-5x">
                        </i>
                    </div>
                    <div class="col-md-6 col-xs-6 text-right">
                        <div style="font-size:42px;padding-down:15px;">{{ $web_banners }}</div>
                        <div style="font-size:28;">Banners</div>
                    </div>
                </div>
            </div>
            <a href="{{ route('admin.web_banner.index') }}">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>

    </div>

    {{--  <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
        <div class="panel panel-success">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-6 col-xs-6">
                        <i class="fa fa-window-restore fa-5x">
                        </i>
                    </div>
                    <div class="col-md-6 col-xs-6 text-right">
                        <div style="font-size:42px;padding-down:15px;">{{ $photos }}</div>
                        <div style="font-size:28;">Photos</div>
                    </div>
                </div>
            </div>
            <a href="{{ route('admin.photo.index') }}">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>  --}}
    <div class="row">
    
    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
        <div id="orderChart"></div>
    </div>
   
    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
        <div id="orderTopProducts"></div>
    </div>
    
    </div>
   
    <div class="row">
    
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div id="columnchart_material" style="height:300px"></div>
    </div>
    
    </div>
    {{--  Widgets End  --}}
@endsection