@extends('bootstrap-4.template')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>New Article</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <form class="form">
                    <div class="form-group">
                        <label for="txt-article-title">
                            Title
                        </label>
                        <input id="txt-article-title" name="article[title]" class="form-control" type="text" />
                    </div>
                    <div class="form-group">
                        <label for="txt-article-slug">
                            Slug
                        </label>
                        <input id="txt-article-slug" name="article[slug]" class="form-control" type="text" />
                    </div>
                    {{--<div class="form-group">--}}
                        {{--<label for="txt-article-">--}}
                            {{--Title--}}
                        {{--</label>--}}
                        {{--<input type="text" id="txt-article-" name="article[]" />--}}
                    {{--</div>--}}
                    <div class="form-group">
                        <button id="btn-article-submit" class="btn btn-primary btn-lg" type="submit">Submit</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')

@endsection