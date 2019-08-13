@extends('bootstrap-4.template')

@section('style')
<style>
    .sy-content {
        align-items: center;
        justify-content: center;
    }
    .social-media-strip img {
        height: 1.5em;
        vertical-align: top;
    }
</style>
@endsection


@section('content')

<div class="container">
    <div class="social-media-strip">
        <a href="https://github.com/illfx" target="_blank">
            <i class="fab fa-github"></i>
        </a>
        <a href="https://linkedin.com/in/illfx" target="_blank">
            <i class="fab fa-linkedin"></i>
        </a>
        <a href="/movies/rawiswar-221.mp4" target="_blank">
            <img src="/images/wwf.png" class="" />
        </a>
{{--        <a href="/movies/" target="_blank">--}}
{{--            <i class="fad fa-video"></i>--}}
{{--        </a>--}}
        {{--<i class="fab fa-"></i>--}}
    </div>
</div>

@endsection



@section('script')

@endsection