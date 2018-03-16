
/** Summernote */
$(document).ready(function() {
    $('#description').summernote();
    $('#article').summernote();
    $('#refill').summernote();
    $('#app').summernote();
});

/**
* Button deleteUser in e-commerce\resources\views\admin\users\affiliates.blade.php | customers.blade.php
*/
$(document).ready(function () {
    userId = 0; //Id to change customer
    $functionUrl = ""; //Url to function
    $('#deleteUser').on('click', function () {
        userId = $(this).attr('value');
        $functionUrl = $(this).attr('url');
        // console.log(userId);
        console.log($functionUrl);
        $('#deleteUserModal').modal('show');
    });
     //This uses Modal Proceed Button
    $('#delete').on('click', function () {
        $.ajax({
            type: "GET",
            url: $functionUrl,
            // url : '/customer/makeaffiliate/' +userId,
            // data: { "id" :userId},
            dataType: "json",
            success: function (response) {
                //AdminController is sending json reply:answer
                console.log(response.reply); 
                //Hide and remove the relevant TR
                $('#' +userId).fadeOut(1000,function(){
                    $('#' +userId).remove();
                });
            },
            error:function(){
                alert('There was an error');
            }            
        });
        //
        $('#deleteUserModal').modal('hide');
     });
 });

// $('#btnDeleteProduct').on('click',function(){
// $.ajax({
//   type: 'GET',
//   //AJAX/JQuery requires proper routes
//   url: deleteProductUrl,
//   //url: 'deleteproduct/' + $deleteId,
//   //data:{"_token" : newProductToken, "id" : $deleteId},
//   data:{ "id" : $deleteId},
//   success:function(message){
//      $('#' + $deleteId).fadeOut(1000);
//   },
//   error:function(){
//     alert('There was an error deleting Product.');
//   }
// });
// $('#deleteProduct').modal('hide');
// });
//    }