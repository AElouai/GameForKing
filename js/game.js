var GameOn = function(obj){//TODO remove all console.log (when done) beause it causes problems for IE
    var subjects = obj.subjects;
    var delay = obj.delay || 1000;//defaults at 1s
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
                case 'opponentFound':
                    console.log('opponent found..');
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