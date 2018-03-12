 <!-- Insert Carousel -->
<div class="row">
    <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-12">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
            <li data-target="#myCarousel" data-slide-to="3"></li>
            <li data-target="#myCarousel" data-slide-to="4"></li>
            <li data-target="#myCarousel" data-slide-to="5"></li>
            <li data-target="#myCarousel" data-slide-to="6"></li>
            <li data-target="#myCarousel" data-slide-to="7"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">

            <div class="item active">
                <img src="{{ asset('img/carousel/1.jpg') }}" alt="Los Angeles" style="width:100%;">
                    <div class="carousel-caption">
                        <h4>The Divine Information</h4>
                        <p>SOmething which changes with the passage of time, for your convenience latter</p>
                    </div>
            </div>

            <div class="item">
                <img src="{{ asset('img/carousel/2.jpg') }}" alt="Chicago" style="width:100%;">
                    <div class="carousel-caption">
                        <h4>Heading</h4>
                        <p>Some Information</p>
                    </div>
            </div>

            <div class="item">
                <img src="{{ asset('img/carousel/3.jpg') }}" alt="New york" style="width:100%;">
                    <div class="carousel-caption">
                        <h4>Heading</h4>
                        <p>Some Information</p>
                    </div>
            </div>

            <div class="item">
                <img src="{{ asset('img/carousel/4.jpg') }}" alt="New york" style="width:100%;">
                    <div class="carousel-caption">
                        <h4>Heading</h4>
                        <p>Some Information</p>
                    </div>
            </div>

            <div class="item">
                <img src="{{ asset('img/carousel/5.jpg') }}" alt="New york" style="width:100%;">
                    <div class="carousel-caption">
                        <h4>Heading</h4>
                        <p>Some Information</p>
                    </div>
            </div>

            <div class="item">
                <img src="{{ asset('img/carousel/6.jpg') }}" alt="New york" style="width:100%;">
                    <div class="carousel-caption">
                        <h4>Heading</h4>
                        <p>Some Information</p>
                    </div>
            </div>

            <div class="item">
                <img src="{{ asset('img/carousel/7.jpg') }}" alt="New york" style="width:100%;">
                    <div class="carousel-caption">
                        <h4>Heading</h4>
                        <p>Some Information</p>
                    </div>
            </div>

            <div class="item">
                <img src="{{ asset('img/carousel/8.jpg') }}" alt="New york" style="width:100%;">
                    <div class="carousel-caption">
                        <h4>Heading</h4>
                        <p>Some Information</p>
                    </div>
            </div>

        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left fa fa-chevron-circle-left"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right fa fa-chevron-circle-right"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    </div>
</div>
<!-- End Carousel -->
@section('scripts')
    <script>
        /** Carousel Slider Interval **/
        $('.carousel').carousel({
            interval: 2000
        });
    </script>
@endsection