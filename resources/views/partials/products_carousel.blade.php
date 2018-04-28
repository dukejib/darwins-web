 <!-- Product Owl Carousel -->
 <div class="owl-carousel owl-theme">
    
    @foreach($products as $product) 
    <div class="item">
        <a href="{{ route('show.product',['id' => $product->id]) }}">
            <img src="{{ asset($product->image) }}" alt="{{ $product->title }}" width = "200px">
        </a>
        <div class="text-center"><strong>{{ $product->title }}</strong></div>
        <a href="{{ route('cart.add',['id' => $product->id]) }}" class="btn btn-xs btn-success btn-block"><i class="fa fa-plus"></i>Add To Cart</a>    
    </div>
    @endforeach
</div>
<!-- End Product Owl Carousel -->

