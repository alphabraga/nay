$(document).ready(function()
{

	$('button.input-info').on('click', function(e)
	{
		e.preventDefault();

		bootbox.alert($(this).data('text'));

	});


	$('a#info-modal').on('click', function(e)
	{
		e.preventDefault();

		info_text = $('div#info-text').html();

		bootbox.alert(info_text);
	});

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