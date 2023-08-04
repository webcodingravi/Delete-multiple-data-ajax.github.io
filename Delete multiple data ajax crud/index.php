<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>dynamic dependent select-box</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" integrity="sha512-BnbUDfEUfV0Slx6TunuB042k9tuKe3xrD6q4mg5Ed72LTgzDIcLPxg6yI2gcMFRyomt+yJJxE+zJwNmxki6/RA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <script src="js/jquery.js" type="text/javascript"></script>
    <link href="css/style.css" rel="stylesheet" type="text/css">
  
   
</head>


<body>

<div class="container">
<div class="row justify-content-center">
    <div class="col-6 mt-5">
        <div class="text-center text-white  bg-primary">
    <h2>Delete Multiple Data Ajax Crud</h2>
        </div>
    <div class="delete-button bg-info rounded">
        <button class="btn btn-danger" id="delete-btn">Delete</button>

        </div>
       <div id="load-data">
      
       </div>
     
   
    </div>
</div>
</div>

<div id="error-message"></div>
<div id="success-message"></div>



<script src="js/bootstrap.min.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
   function loadData() {
    $.ajax({
       url : "load-data.php",
       type : "POST",
       success : function(data) {
            $("#load-data").html(data);

       
       }
    });
   }

   loadData();

   $(".btn").on("click",function(){
       var id = [];
       
       $(":checkbox:checked").each(function(key) {
        id[key] = $(this).val();
       })
       if(id.length === 0) {
        alert("Please Select atleast one checkbox");
       }else {
        if(confirm("Do you really want to delete these records")) {
        $.ajax({
          url : "delete-data.php",
          type : "POST",
          data : {id : id},
          success: function(data) {
           if(data == 1) {
               $("#success-message").html("Data deleted successfully.").slideDown();
               $("#error-message").slideUp();
               setTimeout(function(){
                $("#success-message").slideUp();
               },400)
               loadData();
           }else{
            $("#error-message").html("Can't Delete Data.").slideDown();
               $("#success-message").slideUp();
               setTimeout(function(){
                $("#error-message").slideUp();
               },400)
           }

          }
        });

               }
       }
   });
});

</script>

</body>
</html>