@extends('bootstrap-4.template')

@section('style')
    <link rel="stylesheet" href="/styles/flash-cards.css" />
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">

            <div id="psy-start" class="psy-start-screen text-center">
            {{--<div class="psy-start-screen text-center" style="display: none;">--}}
                <div>Flash Cards</div>
                <button id="btn-start" class="btn btn-lg btn-success" autofocus="autofocus">Start</button>
                {{--<div class="btn btn-lg btn-default">Practice</div>--}}
            </div>

            <div id="psy-question" class="psy-eq" style="display: none">
                <div class="col-lg-4 offset-lg-4 col-md-8 offset-md-2 col-sm-8 col-xs-6">
                    <div class="card text-right">
                        <div class="card-body">
                            <div class="card-text">
                                <div id="psy-eq-upper" class="psy-eq-upper">&nbsp;</div>
                                <div id="psy-eq-lower" class="psy-eq-lower">&nbsp;</div>
                                <div id="psy-operator" class="psy-operator">&times;</div>
                                <div id="psy-answer" class="psy-answer">&nbsp;</div>[]
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{--<div id="psy-results" class="text-center">--}}
            <div id="psy-results" class="text-center" style="display: none;">

                <div style="margin-bottom: 15px">
                    <div>Your Results</div>
                    <div>You scored <span id="psy-results-correct"></span> out of <span id="psy-results-total"></span> correct!</div>
                    <div>That's <span id="psy-results-percent"></span>! Sucka</div>

                    <button id="btn-retry" class="btn btn-lg btn-success" autofocus="autofocus">Try Again</button>
                </div>

                <div id="psy-incorrect" style="display: none">
                    <div id="psy-results-history">

                    </div>
                    <div class="hint">place <i class="far fa-mouse-pointer"></i> over to reveal <span>incorrect</span> answer</div>
                    {{--<div class="btn btn-lg btn-default">Practice</div>--}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script>
        /** @var Deck */
        var deck = null;

        var settings = {
            min:   0,
            max:  12,

            card: {
                timer: 20,
                count: 5,
            }
        };

        function Deck(options)
        {

            var defaults = {
                min: 0,
                max: 12,
                card: {
                    timer: 20,
                    count: 20,
                }
            };

            this.settings = options;  // TODO: MERGE OPTIONS AND DEFAULTS
            this.finished = false;
            this.cards = [
                equation(this.settings.min, this.settings.max)
            ];                  // array of cards; holds first flash card equation

            draw(this.cards[0]);

            // stop & score exam
            this.stop = function()
            {
                this.finished = true;
                var correct = 0;
                for(var n in this.cards)
                {
                    var card = this.cards[n];
                    if ( card[2] === card[3] ){
                        correct++;
                    }else{
                        var html =
                        '<div data-card-index="'+ n +'" class="card text-right">' +
                            '<div class="card-body">' +
                                '<div class="card-text">' +
                                    '<div class="psy-eq-upper">' + card[0] + '</div>' +
                                    '<div class="psy-eq-lower">' + card[1] + '</div>' +
                                    '<div class="psy-operator">&times;</div>' +
                                    '<div class="psy-answer">' + card[2] + '</div>' +
                                '</div>' +
                            '</div>' +
                        '</div>' ;
                        $('#psy-results-history').append(html);
                    }
                }

                if( correct === this.cards.length ) {
                    $('#psy-incorrect').hide();
                }else{
                    $('#psy-results .card').hover(
                        function(event){
                            var $card = $(event.target),
                                id = $card.data('card-index');
                            // console.log('hover card array: ', deck.cards[id] );

                            $card.find('.psy-answer')
                                .html(    deck.cards[id][3]   )
                                .addClass('danger');

                        }, function(event){
                            event.preventDefault();
                            var $card = $(event.target),
                                id = $card.data('card-index');

                            $card.find('.psy-answer')
                                .html(deck.cards[id][2])
                                .removeClass('danger');
                        }
                    );
                    $('#psy-incorrect').show();
                }

                $('#psy-results-correct').html(correct);
                $('#psy-results-total').html(this.settings.card.count);
                $('#psy-results-percent').html(correct/this.settings.card.count*100+'%');
                $('#psy-question').hide();
                $('#psy-results').show();
                setTimeout(function(){
                    $('#btn-retry').focus();
                }, 100);
            }; //  Deck::stop()
        }


        function draw(card){
            $('#psy-eq-upper').html(card[0]);
            $('#psy-eq-lower').html(card[1]);
        }


        Deck.prototype.nextCard = function() {
            if( this.finished === false ) {
                var count = this.cards.length; // the number of flash cards gone through

                // STORE ANSWER FROM LAST CARD   ??? BEST PLACE FOR THIS ??
                this.cards[count - 1].push(Number(document.getElementById('psy-answer').innerText.trim()));

                if (count < this.settings.card.count) {
                    var card = equation(this.settings.min, this.settings.max);

                    this.cards.push(card);
                    $('#psy-eq-upper').html(card[0]);
                    $('#psy-eq-lower').html(card[1]);
                } else {
                    this.stop();
                }
            }
        };


        function equation(min, max)
        {

            var numbers = [
                Math.floor(Math.random() * (max - min) ) + min,
                Math.floor(Math.random() * (max - min) ) + min
            ];
            numbers.push( numbers[0] * numbers[1] );
            // numbers[ term, term, ans ]

            if( numbers[0] < numbers[1] ) {
                var tmp = numbers[0];
                numbers[0] = numbers[1];
                numbers[1] = tmp;
            }

            return numbers;

        }

        $(function(){
            $(document).on('click', function(){
                $('#txt-answer').focus();
            });
            $(document).on('keydown', function (event) {
                // language=JQuery-CSS
                var $ans = $('#psy-answer');
                // 48-57 inclusive  ..are..   digits 0-9
                if( event.which === 13 ) {
                    // USER PRESSED ENTER KEY
                    deck.nextCard();
                    // reset answer field
                    $ans.html('&nbsp;');
                } else if( event.which > 47 && event.which < 58 ) {
                    // USER PRESSED A NUMBER KEY
                    $ans.html($ans.html() + String.fromCharCode(event.which));

                } else if( event.which === 8 ) {
                    // USER PRESSED BACKSPACE KEY
                    var el = $ans[0], len = el.innerText.length;
                    if( len > 1 )
                    {
                        el.innerText = el.innerText.substr(0, len-1);
                    }
                }
            });
            $('#btn-start').on('click', function(e){
                deck = new Deck(settings);
                $('#psy-start').hide();
                $('#psy-question').show();
            });
            $('#btn-retry').on('click', function(e){
                deck = new Deck(settings);
                $('#psy-results').hide();
                $('#psy-question').show();
                $('#psy-results-history').empty();
            });
        });
    </script>

    @endsection