var valmail = false;
var valmail1 = false;
var exis = false;
var valNom = false;
var Passch = false;

function validaMail(m) {

	filtro = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
	caixa_email = document.getElementById('txtemail');
	if (m.value == "") return true;
	if (filtro.test(m.value)) {
		caixa_email.style.display = 'none';

		if (window.XMLHttpRequest) {
			xmlhttp = new XMLHttpRequest();
		} else {
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange = function () {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById('txtemail').style.display = "block";
				document.getElementById('txtemail').innerHTML = xmlhttp.responseText;
				valmail1 = true;
			}
			else {
				valmail1 = false;
			}
		}
		xmlhttp.open("GET", "files/AJAX/existeEmail.php?m=" + m.value, true);
		xmlhttp.send();
		valmail = true;

	} else {
		caixa_email.innerHTML = "Formato de E-mail inválido";
		caixa_email.style.display = 'block';
		valmail = false;
	}
}

//login com ajax
function existe(e) {
	if (e.value.length == 0) {
		document.getElementById("txtlogin").innerHTML = ""; document.getElementById("txtlogin").style.display = "none"; return;
	}
	if (window.XMLHttpRequest) {
		xmlhttp = new XMLHttpRequest();
	} else {
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function () {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById("txtlogin").style.display = "block";
			document.getElementById("txtlogin").innerHTML = xmlhttp.responseText;
			exis = true;
		}
		else { exis = false; }

	}
	xmlhttp.open("GET", "files/AJAX/existeLoginReg.php?q=" + e.value, true);
	xmlhttp.send();
}

function validaNom(n) {
	filtro = /^[a-zA-Z]+ [a-zA-Z]+$/;
	caixa_nome = document.querySelector('.msg-nome');
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

function PasswordMatch(p) {
	caixa_pass = document.querySelector('.msg-pass');
	caixa_cpass = document.querySelector('.msg-cpass');
	var password = $("#pass").val();
	var confirmPassword = $("#confirm_password").val();

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

function valida() {
	var flag = false;
	caixa_reg = document.querySelector('.msg-registo');

	if (valmail) {
		flag = true;
		if (valmail1) {
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
	} else { flag = false; }

	if (flag == false)
		caixa_reg.innerHTML = "Erro no registo por favor verifique se todos os campos estão preenchidos corretamente";

	else
		caixa_pass.style.display = 'none';
	return flag;
}