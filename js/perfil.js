$(document).ready(function(){

	$("#ativar-publicacao").on('click',function(){
		$("#publicar-foto").hide();
		$("#publicar-msg").show();
	})

	$("#ativar-foto").on('click',function(){
		$("#publicar-foto").show();
		$("#publicar-msg").hide();
	})

	$("#publicar-sussurro").on('submit',function(){
		if(!$("#texto_sussurro").val()){
			$("#texto_sussurro").addClass("is-invalid");
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

	$("#editar").on('submit',function(){
		var valido = true;
		if(!$("#nome").val()){
			$("#nome").addClass("is-invalid");
			valido = false;
		}
		else{
			$("#nome").addClass("is-valid");
		}
		if(!$("#senha_antiga").val() || $("#senha_antiga").val().length<6){
			$("#senha_antiga").addClass("is-invalid");
			valido = false;
		}
		else{
			$("#senha_antiga").addClass("is-valid");
		}

		if(!$("#datanasc").val()){
			$("#datanasc").addClass("is-invalid");
			valido = false;
		}
		var data = $("#datanasc").val();
		data = data.replace(/\//g, "-"); // substitui eventuais barras (ex. IE) "/" por hífen "-"
	   var data_array = data.split("-"); // quebra a data em array
	   
	   // para o IE onde será inserido no formato dd/MM/yyyy
	   if(data_array[0].length != 4){
	      data = data_array[2]+"-"+data_array[1]+"-"+data_array[0]; // remonto a data no formato yyyy/MM/dd
	  }

	   // comparo as datas e calculo a idade
	   var hoje = new Date();
	   var nasc  = new Date(data);
	   var idade = hoje.getFullYear() - nasc.getFullYear();

	   if(nasc.getFullYear() > hoje.getFullYear()){
	   	window.alert("Digite um ano válido!");
	   	$("#datanasc").addClass("is-invalid");
	   	valido = false;
	   }
	   var m = hoje.getMonth() - nasc.getMonth();
	   if (m < 0 || (m === 0 && hoje.getDate() < nasc.getDate())) idade--;
	   
	   if(idade<18){
	   	window.alert("Pessoas menores de 18 não podem se cadastrar.");
	   	$("#datanasc").addClass("is-invalid");
	   	valido = false;
	   }
	   if (idade>120){
	   	window.alert("Digite uma idade válida");
	   	$("#datanasc").addClass("is-invalid");
	   	valido = false;
	   }

	   var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	   if(!filter.test($("#email").val())){
	   	$("#email").addClass("is-invalid");
	   	valido = false;
	   }
	   else{
	   	$("#email").addClass("is-valid");
	   }

	   if($("#senha_nova").val() && $("#senha_nova").val().length<6){
	   	$("#senha_nova").addClass("is-invalid");
	   	valido = false;
	   }
	   else{
	   	$("#senha_antiga").addClass("is-valid");
	   }
	   return valido;
	})

	$("#excluir_user").on("submit",function(){
		if( confirm('Tem certeza que deseja excluir sua conta?') )
			return true;
		else {
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

	$.ajax({
		type: 'POST',
		url:'sussurrar_post.php',
		data:{
			texto: $(cod_texto).val(),
			id_post: $(id).val()
		},
		dataType: "html",
		error: function(){
			$(cod_texto).addClass("is-invalid");
		},
		success: function(){

			$(cod_texto).removeClass("is-invalid");
			$("#espaco_comentarios"+$(id).val()).append('<div class="fundo-comentario"><div class="comentario"><img src="../imagens_gerais/Sigilo.png"><p>'+$(cod_texto).val()+'</p></div><div class="informacoes-comentario"><p>06/11/2018 às 16:15</p></div></div></div>');
			$(cod_texto).val(null);
		}
	});
}

function selecionar_imagem(foto){
	if ($("#foto_selecionada").val()!=-1) {
		$("#foto_"+$("#foto_selecionada").val()).removeClass("selecionada");
	}
	$("#foto_"+foto).addClass("selecionada");
	$("#foto_selecionada").val(foto);
}