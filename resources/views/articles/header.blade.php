<header>
    {{--<h2>{{ $article->title }}</h2>--}}
    <b><time datetime="2015-05-16 19:00">{{ $article->created_at->format('F j, Y, g:i a')  }}</time></b>
    <h2>{{ $article->title }}</h2>
    <div><i class="fas fa-tags"></i> PHP &bull; Redis &bull; AWS &bull; ElastiCache &bull; Database</div>

    @if( auth()->user() && auth()->user()->hasRole('admin'))
        <div style="font-size: 48px;">YOU ARE ADMIN</div>
    @endif

    {{--<div>  <small>Tags: </small> </div>--}}
    {{--<div>  <small><i class="fas fa-tags"></i> PHP &bull; Redis &bull; AWS &bull; ElastiCache &bull; Database--}}
    {{--</small> </div>--}}
    {{--<div>  <small><i class="fas fa-tags"></i> PHP &middot; Redis &middot; AWS &middot; ElastiCache &middot; Database--}}
    {{--</small> </div>--}}
    {{--<div>  <small><i class="fas fa-tags"></i> PHP--}}
    {{--<span style="font-size: 8px"><i class="fas fa-tag"></i></span> Redis--}}
    {{--<span style="font-size: 8px"><i class="fas fa-tag"></i></span> AWS--}}
    {{--<span style="font-size: 8px"><i class="fas fa-tag"></i></span> ElastiCache--}}
    {{--<span style="font-size: 8px"><i class="fas fa-tag"></i></span> Database--}}
    {{--</small> </div>--}}

</header>