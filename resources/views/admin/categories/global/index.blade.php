@extends('layouts.master2')

@section('content')

    <div class="panel panel-primary">
        <div class="panel-heading">
            Global Categories {{--  Global Categories - Total : ({{$categories->total()}}) Records  --}}
            <a href="{{ route('admin.global.create') }}" class="btn btn-xs btn-success pull-right">Add New Global Category</a>
        </div>
        <div class="panel-body">
            @if(count($categories)> 0)
                <table class="table table-striped table-condensed" id="global">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Active</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->title }}</td>
                            <td>
                            @if($category->active)
                                <div class="text-success">Yes</div>
                                @else
                                <div class="text-danger">No</div>
                            @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.global.edit',['global' => $category->id]) }}" class="btn btn-xs btn-info"><i class="fa fa-pencil icon-edit"></i></a>
                            </td>
                            <td>
                                <form action="{{ route('admin.global.destroy',['global' => $category->id]) }}" method="post">

                                    {{ csrf_field() }}
                                    {{--This is necessary if using route::resource--}}
                                    {{ method_field('DELETE') }}
                                    <button class="btn btn-xs btn-danger" type="submit">
                                        <i class="fa fa-close fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    {{--  <tfoot>
                        <tr>
                            <td colspan="5" class="text-center"> {{ $categories->links()}}</td>
                        </tr>
                    </tfoot>  --}}
                </table>
             
            @else
                <div class="text-center">There are no Global Categories Defined</div> 
            @endif
        </div>
    </div>

@endsection

@section('scripts')
    <script>
    $(document).ready( function () {
        $('#global').DataTable();
    } );
    </script>
@endsection