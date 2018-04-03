<?php /** @var $article App\Article */ ?>
@extends('bootstrap-4.template')
@section('content')
<div class="container">
    <article class="psy-article">

        @yield('articles.header')

        <section>
            <p>
                And, someday, this will be one of the greatest resources available<br />
                Something a little bit different for testing purposes!
            </p>
            <b>Progression</b>

            {!! $article->highlight('redis-cli -c -h mycachecluster.eaogs8.0001.usw2.cache.amazonaws.com -p 6379' , 'bash') !!}


            <div class="psy-geshi">
                {!! $article->highlight('echo "Hello, World!";', 'php') !!}
            </div>

            {!! $article->highlight('redis-cli -c -h mycachecluster.eaogs8.0001.usw2.cache.amazonaws.com -p 6379' , 'bash') !!}
        </section>

        <footer>
            <p>
                For more information, visit... <a href="{{ env('APP_URL') }}">http://www.yoachum.net</a>
            </p>

            <div id="disqus_thread"></div>
            <script>
                var disqus_config = function () {
                    this.page.url = '{{ url()->current() }}';  // Replace PAGE_URL with your page's canonical URL variable
                    this.page.identifier = '{{ $article->slug }}'; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                };
                (function() {
                    var d = document, s = d.createElement('script');
                    s.src = 'https://yoachum.disqus.com/embed.js';
                    s.setAttribute('data-timestamp', +new Date());
                    (d.head || d.body).appendChild(s);
                })();
            </script>
            <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>


        </footer>
    </article>



</div>
@endsection