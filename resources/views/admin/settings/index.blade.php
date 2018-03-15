@extends('layouts.master2')

@section('content')

<div class="panel panel-danger">

    <div class="panel-heading">
        Global Website Settings - Proceed with Caution
    </div>

    <div class="panel-body">
        <form action="{{ route('setting.update') }}" method="post">
            {{ csrf_field() }} 

            <div class="form-group form-inline">
                <label for="site_name" style="width:200px">Site Name</label>
                <input type="text" class="form-control" name="site_name" value="{{ $settings->site_name }}" style="width:400px">
            </div>

            <div class="form-group form-inline">
                <label for="address_line1" style="width:200px">Address Line 1</label>
                <input type="text" class="form-control" name="address_line1" value="{{ $settings->address_line1 }}" style="width:400px">
            </div>

            <div class="form-group form-inline">
                <label for="address_line2" style="width:200px">Address Line 2</label>
                <input type="text" class="form-control" name="address_line2" value="{{ $settings->address_line2 }}" style="width:400px">
            </div>

            <div class="form-group form-inline">
                <label for="address_line3" style="width:200px">Address Line 3</label>
                <input type="text" class="form-control" name="address_line3" value="{{ $settings->address_line3 }}" style="width:400px">
            </div>

            <div class="form-group form-inline">
                <label for="contact_line1" style="width:200px">Contact Number 1</label>
                <input type="text" class="form-control" name="contact_line1" value="{{ $settings->contact_line1 }}" style="width:400px">
            </div>

            <div class="form-group form-inline">
                <label for="contact_line2" style="width:200px">Contact Number 2</label>
                <input type="text" class="form-control" name="contact_line2" value="{{ $settings->contact_line2 }}" style="width:400px">
            </div>

            <div class="form-group form-inline">
                <label for="contact_mobile" style="width:200px">Contact Mobile</label>
                <input type="text" class="form-control" name="contact_mobile" value="{{ $settings->contact_mobile }}" style="width:400px">
            </div>

            <div class="form-group form-inline">
                <label for="contact_email" style="width:200px">Contact Email</label>
                <input type="text" class="form-control" name="contact_email" value="{{ $settings->contact_email }}" style="width:400px">
            </div>

             <div class="form-group form-inline">
                <label for="carousel_time" style="width:200px">Carousel Time</label>
                <input type="number" min="1000" step="100" max="10000" class="form-control" name="carousel_time" value="{{ $settings->carousel_time }}">
            </div>

            <div class="form-group form-inline">
                <div class="text-center">
                    <button type="submit" class="btn btn-success">Update Site Settings</button>
                </div>
            </div>

        </form>

    </div>

</div>

@endsection