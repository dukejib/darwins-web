@extends('layouts.master2')

@section('content')
<div class="col-md-10 col-sm-12 col-xs-12 col-lg-6">
    <div class="panel panel-primary">
        
        <div class="panel-heading">
            Edit Banner {{ $web_banner->title }}
        </div>
        <div class="panel-body">
            <form id="form" action="{{ route('admin.web_banner.update',['id' => $web_banner->id]) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="title">Title</label>
                    <p>{{ $web_banner->title }}</p>
                </div>
                <div class="form-group">
                    <label for="style">Style</label>
                    <p>{{ $web_banner->style }}</p>
                </div>
                <div class="form-group">
                    <label for="gif_weight">Gif Weight</label>
                    <p>{{ $web_banner->gif_weight }}</p>
                </div>
                <div class="form-group">
                    <label for="flash_weight">Flash Weight</label>
                    <p>{{ $web_banner->flash_weight }}</p>
                </div>
                <div class="form-group">
                    <img src="{{ URL::to('/img/web_banners/' . $web_banner->image) }}" width = "400px" alt="{{ $web_banner->title }}">
                </div>
                <div class="form-group">
                    <label for="image" class="btn btn-success">Update Image (Max Size Allowed : 256 Kb)</label>
                    <input id="image" style="visibility:hidden;" type="file" name="image" accept="image/x-png,image/gif,image/jpeg">
                </div>
            </form>
        </div>
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