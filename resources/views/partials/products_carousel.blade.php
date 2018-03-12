 <!-- Product Owl Carousel -->
 <div class="owl-carousel owl-theme">
    
    @foreach($products as $product) 
    <div class="item">
        <a href="{{ route('show.product',['id' => $product->id]) }}">
            <img src="{{ asset($product->image) }}" alt="{{ $product->title }}" width = "200px">
        </a>
        <div class="text-center"><strong>{{ $product->title }}</strong></div>
    </div>
    @endforeach
</div>
<!-- End Product Owl Carousel -->

