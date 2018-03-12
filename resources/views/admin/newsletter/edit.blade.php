@extends('layouts.master2')

@section('title')
    Newsletters Subscriptions
@endsection

@section('content')
    <div class="panel panel-primary">
        <div class="panel-heading">
            Edit Subscription
        </div>

        <div class="panel-body">

            <form action="{{ route('subscription.update',['id' => $subs->id]) }}" method="post">

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" class="form-control" value="{{ $subs->email }}">
                </div>
                <button type="submit" class="btn btn-xs btn-success pull-right">Update Subscription</button>

                {{ csrf_field() }}
            </form>

        </div>
    </div>
@endsection

