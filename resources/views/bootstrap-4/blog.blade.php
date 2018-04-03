@extends('bootstrap-4.template')

@section('content')
<div class="container">
    {{--<div class="row">--}}
        {{--<div class="col-lg-12">--}}
            {{--<h4 class="float-left">Article Index</h4>--}}
            {{--@can('create', App\Article::class)--}}
            {{--<a href="{{ action('ArticleController@create') }}" class="btn btn-secondary btn-sm float-right">--}}
                {{--<i class="fas fa-plus"></i>--}}
            {{--</a>--}}
            {{--@endcan--}}
        {{--</div>--}}
    {{--</div>--}}
    <div class="row">
        <div class="col-lg-12">
            @foreach($articles as $article)

                <div class="card">

                    <div class="card-body">
                        <h6><time datetime="">
                                {{ $article->publish_at->format('F j, Y, g:i a') }}
                            </time></h6>
                        <h5 class="card-title">
                            {{ $article->title }}
                        </h5>
                        <small><i class="fas fa-tags"></i> PHP &bull; Redis &bull; AWS &bull; ElastiCache &bull; Database</small>


                        <p class="card-text">

                            {{ $article->brief }}

                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. In eu nisl ante. Aenean blandit vulputate eros in pretium. Integer diam nisl, bibendum id blandit at, sollicitudin et lorem. Donec ullamcorper nec lectus sed lobortis. Nullam id sollicitudin sapien. Aliquam venenatis, diam in aliquam pretium, sem quam sodales nunc, rutrum placerat erat enim et ante. Nulla nec lectus a felis volutpat ornare. Cras sit amet libero porta, tempus quam eget, vulputate enim. Duis vehicula arcu at rhoncus faucibus. Fusce accumsan ultricies egestas. Pellentesque felis neque, molestie sit amet tristique a, scelerisque a nisi. Integer lacinia vestibulum justo, et consequat leo bibendum eu. Nulla facilisi. Vestibulum mi velit, varius ac diam vel, semper semper leo. Donec sollicitudin lacinia augue, non scelerisque justo aliquam nec.

                        </p>
                        <div class="text-muted" style="font-size: 12px;">
                            {{ $article->slug }}
                        </div>
                        <a href="{{ $article->slug }}" class="card-link">
                            Read
                        </a>

                    </div>


                </div>
                </div>
        </div>
        @endforeach
    </div>
@endsection