
//FORM SUGESTÃO
var exis = false;
var valNom = false;


//login com ajax
function existeSug(e) {
	if (e.value.length == 0) {
		document.getElementById("txtSug").innerHTML = ""; document.getElementById("txtSug").style.display = "none"; return;
	}
	if (window.XMLHttpRequest) {
		xmlhttp = new XMLHttpRequest();
	} else {
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function () {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById("txtSug").style.display = "block";
			document.getElementById("txtSug").innerHTML = xmlhttp.responseText;
			exis = true;
		}
		else { exis = false; }

	}
	xmlhttp.open("GET", "files/AJAX/existeSug.php?q=" + e.value, true);
	xmlhttp.send();
}


function validPR(n) {
	filtro = /^[\w ]+$/;
	caixa_nome = document.querySelector('.msg-pr');
	if (n.value == "") return true;
	if (filtro.test(n.value)) {
		caixa_nome.style.display = 'none';
		valNom = true;
	} else {
		caixa_nome.innerHTML = "Formato de Nome inválido";
		caixa_nome.style.display = 'block';
		valNom = false;
	}
}

function validaSUG() {
	var flag = false;
	caixa_reg = document.querySelector('.msg-sug');

	if (exis) {flag = true;
		if (valNom) {flag = true;
		} else { flag = false;}

	} else { flag = false; }
	
	if(flag==false)
		caixa_reg.innerHTML = "Campos inválidos";
	
	else
		caixa_pass.style.display = 'none';
	return flag;
}