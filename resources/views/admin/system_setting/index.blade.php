@extends('layouts.admin')

@section('title','System Setting')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">{{ __('System Settings') }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">{{ __('Home') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('Update Setting') }}</li>
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
                    <div class="row">
                        <div class="col-md-6">
                            {{ Form::model($info,['url' => 'setting/systemSetting/update','method'=>'patch','files'=>true ]) }}
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="title">{{ __('Title') }}</label>
                                        {{ Form::text('title',null,['class'=>'form-control']) }}
                                    </div>
                                    <div class="form-group">
                                        <label for="date_format">{{ __('Date Format') }} <a href="https://www.php.net/manual/en/datetime.format.php" title="Click to get full date formation options" target="_blank"><i class="far fa-question-circle fa-sm"></i></a></label>
                                        {{ Form::select('date_format',$repository->dateFormat(),null,['class'=>'form-control']) }}
                                    </div>
                                    <div class="form-group">
                                        <label for="time_format">{{ __('Time Format') }} <a href="https://www.php.net/manual/en/datetime.format.php" title="Click to get full time formation options" target="_blank"><i class="far fa-question-circle fa-sm"></i></a></label>
                                        {{ Form::select('time_format',$repository->timeFormat(),null,['class'=>'form-control']) }}
                                    </div>
                                    <div class="form-group">
                                        <label for="language">{{ __('Language') }}</label>
                                        {{ Form::select('language',$repository->languages(),null,['class'=>'form-control']) }}
                                    </div>
                                    <div class="form-group text-center">
                                        {{ Form::submit(__('UPDATE'),['class'=>'btn btn-success']) }}
                                        {{ Form::reset(__('RESET'),['class'=>'btn btn-warning']) }}
                                    </div>
                                </div>
                            </div>
                            {{ Form::close() }}
                        </div>

                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="text-center">{{ __('LOGO') }}</h3>
                                </div>
                                <div class="card-body">
                                    {{ Form::model($info,['route'=>'logo.update','method'=>'patch','files'=>true]) }}
                                    <div class="row">
                                        <div class="col-md-12">
                                            <img src="{{ asset('assets/img/logos') }}/{{ $info->logo }}" class="img-thumbnail float-left" alt="" width="160">
                                            <img src="{{ asset('dist/img/click-here-to-choose-a-picture.png') }}" class="img-thumbnail float-right" alt="" width="160" id="log-img" onclick="document.querySelector('input#logo').click()">
                                            {{ Form::file('logo',['style'=>'display:none','id'=>'logo','onchange'=>'readURL(this)']) }}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mt-3 text-center">
                                                {{ Form::submit(__('SAVE LOGO'),['class'=>'btn btn-primary']) }}
                                            </div>
                                        </div>
                                    </div>
                                    {{ Form::close() }}
                                </div>
                            </div>
                            <hr>
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="text-center">{{ __('Favicon') }}</h3>
                                </div>
                                <div class="card-body">
                                    {{ Form::model($info,['route'=>'favicon.update','method'=>'patch','files'=>true]) }}
                                    <div class="row">
                                        <div class="col-md-12">
                                            <img src="{{ asset('assets/img/favicon') }}/{{ $info->favicon }}" class="img-thumbnail float-left" alt="" width="160">
                                            <img src="{{ asset('dist/img/click-here-to-choose-a-picture.png') }}" class="img-thumbnail float-right" alt="" width="160" id="fav-img" onclick="document.querySelector('input#favicon').click()">
                                            {{ Form::file('favicon',['style'=>'display:none','id'=>'favicon','onchange'=>'readFURL(this)']) }}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mt-3 text-center">
                                                {{ Form::submit(__('SAVE FAVICON'),['class'=>'btn btn-primary']) }}
                                            </div>
                                        </div>
                                    </div>
                                    {{ Form::close() }}
                                </div>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <!--/.col (left) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@stop

@section('script')
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {

                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#log-img').attr('src', e.target.result).width(150).height(150);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    <script>
        function readFURL(input) {
            if (input.files && input.files[0]) {

                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#fav-img').attr('src', e.target.result).width(150).height(150);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@stop
