// FORM SUGESTÃO
var exis = false;
var valNom = false;

// Game name validation with AJAX (simplified - just check if not empty and available)
function existeSug(e) {
  if (e.value.trim().length == 0) {
    document.getElementById("txtSug").innerHTML = "";
    document.getElementById("txtSug").style.display = "none";
    exis = false;
    return;
  }

  var caixa_sug = document.getElementById("txtSug");
  var inputField = document.getElementById("sugN");

  // Only check availability via AJAX if field has content
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

// Producer name validation (simplified - just check if not empty)
function validPR(n) {
  var caixa_nome = document.querySelector(".msg-pr");
  var inputField = document.getElementById("sugPr");

  if (n.value.trim() == "") {
    caixa_nome.style.display = "none";
    inputField.classList.remove("error", "success");
    valNom = false;
    return false;
  }

  // Simple validation - just check if not empty
  caixa_nome.style.display = "none";
  inputField.classList.remove("error");
  inputField.classList.add("success");
  valNom = true;
}

// Simplified form validation - only check if fields are filled
function validaSUG() {
  var flag = true;
  var caixa_reg = document.querySelector(".msg-sug");

  // Get current values
  var gameField = document.getElementById("sugN");
  var prodField = document.getElementById("sugPr");

  // Check if game name is filled
  if (gameField.value.trim() === "") {
    flag = false;
    document.getElementById("txtSug").innerHTML =
      "Por favor, insira o nome do jogo";
    document.getElementById("txtSug").style.display = "block";
    document.getElementById("txtSug").style.color = "#dc3545";
  }

  // Check if producer name is filled
  if (prodField.value.trim() === "") {
    flag = false;
    document.querySelector(".msg-pr").innerHTML =
      "Por favor, insira o nome do produtor";
    document.querySelector(".msg-pr").style.display = "block";
    document.querySelector(".msg-pr").style.color = "#dc3545";
  }

  // Only validate availability if fields are filled
  if (gameField.value.trim() !== "" && !exis) {
    flag = false;
    document.getElementById("txtSug").style.display = "block";
  }

  if (prodField.value.trim() !== "" && !valNom) {
    flag = false;
    document.querySelector(".msg-pr").style.display = "block";
  }

  if (!flag) {
    caixa_reg.innerHTML = "Por favor, preencha todos os campos obrigatórios.";
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
