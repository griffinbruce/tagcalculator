<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>TAG Technical</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 600;
                height: 100vh;
                margin: 0;
            }
            body{
                padding: 25px;
            }

            .full-height {
                height: 50vh;
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
        </style>
    </head>
    <body>
            <div class='content'>
                <div class='title m-b-md'>
                Calculator
              </div>
            @if(Session::get('flash_message'))
            <h3>
              {{ Session::get('flash_message')}}
              @foreach($currentCalc as $calculation)
                @if($calculation->type == 'add') 
                    {{$calculation->first}} + {{$calculation->second}} = {{$calculation->first + $calculation->second}}
                    @elseif($calculation->type == 'subtract')
                    {{$calculation->first}} - {{$calculation->second}}= {{$calculation->first - $calculation->second}}
                    @elseif($calculation->type == 'multiply')
                    {{$calculation->first}} * {{$calculation->second}}= {{$calculation->first * $calculation->second}}
                    @elseif($calculation->type == 'divide')
                    {{$calculation->first}} / {{$calculation->second}}= {{$calculation->first / $calculation->second}}
                  @endif
              @endforeach
            
            </h3>
            @endif
            </div>
            <!-- Calculator Form -->
                <form action='/' method='POST'>
                @csrf
                    <label for='first'>Integer 1:</label>
                    <input type='integer' id='first' name='first' required></br>
                    <label for='second'>Integer 2:</label>
                    <input type='integer' id='second' name='second' required></br>
                    <label for='type'>Choose Operand:</label>
                        <select name='type' id='type' required>
                            <option value='add'>+</option>
                            <option value='subtract'>-</option>
                            <option value='multiply'>*</option>
                            <option value='divide'>/</option>
                        </select>
                        </br>          
                    <button type='submit'>Calculate</button>
                </form>
                </br>

                @foreach($calculations as $calculation)
                  <div>
                      @if($calculation->type == 'add') 
                      {{$calculation->id}}: {{$calculation->first}} + {{$calculation->second}} = {{$calculation->first + $calculation->second}}
                      @elseif($calculation->type == 'subtract')
                      {{$calculation->id}}: {{$calculation->first}} - {{$calculation->second}}= {{$calculation->first - $calculation->second}}
                      @elseif($calculation->type == 'multiply')
                      {{$calculation->id}}: {{$calculation->first}} * {{$calculation->second}}= {{$calculation->first * $calculation->second}}
                      @elseif($calculation->type == 'divide')
                      {{$calculation->id}}: {{$calculation->first}} / {{$calculation->second}}= {{$calculation->first / $calculation->second}}
                      @endif
                  </div>
                @endforeach

            </div>
        </div>
    </body>
</html>