<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

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
        <td class="text-center"><h2>{{sysConfig('title')}}</h2></td>
    </tr>
    <tr>
        <td>
            <div class="inner-panel">
                <h3>{{ __('Dear') }} {{ $event->user->name }}</h3>
                <p> {{ __('You have a reminder about') }} <b>{{ $event->title }}</b> {{ __('on') }} {{ $event->start_date->format('F d, Y') }}
                    {{ __('at') }} {{ $event->start_time->format('H:i A') }}</p>
            </div>
        </td>
    </tr>
    <tr>
        <td>
            <div class="inner-panel">
                <p>{{ __('Event') }}: {{ $event->title }}</p>
                <p>{{ __('Start') }}: {{ $event->start_date->format('Y-m-d') }} {{ $event->start_time->format('H:i:s') }}</p>
                <p>{{ __('End') }}: {{ $event->end_date->format('Y-m-d') }} {{ $event->end_time->format('H:i:s') }}</p>
                <p>{{ __('Location') }}: {{ $event->locations }}</p>
                <p>{{ __('Description') }}: {{ $event->description }}</p>
            </div>
        </td>
    </tr>
    <tr>
        <td class="text-center mt-2">
            <a href="{{ url('/') }}" class="btn btn-info">{{ __('See Your Calendar') }}</a>
        </td>
    </tr>
    <tr>
        <td class="pl-1">
            {{ __('Thanks') }} <br>
            {{ config('app.name') }}
        </td>
    </tr>
</table>

</body>
</html>
