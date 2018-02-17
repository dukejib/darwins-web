@extends('layouts.master2')

@section('content')

    <div class="panel panel-primary">
        <div class="panel-heading">
            Local Category
        </div>
        <div class="panel-body">
            <form action="{{ route('admin.local.update',['local' => $local_category->id]) }}" method="post">
               {{ csrf_field() }}
                {{-- This is required, if you are using route::resource , since it works put/patch to update--}}
                {{ method_field('PUT') }}
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" id="title" name="title" class="form-control" value="{{ $local_category->title}}">
                </div>

                <div class="form-group">
                    <label for="sub_cateogry_id">Sub Category</label>
                    <select name="sub_category_id" id="sub_category_id" class="form-control">
                        @if(count($sub_categories)>0)
                            @foreach($sub_categories as $sub_category)
                                <option value="{{ $sub_category->id }}"
                                @if($sub_category->id ==  $local_category->sub_category_id)
                                    selected
                                @endif
                                > {{$sub_category->global_category->title}} >> {{ $sub_category->title }}
                                </option>
                            @endforeach
                        @endif
                    </select>
                </div>

                 <div class="form-group">
                    <label>
                    <input type="checkbox" name="active" id="active"
                    @if($local_category->active)
                        checked
                    @else
                        unchecked
                    @endif
                    >&nbsp;&nbsp;&nbsp;&nbsp;
                    Is This Local Category Active for Menu?
                    </label>
                </div>


                <div class="form-group">
                    <button type="submit" class="btn btn-xs btn-success">Update Local Category</button>
                </div>

                <div class="panel-footer text-center">
                    Local Categories comes under Global category Menu and are dependent on them
                </div>

            </form>
        </div>
    </div>

@endsection
