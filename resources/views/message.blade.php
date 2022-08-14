<html>
   <head>
      <title>Ajax Example</title>
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
      </script>
      
      <script>
         function getMessage() {
            $.ajaxSetup({
               headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }
            });
            
            $.ajax({
               type:'POST',
               url:'/getmsg',
               data:'_token = <?php echo csrf_token() ?>',
               success:function(response) {
                  $("#msg").html(response.msg);
               },
               error: function (jqXHR, exception) {
                   var msg = '';
                   if (jqXHR.status === 0) {
                     msg = 'Not connect.\n Verify Network.';
                  } 
                  else if (jqXHR.status == 404) {
                     msg = 'Requested page not found. [404]';
                  } 
                  else if (jqXHR.status == 500) {
                     msg = 'Internal Server Error [500].';
                  } 
                  else if (exception === 'parsererror') {
                     msg = 'Requested JSON parse failed.';
                  } 
                  else if (exception === 'timeout') {
                     msg = 'Time out error.';
                  } 
                  else if (exception === 'abort') {
                     msg = 'Ajax request aborted.';
                  } 
                  else {
                     msg = 'Uncaught Error.\n' + jqXHR.responseText;
                  }
                  $('#msg').html(msg);
               },
            });
         }
      </script>
   </head>
   
   <body>
      <div id = 'msg'>This message will be replaced using Ajax. 
         Click the button to replace the message.</div>
      {!!
       Form::button('Replace Message',['onClick'=>'getMessage()']);
     !!}
   </body>

</html>