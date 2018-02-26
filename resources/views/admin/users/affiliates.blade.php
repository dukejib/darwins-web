@extends('layouts.master2')

@section('title')
    Our Affiliates
@endsection

@section('content')
   <div class="panel panel-primary">
       <div class="panel-heading">
           Our Affiliates
       </div>

       <div class="panel-body">
           @if($affiliates->count() > 0)
               <table class="table table-striped table-condensed" id="affiliates">
                   <thead>
                   <tr>
                       <td>Id</td>
                       <td>First Name</td>
                       <td>Last Name</td>
                       <td>Email</td>
                       <td>Affiliation</td>
                   </tr>
                   </thead>
                   <tbody>
                   @foreach($affiliates as $affiliate)
                       <tr>
                           <td><img src="{{ asset($affiliate->profile->avatar) }}" style="border-radius:50%" width="25px"></td>
                           <td>{{ $affiliate->first_name }}</td>
                           <td>{{ $affiliate->last_name }}</td>
                           <td>{{ $affiliate->email }}</td>
                           <td>
                            @if(!$affiliate->isUserAffiliate())
                                <a href="{{ route('customer.unaffiliate',['id' => $affiliate->id]) }}" class="btn btn-xs btn-warning">Unaffiliate</a>
                            @endif
                           </td>
                       </tr>
                   @endforeach
                   </tbody>
               </table>
           @else
               <p class="text-center">There are no record for Affiliates</p>
           @endif
       </div>
   </div>
@endsection

