<div class="sidebar-menu">

    <div class="sidebar-menu-inner">

        <header class="logo-env">

            <!-- logo -->
            <div class="logo">
                <a href="index.html">
                    <img src="assets/images/log.jpg" width="120" alt="" />
                </a>
            </div>

            <!-- logo collapse icon -->
            <div class="sidebar-collapse">
                <a href="#" class="sidebar-collapse-icon">
                    <!-- add class "with-animation" if you want sidebar to have animation during expanding/collapsing transition -->
                    <i class="entypo-menu"></i>
                </a>
            </div>


            <!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
            <div class="sidebar-mobile-menu visible-xs">
                <a href="#" class="with-animation">
                    <!-- add class "with-animation" to support animation -->
                    <i class="entypo-menu"></i>
                </a>
            </div>

        </header>


        <ul id="main-menu" class="main-menu">
            <!-- add class "multiple-expanded" to allow multiple submenus to open -->
            <!-- class "auto-inherit-active-class" will automatically add "active" class for parent elements who are marked already with class "active" -->
            <li class="root-level @if (URL::current() == route('dashboard')) active @endif">
                <a href="{{ route('dashboard') }}">
                    <i class="entypo-gauge"></i>
                    <span class="title">Dashboard</span>
                </a>
            </li>
            @if (Auth::user()->role == '1')
                <li class="root-level @if (URL::current() == route('user.index') || URL::current() == route('user.create')) active @endif ">
                    <a href="{{ route('user.index') }}">
                        <i class="entypo-user"></i>
                        <span class="title">Users</span>
                    </a>
                    <ul class="">
                        <li class="@if (URL::current() == route('user.index')) active @endif">
                            <a href="{{ route('user.index') }}">
                                <span class="title">All-Users</span>
                            </a>
                        </li>
                        <li class="@if (URL::current() == route('user.create')) active @endif">
                            <a href="{{ route('user.create') }}">
                                <span class="title">Add Users</span>
                            </a>
                        </li>
                    </ul>
                </li>
        
        </li>
        <li class="root-level @if (URL::current() == route('drug.index') || URL::current() == route('drug.index')) active @endif ">
            <a href="{{ route('drug.index') }}">
                <i class="fa fa-medkit"></i>
                <span class="title">Drugs</span>
            </a>
            <ul class="">
                <li class="active">
                    <a href="{{ route('drug.index') }}">
                        <span class="title">all-Drugs</span>
                    </a>
                </li>
                <li class="  @if (URL::current() == route('drug.create')) active @endif">
                    <a href="{{ route('drug.create') }}">
                        <span class="title">Add Drug</span>
                    </a>
                </li>
            </ul>

        </li>
        <li class="  @if (URL::current() == route('client.index')) active @endif">
            <a href="{{ route('client.index') }}">
                <i class="entypo-list"></i>
                <span class="title">Clients</span>
            </a>
            <ul class="">
                <li class="active">
                    <a href="{{ route('client.index') }}">
                        <span class="title">all-Clients</span>
                    </a>
                </li>
                <li class="  @if (URL::current() == route('client.create.page1')) active @endif">
                    <a href="{{ route('client.create.page1') }}">
                        <span class="title">Add Client</span>
                    </a>
                </li>
            </ul>

        </li>
    @elseif(Auth::user()->role == '2')
        <li class="root-level @if (URL::current() == route('client.index')) active @endif">
            <a href="{{ route('dashboard') }}">
                <i class="entypo-list-add"></i>
                <span class="title">Clients</span>
            </a>
        </li>
    @else
        @endif
        <li class="root-level visible-xs">
            <a onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                href="{{ route('logout') }}">
                <i class="entypo-logout right"></i>
                <span class="title">Logout</span>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>
        </ul>

    </div>

</div>
