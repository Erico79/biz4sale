<div class="sidebar" data-active-color="rose" data-background-color="black" data-image="assets2/img/sidebar-3.jpg">
    <!--
Tip 1: You can change the color of active element of the sidebar using: data-active-color="purple | blue | green | orange | red | rose"
Tip 2: you can also add an image using data-image tag
Tip 3: you can change the color of the sidebar with data-background-color="white | black"
-->
    <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text">
            {{ config('app.name') }}
        </a>
    </div>
    <div class="logo logo-mini">
        <a href="http://www.creative-tim.com" class="simple-text">
            Ct
        </a>
    </div>
    <div class="sidebar-wrapper">
        <div class="user">
            {{--<div class="photo">--}}
                {{--<img src="{{ asset('assets2/img/faces/avatar.jpg') }}" />--}}
            {{--</div>--}}
            <div class="info">
                <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                    {{ $user->masterfile->first_name . ' ' . $user->masterfile->last_name }}
                    <b class="caret"></b>
                </a>
                <div class="collapse" id="collapseExample">
                    <ul class="nav">
                        <li><a href="{{ url('user/' . $user->id) }}">Profile</a></li>
                        <li><a href="{{ url('user/edit/' . $user->id) }}">Edit Profile</a></li>
                        <li><a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a></li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </ul>
                </div>
            </div>
        </div>

        <ul class="nav">
            @if(count($menu))
                @foreach($menu as $item)

                    @if(!$item->parent)
                        <li class="{{ ($item->url == $current_route->uri) ? 'active' : '' }}">
                    @else
                        <li>
                            @endif

                            <a {{ ($item->parent) ? 'data-toggle=collapse' : '' }} href="{{ ($item->parent) ? $item->url . $item->id : url($item->url) }}">
                                <i class="material-icons">{{ $item->icon }}</i>
                                <p>
                                    {{ $item->title }} {!! ($item->parent) ? '<b class="caret"></b>' : '' !!}</p>
                            </a>
                            @if($item->parent)
                                <div class="collapse" id="{{ $item->id }}">
                                    <ul class="nav">
                                        @if(count($item->children))
                                            @foreach($item->children as $child)
                                                <li class="{{ ($current_route->uri == $child->url) ? 'active child' : '' }}">
                                                    <a href="{{ url($child->url) }}"> {{ $child->title }} </a>
                                                </li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </div>
                            @endif
                        </li>

                        @endforeach
                    @endif
        </ul>

    </div>
</div>