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

    $('.tile').click(function(){
      alert('i am clicked');
      $(this).addClass('tile-selected');//just for now it only changes color,next up it should show checked mark
    });
    //generating random color for each tile
    $('.tile').each(function(){
        var tile = $(this);
        var colors = ['00ACEE','C0C0C0','47C1E4','D77F3C','AF1A3F','3E9DD7','4E1616','D14625','008E00','005DE9'];
        var randValue = Math.floor(Math.random() * colors.length);
        tile.css('background-color',colors[randValue]);
    });
});
