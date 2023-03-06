@extends('layouts.admin')

@section('title','User | Profile')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ __('User Profile Settings') }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">{{ __('User') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('Profile') }}</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="col">
                <div class="row">
                    <div class="col-md-4 mb-2">
                        {{ Form::model($user,['route'=>'user.update','method'=>'get']) }}
                        <div class="card">
                            <div class="card-header text-center">{{ __('Account Information') }}</div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">{{ __('Full Name') }}</label>
                                    {{ Form::text('name',null,['class'=>'form-control','id'=>'name']) }}
                                    @if($errors->first('name'))
                                        <small class="text-danger">{{ $errors->first('name') }}</small>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="email">{{ __('Email address') }}</label>
                                    {{ Form::email('email',null,['class'=>'form-control','id'=>'email']) }}
                                    @if($errors->first('email'))
                                        <small class="text-danger">{{ $errors->first('email') }}</small>
                                    @endif
                                </div>
                            </div>
                            <div class="card-footer text-center">
                                <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                            </div>
                        </div>
                        {{ Form::close() }}
                    </div>

                    <div class="col-md-4 mb-2" id="avatar-div">
                        {{ Form::model($user,['route'=>'user.avatar','method'=>'post','files'=>true]) }}
                        <div class="card">
                            <div class="card-header text-center">{{ __('Change Avatar') }}</div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="btn btn-outline-warning btn-sm btn-hover" for="avatar" title="Change Avatar"><i class="fas fa-edit"></i></label>
                                    <img src="{{ asset('assets/img/avatars') }}/{{ $user->avatar }}" alt="{{ $user->name }}" class="rounded mx-auto d-block img-thumbnail">
                                </div>
                                <div class="form-group">
                                    <input name="avatar" type="file" id="avatar">
                                </div>
                            </div>
                            <div class="card-footer text-center">
                                <button type="submit" class="btn btn-primary">{{ __('Save Avatar') }}</button>
                            </div>
                        </div>
                        {{ Form::close() }}
                    </div>

                    <div class="col-md-4 mb-2">
                        {{ Form::model($user,['route'=>'user.password','method'=>'get']) }}
                        <div class="card">
                            <div class="card-header text-center">{{ __('Change Password') }}</div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="password">{{ __('New Password') }}</label>
                                    <input type="password" name="password" class="form-control" id="password">
                                    @if($errors->first('password'))
                                        <small class="text-danger">{{ $errors->first('password') }}</small>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="password-confirm">{{ __('Confirm New Password') }}</label>
                                    <input type="password" name="password_confirmation" class="form-control" id="password-confirm">
                                </div>
                            </div>
                            <div class="card-footer text-center">
                                <button type="submit" class="btn btn-primary">{{ __('Reset Password') }}</button>
                            </div>
                        </div>
                        {{ Form::close() }}
                    </div>

                </div>
            </div>
        </div>
    </section>
@stop

@section('style')
    <style>
        #avatar-div:hover .btn-hover{
            display: block;
        }
        #avatar{
            display: none;
        }
        .btn-hover{
            display: none;
            position: absolute;
            right: 50px;
        }
    </style>
@stop
