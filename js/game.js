var GameOn = function(obj){//TODO remove all console.log (when done) beause it causes problems for IE
    var subjects = obj.subjects;
    var delay = obj.delay || 1000;//defaults at 1s
    var game_status = 'SEARCH';
    var question = 0;
    this.init = function(){//the function that will be called from the outside
        this.startSearch();
        this.heartBeat();
    };
    this.startSearch = function(){
        $.ajax({
            url:'/gameMaker/queue',
            type: 'POST',
            data:{subjects:subjects}
        }).done(function(data){
            console.log(data);
            if(data == 'success'){
                $('#game').html($('<img>',{src:"/img/spiffy.gif",'class':"spinner"}));
            }
            else{
                window.location.replace('/go');
            }
        });
    };
    this.heartBeat = function(){
        $.ajax({
            url:'/gameMaker/status'
        }).done(function(status){
            switch(status) {
                case 'inGame':
                    switch(game_status){
                        case 'SEARCH'://default status,go to next status
                            game_status = 'FETCH_PI';
                            break;
                        case 'FETCH_PI'://fetch player2 info
                            //...
                            game_status = 'FETCH_QUESTION';
                            break;
                        case 'FETCH_QUESTION'://fetch question @question =)
                            question++;
                            $.ajax({
                                url:'/gameMaker/fetch/question/'+question
                            }).done(function(data){
                                $('#game').html('');
                            });
                            break;
                    }
                    console.log('in game');
                    break;
                case 'opponentFound':
                    break;
                case 'opponentNotFound':
                    console.log('still searching..');
                    break;
                default:
                    console.log(status);
                    break;
            }
        });
        //executes every @delay
        setInterval(this.heartBeat,delay);
    };
};