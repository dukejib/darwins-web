@extends('layouts.master2')

@section('content')

    <div class="panel panel-primary">
        <div class="panel-heading">
            Services - Total : ({{$services->total()}}) Records
            <a href="{{ route('admin.service.create') }}" class="btn btn-xs btn-success pull-right">Add New Service</a>
        </div>
        <div class="panel-body">
            @if(count($services)> 0)
                <table class="table table-striped table-condensed">
                    <thead>
                    <tr>
                        <td>Image</td>
                        <td>Title</td>
                        {{--<td>Active</td>--}}
                        <td>Category</td>
                        <td>Slot</td>
                        <td>Show</td>
                        <td>Edit</td>
                        <td>Delete</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($services as $service)
                        <tr>
                            <td><img src="{{ asset($service->image) }}" width="30" class="img-responsive"/> </td>
                            <td>{{ $service->title }}</td>
                            {{--  <td>{{ str_limit($service->description,25) }}</td>  --}}
                            <!-- Is product discontinued -->
                            {{--@if($product->discontinued == 0)--}}
                                {{--<td>Yes</td>--}}
                            {{--@else--}}
                                {{--<td>No</td>--}}
                            {{--@endif--}}
                            <td>
                                <!-- What category this product belongs to -->
                                <div class="form-group">
                                    @foreach($local_categories as $category)
                                        @if($category->id == $service->local_category_id)
                                    <span class="text-success">{{ $category->sub_category->title}}</span> >> 
                                    <span class="text-info">{{$category->title}}</span>
                                        @endif
                                    @endforeach
                                </div>
                            </td>
                            <!-- is it in featured list -->
                            @if($service->slot == 'Featured')
                                <td>Featured</td>
                            @elseif($service->slot == 'Popular')
                                <td>Popular</td>
                            @elseif($service->slot == 'Latest')
                                <td>Latest</td>
                            @endif
                            <td>
                                <a href="{{ route('admin.service.show',['service' => $service->id]) }}" class="btn btn-xs btn-success"><i class="fa fa-binoculars"></i></a>
                                </td>
                            <td>
                                <a href="{{ route('admin.service.edit',['service' => $service->id]) }}" class="btn btn-xs btn-info"><i class="fa fa-pencil icon-edit"></i></a>
                            </td>
                            <td>
                                    <form action="{{ route('admin.service.destroy',['service' => $service->id]) }}" method="post">
    
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
                            <td colspan="5" class="text-center"> {{ $services->links()}}</td>
                        </tr>
                    </tfoot>
                </table>
            @else
                <div class="text-center">There aren't any service in record</div>
            @endif
        </div>
    </div>

@endsection
