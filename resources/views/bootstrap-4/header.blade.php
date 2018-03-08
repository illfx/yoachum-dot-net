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
                <li class="nav-item{% if ( nav === 'resume' ) === '/' %} active{% endif %}">
                    <a class="nav-link" href="/resume">Resume</a>
                </li>

                <li>
                    <a class="nav-link{% if ( nav === 'contact' ) %} active{% endif %}" href="/contact">Contact</a>
                </li>
                {{--<li>--}}
                    {{--<a class="nav-link{% if ( nav === 'socket.io' ) %} active{% endif %}" href="/socket.io">Socket.IO</a>--}}
                    {{--</li>--}}
            </ul>
        </div>
    </div>
</nav>