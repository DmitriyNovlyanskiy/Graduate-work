$(document).ready(function() {
	$('.detals').click(function() {
		let a = $(this).attr('id');
		$('#modal' + a).modal('show');
		$('#tabs' + a).tabs();
		$('#close' + a).click(function() {
			$('#modal' + a).modal('hide');
		})
	})
	$('#sort').click(function() {
		$('#modal').modal('show');
	})
	$('#close').click(function() {
		$('#modal').modal('hide');
	})
	$('#filter1').change(function() {
		$('#gender').slideToggle(300);
		return false;
	})
	$('#filter2').change(function() {
		$('#groop').slideToggle(300);
		return false;
	})
	$('#filter3').change(function() {
		$('#social_groop').slideToggle(300);
		return false;
	})
})