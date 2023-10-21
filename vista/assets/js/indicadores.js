
function agregarItem(idElementoOrigen, idElementoDestino){
	var option = document.createElement("option");
	option.text = document.getElementById(idElementoOrigen).value;
	document.getElementById(idElementoDestino).add(option);
	//removerItem(idElementoOrigen);
	selectTodos(idElementoDestino);
}

function removerItem(IDelemento){
	var comboBox = document.getElementById(IDelemento);
    comboBox = comboBox.options[comboBox.selectedIndex];
    comboBox.remove();
	selectTodos(IDelemento);
  }

function selectTodos(IDelemento) {
    var elementos = document.getElementById(IDelemento);
    elementos = elementos.options;
    for (var i = 0; i < elementos.length; i++) {
        elementos[i].selected = "true";
    }
}