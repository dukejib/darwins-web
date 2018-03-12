@extends('layouts.master2')

@section('content')

    <div class="panel panel-primary">
        <div class="panel-heading">
            Articles - Total : ({{$articles->total()}}) Records
            <a href="{{ route('admin.article.create') }}" class="btn btn-xs btn-success pull-right">Add New Article</a>
        </div>
        <div class="panel-body">
            @if(count($articles)> 0)
                <table class="table table-striped table-condensed">
                    <thead>
                    <tr>
                        <th>Title</th>
                        <th>Synopsis</th>
                        <th>Show</th>
                        <th>Edit</th>
                        <th>Delete</th>
                        <th>Un/Publish</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($articles as $article)
                        <tr>
                            <td>{{ $article->title }}</td>
                            <td>{{ str_limit($article->synopsis,35) }}</td>
                            <td>
                                <a href="{{ route('admin.article.show',['article' => $article->id]) }}" class="btn btn-xs btn-success"><i class="fa fa-binoculars"></i></a>
                            </td>   
                            <td>
                                <a href="{{ route('admin.article.edit',['article' => $article->id]) }}" class="btn btn-xs btn-info"><i class="fa fa-pencil icon-edit"></i></a>
                            </td>
                            <td>
                                <form action="{{ route('admin.article.destroy',['article' => $article->id]) }}" method="post">

                                    {{ csrf_field() }}
                                    {{--This is necessary if using route::resource--}}
                                    {{ method_field('DELETE') }}
                                    <button class="btn btn-xs btn-danger" type="submit">
                                        <i class="fa fa-close fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                            @if($article->published == 0)
                                <td>
                                    <a href="{{ route('admin.article.publish',['id' => $article->id]) }}" class="btn btn-xs btn-success"><i class="fa fa-paint-brush"></i> Publish</a>
                                </td>
                            @else
                                <td>
                                    <a href="{{ route('admin.article.unpublish',['id' => $article->id]) }}" class="btn btn-xs btn-danger"><i class="fa fa-paint-brush"></i> Unpublish</a>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                    </tbody>
                     <tfoot>
                        <tr>
                            <td colspan="5" class="text-center"> {{ $articles->links()}}</td>
                        </tr>
                    </tfoot>
                </table>
            @else
                <div class="text-center">There are no Articles Defined</div>
            @endif
        </div>
    </div>

@endsection
