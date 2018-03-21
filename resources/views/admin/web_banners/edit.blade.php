@extends('layouts.master2')

@section('content')

    <div class="panel panel-primary">
        
        <div class="panel-heading">
            Edit Banner {{ $web_banner->title }}
        </div>
        <div class="panel-body">
            <form id="form" action="{{ route('admin.web_banner.update',['id' => $web_banner->id]) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" value="{{ $web_banner->title }}" disabled>
                </div>
                <div class="form-group">
                    <label for="style">Style</label>
                    <input type="text" class="form-control" value="{{ $web_banner->style }}" disabled>
                </div>
                <div class="form-group">
                    <label for="gif_weight">Gif Weight</label>
                    <input type="text" class="form-control" value="{{ $web_banner->gif_weight }}" disabled>
                </div>
                <div class="form-group">
                    <label for="flash_weight">Flash Weight</label>
                    <input type="text" class="form-control" value="{{ $web_banner->flash_weight }}" disabled>
                </div>
                <div class="form-group">
                    <img src="{{ URL::to('/img/web_banners/' . $web_banner->image) }}" width = "400px" alt="{{ $web_banner->title }}">
                    <label for="image" class="btn btn-success pull-right">Update Image (Max Size Allowed : 256 Kb)</label>
                    <input id="image" style="visibility:hidden;" type="file" name="image" accept="image/x-png,image/gif,image/jpeg">
                </div>
            </form>
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