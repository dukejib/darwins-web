@extends('layouts.master')

@section('content')

<div class="well">

    <div class="page-header clearfix">
        {{--  Create Group Form  --}}
        <form action="{{ route('user.group.create') }}" method="post" class="form-inline pull-right" >
            {{ csrf_field() }}
            <div class="input-group">
                <input type="text" name="group_title" id="group_title" class="form-control" placeholder="Group Name" required>
                <span class="input-group-btn">
                <button type="submit" class="btn btn-primary">Create Group</button>
                </span>
            </div>
        </form>

        <h3>Referal Groups
        <br>
        <small>Create/Add/Delete your referal groups here</small>
        </h3>
         
    </div>

    @if(count($errors)>0)
        @include('includes.errors')
        <br>
    @endif

    {{--  Groups  --}}
    <div id="groups">
        <br>
        <div class="row">
            {{--  Group Table  --}}
            <div class="col-md-6">
                @if(count($groups)>0)
                <table class="display">
                    <thead>
                        <tr>
                            <th>Group Name</th>
                            <th>Status</th>
                            <th>View</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($groups as $group)
                        <tr>
                            <td>{{ $group->group_title }}</td>
                            <td>
                            @if ($group->group_status == 0)
                                <button class="btn btn-xs btn-success">Active</button>
                            @elseif ($group->group_status == 1)
                                <button class="btn btn-xs btn-warning">Deactive</button>
                            @endif
                            </td>
                            <td>
                                <button class="btn btn-xs btn-warning">View </button>
                            </td>
                            <td>
                            <button class="btn btn-xs btn-info"><i class="fa fa-pencil"></i> Edit</button>
                            </td>
                            <td>
                            <button class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Delete</button>
                            </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                    <p>You have not created any groups yet</p>
                @endif
            </div>
            {{--  Users Table  --}}
            <div class="col-md-6">

                @if(count($user->totalAffiliates())>0)
                {{--  Start the Table Here  --}}
                <table class="display">
                    <thead>
                        <tr>
                            {{--  <th>select</th>  --}}
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Group</th>
                            <th>Add</th>
                        </tr>
                    </thead>
                    <tbody>
                    {{--  Get Our Affiliates  --}}
                    @foreach($user->getMyAffiliates()  as $customer)
                        <tr>
                            {{--  <td><input type="checkbox" class="checkBoxes" name="checkBoxArray[]" value="{{ $customer->id}}" /></td>  --}}
                            <td>{{ $customer->id }}</td>
                            <td>{{ $customer->first_name . ' ' . $customer->last_name }}</td>
                            <td>{{ $customer->email }}</td>
                            <th>
                            @if(count($groups)>0)
                            <select id="select{{ $customer->id }}" value="you got {{$customer->id}}" class="form-control">
                                <option value="0">Groups</option>
                                @foreach($groups as $group)
                                <option value="{{ $group->id }}">{{ $group->group_title }}</option>   
                                @endforeach
                            </select>
                            @endif 
                            </th>
                            <th>
                            <a href="{{ route('user.group.add_to') }}" hidden id="url_link"></a>
                            <button class="btn btn-success btn-xs" id="{{ $customer->id }}">Add to Group</button>
                            </th>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                @endif
                
            </div>
        </div> 
    </div>

</div>

@endsection


@section('scripts')
<script>

$(document).ready(function(){
    //For Datatables - To use multiple tables, just follow below
    $('table.display').DataTable();
    //$('#mya').Datatable();
});

$('button').click(function(){
    //Get Clicked Button id
    $button_id = this.id;
    console.log(this.id);
    //Make sure, we aren't moving forward, if other buttons are pressed
    if($button_id == 0){
        console.log('button is 0');
        return;
    }
    //console.log('this wont work');
    //console.log($('#select' + this.id)).attr('value');
    //Get URL
    $url = $('#url_link').attr('href');
    //Token
    $token = "{{ csrf_token() }}";
    //Get The Selected option Value (Not Text)
    $select = $('#select' + this.id).find(":selected").val();
    console.log($select);
    //$select = 45;
    //Simplest Post
    $data = { user_id: $button_id, group_id: $select , _token:$token};
    $.ajax({
        type: "POST",
        url: $url,
        data:$data,
        dataType: "json",
            success: function (response) {
            //AdminController is sending json reply:answer
            // console.log(response); 
            //document.write(response);
            switch(response){
                //Errors First
                case 31:
                    toastr.error('Please select a group first');
                    break;

                case 32:
                    toastr.error('Please select a user first');
                    break;

                case 33:
                    toastr.info('Group is Full');
                    break;

                case 34:
                    toastr.info('User already in group');
                    break;

                case 10:
                    toastr.success('User added to Group');
                    break;
                default:
                    alert('You have sent : ' + response);
                    break;
            }
            ///toastr.success('Operation Successfull');
            },
            error:function(error){
            // console.log(error.status);
                //alert(error.status);
            },
            complete:function(){
 
            }         
        });
        
        //var xhr = new XMLHttpRequest();
        //xhr.open("POST", $url, true);
        //xhr.setRequestHeader('Content-Type', 'application/json');
        //xhr.send(JSON.stringify({
        //user_id: $button_id, group_id: $select , _token:$token
        //}));

        //xhr.onload = function() {
        //    console.log("HELLO")
        //console.log(this.responseText);
        //document.write(this.responseText);
        //var data = JSON.parse(this.responseText);
        //console.log(data);
        //}



});

</script>
    
@stop
