$(document).ready(function(){

	$("#ativar-publicacao").on('click',function(){
		$("#publicar-foto").hide();
		$("#publicar-msg").show();
	})

	$("#ativar-foto").on('click',function(){
		$("#publicar-foto").show();
		$("#publicar-msg").hide();
	})

	$("#publicar-msg").on('submit',function(){
		if(!$("#texto-post").val()){
			$("#texto-post").addClass("is-invalid");
			return false;
		}
	})

	$("#publicar-foto").on('submit',function(){
		if(!$("#texto-foto").val()){
			$("#texto-foto").addClass("is-invalid");
			return false;
		}
	})

	$("#pesquisar").on('submit',function(){
		if(!$("#campo_pesquisa").val()){
			$("#campo_pesquisa").addClass("is-invalid");
			return false;
		}
	})



});

function denunciar(cod_sussurro){
	console.log($(cod_sussurro).val());
}

function sussurrar(cod_texto,id){
	if (!$(cod_texto).val()){
		$(cod_texto).addClass("is-invalid");
		return false;
	}
	if (!$(id).val()) {
		$(cod_texto).addClass("is-invalid");
		return false;
	}

	/*$.ajax({
		type: 'post',
		url: 'sussurrar_post.php',
		data:{
			texto: $(cod_texto).val(),
			id_post: $(id).val()
		},
		cache:false,
		contentType:false,
		processData:false,
		error: function(){
			window.alert("O sussuro não pode ser enviado");
		},
		success: function(){
			window.alert("Sussurro enviado!");
		}
	});*/
}