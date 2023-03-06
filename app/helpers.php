<?php

use App\Models\SystemSetting;

function isActive($path, $active = 'active menu-open'){
    return call_user_func_array('Request::is', (array)$path) ? $active : '';
}

function panDate($date){
    $data = SystemSetting::query()->firstOrCreate();
    $value = $data->date_format;
    return $date->format($value);
}

function panTime($time){
    $data = SystemSetting::query()->firstOrCreate();
    $value = $data->time_format;
    return $time->format($value);
}

function sysConfig($col){
    $d = SystemSetting::query()->firstOrCreate();
    return $d->$col;
}
