@extends('layouts.master2')

@section('content')

<div class="col-md-10 col-sm-12 col-xs-12 col-lg-6">

    <div class="panel panel-primary">

        <div class="panel-heading">
            Terms of Service
        </div>

        <div class="panel-body">
            <form action="{{ route('tos.update') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }} 

                <div class="form-group">
                    <label for="file">Upload <span class="text-info">New Terms of Service</span> PDF</label>
                   <input type="file" name="file" id="file">
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button type="submit" class="btn btn-success">Update File</button>
                    </div>
                </div>

            </form>

        </div>

    </div>

</div>
@endsection