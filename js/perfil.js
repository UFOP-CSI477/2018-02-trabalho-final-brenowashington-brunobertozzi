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



});

function denunciar(cod_sussurro){
	console.log($(cod_sussurro).val());
}