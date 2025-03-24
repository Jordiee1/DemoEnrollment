<header class="main_menu {{ isset($breadcrumb) ? 'single_page_menu' : 'home_menu' }}">
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Thai:wght@300;400;700&display=swap" rel="stylesheet">

    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand logo_1" href="{{ route('home') }}" style="width: 150px;">
                        <img src="{{ asset('img/single_page_logo.png') }}" alt="logo">
                    </a>
                    <a class="navbar-brand logo_2" href="{{ route('home') }}" style="width: 150px;">
                        <img src="{{ asset('img/logo.png') }}" alt="logo">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse main-menu-item justify-content-end"
                        id="navbarSupportedContent">

                            <a class="btn btn-outline-primary ml-3" href="http://localhost:3000">QUIZZ</a>

                        <ul class="navbar-nav align-items-center">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('home') }}">หน้าหลัก</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('courses.index') }}">กิจกรรม</a>
                            </li>

                            @auth
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('enroll.myCourses') }}">รายการลงทะเบียน</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownUser" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{ Auth::user()->name }}
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdownUser">
                                    
                                    @if (in_array(Auth::user()->load('roles')->roles[0]->pivot->role_id, [1, 2]))
                                        <a class="dropdown-item" href="{{ route('admin.dashboard') }}">หน้าแดชบอร์ด</a>
                                    @endif

                                    @if (Auth::check())
                                        <a class="dropdown-item" href="{{ route('profile') }}">โปรไฟล์</a>
                                    @endif

                                    <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">ลงชื่อออก</a>
                                        <form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </div>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a class="btn btn-outline-primary ml-3" href="{{ route('login') }}">เข้าสู่ระบบ</a>
                                </li>
                            @endauth
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
