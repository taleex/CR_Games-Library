// FORM SUGESTÃO

// Simplified form validation - only check if fields are required (not empty)
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
  } else {
    document.getElementById("txtSug").style.display = "none";
  }

  // Check if producer name is filled
  if (prodField.value.trim() === "") {
    flag = false;
    document.querySelector(".msg-pr").innerHTML =
      "Por favor, insira o nome do produtor";
    document.querySelector(".msg-pr").style.display = "block";
    document.querySelector(".msg-pr").style.color = "#dc3545";
  } else {
    document.querySelector(".msg-pr").style.display = "none";
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
