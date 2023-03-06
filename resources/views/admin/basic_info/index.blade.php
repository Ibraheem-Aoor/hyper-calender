@extends('layouts.admin')

@section('title','Company Basic Information')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">{{ __('Basic Information') }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">{{ __('Home') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('Update Information') }}</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @if($errors->any())
                        <div class="alert alert-danger" role="alert">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                        @if(Session::has('success'))
                            <div class="alert alert-success" role="alert">
                               {{ Session::get('success') }}
                            </div>
                        @endif
                    <div class="card">
                        <div class="card-body">
                            {{ Form::model($info,['url' => 'setting/basicInfo/update','method'=>'patch']) }}
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="company_name">{{ __('Company Name') }}*</label>
                                    {{ Form::text('company_name',null,['class'=>'form-control']) }}
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="address">{{ __('Company Address') }}</label>
                                    {{ Form::text('address',null,['class'=>'form-control']) }}
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="city">{{ __('City') }}</label>
                                    {{ Form::text('city',null,['class'=>'form-control']) }}
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="state">{{ __('State') }}</label>
                                    {{ Form::text('state',null,['class'=>'form-control']) }}
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="zip_code">{{ __('Zip Code') }}</label>
                                    {{ Form::text('zip_code',null,['class'=>'form-control']) }}
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="country">{{ __('Country') }}</label>
                                    {{ Form::text('country',null,['class'=>'form-control']) }}
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="telephone">{{ __('Telephone') }}</label>
                                    {{ Form::text('telephone',null,['class'=>'form-control']) }}
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="sys_email">{{ __('Email') }}*</label>
                                    {{ Form::email('sys_email',null,['class'=>'form-control']) }}
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="from_email">{{ __('From Email') }}*</label>
                                    {{ Form::email('from_email',null,['class'=>'form-control']) }}
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="reg_no">{{ __('Company Registration No') }}*</label>
                                    {{ Form::text('reg_no',null,['class'=>'form-control']) }}
                                </div>
                            </div>
                            <hr>
                            <div class="form-group text-center">
                                {{ Form::submit(__('UPDATE'),['class'=>'btn btn-success btn-sm']) }}
                                {{ Form::reset(__('RESET'),['class'=>'btn btn-warning btn-sm']) }}
                            </div>
                            {{ Form::close() }}
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col-md-12 -->
            </div>
            <!--/.row (left) -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@stop

