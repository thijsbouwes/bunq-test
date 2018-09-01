import Vue from 'vue'
import { library } from '@fortawesome/fontawesome-svg-core'
import { faSpinner } from '@fortawesome/free-solid-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

require('./bootstrap');

library.add(faSpinner);

Vue.config.productionTip = false;

Vue.component('complete-account', require('./components/CompleteAccount.vue'));
Vue.component('font-awesome-icon', FontAwesomeIcon);

const app = new Vue({
    el: '#app'
});

$(function(){
    //dice_initialize(document.body);


    let board = new Board();
    board.addPlayer(1, 'JG', 11);
    board.addPlayer(2, 'JG', 11);
    board.addPlayer(3, 'JG', 11);
    board.addPlayer(4, 'JG', 11);
    // board.addPlayer(2, 'JG', 11);

    board.showMessage('Player  turn!');
});

class Board
{
    constructor()
    {
        this.$board = $('#board');
        this.playerWidth = 40;
        this.players = [];
    }

    showMessage(message)
    {
        let $message = $('<div class="board__message"><span>'+message+'</span></div>');
        this.$board.append($message);
        $message.find('span').animate({
            top: (this.$board.height() / 2) - ($message.find('span').height() / 2) + 'px'
        }, {
            duration: 500,
            specialEasing: {
                'top': 'swing'
            },
            complete: function() {
                setTimeout(function () {
                    $message.find('span').animate({
                        top: '-200px'
                    }, 500, function(){
                        $message.remove();
                    });
                }, 2000);
            }
        });
    }

    setPlayerCard(id, cardIndex)
    {
        this.players[id].cardIndex = cardIndex;
    }

    addPlayer(id, name, cardIndex)
    {
        this.players[id] = {
            name,
            cardIndex,
            element: $('<div class="board__player-icon board__player-icon--blue"><span>'+name+'</span></div>')
        };


        let $player = this.players[id].element;
        this.$board.append($player);

        this.updatePlayerLocations()
    }

    updatePayerLocation(id, thrown)
    {
        let player = this.players[id];

        let newCardIndex = player.cardIndex + thrown;
        if(newCardIndex > 31)
        {
            player.cardIndex = newCardIndex %  31;
        } else {
            player.cardIndex = newCardIndex;
        }
    }


    updatePlayerLocations() {
        let playersOnCard = {};
        for(let key in this.players) {
            let player = this.players[key];
            if(player.cardIndex in playersOnCard === false)
            {
                playersOnCard[player.cardIndex] = [];
            }
            playersOnCard[player.cardIndex].push(player);
        }

        for(let card in playersOnCard)
        {
            let $card = this.$board.find('.property[data-index=' + card + ']');
            let players = playersOnCard[card];

            let rotated = $card.hasClass('property--rotated');
            let left = ($card.offset().left - this.$board.offset().left) + ($card.width() / 2) - (this.playerWidth / 2) - 2;
            let top = ($card.offset().top - this.$board.offset().top) + ($card.height() / 2) - (this.playerWidth / 2) - 2;
            top += $card.hasClass('property--top') ? -20 : 0;
            left += $card.hasClass('property--rotated-left') ? -20 : 0;
            left += $card.hasClass('property--rotated-right') ? 20 : 0;


            switch(players.length)
            {
                case 1:
                    players[0].element.css({
                        'top': top + 'px',
                        'left': left + 'px'
                    });
                    break;
                case 2:
                    players[0].element.css({
                        'top': top + (rotated ? 0 : 25) + 'px',
                        'left': left + (rotated ? 25 : 0) + 'px'
                    });
                    players[1].element.css({
                        'top': top + (rotated ? 0 : -25) + 'px',
                        'left': left + (rotated ? -25 : 0) + 'px'
                    });
                    break;
                case 3:
                    players[0].element.css({
                        'top': top + 25 + 'px',
                        'left': left + 25 + 'px'
                    });
                    players[1].element.css({
                        'top': top + 25 + 'px',
                        'left': left + -25 + 'px'
                    });
                    players[2].element.css({
                        'top': top + -25 + 'px',
                        'left': left + 25 + 'px'
                    });
                    break;
                case 4:
                    players[0].element.css({
                        'top': top + 25 + 'px',
                        'left': left + 25 + 'px'
                    });
                    players[1].element.css({
                        'top': top + 25 + 'px',
                        'left': left + -25 + 'px'
                    });
                    players[2].element.css({
                        'top': top + -25 + 'px',
                        'left': left + 25 + 'px'
                    });
                    players[3].element.css({
                        'top': top + -25 + 'px',
                        'left': left + -25 + 'px'
                    });
                    break;
            }
        }
    }

}
