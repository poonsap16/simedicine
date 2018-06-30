<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>IMISU</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #06c;
                color: #fcfcfc;
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

            .links > a {
                color: #ffc;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
                background-color: #09c;
                padding: 14px 25px;
                display: inline-block;
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

            /* Sink */
            .hvr-sink {
              display: inline-block;
              vertical-align: middle;
              -webkit-transform: perspective(1px) translateZ(0);
              transform: perspective(1px) translateZ(0);
              box-shadow: 0 0 1px rgba(0, 0, 0, 0);
              -webkit-transition-duration: 0.3s;
              transition-duration: 0.3s;
              -webkit-transition-property: transform;
              transition-property: transform;
              -webkit-transition-timing-function: ease-out;
              transition-timing-function: ease-out;
            }
            .hvr-sink:hover, .hvr-sink:focus, .hvr-sink:active {
              -webkit-transform: translateY(8px);
              transform: translateY(8px);
            }

        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="typewriter">
                    <h1>SiMEDICINE.ORG</h1>
                </div>
                <hr>

                <div class="links">
                    <a class="hvr-sink" href="{{ env('REGISTER_PAGE_URL') }}">Register</a>
                    <a class="hvr-sink" href="{{ env('MEDSICON_APP_URL') }}">Medsicon</a>
                </div>
            </div>
        </div>
    </body>
</html>
