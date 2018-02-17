@extends('layouts.master')

@section('title')
    {{ $settings->site_name }}
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading text-center">
                    <h5>Terms Of Service</h5>
                </div>

                <div class="panel-body">
                    <embed src="{{route('getpdf')}}" width="100%" height="1200px" type='application/pdf' />
                </div>
            </div>
        </div>
    </div>

@endsection