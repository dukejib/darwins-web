{{-- Categories start here -Top Button--}}
<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Categories <span class="caret"></span></a>
    {{--  Global Categories lvl1  --}}
    
    <ul class="dropdown-menu">
    {{--  Global Menu  --}}
      <li class="dropdown-submenu">
        {{--  If we have some Global Categories--}}
        @if(count($global_categories)>0)
            {{--  If we have global Categories, Display Them  --}}
            @foreach($global_categories as $g)
                {{--  Check if it has sub category  --}}
                @if(count($g->sub_categories)>0)
                    <a class="test" tabindex="-1" href="#">{{ $g->title}} <span class="caret"></span></a>
                    {{--  Now, display sub categories, according to Global Categroies Only  --}}

                    {{--  Sub Menu   --}}
                    <ul class="dropdown-menu">
                    @if(count($sub_categories)>0)

                        @foreach($sub_categories as $s)
                            @if($s->global_category_id == $g->id)
                            <li class="dropdown-submenu">
                                <a class="test" href="#">{{ $s->title}} <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    @foreach($local_categories as $l)
                                        @if($l->sub_category_id == $s->id)
                                            <li><a href="{{ route('dropdown',['id' => $l->id]) }}">{{ $l->title}}</a></li>
                                        @endif
                                    @endforeach
                                </ul>
                            </li>
                            @endif
                        @endforeach
                    
                    @endif
        

                    </ul>


                @else
                    {{--  No Secondary Level Menu Here  --}}
                    <a class="test" tabindex="-1" href="#">{{ $g->title}} </a>
                @endif
                
            @endforeach
        @endif
      </li>
      {{--  Global Menu End  --}}
    </ul>


    {{--  Global Categories Ends Here  --}}
</li>       
{{-- Categories end here--}}