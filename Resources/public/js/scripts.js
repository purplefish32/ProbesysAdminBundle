$(function() {

	$('th a.asc').parent().addClass('sorted');
	$('th a.desc').parent().addClass('sorted');

	$('.well .close').click(function(e) {
		e.preventDefault();
		$(this).parent().hide();
	});

	$('.show-filters').click(function(e) {
		e.preventDefault();
		$('form.filters').show();
	});

	$("#list input.toggle").live("click", function() {
		return $("#list [name='bulk_ids[]']").attr("checked", $(this).is(":checked"));
	});

	$('.form-horizontal legend').live('click', function() {
		if ($(this).has('i.icon-chevron-down').length) {
			$(this).siblings('.control-group:visible').hide('slow');
			return $(this).children('i').toggleClass('icon-chevron-down icon-chevron-right');
		} else {
			if ($(this).has('i.icon-chevron-right').length) {
				$(this).siblings('.control-group:hidden').show('slow');
				return $(this).children('i').toggleClass('icon-chevron-down icon-chevron-right');
			}
		}
	});

});
