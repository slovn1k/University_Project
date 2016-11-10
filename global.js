$('input#titlu-submit').on('click', function(){
	var titlu=$('input#titlu').val();
	if($.trim(titlu) !=''){
		$.post('name.php', {titlu: titlu}, function(data){
			$('div#titlu-data').text(data);
	});
	}
});