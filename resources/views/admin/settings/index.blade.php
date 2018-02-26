@extends('layouts.master2')

@section('content')

<div class="panel panel-danger">

    <div class="panel-heading">
        Global Website Settings - Proceed with Caution
    </div>

    <div class="panel-body">
        <form action="{{ route('setting.update') }}" method="post">
            {{ csrf_field() }} 

            <div class="form-group">
                <label for="site_name">Site Name</label>
                <input type="text" class="form-control" name="site_name" value="{{ $settings->site_name }}">
            </div>

            <div class="form-group">
                <label for="address_line1">Address Line 1</label>
                <input type="text" class="form-control" name="address_line1" value="{{ $settings->address_line1 }}">
            </div>

            <div class="form-group">
                <label for="address_line2">Address Line 2</label>
                <input type="text" class="form-control" name="address_line2" value="{{ $settings->address_line2 }}">
            </div>

            <div class="form-group">
                <label for="address_line3">Address Line 3</label>
                <input type="text" class="form-control" name="address_line3" value="{{ $settings->address_line3 }}">
            </div>

            <div class="form-group">
                <label for="contact_line1">Contact Number 1</label>
                <input type="text" class="form-control" name="contact_line1" value="{{ $settings->contact_line1 }}">
            </div>

            <div class="form-group">
                <label for="contact_line2">Contact Number 2</label>
                <input type="text" class="form-control" name="contact_line2" value="{{ $settings->contact_line2 }}">
            </div>

            <div class="form-group">
                <label for="contact_mobile">Contact Mobile</label>
                <input type="text" class="form-control" name="contact_mobile" value="{{ $settings->contact_mobile }}">
            </div>

            <div class="form-group">
                <label for="contact_email">Contact Email</label>
                <input type="text" class="form-control" name="contact_email" value="{{ $settings->contact_email }}">
            </div>

            <div class="form-group">
                <div class="text-center">
                    <button type="submit" class="btn btn-success">Update Site Settings</button>
                </div>
            </div>

        </form>

    </div>

</div>

@endsection