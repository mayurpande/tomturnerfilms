	$("#controls").addClass("js").before('<div id="menu">&#9776;</div>');
	$("#menu").click(function(){
		$("#controls").toggle();
	});
	$(window).resize(function(){
		if(window.innerWidth > 800) {
			$("#controls").removeAttr("style");
		}
	});