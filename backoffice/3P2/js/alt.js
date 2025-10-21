var altvalmail = false;
var altexis = false;
var altvalNom = false;
var altPassch = false;


function altvalidaMail(m) {

    var contErro = 0;
    filtro = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    caixa_email = document.querySelector('.msg-altemail');
    if (m.value == "") return true;
    if (filtro.test(m.value)) {
        caixa_email.style.display = 'none';
        altvalmail = true;
    } else {
        caixa_email.innerHTML = "Formato de E-mail inválido";
        caixa_email.style.display = 'block';
        altvalmail = false;
    }


}

//login com ajax
function altexiste(e) {
    if (e.value.length == 0) {
        document.getElementById("altxtlogin").innerHTML = ""; document.getElementById("altxtlogin").style.display = "none"; return;
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
            altexis = true;
        }
        else { altexis = false; }

    }
    xmlhttp.open("GET", "files/LOGINregi/existe.php?q=" + e.value, true);
    xmlhttp.send();
}


function altvalidaNom(n) {
    filtro = /^[a-zA-Z]+ [a-zA-Z]+$/;
    caixa_nome = document.querySelector('.msg-altutinome');
    if (n.value == "") return true;
    if (filtro.test(n.value)) {
        caixa_nome.style.display = 'none';
        altvalNom = true;
    } else {
        caixa_nome.innerHTML = "Formato de Nome inválido";
        caixa_nome.style.display = 'block';
        altvalNom = false;
    }
}

function altPasswordMatch(p) {
    caixa_pass = document.querySelector('.msg-altpass');
    caixa_cpass = document.querySelector('.msg-altcpass');
    var altpassword = $("#altpass").val();
    var altconfirmPassword = $("#altconfirm_password").val();

    if (p.value == "") return true;
    if (altpassword != altconfirmPassword) {
        caixa_pass.innerHTML = "Passwords não coincidem";
        caixa_cpass.innerHTML = "Passwords não coincidem";
        caixa_cpass.style.display = 'block';
        caixa_pass.style.display = 'block';
        altPassch = false;
    }
    else {
        caixa_pass.style.display = 'none';
        caixa_cpass.style.display = 'none';
        altPassch = true;
    }
}

function altvalida() {
    var flag = false;
    caixa_reg = document.querySelector('.msg-altVal');

    if (altvalmail) {
        flag = true;
        if (altexis) {
            flag = true;
            if (altvalNom) {
                flag = true;
            } else { flag = false; }
        } else { flag = false; }

    } else { flag = false; }

    if (flag == false)
        caixa_reg.innerHTML = "Inválido, por favor verifique se todos os campos estão preenchidos corretamente";

    else
        caixa_pass.style.display = 'none';
    return flag;
}

function altpassVAL() {
    var flag = false;
    caixa_reg = document.querySelector('.msg-altpassVal');

    if (altPassch) {
        flag = true;
    } else { flag = false; }

    if (flag == false)
        caixa_reg.innerHTML = "As palavras chave que inseriu não coincidem";

    else
        caixa_pass.style.display = 'none';
    return flag;
}
