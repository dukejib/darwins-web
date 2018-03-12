@extends('layouts.master')

@section('title')
    Check Out
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8 col-xs-offset-2">
            <div>
            <img src="https://blockchain.info/qr?data=' . $address  . '&size=200">
            </div>
            <div>
            Send Your Coins at : {{ $address }}
            </div>
            //TODO::make this page show nicely for users.
        //Google api thing not working
        //echo '<div><img src="http://chart.googleapis.com/chart?chs=400x400&cht=qr&chl="' . $address . '"></div>';
     
        </div>
    </div>
@endsection