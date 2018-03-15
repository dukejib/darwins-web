
/** Summernote */
$(document).ready(function() {
    $('#description').summernote();
    $('#article').summernote();
    $('#refill').summernote();
    $('#app').summernote();
});


/**
* Button makeAffiliate in e-commerce\resources\views\admin\users\customers.blade.php
*/
$(document).ready(function () {
    $custId = 0; //Id to change customer
    $functionUrl = ""; //Url to function
    $('#makeAffiliate').on('click', function () {
        $custId = $(this).attr('value');
        $functionUrl = $(this).attr('url');
        console.log($custId);
        console.log($functionUrl);
        $('#makeAffiliateModal').modal('show');
    });
    // This uses Modal Proceed Button
    $('#makeAffiliateProceed').on('click', function () {
        $.ajax({
            type: "GET",
            url: $functionUrl,
            // url : '/customer/makeaffiliate/' + $custId,
            // data: { "id" : $custId},
            dataType: "json",
            success: function (response) {
                //AdminController is sending json reply:answer
                console.log(response.reply); 
                //Hide and remove the relevant TR
                $('#' + $custId).fadeOut(1000,function(){
                    $('#' + $custId).remove();
                });
                
            },
            error:function(){
                alert('There was an error');
            }            
        });
        //
        $('#makeAffiliateModal').modal('hide');
    });
});

/**
* Button makeUnAffiliate in e-commerce\resources\views\admin\users\affiliates.blade.php
*/
$(document).ready(function () {
   $affiliateId = 0; //Id to change customer
    $functionUrl = ""; //Url to function
    $('#unAffiliate').on('click', function () {
       $affiliateId = $(this).attr('value');
        $functionUrl = $(this).attr('url');
        console.log($custId);
        console.log($functionUrl);
        $('#unAffiliateModal').modal('show');
    });
    //This uses Modal Proceed Button
    $('#unAffiliateProceed').on('click', function () {
        $.ajax({
            type: "GET",
            url: $functionUrl,
            // url : '/customer/makeaffiliate/' +$affiliateId,
            // data: { "id" :$affiliateId},
            dataType: "json",
            success: function (response) {
                //AdminController is sending json reply:answer
                console.log(response.reply); 
                //Hide and remove the relevant TR
                $('#' +$affiliateId).fadeOut(1000,function(){
                    $('#' +$affiliateId).remove();
                });
            },
            error:function(){
                alert('There was an error');
            }            
        });
        //
        $('#unAffiliateModal').modal('hide');
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