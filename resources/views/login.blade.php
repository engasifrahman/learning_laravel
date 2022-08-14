<html>
   
   <head>
      <title>Login Form</title>
   </head>

   <body>
      
      @if (count($errors) > 0)
         <div class = "alert alert-danger">
            <ul>
               @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
               @endforeach
            </ul>
         </div>
      @endif
      
     {!! Form::open(array('url'=>'/validation')) !!}
      
      <table border = '1'>
         <tr>
            <td align = 'center' colspan = '2'>Login</td>
         </tr>
         <tr>
            <td>Username</td>
            <td>{!! Form::text('username')  !!} </td>
         </tr>
         <tr>
            <td>Password</td>
            <td>{!! Form::password('password') !!} </td>
         </tr>
         <tr>
            <td align = 'center' colspan = '2'
               >{!! Form::submit('Login') !!}</td>
         </tr>
      </table>
      
      {!! Form::close() !!} 
   
   </body>
</html>