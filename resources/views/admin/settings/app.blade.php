@extends('layouts.master2')

@section('content')

<div class="panel panel-primary">

    <div class="panel-heading">
        App Statement Page
    </div>

    <div class="panel-body">
        <form action="{{ route('app.update') }}" method="post">
            {{ csrf_field() }} 

            <div class="form-group">
    
                <textarea name="app" id="app" cols="30" rows="10">{!! $settings->app_statement !!}</textarea>
            </div>


            <div class="form-group">
                <div class="text-center">
                    <button type="submit" class="btn btn-success">Update App Statement</button>
                </div>
            </div>

        </form>

    </div>

</div>

@endsection