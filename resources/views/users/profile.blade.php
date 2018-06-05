@extends('layouts.master')

@section('content')

<div class="well">

    @if(count($errors)>0)
        @include('includes.errors')
        <br>
    @endif

    <div class="page-header">
        <h3>Your More Credit Card Services Central Profile
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

{{--  Contact Information  --}}
<div id="contact">
<legend>Address / Contact Information</legend>
<form action="{{ route('user.profile.contact') }}" method="post" class="form-horizontal">
    {{ csrf_field() }} 

    <div class="form-group">
    <label for="business_name" class="control-label col-xs-3">Business/Company Name</label>
        <div class="col-xs-9">
            <input type="text" class="form-control" name="business_name" value="{{ $profile->business_name}}" required>
        </div>
    </div>

    <div class="form-group">
        <label for="address" class="control-label col-xs-3">Address *</label>
        <div class="col-xs-9">
            <input type="text" class="form-control" name="address" value="{{ $profile->address }}" required>
        </div>
    </div>

    <div class="form-group">
        <label for="address_continued" class="control-label col-xs-3">Address Continued *</label>
        <div class="col-xs-9">
            <input type="text" class="form-control" name="address_continued" value="{{ $profile->address_continued}}" >
        </div>
    </div>

    <div class="form-group">
        <label for="city" class="control-label col-xs-3">City *</label>
        <div class="col-xs-9">
            <input type="text" class="form-control" name="city" value="{{ $profile->city}}" required>
        </div>
    </div>
    
    <div class="form-group">
        <label for="state" class="control-label col-xs-3">State *</label>
        <div class="col-xs-9">
            <input type="text" class="form-control" name="state" value="{{ $profile->state}}" required>
        </div>
    </div>

    <div class="form-group">
        <label for="country" class="control-label col-xs-3">Country *</label>
        <div class="col-xs-9">
            <input type="text" class="form-control" name="country" value="{{ $profile->country }}" required>
        </div>
    </div>

     <div class="form-group">
        <label for="primary_contact_no" class="control-label col-xs-3">Primary Contact *</label>
        <div class="col-xs-9">
            <input type="text" class="form-control" name="primary_contact_no" value="{{ $profile->primary_contact_no}}" required>
        </div>
    </div>

    <div class="form-group">
        <label for="secondary_contact_no" class="control-label col-xs-3">Secondary Contact</label>
        <div class="col-xs-9">
            <input type="text" class="form-control" name="secondary_contact_no" value="{{ $profile->secondary_contact_no}}">
        </div>
    </div>

    <div class="form-group">
        <label for="postal_code" class="control-label col-xs-3">Postal Code</label>
        <div class="col-xs-9">
            <input type="text" class="form-control" name="postal_code" value="{{ $profile->postal_code}}" required>
        </div>
    </div>

    <div class="form-group">
        <label for="email_address" class="control-label col-xs-3">Email Address</label>
        <div class="col-xs-9">
            <input type="text" class="form-control" name="email_address" value="{{ $profile->email_address}}" required>
        </div>
    </div>

    {{--  <div class="form-group">
        <label for="avatar" class="control-label col-xs-3">Upload New Avatar</label>
        <div class="col-xs-9">
            <input type="file" name="avatar" class="form-control">
        </div>
    </div>  --}}
            
    <div class="form-group">
        <div class="text-center">
            <button type="submit" class="btn btn-success">Update Contact Information</button>
        </div>
    </div>        
</form>
</div>


</div>

@endsection
