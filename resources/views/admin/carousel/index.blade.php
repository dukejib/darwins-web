@extends('layouts.master2')

@section('content')

    <div class="panel panel-primary">
        <div class="panel-heading">
            Carousel {{--  Carousel - Total : ({{$carousels->total()}}) Records  --}}
            <a href="{{ route('admin.carousel.create') }}" class="btn btn-xs btn-success pull-right">Add New Carousel</a>
        </div>
        <div class="panel-body">
            @if(count($carousels)> 0)
                <table class="table table-striped table-condensed" id="carousel">
                    <thead>
                    <tr>
                        <th>Image</th>
                        <th>Heading</th>
                        <th>Body</th>
                        <th>Show Headings</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($carousels as $carousel)
                        <tr>
                            <td><img src="{{ asset($carousel->image) }}" alt="{{ $carousel->heading }}" width="50px"></td>
                            <td>{{ $carousel->heading }}</td>
                            <td>{{ $carousel->body }}</td>
                            <td>
                                @if($carousel->show_headings)
                                    <span class="text-success">True</span>
                                @else
                                    <span class="text-warning">False</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.carousel.edit',['carousel' => $carousel->id]) }}" class="btn btn-xs btn-info"><i class="fa fa-pencil icon-edit"></i></a>
                            </td>
                            <td>
                                <form action="{{ route('admin.carousel.destroy',['carousel' => $carousel->id]) }}" method="post">

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
                            <td colspan="5" class="text-center"> {{ $carousels->links()}}</td>
                        </tr>
                    </tfoot>  --}}
                </table>
             
            @else
                <div class="text-center">There are no carousels Defined</div>
            @endif
        </div>
    </div>

@endsection

@section('scripts')
    <script>
    $(document).ready( function () {
        $('#carousel').DataTable();
    });
    </script>
@endsection