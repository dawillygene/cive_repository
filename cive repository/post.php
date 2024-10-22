<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
</head>
<body>
   
<input type="text" id="live_search" autocomplete="off" placeholder="search">

<div id="search_result"></div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
   $(document).ready(function(){
       $("#live_search").keyup(function() {
       var input = $(this).val();
      // alert(input);
 if(input !=""){
    $.ajax({
 url:"search.php",
 method:"POST",
 data:{input:input},

   success:function(data){
    $("#search_result").html(data); 
    $("#search_result").css("display","block");
       }  
    });
 } else {
    $("#search_result").css("display","none");
 }


      });
   });
   </script>
</body>
</html>