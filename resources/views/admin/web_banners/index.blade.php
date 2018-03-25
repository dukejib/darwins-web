@extends('layouts.master2')

@section('content')

    <div class="panel panel-primary">
        
        <div class="panel-heading">
            Banners
            {{--  Banners - Total : ({{$web_banners->total()}}) Records  --}}
        </div>
        <div class="panel-body">
            @if(count($web_banners)> 0)
                <table class="table table-striped table-condensed" id="banners">
                    <thead>
                    <tr>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Style</th>
                        <th>Gif Weight</th>
                        <th>Flash Weight</th>
                        <th>Edit</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($web_banners as $banner)
                        <tr>
                            {{--  using url::to because we need the exact url , which is needed in service pages  --}}
                            <td><img src="{{ URL::to('/img/web_banners/' . $banner->image) }}" width="25px"  alt="{{ $banner->title }}"></td>
                            <td>{{ $banner->title }}</td>
                            <td>{{ $banner->style }}</td>
                            <td>{{ $banner->gif_weight }}</td>
                            <td>{{ $banner->flash_weight }}</td>
                            <td>
                                <a href="{{ route('admin.web_banner.edit',['id' => $banner->id]) }}" class="btn btn-xs btn-info" type="submit">
                                    <i class="fa fa-pencil"></i>
                                </a> 
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
                <div class="text-center">There are no photos Defined</div>
            @endif
        </div>
    </div>  

@endsection

@section('scripts')
    <script>
    $(document).ready( function () {
        $('#banners').DataTable();
    } );
    </script>
@endsection 