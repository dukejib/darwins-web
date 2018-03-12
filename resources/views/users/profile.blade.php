@extends('layouts.master')

@section('title')
    {{ $settings->site_name }}
@endsection

@section('content')
    <div class="col-md-10 col-md-offset-1">

        <div class="panel panel-primary">

            <div class="panel-heading">
                Edit User Profile 
                @if($user->isUserAffiliate())
                    Affiliate
                @else
                    Customer
                @endif
            </div>

            <div class="row">

                <div class="profile_tabs">

                    @if(count($errors)>0)
                        @include('includes.errors')
                        <br>
                    @endif
                    
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#basic">Basic Information</a></li>
                        <li><a data-toggle="tab" href="#account">Account Settings</a></li>
                        <li><a data-toggle="tab" href="#contact">Contact Details</a></li>
                        <li><a data-toggle="tab" href="#referal">Referal</a></li>
                        <li><a data-toggle="tab" href="#orders">My Orders</a></li>
                    </ul>
                              
                    <div class="tab-content">
                        {{--  User Information  --}}
                        <div id="basic" class="tab-pane fade in active">
                            <h3>Basic Information</h3>
                            <div class="panel-body">
                                <form action="{{ route('user.profile.basic') }}" method="post" class="form-horizontal">
                                    {{ csrf_field() }} <!-- Must use this -->
                                    <div class="form-group">
                                        <label for="first_name" class="control-label col-xs-3">First Name</label>
                                        <div class="col-xs-9">
                                            <input type="text" class="form-control" name="first_name" value="{{ $user->first_name }}">
                                        </div>
                                    </div>
                
                                    <div class="form-group">
                                        <label for="last_name" class="control-label col-xs-3">Last Name</label>
                                        <div class="col-xs-9">
                                            <input type="text" class="form-control" name="last_name" value="{{ $user->last_name }}">
                                        </div>
                                    </div>
                
                                    <div class="form-group">
                                        <label for="email" class="control-label col-xs-3">Email</label>
                                        <div class="col-xs-9">
                                            <input type="email" class="form-control" name="email" value="{{ $user->email }}">
                                        </div>
                                    </div>
                                            
                                    <div class="form-group">
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-success">Update Basic Data</button>
                                        </div>
                                    </div>
                
                                </form>
                            </div>
                        </div>

                        {{-- Account Settings   --}}
                        <div id="account" class="tab-pane fade">
                            <h3>Account Settings</h3>
                            <div class="panel-body">
                                <form action="{{ route('user.profile.account') }}" method="post" class="form-horizontal">
                                    {{ csrf_field() }} <!-- Must use this -->
                
                                    <div class="form-group">
                                        <label for="password" class="control-label col-xs-3">New Password</label>
                                        <div class="col-xs-9">
                                            <input type="password" class="form-control " name="password" value="">
                                        </div>
                                    </div>
        
                                    <div class="form-group">
                                        <label for="password_confirmation" class="control-label col-xs-3">Confirm Password</label>
                                        <div class="col-xs-9">
                                            <input type="password" class="form-control" name="password_confirmation" value="">
                                        </div>
                                    </div>
                                    <!--
                                    <div class="form-group">
                                        <label for="avatar" class="control-label col-xs-3">Upload New Avatar</label>
                                        <div class="col-xs-9">
                                            <input type="file" name="avatar" class="form-control">
                                        </div>
                                    </div>
                                    -->
                                            
                                    <div class="form-group">
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-success">Update Account</button>
                                        </div>
                                    </div>
                
                                </form>
                            </div>
                        </div>

                        {{--  Contact Information  --}}
                        <div id="contact" class="tab-pane fade">
                            <h3>Contact Information</h3>
                            <div class="panel-body">
                                <form action="{{ route('user.profile.contact') }}" method="post" class="form-horizontal">
                                    {{ csrf_field() }} <!-- Must use this -->
                
                                    <div class="form-group">
                                        <label for="primary_contact_no" class="control-label col-xs-3">Primary Contact *</label>
                                        <div class="col-xs-9">
                                            <input type="text" class="form-control" name="primary_contact_no" value="{{ $profile->primary_contact_no}}">
                                        </div>
                                    </div>
        
                                    <div class="form-group">
                                        <label for="secondary_contact_no" class="control-label col-xs-3">Secondary Contact</label>
                                        <div class="col-xs-9">
                                            <input type="text" class="form-control" name="secondary_contact_no" value="{{ $profile->secondary_contact_no}}">
                                        </div>
                                    </div>
        
                                    <div class="form-group">
                                        <label for="postal_code" class="control-label col-xs-3">Postal Code</label>
                                        <div class="col-xs-9">
                                            <input type="text" class="form-control" name="postal_code" value="{{ $profile->postal_code}}">
                                        </div>
                                    </div>
        
                                    <div class="form-group">
                                        <label for="address" class="control-label col-xs-3">Address *</label>
                                        <div class="col-xs-9">
                                            <input type="text" class="form-control" name="address" value="{{ $profile->address }}">
                                        </div>
                                    </div>
        
                                    <div class="form-group">
                                        <label for="address_continued" class="control-label col-xs-3">Address Continued *</label>
                                        <div class="col-xs-9">
                                            <input type="text" class="form-control" name="address_continued" value="{{ $profile->address_continued}}">
                                        </div>
                                    </div>
        
                                    <div class="form-group">
                                        <label for="city" class="control-label col-xs-3">City *</label>
                                        <div class="col-xs-9">
                                            <input type="text" class="form-control" name="city" value="{{ $profile->city}}">
                                        </div>
                                    </div>
        
                                    <div class="form-group">
                                        <label for="country" class="control-label col-xs-3">Country *</label>
                                        <div class="col-xs-9">
                                            <input type="text"" class="form-control" name="country" value="{{ $profile->country }}  ">
                                        </div>
                                    </div>
        
                                    <!--
                                    <div class="form-group">
                                        <label for="avatar" class="control-label col-xs-3">Upload New Avatar</label>
                                        <div class="col-xs-9">
                                            <input type="file" name="avatar" class="form-control">
                                        </div>
                                    </div>
                                    -->
                                            
                                    <div class="form-group">
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-success">Update Contact Information</button>
                                        </div>
                                    </div>        
                                </form>
                            </div>
                        </div>

                        {{--  Referal Information  --}}
                        <div id="referal" class="tab-pane fade">
                           
                            <h3>Your Referal Link</h3>
                            <div class="panel-body">
                                @if($user->isUserAffiliate())
                                <div class="form-control">
                                    <label for="">{{url('/').'/referred?refferal='.$user->affiliate_id}}</label>
                                </div>
                                <div class="form-control">
                                    <label for="">Reffered By</label>
                                    {{ $user->referredBy() }}
                                </div>
                                <div class="form-control">
                                    <label for="">Total Affiliates</label>
                                    {{ $user->totalAffiliates() }}
                                </div>
                                @else
                                <div>
                                    <a href="{{ route('user.profile.become_affiliate') }}" class="btn btn-success">Become Our Affiliate</a>
                                </div>
                                <div>
                                    Read more about our <a href="{{ route('affiliate.document') }}" target="_blank">Affiliate</a> progarm.
                                </div>
                                @endif
                            </div>
                        </div>

                        {{--  Shipping Address  --}}
                        <div id="orders" class="tab-pane fade">
                            <h3>My Orders</h3>  
                            <div class="panel-body">
                            Nothing Yet
                            </div> 
                        </div>

                     {{-- tab Content   --}}
                    </div>
                
                {{--  End of profile_tabs  --}}
                </div> 
            {{--  End of row  --}}
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br><br>
@endsection
