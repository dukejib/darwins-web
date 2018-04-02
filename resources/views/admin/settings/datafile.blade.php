@extends('layouts.master2')

@section('content')

<div class="panel panel-primary">

        <div class="panel-heading">
            Data File for Affiliates
        </div>

        <div class="panel-body">
            <form action="{{ route('datafile.update') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }} 

                <div class="form-group">
                    <label for="file">Upload <span class="text-info">New Datafile</span> PDF</label>
                   <input type="file" name="file" id="file">
                </div>

                <div class="form-group">
                    <label for="">{{ URL::to('files/' . $settings->datafile) }}</label>
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button type="submit" class="btn btn-success">Update Data File</button>
                    </div>
                </div>

            </form>

        </div>

    </div>

@endsection