/**
*  search form toggle
*/
jQuery(document).ready(function($) {
	var $searchForm = $('#searchform');
	$('#search-icon').toggle(function() {
		$searchForm.stop(true, true).slideDown('fast', function() {$searchForm.focus()});
	}, function() {
		$searchForm.stop(true, true).slideUp();
	});
});