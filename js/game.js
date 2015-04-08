var GameOn = function(obj){//TODO remove all console.log (when done) beause it causes problems for IE
    var subjects = obj.subjects;
    var delay = obj.delay || 1000;//defaults at 1s
    return {
        init:function(){//the function that will be called from the outside
            this.heartBeat();
            this.startSearch();
        },
        startSearch:function(){
            $.ajax({
                url:'/gameMaker/queue',
                type: 'POST',
                data:{subjects:subjects}
            }).done(function(data){
                console.log(data);
                if(data == 'success'){
                    $('#game').html($('<img>',{src:"/img/spiffy.gif",'class':"spinner"}));
                    console.log(data);
                }
                else{
                    //window.location.replace('/go');
                }
            });
        },
        checkStatus:function(){
            $.ajax({
                url:'/gameMaker/status'
            }).done(function(data){
                console.log(data);
                return data;
            });
        },
        heartBeat:function(){
            //this.checkStatus();//hell i don't know why this is not working
            //executes every @delay
            //setInterval(this.heartBeat,delay);
            //console.log('hear G4K\'s beating heart');
        }
    };
};