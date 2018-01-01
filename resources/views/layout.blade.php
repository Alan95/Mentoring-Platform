<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <base>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Mentoring Platform</title>

        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <script src='https://www.google.com/recaptcha/api.js'></script>
    </head>
    <body>
        <div id="app">
            @yield('content')
        </div>
        <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script>

            // function prevents to submit a form if I am not a robot is not checked!
         $(function(){
             $('#registrationForm').submit(function(event){
                 var verified = grecaptcha.getResponse();
                 if(verified.length === 0){
                     event.preventDefault();
                 }
             });
         });
        </script>
    </body>
</html>


