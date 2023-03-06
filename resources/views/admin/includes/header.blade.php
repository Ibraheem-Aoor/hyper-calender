<!-- Left navbar links -->
<ul class="navbar-nav">
    <li class="nav-item">
        <a class="nav-link px-3" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
    </li>
</ul>

<!-- Right navbar links -->
<ul class="navbar-nav ml-auto">
    <!-- User Account: style can be found in dropdown.less -->
    <li class="nav-item dropdown">
        <a href="#" class="user dropdown-toggle mt-1" data-toggle="dropdown">
            <img src="{{ asset('assets/img/avatars') }}/{{ auth()->user()->avatar }}" class="img-circle " alt="User Image">
                <span class="hidden-xs">{{ Auth::user()->name }}</span>
        </a>
        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <li class="user-header">
                <img class="user-hd-img img-cir mx-auto d-flex"  src="{{ asset('assets/img/avatars') }}/{{ auth()->user()->avatar }}" alt="User Image">
                <p class="user-hd-text">
                    {{ strtoupper(Auth::user()->name) }} <br>
                    {{ Auth::user()->role_id }}
                    <small>{{ __('Member since') }} {{ Auth::user()->created_at->format('M. Y') }}</small>
                </p>
            </li>
            <br>
            <li class="user-body">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="">
                                <a href="{{ url('user/profile') }}" class="btn btn-success btn-flat">{{ __('Profile') }}</a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="">
                                <a class="btn btn-danger btn-flat" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </li>

    <li class="nav-item">
        <a class="nav-link px-3" data-widget="control-sidebar" data-slide="true" href="#">
            <i class="fas fa-th-large"></i>
        </a>
    </li>
</ul>
