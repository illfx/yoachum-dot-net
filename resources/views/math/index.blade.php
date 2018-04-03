@extends('bootstrap-4.template')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <a href="{{ action('MathController@showFlashCards') }}">Flash Card Template</a>
            <br />
            <a href="{{ action('MathController@showTimesTable') }}">Times Table</a>
        </div>
    </div>
</div>
@endsection