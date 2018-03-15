 <!-- Insert Carousel -->
<div class="row">
    <div id = "carousel_time" value =  "{{ $settings->carousel_time }}"></div>
    <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-12">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <!--
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
        </ol>
        -->

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">

                    @for ($i = 0; $i < sizeOf($carousel); $i++)
                        <div class="item @if($i ==0) active @endif">
                            <img src="{{ asset($carousel[$i]->image)}}" >
                            @if($carousel[$i]->show_headings)
                                <div class="carousel-caption">
                                    <h3>{{ $carousel[$i]->heading }}</h3>
                                    <p>{{ $carousel[$i]->body }}</p>
                                </div>
                            @endif
                        </div>
                    @endfor
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
