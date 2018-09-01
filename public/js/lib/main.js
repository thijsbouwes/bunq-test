"use strict";

function dice_initialize(container) {
    var canvas = $t.id('dice');
    canvas.style.width = window.innerWidth - 1 + 'px';
    canvas.style.height = window.innerHeight - 1 + 'px';

    $t.dice.use_true_random = false;

    var box = new $t.dice.dice_box(canvas, { w: window.innerWidth, h: window.innerHeight });
    box.animate_selector = false;

    $t.bind(window, 'resize', function() {
        canvas.style.width = window.innerWidth - 1 + 'px';
        canvas.style.height = window.innerHeight - 1 + 'px';
        box.reinit(canvas, { w: window.innerWidth, h: window.innerHeight });
    });

    function before_roll(vectors, notation, callback) {
        // do here rpc call or whatever to get your own result of throw.
        // then callback with array of your result, example:
        // callback([2, 2, 2, 2]); // for 4d6 where all dice values are 2.
        callback();
    }


    function notation_getter() {
        return $t.dice.parse_notation('2d6');
    }

    function after_roll(notation, result) {
        console.log(result);
    }

    box.bind_mouse(container, notation_getter, before_roll, after_roll);
}
