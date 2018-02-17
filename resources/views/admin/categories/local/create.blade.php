@extends('layouts.master2')

@section('content')

    <div class="panel panel-primary">
        <div class="panel-heading">
            Local Category
        </div>
        <div class="panel-body">
            <form action="{{ route('admin.local.store') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" id="title" name="title" class="form-control">
                </div>

                <div class="form-group">
                    <label for="sub_category_id">Select Sub Category</label>
                    <select name="sub_category_id" id="sub_category_id" class="form-control">
                        @if(count($sub_categories)>0)
                            @foreach($sub_categories as $g)
                                <option value="{{ $g->id }}">
                                {{$g->global_category->title}} >> {{ $g->title }}
                                </option>
                            @endforeach
                        @endif
                    </select>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-xs btn-success">Store Local Category</button>
                </div>

                <div class="panel-footer text-center">
                    Local Categories comes under Global category Menu and are dependent on them
                </div>

            </form>
        </div>
    </div>

@endsection
