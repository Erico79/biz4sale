<header id="header" class="header">
    <div class="container">
        <h1 class="logo">
            <a href="{{ url('/') }}">
                <img src="assets/images/logo.svg" alt=""><span class="text">{{ config('app.name') }}</span>
            </a>
        </h1><!--//logo-->
        <nav class="main-nav navbar navbar-right navbar-expand-md">
            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbar-collapse">
                <span> </span>
                <span> </span>
                <span> </span>
            </button>
            <div id="navbar-collapse" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="active nav-item"><a class="nav-link" href="{{ url('/') }}">Home</a></li>
                    {{--<li class="nav-item dropdown">--}}
                        {{--<a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">More <i class="fa fa-angle-down"></i></a>--}}
                        {{--<div class="dropdown-menu dropdown-menu-right">--}}
                            {{--<a class="dropdown-item" href="about.html">About Us</a>--}}
                            {{--<a class="dropdown-item" href="story-single.html">Customer Story Single</a>--}}
                            {{--<a class="dropdown-item" href="blog.html">Blog</a>--}}
                            {{--<a class="dropdown-item" href="blog-single.html">Blog Single</a>--}}
                            {{--<a class="dropdown-item" href="support.html">Support Center</a>--}}
                            {{--<a class="dropdown-item" href="career.html">Career</a>--}}
                            {{--<a class="dropdown-item" href="job-single.html">Job Single</a>--}}
                            {{--<a class="dropdown-item" href="contact.html">Contact</a>--}}
                        {{--</div>--}}
                    {{--</li><!--//dropdown-->--}}
                    @guest
                    <li class="nav-item"><a class="nav-link login-trigger" href="#" data-toggle="modal" data-target="#login-modal">Log in</a></li>
                    <li class="nav-item nav-item-cta last">
                        <a class="btn-signup" href="#" data-toggle="modal" data-target="#signup-modal">Sell your Business</a>
                    </li>
                    @endguest
                    @auth
                    <li class="nav-item">
                        <a class="nav-link login-trigger" href="{{ route('logout') }}"
                           onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a></li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    @endauth
                </ul><!--//nav-->
            </div><!--//navabr-collapse-->
        </nav><!--//main-nav-->
    </div><!--//container-->
</header><!--//header-->