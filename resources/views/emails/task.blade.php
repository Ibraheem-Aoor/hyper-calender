<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reminder from Panjika</title>
    <style>
        body{
            background-color: #edf2f7;
            color: #333333;
        }
        .inner-panel{
            background-color: #fffff5;
            color: #718096;
            width: 80%;
            margin: 0 auto;
            padding: 50px;
        }
        .text-center{
            text-align: center;
        }
        .pl-1{
            padding-left: 20px;
        }
        .btn{
            display: inline-block;
            font-weight: 400;
            color: #212529;
            text-align: center;
            vertical-align: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            border: 1px solid transparent;
            padding: .375rem .75rem;
            font-size: 1rem;
            line-height: 1.5;
            border-radius: .25rem;
            transition: color .15s ease-in-out,
            background-color .15s ease-in-out,
            border-color .15s ease-in-out,
            box-shadow .15s ease-in-out;
        }
        .btn-info{
            color: #fff;
            background-color: #17a2b8;
            border-color: #17a2b8;
            box-shadow: 0 1px 1px rgba(0, 0, 0, .075);
        }
        table{
            width: 100%;
        }
    </style>
</head>
<body>

<table>
    <tr>
        <td class="text-center"><h2>PANJIKA</h2></td>
    </tr>
    <tr>
        <td>
            <div class="inner-panel">
                <h3>{{ __('Dear') }} {{ $task->user->name }}</h3>
                <p>{{ __('You have a reminder about') }} <b>{{ $task->title }}</b> {{ __('on') }} {{ $task->date->format('F d, Y') }}
                    {{ __('at') }} {{ $task->time->format('H:i A') }}</p>
            </div>
        </td>
    </tr>
    <tr>
        <td class="text-center mt-2">
            <a href="{{ url('/') }}" class="btn btn-info">{{ __('See Your Calendar') }}</a>
        </td>
    </tr>
    <tr>
        <td class="pl-1"><p>{{ __('Thanks') }} <br> Panjika</p></td>
    </tr>
</table>


</body>
</html>
