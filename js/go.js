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
});
