@extends('layouts.master2')

@section('title')
    Newsletters Subscriptions
@endsection

@section('content')
    <div class="panel panel-primary">
        <div class="panel-heading">Newsletter Subscription</div>

        <div class="panel-body">
            @if($newsLetters->count() > 0)
                <table class="table table-striped table-condensed" id="newsletter">
                    <thead>
                    <tr>
                        <td>id</td>
                        <td>Email Address</td>
                        <td>Edit</td>
                        <td>Delete</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($newsLetters as $newsLetter)
                        <tr>
                            <td>{{ $newsLetter->id }}</td>
                            <td>{{ $newsLetter->email }}</td>
                            <td><a href="{{ route('subscription.edit',['id' => $newsLetter->id]) }}" class="btn btn-xs btn-info">Edit</a></td>
                            <td><a href="{{ route('subscription.delete',['id' => $newsLetter->id]) }}" class="btn btn-xs btn-danger">Delete</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <div class="text-center">No one has subscribed yet to the newsletter</div>
            @endif
        </div>
    </div>
@endsection

@section('scripts')
    <script>
    $(document).ready( function () {
        $('#newsletter').DataTable();
    } );
    </script>
@endsection 