<?php /** @var $navItem \App\Library\Navigation\ItemAbstract */ ?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">

        <a class="navbar-brand" href="/">
            <img src="/images/brand.png" class="d-inline-block align-top" alt="SYoachum">
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>


        <div class="collapse navbar-collapse" id="navbarsExample07">



            <ul class="navbar-nav mr-auto">
                {{--<li class="nav-item{% if ( nav === 'home' ) === '/' %} active{% endif %}">--}}
                    {{--<a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>--}}
                    {{--</li>--}}

                {{--@foreach($navItems as $item)--}}
                    {{--<li class="nav-item">--}}
                        {{--<a class="nav-link @if($item['active']) active @endif" href="{{ $item['url'] }}">{{ $item['name'] }}</a>--}}
                    {{--</li>--}}
                {{--@endforeach--}}


                @foreach($items as $navItem)
                    @php($class = get_class($navItem))
                    @if($class === 'App\Library\Navigation\Link')
                        <li class="nav-item">
                            <a class="nav-link @if($navItem->isActive()) active @endif" href="{{ $navItem->getHref() }}">{{ $navItem->getText()  }}</a>
                        </li>
                    @elseif($class === 'App\Library\Navigation\Dropdown')
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle @if($navItem->isActive()) active @endif" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ $navItem->getText() }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-right">
                                @foreach( $navItem->getMenuItems()  as $item )
                                    <li class="dropdown-item">
                                        <a class="nav-link @if($item->isActive()) active @endif" href="{{ $item->getHref() }}">{{ $item->getText()  }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>

                    @endif
                @endforeach



                {{--<li>--}}
                    {{--<a class="nav-link{% if ( nav === 'socket.io' ) %} active{% endif %}" href="/socket.io">Socket.IO</a>--}}
                {{--</li>--}}
                {{--<li role="separator" class="divider"></li>--}}
                {{--<li class="nav-item dropdown">--}}
                    {{--<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                    {{--Dropdown--}}
                    {{--</a>--}}
                    {{--<div class="dropdown-menu" aria-labelledby="navbarDropdown">--}}
                    {{--<a class="dropdown-item" href="#">Action</a>--}}
                    {{--<a class="dropdown-item" href="#">Another action</a>--}}
                    {{--<div class="dropdown-divider"></div>--}}
                    {{--<a class="dropdown-item" href="#">Something else here</a>--}}
                    {{--</div>--}}
                {{--</li>--}}
            </ul>

            <ul class="navbar-nav">
                @if( $user = auth()->user() )
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user-circle"></i>
                            {{ $user->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            {{--<li class="dropdown-item">--}}
                                {{--<a class="nav-link" href="#">--}}
                                    {{--<i class="far fa-cog"></i>--}}
                                    {{--Settings--}}
                                {{--</a>--}}
                            {{--</li>--}}
                            <li class="dropdown-item">
                                <form action="{{ action('Auth\LoginController@logout') }}" method="post">
                                    {{ csrf_field() }}
                                    <a class="nav-link"
                                       href="{{ action('Auth\LoginController@logout') }}"
                                       onclick="this.parentNode.submit(); return false;"
                                    >
                                        <i class="far fa-sign-out-alt"></i>
                                        Sign Out
                                    </a>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="/login">Login</a>
                    </li>
                @endif

            </ul>

            {{--@if( auth()->user() )--}}
                {{--<ul class="navbar-nav pull-right">--}}
                    {{--<li class="nav-item">--}}
                    {{--<form class="form-inline" action="{{ action('Auth\LoginController@logout') }}" method="post">--}}
                        {{--{{ csrf_field() }}--}}
                        {{--<button class="btn btn-link nav-link" type="submit">Logout</button>--}}
                    {{--</form>--}}
                    {{--</li>--}}
                {{--</ul>--}}
            {{--@endif--}}

        </div>
    </div>
</nav>