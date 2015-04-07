var GameOn = function(obj){
    var subjects = obj.subjects;
    var delay = obj.delay || 1000;//defaults at 1s
    return {
        init:function(){
            this.heartBeat();
        },
        startSearch:function(){
            $.ajax({
                url:'/'
            }).done(function(){
                console.log('search start sent to server');
            });
        },heartBeat:function(){

            //executes every @delay
            setInterval(this.heartBeat,delay);
            console.log('hear G4K\'s beating heart');
        }
    };
};