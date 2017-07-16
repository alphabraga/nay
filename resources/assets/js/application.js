$(document).ready(function()
{
	$.getJSON('/system', function(data)
	{
		console.log(data);
	});



    $.getJSON('/configuration', function(data)
	{
      console.log(data);
	});  

});