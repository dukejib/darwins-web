@extends('layouts.master2')

@section('content')
  
    <div class="panel panel-primary">
        <div class="panel-heading">
            Products        {{--  Total : ({{$products->total()}}) Records  --}}
            <a href="{{ route('admin.product.create') }}" class="btn btn-xs btn-success pull-right">Add New Product</a>
        </div>
        <div class="panel-body">
            @if(count($products)> 0)
                <table class="table table-striped table-condensed" id="products">
                    <thead>
                    <tr>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Price</th>
                        {{--<td>Active</td>--}}
                        <th>Category</th>
                        <th>Slot</th>
                        <th>Show</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td><img src="{{ asset($product->image) }}" width="30" class="img-responsive"/> </td>
                            <td>{{ $product->title }}</td>
                            <td>${{ $product->price }}</td>
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
                                        @if($category->id == $product->local_category_id)
                                    <span class="text-success">{{ $category->sub_category->title}}</span> >> 
                                    <span class="text-info">{{$category->title}}</span>
                                        @endif
                                    @endforeach
                                </div>
                            </td>
                            <!-- is it in featured list -->
                            @if($product->slot == 'Featured')
                                <td class="text-success">Featured</td>
                            @elseif($product->slot == 'Popular')
                                <td class="texst-infor">Popular</td>
                            @elseif($product->slot == 'Latest')
                                <td class="text-warning">Latest</td>
                            @elseif($product->slot == 'Normal')
                                <td>Normal</td>
                            @endif
                            <td>
                                <a href="{{ route('admin.product.show',['product' => $product->id]) }}" class="btn btn-xs btn-success"><i class="fa fa-binoculars"></i></a>
                            </td>
                            <td>
                                <a href="{{ route('admin.product.edit',['product' => $product->id]) }}" class="btn btn-xs btn-info"><i class="fa fa-pencil icon-edit"></i></a>
                            </td>
                            <td>
                                <form action="{{ route('admin.product.destroy',['product' => $product->id]) }}" method="post">

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
                           {{--  <td colspan="5" class="text-center"> {{ $products->links()}}</td>  --}}
                        </tr>
                    </tfoot>
                </table>
            @else
                <div class="text-center">There are no products in our record</div>
            @endif
        </div>
    </div>

@endsection

@section('scripts')
    <script>
    $(document).ready( function () {
        $('#products').DataTable();
    } );
    </script>
@endsection