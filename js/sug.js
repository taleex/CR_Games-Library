// FORM SUGESTÃO
var exis = false;
var valNom = false;

// Game name validation with AJAX
function existeSug(e) {
  if (e.value.length == 0) {
    document.getElementById("txtSug").innerHTML = "";
    document.getElementById("txtSug").style.display = "none";
    exis = true;
    return;
  }

  // Game name validation rules
  var gameNameRegex = /^[a-zA-Z0-9À-ÿ\s\-_\.]{2,100}$/;
  var caixa_sug = document.getElementById("txtSug");
  var inputField = document.getElementById("sugN");

  if (!gameNameRegex.test(e.value)) {
    caixa_sug.innerHTML =
      "O nome do jogo deve ter entre 2 e 100 caracteres e conter apenas letras, números e caracteres especiais permitidos";
    caixa_sug.style.display = "block";
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
      if (response === "Jogo disponível") {
        caixa_sug.innerHTML = response;
        caixa_sug.style.display = "block";
        caixa_sug.style.color = "#28a745";
        inputField.classList.remove("error");
        inputField.classList.add("success");
        exis = true;
      } else {
        caixa_sug.innerHTML = response;
        caixa_sug.style.display = "block";
        caixa_sug.style.color = "#dc3545";
        inputField.classList.remove("success");
        inputField.classList.add("error");
        exis = false;
      }
    }
  };

  xmlhttp.open(
    "GET",
    "files/AJAX/existeSug.php?q=" + encodeURIComponent(e.value),
    true,
  );
  xmlhttp.send();
}

// Producer name validation
function validPR(n) {
  var filtro = /^[a-zA-ZÀ-ÿ\s\-_\.]{2,100}$/;
  var caixa_nome = document.querySelector(".msg-pr");
  var inputField = document.getElementById("sugPr");

  if (n.value == "") {
    caixa_nome.style.display = "none";
    inputField.classList.remove("error", "success");
    valNom = false;
    return false;
  }

  if (filtro.test(n.value)) {
    caixa_nome.style.display = "none";
    inputField.classList.remove("error");
    inputField.classList.add("success");
    valNom = true;
  } else {
    caixa_nome.innerHTML =
      "Formato de Nome de Produtor inválido. Use apenas letras, números e caracteres especiais permitidos";
    caixa_nome.style.display = "block";
    inputField.classList.remove("success");
    inputField.classList.add("error");
    valNom = false;
  }
}

// Improved form validation
function validaSUG() {
  var flag = true;
  var caixa_reg = document.querySelector(".msg-sug");

  // Validate all fields
  if (!exis) {
    flag = false;
    document.getElementById("txtSug").style.display = "block";
  }

  if (!valNom) {
    flag = false;
    document.querySelector(".msg-pr").style.display = "block";
  }

  if (!flag) {
    caixa_reg.innerHTML = "Por favor, corrija os campos inválidos.";
    caixa_reg.style.display = "block";
    caixa_reg.style.color = "#dc3545";
  } else {
    caixa_reg.style.display = "none";
  }

  return flag;
}

// Add real-time validation on input events
document.addEventListener("DOMContentLoaded", function () {
  var gameField = document.getElementById("sugN");
  var prodField = document.getElementById("sugPr");

  if (gameField) {
    gameField.addEventListener("input", function () {
      existeSug(this);
    });
  }

  if (prodField) {
    prodField.addEventListener("input", function () {
      validPR(this);
    });
  }
});
