@extends('layouts.master2')

@section('content')

<div class="row">

    <div class="col-md-6">
    <div class="well">

    @if(count($errors)>0)
        @include('includes.errors')
        <br>
    @endif

    <div class="page-header">
        <h3>Administrator Profile
        <br>
        <small>Please update the information, so that we can serve you better.</small>
        </h3>
    </div>

{{--  User Information  --}}
<div id="basic">
<legend>Basic Information</legend>
<form action="{{ route('user.profile.basic') }}" method="post" class="form-horizontal">
    {{ csrf_field() }} 
    <div class="form-group">
        <label for="first_name" class="control-label col-xs-3">First Name</label>
        <div class="col-xs-9">
            <input type="text" class="form-control" name="first_name" value="{{ $user->first_name }}" required>
        </div>
    </div>

    <div class="form-group">
        <label for="last_name" class="control-label col-xs-3">Last Name</label>
        <div class="col-xs-9">
            <input type="text" class="form-control" name="last_name" value="{{ $user->last_name }}" required>
        </div>
    </div>
            
    <div class="form-group">
        <div class="text-center">
            <button type="submit" class="btn btn-success">Update Basic Data</button>
        </div>
    </div>

</form>
<br>
</div>

{{-- Account Settings   --}}
<div id="account">
<legend>Your Password</legend>
<form action="{{ route('user.profile.account') }}" method="post" class="form-horizontal">
    {{--  Must USe This  --}}
    {{ csrf_field() }} 
    <div class="form-group">
        <label for="password" class="control-label col-xs-3">New Password</label>
        <div class="col-xs-9">
            <input type="password" class="form-control " name="password" value="" required>
        </div>
    </div>

    <div class="form-group">
        <label for="password_confirmation" class="control-label col-xs-3">Confirm Password</label>
        <div class="col-xs-9">
            <input type="password" class="form-control" name="password_confirmation" value="" required>
        </div>
    </div>
            
    <div class="form-group">
        <div class="text-center">
            <button type="submit" class="btn btn-success">Update Password</button>
        </div>
    </div>

</form>
<br>
</div>

</div>
    
    </div>


</div>

@endsection
