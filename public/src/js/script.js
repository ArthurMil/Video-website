var postId = 0;
var postBodyElement = null;

$('.like').on('click', function(event) {
	event.preventDefault();
	postId = event.target.parentNode.parentNode.dataset['postid'];
	var isLike = event.target.previousElementSibling == null;
	$.ajax({
		method: 'POST',
		url: urlLike,
		data: {isLike: isLike, postId: postId, _token: token}
	})
		.done(function(){
			event.target.innerText = isLike ? event.target.innerText == 'Like' ? 'You like this post' : 'Like' : event.target.innerText == 'Dislike' ? 'You dislike this post' : 'Dislike';
			if(isLike) {
				event.target.nextElementSibling.innerText = 'Dislike';
			}
			else {
				event.target.previousElementSibling.innerText = 'Like';
			}
		});
});



$('.edit').click(function(event){
	event.preventDefault();

	postBodyElement = event.target.parentNode.parentNode.childNodes[3];
	var postBody = postBodyElement.textContent;
	postId = event.target.parentNode.parentNode.dataset['postid'];
	$('#post-body').val(postBody);
	$('#edit-modal').modal('show');
});

$('#modal-save').on('click', function(){
	$.ajax({
		method: 'POST',
		url: urlEdit,
		data: {body: $('#post-body').val(), postId:postId, _token: token}
	})
		.done(function(msg){
			$(postBodyElement).text(msg['new_body']);
			$('#edit-modal').modal('hide');
		});
});

$(function() {

		$('#alertMe').on('click', function(e) {
		e.preventDefault();

		$('#successAlert').slideDown();

		$('#shutAlert').on('click', function(e) {
			e.preventDefault();
			$("#successAlert").hide();
		});
	});
	
	$('a.pop').click(function(e) {
		e.preventDefault();
		
	});
	$('a.pop').popover();
	
	$('[rel="tooltip"]').tooltip();
});
$(document).ready(function() {
	$(".dropdown-toggle").dropdown();
});

$(document).ready(function () {
	$("#subbot").submit(function () {
		$(".btn-primary").attr("disabled", true);
		return true;
	});
});