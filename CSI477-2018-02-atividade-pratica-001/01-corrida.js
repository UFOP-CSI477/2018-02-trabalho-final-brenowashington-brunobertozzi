function alteraNumParticipantes(){
	var numPart = document.getElementById("select-num-part").value;
	if (numPart > 0){
		var participante;
		for (var i = 1; i <= 6; i++) {
			participante = ("linha-" + i);
			if(i <= numPart){
				document.getElementById(participante).style.display = "table-row";
			}
			else{
				document.getElementById(participante).style.display = "none";
			}
		}
		document.getElementById("botao-exibir").style.display = "block"
	}
	else{
		for (var i = 1; i <= 6; i++) {
			participante = ("linha-" + i);
			document.getElementById(participante).style.display = "none";
		}
	}
}

function verificarTempoNum(e){
	var tecla=(window.event)?event.keyCode:e.which;
	if((tecla > 47 && tecla < 58)){
		return true;
	}
	else{
		if (tecla != 8){
			return false;
		}
		else{
			return true;
		}
	}
}

function verificarCampo(campo){
	if(document.getElementById(campo).value.length == 0){
		return false;
	}
	else{
		return true;
	}
}

function verificarCampoNum(campo){
	if(isNaN(document.getElementById(campo).value)){
		return false;
	}
	else{
		return true;
	}
}

function criarTabela(conteudo) {
  var tabela = document.createElement("table");
  var thead = document.createElement("thead");
  var tbody=document.createElement("tbody");
  var thd=function(i){return (i==0)?"th":"td";};
  for (var i=0;i<conteudo.length;i++) {
    var tr = document.createElement("tr");
    for(var o=0;o<conteudo[i].length;o++){
      var t = document.createElement(thd(i));
      var texto=document.createTextNode(conteudo[i][o]);
      t.appendChild(texto);
      tr.appendChild(t);
    }
    (i==0)?thead.appendChild(tr):tbody.appendChild(tr);
  }
  tabela.appendChild(thead);
  tabela.appendChild(tbody);
  return tabela;
}



function exibirVencedores(){
	var i;
	var condicao = true;
	var participantes = [];
	for (i = 1; i <= document.getElementById("select-num-part").value; i++) {
		var campo = ("part-" + i +"-nome");
		var participante = new Object();
		if(verificarCampo(campo)){
			document.getElementById(campo).classList.add("is-valid");
			participante.nome = document.getElementById(campo).value;
		}
		else{
			condicao = false;
			document.getElementById(campo).classList.add("is-invalid");
		}
		campo = ("part-" + i +"-tempo");
		if(verificarCampo(campo) && verificarCampoNum(campo)){
			participante.tempo = parseInt(document.getElementById(campo).value);
			document.getElementById(campo).classList.add("is-valid");
		}
		else{
			condicao = false;
			document.getElementById(campo).classList.add("is-invalid");
		}
		participante.largada = i;
		participantes.push(participante);
	}
	if(!condicao){
		document.getElementById("alerta1").style.display = "block";
		return;
	}
	else{
		document.getElementById("alerta1").style.display = "none";
		document.getElementById("Container-tabela").style.display = "block";
		document.getElementById("Formulario").style.display = "none";
		document.getElementById("botao-voltar").style.display = "block";
	}
	participantes.sort(function(a,b){
		return (a.tempo > b.tempo) ? 1 : ((b.tempo > a.tempo) ? -1 : 0);
	});
	var part = [];
	var vencedores = [];
	part.push("Posição");
	part.push("Largada");
	part.push("Nome");
	part.push("Tempo");
	part.push("Resultado");
	vencedores.push(part);
	var posicao = "1";
	for (i = 0; i < document.getElementById("select-num-part").value; i++) {
		var part = [];
		if(i > 0 && participantes[i-1].tempo != participantes[i].tempo){
			posicao++;
		}
		part.push(posicao);
		part.push(participantes[i].largada);
		part.push(participantes[i].nome);
		part.push(participantes[i].tempo);
		if(posicao == 1){
			part.push("Vencedor(a)");
		}
		else{
			part.push("-");
		}
		vencedores.push(part);
	}
	document.getElementById("tabela-resultados").appendChild(criarTabela(vencedores));

	var tabela = document.getElementById("tabela-resultados").getElementsByTagName("table")[0];
	var att = document.createAttribute("class");
	att.value = "table table-borderless";
	tabela.setAttributeNode(att);

	var att = document.createAttribute("id");
	att.value = "tabela-res";
	tabela.setAttributeNode(att);

	tabela = document.getElementById("tabela-resultados").getElementsByTagName("thead")[0];
	att = document.createAttribute("class");
	att.value = "thead-dark";
	tabela.setAttributeNode(att);
}	

function recomecar(){
	for (var i = 1; i <= 6; i++) {
		var campo = ("part-" + i +"-nome");
		document.getElementById(campo).value = "";
		if(i <= document.getElementById("select-num-part").value){
			document.getElementById(campo).classList.remove("is-valid");
		}
		campo = ("part-" + i +"-tempo");
		document.getElementById(campo).value = "";
		if(i <= document.getElementById("select-num-part").value){
			document.getElementById(campo).classList.remove("is-valid");
		}
	}
	document.getElementById("Container-tabela").style.display = "none";
	document.getElementById("Formulario").style.display = "block";
	var remover = document.getElementById("tabela-resultados")
	while(remover.hasChildNodes()){
		remover.removeChild(remover.firstChild);
	}
	
}