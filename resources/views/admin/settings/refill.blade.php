@extends('layouts.master2')

@section('content')

<div class="panel panel-primary">

    <div class="panel-heading">
        Refill Statement Page
    </div>

    <div class="panel-body">
        <form action="{{ route('refill.update') }}" method="post">
            {{ csrf_field() }} 

            <div class="form-group">
               
                <textarea name="refill" id="refill" cols="30" rows="10">{!! $settings->refill_statement !!}</textarea>
            </div>
    


            <div class="form-group">
                <div class="text-center">
                    <button type="submit" class="btn btn-success">Update Refill Statement</button>
                </div>
            </div>

        </form>

    </div>

</div>

@endsection