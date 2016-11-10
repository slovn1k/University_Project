$(document).ready(function(){

	
	/* Nu permitem introducerea spamului: */
	var working = false;
	
	
	$('#addCommentForm').submit(function(e){

 		e.preventDefault();
		if(working) return false;
		
		working = true;
		$('#submit').val('Ocupat...');
		$('span.error').remove();
		
		/* Transmitem datele in submit.php: */
		$.post('submit.php',$(this).serialize(),function(msg){

			working = false;
			$('#submit').val('Transmite');
			
			if(msg.status){


				$(msg.html).hide().insertBefore('#addCommentContainer').slideDown();
				$('#body').val('');
			}
			else {

				
				
				$.each(msg.errors,function(k,v){
					$('label[for='+k+']').append('<span class="error">'+v+'</span>');
				});
			}
		},'json');

	});
	
});