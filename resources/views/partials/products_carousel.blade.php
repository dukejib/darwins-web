<!-- Product Owl Carousel -->
<div class="owl-carousel owl-theme">
    
    @foreach($products as $product) 
    {{--  class='item' is required by owl-carousel >> check my.js  --}}
    <div>
        <a href="{{ route('show.product',['id' => $product->id]) }}">
        @if($product->slot == 'Featured')
            <div class="featured"></div>
        @elseif ($product->slot == 'Popular')
            <div class="popular"></div>
        @elseif($product->slot == 'Latest')
            <div class="latest"></div>
        @endif
        <img src="{{ asset($product->image) }}" alt="{{ $product->title }}">
        </a>
        <div class="text-center"><strong>{{ $product->title }}</strong></div>
        <a href="{{ route('cart.add',['id' => $product->id]) }}" class="btn btn-xs btn-default btn-block"><i class="fa fa-plus"></i>Add To Cart</a>    
    </div>
    @endforeach
    
</div>
<!-- End Product Owl Carousel -->

