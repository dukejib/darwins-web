@extends('layouts.master2')

@section('content')

    <div class="panel panel-primary">
        
        <div class="panel-heading">
            Photos - Total : ({{$photos->total()}}) Records
            <form id="form" action="{{ route('admin.photo.store') }}" method="post" class="pull-right" enctype="multipart/form-data">
                <label for="image" class="btn btn-xs btn-success pull-right">Add New Image (Max Size Allowed : 1024 Kb)</label>
                <input id="image" style="visibility:hidden;" type="file" name="image" accept="image/x-png,image/gif,image/jpeg">
                {{ csrf_field() }}
            </form>
        </div>
        <div class="panel-body">
            @if(count($photos)> 0)
                <table class="table table-striped table-condensed">
                    <thead>
                    <tr>
                        <th>Image</th>
                        <th>Link</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($photos as $photo)
                        <tr>
                            {{--  using url::to because we need the exact url , which is needed in service pages  --}}
                            <td><img src="{{ URL::to('/img/photos/' . $photo->image) }}" width="50px"></td>
                            <td>{{ URL::to('/img/photos/' . $photo->image) }}</td>
                            <td>
                                <a href="{{ route('admin.photo.destroy',['id' => $photo->id]) }}" class="btn btn-xs btn-danger" type="submit">
                                        <i class="fa fa-close fa-trash"></i>
                                </a> 
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="5" class="text-center"> {{ $photos->links()}}</td>
                        </tr>
                    </tfoot>
                </table>
             
            @else
                <div class="text-center">There are no photos Defined</div>
            @endif
        </div>
    </div>  

@endsection

@section('scripts')
    <script>
            document.getElementById("image").onchange = function() {
                document.getElementById("form").submit();
            };
    </script>
@endsection