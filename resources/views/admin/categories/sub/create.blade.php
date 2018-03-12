@extends('layouts.master2')

@section('content')

    <div class="panel panel-primary">
        <div class="panel-heading">
            Create Sub Category
        </div>
        <div class="panel-body">
            <form action="{{ route('admin.sub.store') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" id="title" name="title" class="form-control">
                </div>

                <div class="form-group">
                    <label for="global">Select Global Category</label>
                    <select name="global_category_id" id="global_category_id" class="form-control">
                        @if(count($global_categories)>0)
                            @foreach($global_categories as $global_category)
                                <option value="{{ $global_category->id }}">{{ $global_category->title }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-xs btn-success">Store Sub Category</button>
                </div>

                <div class="panel-footer text-center">
                    Sub Categories comes under Global category as 2nd Level Menus
                </div>

            </form>
        </div>
    </div>

@endsection
