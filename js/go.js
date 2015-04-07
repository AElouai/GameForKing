$( document ).ready(function() {
    $(".play-btn").height($("#tile1").width());
    $(".tile").height($("#tile1").width());
    $(".carousel").height($("#tile1").width());
    $(".item").height($("#tile1").width());

    $(window).resize(function() {
    if(this.resizeTO) clearTimeout(this.resizeTO);
	this.resizeTO = setTimeout(function() {
		$(this).trigger('resizeEnd');
	}, 10);
    });

    $(window).bind('resizeEnd', function() {
    	$(".play-btn").height($("#tile1").width());
    	$(".tile").height($("#tile1").width());
        $(".carousel").height($("#tile1").width());
        $(".item").height($("#tile1").width());
    });

    //generating random color for each tile
    //and initializing one little var that we'll need later on
    $('.tile').each(function(){
        //generating and setting random color, not that random tho.. there are not that much of cool colors
        var thisTile = $(this);
        var colors = ['00ACEE','C0C0C0','47C1E4','D77F3C','AF1A3F','3E9DD7','4E1616','D14625','005DE9'];
        var randValue = Math.floor(Math.random() * colors.length);
        thisTile.css('background-color',colors[randValue]);
        //okey, now our lil var, :( that's too cheap of me..but it does it just fine
        this.isAnimated = true;
    });

    $('.tile').click(function(){
        var thisTile=$(this);
        if(this.isAnimated) {
            thisTile.addClass('tile-selected');
            thisTile.children('.carousel').carousel(1);
            thisTile.children('.carousel').carousel('pause');
        }
        else{
            thisTile.removeClass('tile-selected');
            thisTile.children('.carousel').carousel(0);
            thisTile.children('.carousel').carousel('cycle');
        }
        this.isAnimated = !this.isAnimated;
    });
});
