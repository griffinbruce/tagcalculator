<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>TAG Technical</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Baked in Laravel Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 600;
                height: 90vh;
                margin: 0;
            }
            
            body{
                padding: 25px;
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
            .text-monospace{
                font-family: monospace;
            }
        </style>
    </head>
    <body>
            <div class='content'>
                <div class='title m-b-md'>
                Calculator
              </div>
            <!-- Display last input calculation -->
            @if(Session::get('flash_message'))
            <h3>
              {{ Session::get('flash_message') }}
            </h3>
            @endif
            </div>
            <!-- Calculator Form -->
                <form action='/' method='POST' class='content'>
                @csrf
                    <label for='first'>Integer 1:</label>
                    <input type='integer' id='first' name='first' required></br>
                    <label for='type'>Choose Operand:</label>
                        <select name='type' id='type' required>
                            <option value='+'>+</option>
                            <option value='-'>-</option>
                            <option value='*'>*</option>
                            <option value='/'>/</option>
                        </select>
                        </br>
                    <label for='second'>Integer 2:</label>
                    <input type='integer' id='second' name='second' required>
                    
                        </br>          
                    <button type='submit'>Calculate</button>
                </form>
                </br>
                <div class="content">
                    <h2>10 most recent calculations</h2>
                    <!-- loop over all rows and calculate -->
                    @foreach($calculations as $calculation)
                    <div>
                        {{ $calculation->id }}: <span class="text-monospace">{{ $calculation->fullResult() }} </span>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </body>
</html>