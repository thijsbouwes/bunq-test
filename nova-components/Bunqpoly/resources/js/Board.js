class Board {
    init()
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

    setPlayerCard(id, propertyIndex)
    {
        this.players[id].propertyIndex = propertyIndex;
    }

    addPlayer(id, name, propertyIndex, color = 'blue')
    {
        this.players[id] = {
            name,
            propertyIndex,
            element: $('<div class="board__player-icon board__player-icon--' + color +'"><span>'+name+'</span></div>')
        };


        let $player = this.players[id].element;
        this.$board.append($player);

        this.updatePlayerLocations()
    }

    updatePayerLocation(id, thrown)
    {
        let player = this.players[id];

        let newCardIndex = player.propertyIndex + thrown;
        if(newCardIndex > 31)
        {
            player.propertyIndex = newCardIndex %  31;
        } else {
            player.propertyIndex = newCardIndex;
        }
    }


    updatePlayerLocations() {
        let playersOnCard = {};
        for(let key in this.players) {
            let player = this.players[key];
            if(player.propertyIndex in playersOnCard === false)
            {
                playersOnCard[player.propertyIndex] = [];
            }
            playersOnCard[player.propertyIndex].push(player);
        }

        for(let property in playersOnCard)
        {
            let $property = this.$board.find('.property[data-index=' + property + ']');
            let players = playersOnCard[property];

            console.log($property.length);
            let rotated = $property.hasClass('property--rotated');
            let left = ($property.offset().left - this.$board.offset().left) + ($property.width() / 2) - (this.playerWidth / 2) - 2;
            let top = ($property.offset().top - this.$board.offset().top) + ($property.height() / 2) - (this.playerWidth / 2) - 2;
            top += $property.hasClass('property--top') ? -20 : 0;
            left += $property.hasClass('property--rotated-left') ? -20 : 0;
            left += $property.hasClass('property--rotated-right') ? 20 : 0;


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

export default new Board();
