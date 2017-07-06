$(function(){
	
	$('form input[type=button]').click(function(){
		var index = $(this).index();
		
		if(index == 3){
			location.href = 'index.php';
		}else{
			
			if(index == 0)
				$('form').attr('action','?function=codificar');
			
			if(index == 1)
				$('form').attr('action','?function=decodificar');
			
			if(index == 2)
				$('form').attr('action','?function=auto');
			
			$('form').submit();
		}
	});
	
	$('form input[type=text]').keyup(function(){
		var valor = $(this).val();
		valor = valor.replace(/\D/g, "");
		$(this).val(valor);
	});
});