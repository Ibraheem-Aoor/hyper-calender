<!-- Brand Logo -->
<a href="{{url('dashboard')}}" class="brand-link">
    <img src="{{ asset('assets/img/logos') }}/{{ sysConfig('logo') }}" alt="Panjika Logo" class="brand-image img-circle elevation-3">
    <span class="brand-text font-weight-light">{{ sysConfig('title') }}</span>
</a>
<!-- Sidebar -->
<div class="sidebar nano">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="{{ asset('assets/img/avatars') }}/{{ auth()->user()->avatar }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="{{ url('/') }}" class="d-block">{{ auth()->user()->name }}</a>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
            <li class="nav-item has-treeview {{ isActive(['/','dashboard*']) }}">
                <a href="{{ url('dashboard') }}" class="nav-link {{ isActive(['dashboard*','/']) }}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        {{ __('Dashboard') }}
                    </p>
                </a>
            </li>

            <li class="nav-item has-treeview {{ isActive(['event*']) }}">
                <a href="{{ url('events')}}" class="nav-link {{ isActive('event') }}">
                    <i class="fas fa-glass-cheers"></i>
                    <p>{{ __('Event') }}</p>
                </a>
            </li>

            <li class="nav-item has-treeview {{ isActive(['task*']) }}">
                <a href="{{ url('tasks')}}" class="nav-link {{ isActive('task') }}">
                    <i class="far fa-check-circle"></i>
                    <p>{{ __('Task') }}</p>
                </a>
            </li>

            <li class="nav-item has-treeview {{ isActive(['reminder*']) }}">
                <a href="{{ url('reminders')}}" class="nav-link {{ isActive('reminder') }}">
                    <i class="fas fa-stopwatch"></i>
                    <p>{{ __('Reminder') }}</p>
                </a>
            </li>

            <li class="nav-item has-treeview {{ isActive(['setting*']) }}">
                <a href="#" class="nav-link {{ isActive(['setting*']) }}">
                    <i class="fas fa-shapes"></i>
                    <p>
                        {{ __('Settings') }}
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ url('setting/systemSetting') }}" class="nav-link {{ isActive('setting/systemSetting') }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>{{ __('System Settings') }}</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('setting/basicInfo') }}" class="nav-link {{ isActive('setting/basicInfo') }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>{{ __('Company Settings') }}</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('setting/email') }}" class="nav-link {{ isActive('setting/email') }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>{{  __('E-mail Settings') }}</p>
                        </a>
                    </li>

                </ul>
            </li>

        </ul>
    </nav>
    <!-- /.sidebar-menu -->

</div>
