@extends('layouts.admin')

@section('title','Settings | Email Setting')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ __('Email Setting') }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">{{ __('Settings') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('Email Setting') }}</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- ***/Image page inner Content Start-->

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            {{  Form::model($email,['url' => 'setting/email/store','method'=>'post']) }}
                            <div class="form-group row">
                                <div class="col-md-4">
                                    {{ Form::label('MAIL_MAILER', __('Mail Driver:')) }}
                                    {{ Form::text('MAIL_MAILER',null, ['placeholder' => '','class'=>'form-control']) }}
                                </div>
                                <div class="col-md-4">
                                    {{ Form::label('MAIL_HOST', __('Mail Host:')) }}
                                    {{ Form::text('MAIL_HOST', null, ['placeholder' => '','class'=>'form-control']) }}
                                </div>
                                <div class="col-md-4">
                                    {{ Form::label('MAIL_PORT', __('Mail Port:')) }}
                                    {{ Form::text('MAIL_PORT', null, ['placeholder' => '','class'=>'form-control']) }}
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-4">
                                    {{ Form::label('MAIL_USERNAME', __('Username:')) }}
                                    {{ Form::text('MAIL_USERNAME', null, ['placeholder' => '','class'=>'form-control']) }}
                                </div>
                                <div class="col-md-4">
                                    {{ Form::label('MAIL_PASSWORD', __('Password:')) }}
                                    {{ Form::password('MAIL_PASSWORD', ['placeholder' => '******************','class'=>'form-control']) }}
                                </div>
                                <div class="col-md-4">
                                    {{ Form::label('MAIL_ENCRYPTION', __('Encryption:')) }}
                                    {{ Form::text('MAIL_ENCRYPTION', null, ['placeholder' => '','class'=>'form-control']) }}
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-4">
                                    {{ Form::label('MAIL_FROM_ADDRESS', __('From Address:')) }}
                                    {{ Form::text('MAIL_FROM_ADDRESS', null, ['placeholder' => '','class'=>'form-control']) }}
                                </div>
                                <div class="col-md-4">
                                    {{ Form::label('MAIL_FROM_NAME', __('From Name:')) }}
                                    {{ Form::text('MAIL_FROM_NAME', null, ['placeholder' => '','class'=>'form-control']) }}
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-success" >{{ __('Update') }}</button>
                            </div>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </section>

@stop
