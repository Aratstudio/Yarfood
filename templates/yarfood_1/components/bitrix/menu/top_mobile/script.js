var jshover = function()
{
	var menuDiv = document.getElementById("horizontal-multilevel-menu")
	if (!menuDiv)
		return;

	var sfEls = menuDiv.getElementsByTagName("li");
	for (var i=0; i<sfEls.length; i++) 
	{
		sfEls[i].onmouseover=function()
		{
			this.className+=" jshover";
		}
		sfEls[i].onmouseout=function() 
		{
			this.className=this.className.replace(new RegExp(" jshover\\b"), "");
		}
	}
}

if (window.attachEvent) 
	window.attachEvent("onload", jshover);

$(document).ready(function(){

	$('body').on('click', '.menu-item-has-children.closed', function(){
		$(this).removeClass('closed').addClass('opened');
	});

	$('body').on('click', '.menu-item-has-children.opened', function(){
		$(this).removeClass('opened').addClass('closed');
	});

});