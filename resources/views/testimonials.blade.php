@extends('layouts.master')

@section('content')

<div class="row">

  <div class="col-md-8">
      <div class="panel panel-primary">
        <div class="panel-heading">Testimonials</div>

        <div class="panel-body">
          @if(count($testimonials)>0)
            @foreach($testimonials as $testimony)
              <div class="testimonials">
                <div>
                  <blockquote><p>{{ $testimony->testimony  }}</p></blockquote>
                  <div class="carousel-info">
                    @if($testimony->rating == 5)
                    <img alt="" src="{{ URL::to('img/fivestar.png') }}" class="pull-left">
                    @elseif($testimony->rating == 4)
                    <img alt="" src="{{ URL::to('img/fourstar.png') }}" class="pull-left">
                    @elseif($testimony->rating == 3)
                    <img alt="" src="{{ URL::to('img/threestar.png') }}" class="pull-left">
                    @elseif($testimony->rating == 2)
                    <img alt="" src="{{ URL::to('img/twostar.png') }}" class="pull-left">
                    @elseif($testimony->rating == 1)
                    <img alt="" src="{{ URL::to('img/onestar.png') }}" class="pull-left">
                    @endif
                    <div class="pull-left">
                      <span class="testimonials-name">{{ $testimony->username }}</span>
                      <span class="testimonials-post">Posted @ {{ $testimony->created_at->diffForHumans() }}</span>
                      @for($i = 0 ; $i < $testimony->rating ; $i++)
                          <i class="fa fa-star"></i>
                      @endfor
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
          @endif
        </div>
      
      <div class="panel-footer text-center">
      {{--  Pagination  --}}
      {{ $testimonials->links() }}
      </div>
        
      </div>
  </div>

  <div class="col-md-4">
  
    <div class="well">
      <legend>
      <h4>What do you think about us?</h4>
      </legend>
      @include('includes.errors')

      <form action="{{ route('testimony.store') }}" method="post">
        {{ csrf_field() }}
        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" name="username" id="username" class="form-control">
        </div>

        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" name="email" id="email" class="form-control">
        </div>

        <div class="form-group">
          <label for="">Rate Us</label>
          <div class="ratebox">
              <input type="radio" name="rateus" class="rating" value="1" />
              <input type="radio" name="rateus" class="rating" value="2" />
              <input type="radio" name="rateus" class="rating" value="3" />
              <input type="radio" name="rateus" class="rating" value="4" />
              <input type="radio" name="rateus" class="rating" value="5" />
          </div>
          <span class="badge" id="badge"></span>
        </div>

        <div class="form-group">
          <label for="comment">Your Comments</label>
          <textarea name="comment" id="" cols="30" rows="10" class="form-control"></textarea>
        </div>

        <div class="form-group">
          <input  type="submit" value="Save" class="form-control btn btn-success btn-block">
        </div>

      </form> 
    </div>
    
  </div>

</div>

@stop


@section('scripts')

<script>
//Ratings
$(document).ready(function(){
  $('.ratebox').rating(function(vote,event){
    console.log(vote);
    $('#badge').html('You Gave Us ' + vote + ' stars');
  }); 
});
</script>
    
@stop
