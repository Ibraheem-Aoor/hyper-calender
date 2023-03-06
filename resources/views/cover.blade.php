@extends('layouts.front')

@section('title',sysConfig('title'))

@section('content')

    <main class="px-3">
        <h1>{{ __('Use your time wisely') }}</h1>
        <p class="lead">{{ __("It doesn't matter what your business does—time is your most valuable resource. You need to make sure you're spending that time wisely, and the calendar is your budget. That's why it's so important you find the best calendar app for the job.") }}</p>
        <p class="lead">
            <a href="https://codecanyon.net/item/panjika-laravel-calendar/32283666/" class="btn btn-lg btn-secondary fw-bold border-white bg-white">{{ __('Buy Now') }}</a>
        </p>
    </main>

@stop
