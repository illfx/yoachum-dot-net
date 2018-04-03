@extends('bootstrap-4.template')

@section('style')
    <style>
        .psy-times-table {
            border-collapse: collapse;
            border: 1px solid #000;
            cursor: default;
        }
        .psy-times-table td {
            width: 40px;
            height: 40px;
            text-align: center;
            border: 1px solid;
            padding: 2px;
        }
        .psy-times-table tr:hover {
            background-color: #999999;
        }
        .psy-times-table tr:first-child, .psy-times-table td:first-child {
            font-weight: bold;
        }

        .psy-times-table td.psy-hover {
            background-color: #f00;
        }

    </style>
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <table class="psy-times-table jq-no-select" >
                @php($size = 12)
                @for($r=1; $r <= $size; $r++)
                    <tr>
                        @for($c=1; $c <= $size; $c++)
                            <td>
                                {{ $r * $c }}
                            </td>
                        @endfor
                    </tr>
                @endfor
            </table>
            <div id="div-equation" class="psy-equation">
                <span></span>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script>
        $(function(){
            $('.psy-times-table td').hover(
                function(){
                    var x = $(this).index(),
                        y = $(this.parentElement).index();

                    $(this.parentElement.parentElement.firstElementChild.cells[x]).addClass('psy-hover');
                    $(this.parentNode.firstElementChild).addClass('psy-hover');

                    var terms = [1 + x, 1 + y],
                        equals = terms[0] * terms[1];
                    $('#div-equation').html(
                        terms[0] +
                        '<span class="psy-operator"> &times; </span>' +
                        terms[1] +
                        '<span class="psy-equals"> &equals; </span>' +
                        equals
                    );

                    // console.log('Equation: ', 1+x, '(', 1+y ,')');
                    // $('#div-equation').html()
            },
                function(){
                    $(this.parentNode.firstElementChild).removeClass('psy-hover');
                    $(this.parentElement.parentElement.firstElementChild.cells[$(this).index()]).removeClass('psy-hover');
                    $('#div-equation').empty();
                }
            );
        })
    </script>
@endsection