<html>
   <body>
      
      {!! Form::open(['url' => 'user/submit', 'method'=> 'post']) ; 
            echo Form::text('username','Username');
            echo '<br/>';
            
            echo Form::text('email', 'example@gmail.com');
            echo '<br/>';
     
            echo Form::password('password');
            echo '<br/>';
            
            echo Form::checkbox('name', 'value');
            echo '<br/>';
            
            echo Form::radio('name', 'value');
            echo '<br/>';
            
            echo Form::file('image');
            echo '<br/>';
            
            echo Form::select('size', ['L' => 'Large', 'S' => 'Small']);
            echo '<br/>';
            
            echo Form::submit('Click Me!');
       Form::close() !!}
   
   </body>
</html>