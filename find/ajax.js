function Ajax(){
	var xmlhttp=false;
	try {
		xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
	} catch (e) {
		try {
		   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		} catch (E) {
			xmlhttp = false;
  		}
	}
	if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
		xmlhttp = new XMLHttpRequest();
	}
	return xmlhttp;
}

function OrdenarPor(campo, orden, name, surname){
//    alert(name + surname);
	//especificamos en div donde se mostrara el resultado
	divFind = document.getElementById('find');
	ajax=Ajax();
	//especificamos el archivo que realizara el listado
	//y enviamos las dos variables: campo y orden
	ajax.open("GET", "find.php?campo="+campo+"&orden="+orden+"&name="+name+"&surname="+surname);
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			divFind.innerHTML = ajax.responseText
		}
	}
	ajax.send(null)
}