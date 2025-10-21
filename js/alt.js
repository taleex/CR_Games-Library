var valmail = false;
var exis = false;
var valNom = false;
var Passch = false;


function altvalidaMail(m) {

	filtro = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
	caixa_email = document.querySelector('.altmsg-email');
	if (m.value == "") return true;
	if (filtro.test(m.value)) {
		caixa_email.style.display = 'none';
		valmail = true;
	} else {
		caixa_email.innerHTML = "Formato de E-mail inválido";
		caixa_email.style.display = 'block';
		valmail = false;
	}

}

//login com ajax
function altexiste(e, c) {
	if (e.value.length == 0) {
		document.getElementById("altxtlogin").innerHTML = ""; document.getElementById("altxtlogin").style.display = "none"; exis = true; return;
	}
	if (window.XMLHttpRequest) {
		xmlhttp = new XMLHttpRequest();
	} else {
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function () {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById("altxtlogin").style.display = "block";
			document.getElementById("altxtlogin").innerHTML = xmlhttp.responseText;
			exis = true;
		}
		else { exis = false; }

	}
	xmlhttp.open("GET", "files/AJAX/existe.php?q=" + e.value + "&c=" + c, true);
	xmlhttp.send();
}


function altvalidaNom(n) {
	filtro = /^[a-zA-Z]+ [a-zA-Z]+$/;
	caixa_nome = document.querySelector('.altmsg-nome');
	if (n.value == "") { valNom = true; return true; }
	if (filtro.test(n.value)) {
		caixa_nome.style.display = 'none';
		valNom = true;
	} else {
		caixa_nome.innerHTML = "Formato de Nome inválido";
		caixa_nome.style.display = 'block';
		valNom = false;
	}
}

function altPasswordMatch(p) {
	caixa_pass = document.querySelector('.altmsg-pass');
	caixa_cpass = document.querySelector('.altmsg-cpass');
	var password = $("#altpass").val();
	var confirmPassword = $("#altconfirm_password").val();

	if (p.value == "") return true;
	if (password != confirmPassword) {
		caixa_pass.innerHTML = "Passwords não coincidem";
		caixa_cpass.innerHTML = "Passwords não coincidem";
		caixa_cpass.style.display = 'block';
		caixa_pass.style.display = 'block';
		Passch = false;
	}
	else {
		caixa_pass.style.display = 'none';
		caixa_cpass.style.display = 'none';
		Passch = true;
	}
}

function altvalida() {
	var flag = false;
	caixa_reg = document.querySelector('.altmsg-registo');

	if (valmail) {
		flag = true;
		if (exis) {
			flag = true;
			if (valNom) {
				flag = true;
				if (Passch) {
					flag = true;
					flag = true;
				} else { flag = false; }
			} else { flag = false; }
		} else { flag = false; }

	} else { flag = false; }

	if (flag == false)
		caixa_reg.innerHTML = "Erro no registo por favor verifique se todos os campos estão preenchidos corretamente<br><br> caso apareça uma mensagem de erro e não exista erros por favor clique em cada uma das caixas de texto e volte a clicar alterar";

	else
		caixa_pass.style.display = 'none';
	return flag;
}