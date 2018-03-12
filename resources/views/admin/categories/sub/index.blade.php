@extends('layouts.master2')

@section('content')

    <div class="panel panel-primary">
        <div class="panel-heading">
            Sub Categories - Total : ({{$categories->total()}}) Records
            <a href="{{ route('admin.sub.create') }}" class="btn btn-xs btn-success pull-right">Add New Sub Category</a>
        </div>
        <div class="panel-body">
            @if(count($categories)> 0)
                <table class="table table-striped table-condensed">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Global Category</th>
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
                            <td><span class="text-success">{{ $category->global_category->title }}</span></td>
                            <td>
                             @if($category->active)
                                <div class="text-success">Yes</div>
                                @else
                                <div class="text-danger">No</div>
                            @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.sub.edit',['sub' => $category->id]) }}" class="btn btn-xs btn-info"><i class="fa fa-pencil icon-edit"></i></a>
                            </td>
                            <td>
                                <form action="{{ route('admin.sub.destroy',['sub' => $category->id]) }}" method="post">

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
                     <tfoot>
                        <tr>
                            <td colspan="5" class="text-center"> {{ $categories->links()}}</td>
                        </tr>
                    </tfoot>
                </table>
            @else
                <div class="text-center">There are no Local Categories Defined</div>
            @endif
        </div>
    </div>

@endsection
