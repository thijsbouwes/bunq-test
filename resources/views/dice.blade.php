<html>
    <head>
        <title>TEST</title>
        <link rel="stylesheet" href="/css/app.css">
    </head>
    <body>
    <div class="board-wrapper">
        <div class="board">
            @foreach(\Illuminate\Support\Facades\Config::get('bunqpoly.cards.rows') as $index => $row)

                @if($index === 0)
                    <div class="board__row" datat-test="{{ $index}} ">
                @elseif($index === 1)
                    <div class="board__row board__row--big">
                        <div class="board__col board__col--left">
                @elseif($index === 2)
                        <div class="board__col board__col--right">
                @elseif($index === 3)
                    <div class="board__row">
                @endif


                        @foreach($row as $card)
                            <div class="card {{ $card['size'] === 'big' ? 'card--big' : 'card--small' }} {{ (($index===1 || $index===2) ? 'card--small-rotated' : '') }} {{ $index===0 ? 'card--top' : '' }} {{ $index===1 ? 'card--rotated-left' : '' }} {{ $index===2 ? 'card--rotated-right' : '' }}">
                                @if($card['size'] !== 'big')
                                <div class="card__header {{ (($index===1 || $index===2) ? 'card__header--rotated' : '') }} {{ (!key_exists('color', $card) || empty($card['color'])) ? '' : 'card__header--' . $card['color'] }}">
                                </div>

                                <div class="card__content {{ (!key_exists('border', $card) || empty($card['border'])) ? '' : implode(' ', $card['border']) }}">
                                    <span class="card__name">{{ $card['name'] }}</span>
                                </div>
                                @endif
                            </div>
                        @endforeach


                @if($index === 0)
                @elseif($index === 1)
                @elseif($index === 2)
                        </div>
                @elseif($index === 3)
                @endif

                    </div>
            @endforeach

        </div>
    </div>

        {{--<div id="dice" class="dice"></div>--}}



        <script src="/js/lib/three.min.js"></script>
        <script src="/js/lib/cannon.min.js"></script>
        <script src="/js/lib/teal.js"></script>
        <script src="/js/lib/dice.js"></script>
        <script src="/js/lib/main.js"></script>


        <script src="/js/app.js"></script>
    </body>
</html>