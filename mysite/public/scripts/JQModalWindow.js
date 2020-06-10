$(document).ready(function($) {

	$('#reset').click(function() {
        var modalWindow = $('#modalWindow');
        modalWindow.fadeIn();
        // modalWindow.parent().attr({
        //     style: 'filter: blur(2px)'});
        // modalWindow.attr({
        //     style: 'filter: blur(0px)'});
        return false;
    });
         
    $('#no').click(function() {
        $('#modalWindow').fadeOut();
		return false;
    });

    $('#yes').click(function() {
        // console.log($('#contact')[0]);
        // $('#contact')[0].reset();
        // document.getElementById('contact').reset();
        $(':input','#contact').not(':button, :submit, :reset').val('')
            .removeAttr('checked')
            .removeAttr('selected');
        
        $('#modalWindow').fadeOut();
        // checkSubmit();
        return false;
    });

    $('#modalWindow').click(function(e) {
		if ($(e.target).closest('#modalDiv').length == 0) {
			$(this).fadeOut();					
		}
	});
})