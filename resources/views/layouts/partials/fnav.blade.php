<nav class="navbar navbar-default navbar-fixed-top nav-transparent overlay-nav sticky-nav nav-white nav-border-bottom no-transition" role="navigation">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-6"><a class="logo-light" href="index.html"><img alt="" src="images/logo-white.png" class="logo" /></a><a class="logo-dark" href="index.html"><img alt="" src="images/logo-light.png" class="logo" /></a></div>
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
            </div>
            <div class="col-md-9 text-right">
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#slider" class="inner-link">Home</a> </li>
                        <li><a href="" class="inner-link">Sell Your Business</a> </li>
                        @guest
                            <li><a href="{{ url('login') }}" class="inner-link">Login</a> </li>
                        @else
                            <li><a href="{{ url('login') }}" class="inner-link">{{ \Illuminate\Support\Facades\Auth::user()->name }}</a> </li>
                        @endguest
                    </ul>
                </div>
                <!--/.nav-collapse -->
            </div>
        </div>
    </div>
</nav>
