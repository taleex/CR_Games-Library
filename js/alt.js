var valmail = false;
var exis = false;
var valNom = false;
var Passch = false;

// Email validation with improved regex and real-time feedback
function altvalidaMail(m) {
  var filtro = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
  var caixa_email = document.querySelector(".altmsg-email");
  var inputField = document.getElementById("altemail");

  if (m.value == "") {
    caixa_email.style.display = "none";
    inputField.classList.remove("error", "success");
    valmail = false;
    return false;
  }

  if (filtro.test(m.value)) {
    caixa_email.style.display = "none";
    inputField.classList.remove("error");
    inputField.classList.add("success");
    valmail = true;
  } else {
    caixa_email.innerHTML =
      "Formato de E-mail inválido. Ex: usuario@dominio.com";
    caixa_email.style.display = "block";
    inputField.classList.remove("success");
    inputField.classList.add("error");
    valmail = false;
  }
}

// Username validation with AJAX
function altexiste(e, c) {
  if (e.value.length == 0) {
    document.getElementById("altxtlogin").innerHTML = "";
    document.getElementById("altxtlogin").style.display = "none";
    exis = true;
    return;
  }

  // Username validation rules
  var usernameRegex = /^[a-zA-Z0-9_]{3,20}$/;
  var caixa_login = document.getElementById("altxtlogin");
  var inputField = document.getElementById("Loginalt");

  if (!usernameRegex.test(e.value)) {
    caixa_login.innerHTML =
      "O username deve ter entre 3 e 20 caracteres e conter apenas letras, números e underscores";
    caixa_login.style.display = "block";
    inputField.classList.remove("success");
    inputField.classList.add("error");
    exis = false;
    return;
  }

  if (window.XMLHttpRequest) {
    xmlhttp = new XMLHttpRequest();
  } else {
    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }

  xmlhttp.onreadystatechange = function () {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
      var response = xmlhttp.responseText.trim();
      if (response === "Username disponível") {
        caixa_login.innerHTML = response;
        caixa_login.style.display = "block";
        caixa_login.style.color = "#28a745";
        inputField.classList.remove("error");
        inputField.classList.add("success");
        exis = true;
      } else {
        caixa_login.innerHTML = response;
        caixa_login.style.display = "block";
        caixa_login.style.color = "#dc3545";
        inputField.classList.remove("success");
        inputField.classList.add("error");
        exis = false;
      }
    }
  };

  xmlhttp.open(
    "GET",
    "files/AJAX/existe.php?q=" + encodeURIComponent(e.value) + "&c=" + c,
    true,
  );
  xmlhttp.send();
}

// Name validation with improved regex
function altvalidaNom(n) {
  var filtro = /^[a-zA-ZÀ-ÿ\s]{2,50}$/;
  var caixa_nome = document.querySelector(".altmsg-nome");
  var inputField = document.getElementById("altutinome");

  if (n.value == "") {
    caixa_nome.style.display = "none";
    inputField.classList.remove("error", "success");
    valNom = false;
    return false;
  }

  if (filtro.test(n.value) && n.value.trim().split(" ").length >= 2) {
    caixa_nome.style.display = "none";
    inputField.classList.remove("error");
    inputField.classList.add("success");
    valNom = true;
  } else {
    caixa_nome.innerHTML =
      "Formato de Nome inválido. Digite nome e sobrenome (mínimo 2 palavras)";
    caixa_nome.style.display = "block";
    inputField.classList.remove("success");
    inputField.classList.add("error");
    valNom = false;
  }
}

// Password validation with strength checking
function altPasswordMatch(p) {
  var caixa_pass = document.querySelector(".altmsg-pass");
  var caixa_cpass = document.querySelector(".altmsg-cpass");
  var password = $("#altpass").val();
  var confirmPassword = $("#altconfirm_password").val();
  var passField = document.getElementById("altpass");
  var cpassField = document.getElementById("altconfirm_password");

  // Clear previous states
  caixa_pass.style.display = "none";
  caixa_cpass.style.display = "none";
  passField.classList.remove("error", "success");
  cpassField.classList.remove("error", "success");

  if (p.value == "") return true;

  // Password strength validation
  var passRegex =
    /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

  if (!passRegex.test(password)) {
    caixa_pass.innerHTML =
      "A password deve ter no mínimo 8 caracteres, incluindo maiúsculas, minúsculas, números e caracteres especiais";
    caixa_pass.style.display = "block";
    passField.classList.add("error");
    Passch = false;
    return;
  }

  if (password === confirmPassword) {
    caixa_pass.style.display = "none";
    caixa_cpass.style.display = "none";
    passField.classList.remove("error");
    passField.classList.add("success");
    cpassField.classList.remove("error");
    cpassField.classList.add("success");
    Passch = true;
  } else {
    caixa_pass.innerHTML = "Passwords não coincidem";
    caixa_cpass.innerHTML = "Passwords não coincidem";
    caixa_cpass.style.display = "block";
    caixa_pass.style.display = "block";
    passField.classList.add("error");
    cpassField.classList.add("error");
    Passch = false;
  }
}

// Improved form validation
function altvalida() {
  var flag = true;
  var caixa_reg = document.querySelector(".altmsg-registo");

  // Validate all fields
  if (!valmail) {
    flag = false;
    document.querySelector(".altmsg-email").style.display = "block";
  }

  if (!exis) {
    flag = false;
    document.getElementById("altxtlogin").style.display = "block";
  }

  if (!valNom) {
    flag = false;
    document.querySelector(".altmsg-nome").style.display = "block";
  }

  if (!Passch) {
    flag = false;
    document.querySelector(".altmsg-pass").style.display = "block";
    document.querySelector(".altmsg-cpass").style.display = "block";
  }

  if (!flag) {
    caixa_reg.innerHTML =
      "Erro no registo. Por favor verifique se todos os campos estão preenchidos corretamente.";
    caixa_reg.style.display = "block";
    caixa_reg.style.color = "#dc3545";
  } else {
    caixa_reg.style.display = "none";
  }

  return flag;
}

// Add real-time validation on input events
document.addEventListener("DOMContentLoaded", function () {
  var emailField = document.getElementById("altemail");
  var nameField = document.getElementById("altutinome");
  var passField = document.getElementById("altpass");
  var cpassField = document.getElementById("altconfirm_password");

  if (emailField) {
    emailField.addEventListener("input", function () {
      altvalidaMail(this);
    });
  }

  if (nameField) {
    nameField.addEventListener("input", function () {
      altvalidaNom(this);
    });
  }

  if (passField) {
    passField.addEventListener("input", function () {
      altPasswordMatch(this);
    });
  }

  if (cpassField) {
    cpassField.addEventListener("input", function () {
      altPasswordMatch(this);
    });
  }
});
