@extends('layouts.master2')

@section('content')

<div class="panel panel-primary">
    
    <div class="panel-heading">
        Banners
        {{--  Banners - Total : ({{$web_banners->total()}}) Records  --}}
    </div>
    <div class="panel-body">
        @if(count($testimonys)> 0)
            <table class="table table-striped table-condensed" id="banners">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>&nbsp;&nbsp;&nbsp;&nbsp;Ratings&nbsp;&nbsp;&nbsp;&nbsp;</th>
                    <th>Comment</th>
                    <th>Approved</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach($testimonys as $testimony)
                    <tr>
                        {{--  using url::to because we need the exact url , which is needed in service pages  --}}
                        <td>{{ $testimony->id}}</td>
                        <td>{{ $testimony->username }}</td>
                        <td>{{ $testimony->email }}</td>
                        <td>
                        @for($i = 0 ; $i < $testimony->rating ; $i++)
                          <i class="fa fa-star"></i>
                        @endfor
                        </td>
                        <td>{{ $testimony->testimony }}</td>
                        <td>
                            @if($testimony->approved == 0)
                                <a href="{{ route('admin.testimonial.approve',['id' => $testimony->id]) }}" class="btn btn-xs btn-success">Approve</a>
                            @else
                                Approved
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.testimonial.delete',['id' => $testimony->id]) }}" class="btn btn-xs btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                {{--  <tfoot>
                    <tr>
                        <td colspan="5" class="text-center"> {{ $web_banners->links()}}</td>
                    </tr>
                </tfoot>  --}}
            </table>
            
        @else
            <div class="text-center">There are no Testimonys</div>
        @endif
    </div>
</div>  

@endsection

@section('scripts')
<script>
$(document).ready( function () {
    $('#banners').DataTable();
});
</script>
@endsection 