@extends('bootstrap-4.template')

@section('style')
<style>
    .sy-content {
        align-items: center;
        justify-content: center;
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
        {{--<i class="fab fa-"></i>--}}
    </div>
</div>

@endsection



@section('script')

@endsection