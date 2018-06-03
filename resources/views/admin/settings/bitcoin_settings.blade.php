@extends('layouts.master2')

@section('content')

<div class="col-md-12">

<div class="panel panel-primary">

    <div class="panel-heading">
        Blockchain Info Settings - Proceed with Caution
    </div>

    <div class="panel-body">
        <form action="{{ route('setting_btc.update') }}" method="post">
        {{ csrf_field() }} 

          <div class="form-group form-inline">
                    <label for="v2apikey" style="width:200px">V2 Api Receive Key</label>
                    <input type="text" class="form-control" name="v2apikey" value="{{ $settings->v2apikey }}" style="width:100%" required>
                </div>

                <div class="form-group form-inline">
                    <label for="bcwallet" style="width:200px">Blockchain Wallet</label>
                    <input type="text" class="form-control" name="bcwallet" value="{{ $settings->bcwallet }}" style="width:100%">
                </div>

                <div class="form-group form-inline">
                    <label for="xpub1" style="width:200px">Xpub 1</label>
                    <input type="text" class="form-control" name="xpub1" value="{{ $settings->xpub1 }}" style="width:100%" required>
                </div>

                <div class="form-group form-inline">
                    <label for="xpub2" style="width:200px">Xpub 2</label>
                    <input type="text" class="form-control" name="xpub2" value="{{ $settings->xpub2 }}" style="width:100%">
                </div>

                <div class="form-group form-inline">
                    <label for="xpub3" style="width:200px">Xpub 3</label>
                    <input type="text" class="form-control" name="xpub3" value="{{ $settings->xpub3 }}" style="width:100%">
                </div>

                <div class="form-group form-inline">
                    <label for="xpub4" style="width:200px">Xpub 4</label>
                    <input type="text" class="form-control" name="xpub4" value="{{ $settings->xpub4 }}" style="width:100%">
                </div>

                <div class="form-group form-inline">
                    <label for="xpub5" style="width:200px">Xpub 5</label>
                    <input type="text" class="form-control" name="xpub5" value="{{ $settings->xpub5 }}" style="width:100%">
                </div>
            <div class="form-group form-inline">
                <div class="text-center">
                    <button type="submit" class="btn btn-success btn-block">Update Site Settings</button>
                </div>
            </div>

        </form>
            
    </div>

</div>

</div>

@endsection