@extends('bootstrap-4.template')
@section('style')
<style>
    #g-recaptcha-response {
        display: block !important;
        position: absolute;
        margin: -78px 0 0 0 !important;
        width: 302px !important;
        height: 76px !important;
        z-index: -999999;
        opacity: 0;
    }
</style>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            @if(session('success'))
                <div class="alert alert-success">
                    {!! session('success') !!}
                </div>
            @endif
            {{--@if($errors->any())--}}
                {{--<div class="alert alert-danger">--}}
                    {{--<strong>Sorry </strong>Please check the form and try again!--}}
                {{--</div>--}}
            {{--@endif--}}
            <div class="row">
                {{--<div class="col-lg-6">--}}
                    {{--<img src="holder.js/150x200" />--}}
                    {{--<h2>Stephen Yoachum</h2>--}}
                    {{--<h4>Allentown, Pennsylvania, USA</h4>--}}
                    {{--<div style="font-size: 36px">--}}
                        {{--<button class="btn btn-link" value="https://m.do.co/c/12331de067cb">--}}
                            {{--<i class="fab fa-digital-ocean"></i>--}}
                        {{--</button>--}}
                        {{--<a href="https://stackoverflow.com/users/3565434/illfx">--}}
                            {{--<i class="fab fa-stack-overflow"></i>--}}
                        {{--</a>--}}
                    {{--</div>--}}
                {{--</div> <!-- .col-lg-6 -->--}}

                <div class="col-lg-6">
                    <h4>Direct Message</h4>
                    <p>
                        <b>Send me a DM using the form below</b>
                    </p>
                    <form name="dm" action="/contact" method="post">
                        {{ csrf_field() }}
                        @if($errors->has('g-recaptcha-response'))
                            <div class="alert alert-danger">
                                <strong>Error! </strong>{{ $errors->first('g-recaptcha-response') }}
                            </div>
                        @endif
                        <div class="form-group">
                            {{--<label for="email">Email</label>--}}
                            <input id="email" name="email" type="email" class="form-control @if($errors->has('email')) is-invalid @endif" value="{{ old('email') }}" required="required" placeholder="Your email" />
                            @if($errors->has('email'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif
                        </div>

                        <div class="form-group @if($errors->has('subject')) has-error @endif">
                            {{--<label for="subject">Subject</label>--}}
                            <select id="subject" name="subject" class="form-control @if($errors->has('subject')) is-invalid @endif" required="required">
                                <option value="" disabled="disabled" selected="selected" hidden="hidden">Select a subject...</option>
                                <option value="recruiter">Recruiter</option>
                                <option value="legal">Copyright Information</option>
                            </select>
                            @if($errors->has('subject'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('subject') }}
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            {{--<label for="message">Message</label>--}}
                            <textarea id="message" name="message" class="form-control @if($errors->has('message')) is-invalid @endif" rows="3" required="required" placeholder="Type a message...">{{ old('message') }}</textarea>
                            @if($errors->has('message'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('message') }}
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <div class="g-recaptcha" data-callback="reCaptchaCheckHandler" data-sitekey="6LdNmxsTAAAAAAgIfZcIctB4ehvAYPnh3ykpKcqn"></div>
                            <div class="invalid-feedback">
                                Please verify you're human.
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>

                    </form>

                </div> <!-- .col-lg-6 -->


            </div> <!-- .row -->

            <div class="col-lg-3">

            </div>
            <div class="col-lg-7">

            </div>
        </div>
    </div>
@endsection

@section('script')
<script src='https://www.google.com/recaptcha/api.js'></script>
<script>
    var reCaptchaChecked = false;
    $(function(){
        var $recaptcha = document.querySelector('#g-recaptcha-response');
        if($recaptcha) {
            $recaptcha.setAttribute("required", "required");
        }

        $('button.btn-link').on('click', function(event) {
            alert(this.value);
        });

        // $(document.forms['dm']).on('submit', function(){
        //     if(reCaptchaChecked === false)
        //     {
        //
        //     }
        // });

        function reCaptchaCheckHandler(){
            reCaptchaChecked = true;
        }
    })
</script>
@endsection