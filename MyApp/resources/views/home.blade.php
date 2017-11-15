<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .typewriter h1 {
              overflow: hidden; /* Ensures the content is not revealed until the animation */
              border-right: .15em solid orange; /* The typwriter cursor */
              white-space: nowrap; /* Keeps the content on a single line */
              margin: 0 auto; /* Gives that scrolling effect as the typing happens */
              letter-spacing: .15em; /* Adjust as needed */
              animation:
                typing 3.5s steps(40, end),
                blink-caret .75s step-end infinite;
            }

            /* The typing effect */
            @keyframes typing {
              from { width: 0 }
              to { width: 100% }
            }

            /* The typewriter cursor effect */
            @keyframes blink-caret {
              from, to { border-color: transparent }
              50% { border-color: orange; }
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>

                <div class="typewriter">
                  <h1>This is {{ $name }}'s sample app</h1>
                </div>
            </div>
        </div>
    </body>
</html>
