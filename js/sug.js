// FORM SUGESTÃO

// Simplified form validation - only check if fields are required (not empty)
function validaSUG() {
  var flag = true;
  var caixa_reg = document.querySelector(".msg-sug");

  // The required attribute on the HTML fields will handle empty value validation
  // No additional JavaScript validation needed for the fields themselves

  // Clear any existing error messages
  document.getElementById("txtSug").style.display = "none";
  document.querySelector(".msg-pr").style.display = "none";
  caixa_reg.style.display = "none";

  return flag;
}
