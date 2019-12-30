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
                <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>

        </ul>
        <ul class="nav navbar-nav ml-auto">
            @if (Auth::check())
                <li><a id="user-icon" ><span class="fa fa-user-o fa-2x"></span></a></li>
                <li><a href="#"><span  class="fa fa-sign-out fa-2x"></span> Logout</a><li></li>
            @else
                <li><a href="#signup" data-toggle="modal" data-target="#myModal" ><span class="fa fa-sign-in" ></span> Login</a></li>
            @endif
        </ul>
    </div>
</nav>
