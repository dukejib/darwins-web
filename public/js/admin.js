
/** Summernote */
$(document).ready(function() {
    $('#description').summernote();
    $('#article').summernote();
    $('#refill').summernote();
    $('#app').summernote();
});
/** For Deleting User from Admin Panel */
//Delete the USer
$(document).ready(function () {
    $functionUrl = ""; //Url to function
    $userId = ""; //User Id to delete
    //This uses Modal Proceed Button
    $('#delete').on('click', function () {
        //
        $functionUrl = $('#url').attr('href');
        $userId = $('#url').attr('value');
        console.log($functionUrl);
        console.log($userId);
        
        $.ajax({
            type: "GET",
            url: $functionUrl,
            // url : '/customer/makeaffiliate/' +userId,
            // data: { "id" :userId},
            dataType: "json",
            success: function (response) {
                //AdminController is sending json reply:answer
                // console.log(response.reply); 
                //Hide and remove the relevant TR
                $('#' + $userId).fadeOut(1000,function(){
                    $('#' + $userId).remove();
                });
                //document.write(response);
            },
            error:function(){
                //alert('There was an error');
            }            
        });
         $('#deleteUserModal').modal('hide');
    });
});