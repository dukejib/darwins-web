@extends('layouts.master2')

@section('content')

    <div class="panel panel-primary">
        <div class="panel-heading">
            Edit Sub Category
        </div>
        <div class="panel-body">
            <form action="{{ route('admin.sub.update',['sub' => $sub_category->id]) }}" method="post">
                {{ csrf_field() }}
                {{-- This is required, if you are using route::resource , since it works put/patch to update--}}
                {{ method_field('PUT') }}

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" id="title" name="title" class="form-control" value="{{ $sub_category->title }}">
                </div>

                <div class="form-group">
                    <label for="global">Global Category</label>
                    <select name="global_category_id" id="global_category_id" class="form-control">
                        @if(count($global_categories)>0)
                            @foreach($global_categories as $global_category)
                                <option value="{{ $global_category->id }}"
                                    @if($global_category->id == $sub_category->global_category_id) 
                                        selected
                                    @endif
                                >{{ $global_category->title }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>

                <div class="form-group">
                    <label>
                    <input type="checkbox" name="active" id="active"
                    @if($sub_category->active)
                        checked
                    @else
                        unchecked
                    @endif
                    >&nbsp;&nbsp;&nbsp;&nbsp;
                    Active (For Use in Local Categories)
                    </label>
                </div>



                <div class="form-group">
                    <button type="submit" class="btn btn-xs btn-success">Update Sub Category</button>
                </div>

            </form>
        </div>
    </div>

@endsection
