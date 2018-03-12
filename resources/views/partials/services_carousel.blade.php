 <!-- Services Owl Carousel -->
 <div class="owl-carousel owl-theme">
    
    @foreach($services as $service)
    <div class="item">  
        <a href="{{ route('show.service',['id' => $service->id]) }}">
            <img src="{{ asset($service->image) }}" alt="{{ $service->title }}" width = "200px">
        </a>
        <div class="text-center"><strong>{{ $service->title }}</strong></div>
    </div>
    
    @endforeach
</div>
<!-- End Services Owl Carousel -->

