@extends('layouts.master')

@section('content')
    <h1>Brochure</h1>
    @if($settings->brochure_filename == '')
        <h3>We Don&apos;t have any brochure ready yet!</h3>
    @else
    <embed src="{{route('getbrochure')}}" width="100%" height="1200px" type='application/pdf' />
    @endif
    
@endsection