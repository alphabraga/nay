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

    $('.select2-tags').select2({
		
		tags: true,
  		tokenSeparators: [',']
	});
});