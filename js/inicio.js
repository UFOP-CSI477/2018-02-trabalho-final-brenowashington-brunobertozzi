$(document).ready(function(){

	$("#login").on('submit',function(){
		var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		if(!filter.test($("#emaillogin").val())){
			$("#emaillogin").addClass("is-invalid");
			window.alert("Digite um e-mail válido!");
			return false;
		}
		if(!$("#senhalogin").val() || $("#senhalogin").val().length<6){
			$("#senhalogin").addClass("is-invalid");
			window.alert("Digite uma senha válida!");
			return false;
		}
	})

	$("#cadastrar").on('submit',function(){
		var valido = true;
		if(!$("#nome").val()){
			window.alert("Digite um nome válido!");
			$("#nome").addClass("is-invalid");
			valido = false;
		}
		else{
			$("#nome").addClass("is-valid");
		}
		if(!$("#senhacadastro").val() || $("#senhacadastro").val().length<6){
			window.alert("Digite uma senha válida!");
			$("#senhacadastro").addClass("is-invalid");
			valido = false;
		}
		else{
			$("#senhacadastro").addClass("is-valid");
		}

		if(!$("#datanasc").val()){
			window.alert("Digite uma data!");
			$("#senhacadastro").addClass("is-invalid");
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
	   	$("#senhacadastro").addClass("is-invalid");
	   	valido = false;
	   }
	   var m = hoje.getMonth() - nasc.getMonth();
	   if (m < 0 || (m === 0 && hoje.getDate() < nasc.getDate())) idade--;
	   
	   if(idade<18){
	   	window.alert("Pessoas menores de 18 não podem se cadastrar.");
	   	$("#senhacadastro").addClass("is-invalid");
	   	valido = false;
	   }
	   if (idade>120){
	   	window.alert("Digite uma idade válida");
	   	$("#senhacadastro").addClass("is-invalid");
	   	valido = false;
	   }

	   var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		if(!filter.test($("#emailcadastro").val())){
			$("#emailcadastro").addClass("is-invalid");
			window.alert("Digite um e-mail válido!");
			valido = false;
		}
		else{
			$("#emailcadastro").addClass("is-valid");
		}
		return valido;
	})

});