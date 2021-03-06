<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <a class="navbar-brand" href="#">Navbar</a>
    <div id="main"></div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="/">首頁 <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="on_work">員工打卡</a>
            </li>
            @if (Auth::check())
                @if (Auth::user()->type==1)
                <li class="nav-item">
                    <a class="nav-link" href="user">人員管理</a>
                </li>
            @endif
            @endif
            @if (Auth::check())
            <li class="nav-item">
                <a class="nav-link" href="leave">請假出差申請</a>
            </li>
            @endif
            @if (Auth::check())
                @if (Auth::user()->type==1)
                    <li class="nav-item">
                        <a class="nav-link" href="checkLeaveAuth">請假審核</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="checkTravelAuth">出差審核</a>
                    </li>
                @endif
            @endif
            @if (Auth::check())
            <li class="nav-item">
                <a class="nav-link" href="attend">出勤紀錄</a>
            </li>
            @endif

            <!-- <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">請假出差管理</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="leave">請假出差申請</a>
                    <a class="dropdown-item" href="#">Link 2</a>
                    <a class="dropdown-item" href="#">Link 3</a>
                </div>
            </li> -->

        </ul>
        <ul class="nav navbar-nav ml-auto">
            @if (Auth::check())
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <span class="fa fa-user-o"></span>{{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('record') }}">
                            <span class="fa fa-th-list"></span>{{ __('請假出差查詢') }}
                        </a>
                        <a class="dropdown-item" href="{{ route('attend') }}">
                            <span class="fa fa-search"></span>{{ __('出缺勤查詢') }}
                        </a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();"><span  class="fa fa-sign-out"></span>
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @else
                <li><a href="#signup" data-toggle="modal" data-target="#myModal" ><span class="fa fa-sign-in" ></span> Login</a></li>
            @endif
        </ul>
    </div>
</nav>
