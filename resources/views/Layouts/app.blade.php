<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

          <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Laravel</title>
        <link rel="icon" href="{{ asset('ico.ico') }}" type="image/x-icon">

        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
        
        <style>
            body {
                background-color: #f4f4f4;
                font-family: 'Nunito', sans-serif;
                
                font-size: 14px;
            }  

            .h-custom {
                height: calc(100% - 73px);
            }
      
            @media (max-width: 450px) {
                *{
                    font-size: 12px;
                }   
                .Logo{
                    margin-left:15%;
                    width:70%;
                }
            }

            .divider:after, .divider:before {
                content: "";
                flex: 1;
                height: 1px;
                background: #eee;
            }

            .Logo {
                border-radius: 40px; 
                box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.5);
            }

            .Footer {
                background-color: #3B365F;
                color: #fff;
                padding: 20px 0;
                text-align: center;
            }

            .Footer p {
                margin: 0;
            }

            .container{
                padding: 0;
            }

            .navbar-collapse{
                margin-left: 30px;
                margin-right: 30px;
            }

            .dropdown-menu a:active,
            .dropdown-menu a:focus {
                background-color: #3B365F;
                color: white;
            }

            #logo-p{
                border-radius: 50px;
                margin-left: 30px;
            }

            .principal{
                margin-top: 120px;
            }
        </style>     
    </head>
    <body>
        @yield('content')
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </body>
</html>