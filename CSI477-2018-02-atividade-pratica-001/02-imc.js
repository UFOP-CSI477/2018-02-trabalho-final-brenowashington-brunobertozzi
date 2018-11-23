function verificarNum(e){
	var tecla=(window.event)?event.keyCode:e.which;
	if((tecla > 47 && tecla < 58)){
		return true;
	}
	else{
		if (tecla != 8 && tecla != 44){
			return false;
		}
		else{
			return true;
		}
	}
}

function verificarCampoNum(campo){
	if(isNaN(document.getElementById(campo).value) || document.getElementById(campo).value.length == 0){
		return false;
	}
	else{
		return true;
	}
}

function calcular(){
	var retorno = false;
	document.getElementById("peso").value = document.getElementById("peso").value.replace(",",".");
	document.getElementById("altura").value = document.getElementById("altura").value.replace(",",".");
	if (!verificarCampoNum("peso")) {
		document.getElementById("alerta1").style.display = "block";
		document.getElementById("peso").classList.add("is-invalid");
		retorno = true;
	}
	else{
		document.getElementById("peso").classList.add("is-valid");
	}
	if (!verificarCampoNum("altura")) {
		document.getElementById("alerta1").style.display = "block";
		document.getElementById("altura").classList.add("is-invalid");
		retorno = true;
	}
	else{
		document.getElementById("altura").classList.add("is-valid");
	}
	if(retorno){
		return;
	}
	else{
		document.getElementById("div-campos").style.display = "none";
		document.getElementById("div-resultados").style.display = "flex";
		var peso = parseFloat(document.getElementById("peso").value);
		var altura = parseFloat(document.getElementById("altura").value);
		var imc = peso/Math.pow(altura, 2);
		var pesoideal1 = 18.6*Math.pow(altura, 2);
		var pesoideal2 = 24.9*Math.pow(altura, 2);
		var valor = document.createTextNode("O seu IMC é de " + imc.toFixed(1));
		document.getElementById("valor-imc").appendChild(valor);
		var cor = document.createAttribute("style");
		var att = document.createAttribute("src");
		if (imc < 18.5) {
			var texto = document.createTextNode("Isso pode ser apenas uma característica pessoal, mas pode, também, ser sinal de desnutrição.");
			document.getElementById("valor-imc").style.color = "#0081C3";
			att.value = "abaixo-do-peso.png";
		}else if (imc < 24.9) {
			var texto = document.createTextNode("Parabéns, você está com peso normal, mas é importante que você mantenha hábitos saudáveis de vida para que continue assim.");
			document.getElementById("valor-imc").style.color = "#A8D383"
			att.value = "peso-normal.png";
		}else if (imc < 29.9) {
			var texto = document.createTextNode("Atenção! Você está com sobrepeso. Embora ainda não seja obeso, algumas pessoas já podem apresentar doenças associadas, como diabetes e hipertensão nessa faixa de IMC. Reveja e melhore seus hábitos!");
			document.getElementById("valor-imc").style.color = "#FCCB26";
			att.value = "sobrepeso.png";
		}else if (imc < 34.9){
			var texto = document.createTextNode("Sinal de alerta! Chegou na hora de se cuidar, mesmo que seus exames sejam normais. Vamos dar início a mudanças hoje! Cuide de sua alimentação. Você precisa iniciar um acompanhamento com nutricionista e/ou endocrinologista.");
			document.getElementById("valor-imc").style.color = "#B05380";
			att.value = "obesidade-grau-1.png";
		}else if (imc < 39.9){
			var texto = document.createTextNode("Sinal vermelho! Nessas faixas de IMC o risco de doenças associadas está entre grave e muito grave. Não perca tempo! Busque ajuda profissional já!");
			document.getElementById("valor-imc").style.color = "#C12026";
			att.value = "obesidade-grau-2.png";
		}else{
			var texto = document.createTextNode("Sinal vermelho! Nessas faixas de IMC o risco de doenças associadas está entre grave e muito grave. Não perca tempo! Busque ajuda profissional já!");
			document.getElementById("valor-imc").style.color = "#C12026";
			att.value = "obesidade-grau-3.png";
		}
		document.getElementById("valor-imc").appendChild(valor);
		document.getElementById("imagem-imc").setAttributeNode(att);
		document.getElementById("texto-imc").appendChild(texto);
		var texto = document.createTextNode("O seu peso ideal varia na faixa entre " + pesoideal1.toFixed(2) + "Kg e " + pesoideal2.toFixed(2) + "Kg.");
		document.getElementById("faixa-imc").appendChild(texto);
	}
}