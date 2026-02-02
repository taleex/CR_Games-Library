// JavaScript validation with visual feedback for registration form
var validationState = {
  email: false,
  emailExists: false,
  login: false,
  loginExists: false,
  name: false,
  password: false,
  confirmPassword: false,
};

function validateEmail(input) {
  const email = input.value;
  const errorElement = document.getElementById("emailError");
  const emailRegex =
    /^([a-zA-Z0-9_-]+(?:\.[a-zA-Z0-9_-]+)*)@((?:[a-zA-Z0-9_-]+\.)*[a-zA-Z0-9_-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;

  // Remove previous error styling
  input.classList.remove("is-invalid");
  input.classList.remove("is-valid");
  errorElement.style.display = "none";

  if (email === "") {
    showError(input, errorElement, "Campo obrigatório");
    validationState.email = false;
    validationState.emailExists = false;
    return false;
  }

  if (emailRegex.test(email)) {
    // Check if email already exists
    checkEmailExists(email, function (exists) {
      if (exists) {
        showError(input, errorElement, "Este email já está em uso");
        validationState.email = false;
        validationState.emailExists = true;
      } else {
        showSuccess(input);
        validationState.email = true;
        validationState.emailExists = false;
      }
    });
    return true;
  } else {
    showError(input, errorElement, "Formato de E-mail inválido");
    validationState.email = false;
    validationState.emailExists = false;
    return false;
  }
}

// Enhanced email validation that resets state immediately
function validateEmailImmediate(input) {
  const email = input.value;
  const errorElement = document.getElementById("emailError");
  const emailRegex =
    /^([a-zA-Z0-9_-]+(?:\.[a-zA-Z0-9_-]+)*)@((?:[a-zA-Z0-9_-]+\.)*[a-zA-Z0-9_-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;

  // Remove previous error styling
  input.classList.remove("is-invalid");
  input.classList.remove("is-valid");

  // Check if errorElement exists before trying to access its style
  if (errorElement) {
    errorElement.style.display = "none";
  }

  if (email === "") {
    showError(input, errorElement, "Campo obrigatório");
    validationState.email = false;
    validationState.emailExists = false;
    return false;
  }

  if (emailRegex.test(email)) {
    // Check if email already exists
    checkEmailExists(email, function (exists) {
      if (exists) {
        showError(input, errorElement, "Este email já está em uso");
        validationState.email = false;
        validationState.emailExists = true;
      } else {
        showSuccess(input);
        validationState.email = true;
        validationState.emailExists = false;
      }
    });
    return true;
  } else {
    showError(input, errorElement, "Formato de E-mail inválido");
    validationState.email = false;
    validationState.emailExists = false;
    return false;
  }
}

function validateLogin(input) {
  const login = input.value;
  const errorElement = document.getElementById("loginError");

  // Remove previous error styling
  input.classList.remove("is-invalid");
  input.classList.remove("is-valid");
  if (errorElement) {
    errorElement.style.display = "none";
  }

  if (login.length === 0) {
    showError(input, errorElement, "Campo obrigatório");
    validationState.login = false;
    validationState.loginExists = false;
    return false;
  }

  // Check if login already exists
  checkLoginExists(login, function (exists) {
    console.log("Login validation callback - login:", login, "exists:", exists);
    if (exists) {
      showError(input, errorElement, "Este login já está em uso");
      validationState.login = false;
      validationState.loginExists = true;
    } else {
      showSuccess(input);
      validationState.login = true;
      validationState.loginExists = false;
    }
    console.log("Updated validation state:", validationState);
  });
  return true;
}

function validateName(input) {
  const name = input.value;
  const errorElement = document.getElementById("nameError");
  const nameRegex = /^[a-zA-Z]+ [a-zA-Z]+$/;

  // Remove previous error styling
  input.classList.remove("is-invalid");
  input.classList.remove("is-valid");
  errorElement.style.display = "none";

  if (name === "") {
    showError(input, errorElement, "Campo obrigatório");
    validationState.name = false;
    return false;
  }

  if (nameRegex.test(name)) {
    showSuccess(input);
    validationState.name = true;
    return true;
  } else {
    showError(
      input,
      errorElement,
      "Formato de Nome inválido (Primeiro e Último nome)",
    );
    validationState.name = false;
    return false;
  }
}

function validatePassword(input) {
  const password = input.value;
  const errorElement = document.getElementById("passwordError");

  // Remove previous error styling
  input.classList.remove("is-invalid");
  input.classList.remove("is-valid");
  errorElement.style.display = "none";

  if (password === "") {
    showError(input, errorElement, "Campo obrigatório");
    validationState.password = false;
    return false;
  }

  if (password.length >= 6) {
    showSuccess(input);
    validationState.password = true;
    // Also validate confirm password if it has a value
    const confirmPassword = document.getElementById("regConfirmPassword");
    if (confirmPassword.value !== "") {
      validateConfirmPassword(confirmPassword);
    }
    return true;
  } else {
    showError(
      input,
      errorElement,
      "A password deve ter pelo menos 6 caracteres",
    );
    validationState.password = false;
    return false;
  }
}

function validateConfirmPassword(input) {
  const confirmPassword = input.value;
  const password = document.getElementById("regPassword").value;
  const errorElement = document.getElementById("confirmPasswordError");

  // Remove previous error styling
  input.classList.remove("is-invalid");
  input.classList.remove("is-valid");
  errorElement.style.display = "none";

  if (confirmPassword === "") {
    showError(input, errorElement, "Campo obrigatório");
    validationState.confirmPassword = false;
    return false;
  }

  if (confirmPassword === password) {
    showSuccess(input);
    validationState.confirmPassword = true;
    return true;
  } else {
    showError(input, errorElement, "As passwords não coincidem");
    validationState.confirmPassword = false;
    return false;
  }
}

function showError(input, errorElement, message) {
  input.classList.add("is-invalid");
  errorElement.textContent = message;
  errorElement.style.display = "block";
}

function showSuccess(input) {
  // Remove invalid styling but don't add success styling
  input.classList.remove("is-invalid");
}

function checkEmailExists(email, callback) {
  if (window.XMLHttpRequest) {
    xmlhttp = new XMLHttpRequest();
  } else {
    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }

  // Set timeout for AJAX request (10 seconds)
  xmlhttp.timeout = 10000;

  xmlhttp.onreadystatechange = function () {
    if (xmlhttp.readyState == 4) {
      if (xmlhttp.status == 200) {
        const response = xmlhttp.responseText.trim();
        // Email exists if response is NOT "Email disponível" (meaning it's taken)
        const exists = response !== "Email disponível";
        callback(exists);
      } else {
        // Handle AJAX error - assume email is available as fallback
        console.warn(
          "Email validation AJAX failed, assuming email is available",
        );
        callback(false);
      }
    }
  };

  // Handle timeout
  xmlhttp.ontimeout = function () {
    console.warn("Email validation timeout, assuming email is available");
    callback(false);
  };

  // Handle network errors
  xmlhttp.onerror = function () {
    console.warn("Email validation network error, assuming email is available");
    callback(false);
  };

  // Use registration-specific endpoint that doesn't require user code
  xmlhttp.open("GET", "files/AJAX/existeEmailReg.php?m=" + email, true);
  xmlhttp.send();
}

function checkLoginExists(login, callback) {
  if (window.XMLHttpRequest) {
    xmlhttp = new XMLHttpRequest();
  } else {
    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }

  // Set timeout for AJAX request (10 seconds)
  xmlhttp.timeout = 10000;

  xmlhttp.onreadystatechange = function () {
    if (xmlhttp.readyState == 4) {
      if (xmlhttp.status == 200) {
        const response = xmlhttp.responseText.trim();
        console.log("Login validation response:", response);
        console.log(
          "Response === 'Login disponível':",
          response === "Login disponível",
        );

        // Login exists if response is NOT "Login disponível" (meaning it's taken)
        const exists = response !== "Login disponível";
        console.log("Login exists:", exists);
        callback(exists);
      } else {
        // Handle AJAX error - assume login is available as fallback
        console.warn(
          "Login validation AJAX failed, assuming login is available",
        );
        callback(false);
      }
    }
  };

  // Handle timeout
  xmlhttp.ontimeout = function () {
    console.warn("Login validation timeout, assuming login is available");
    callback(false);
  };

  // Handle network errors
  xmlhttp.onerror = function () {
    console.warn("Login validation network error, assuming login is available");
    callback(false);
  };

  xmlhttp.open("GET", "files/AJAX/existeLoginReg.php?q=" + login, true);
  xmlhttp.send();
}

// Enhanced registration form submission validation
document
  .getElementById("registerForm")
  .addEventListener("submit", function (e) {
    const submitError = document.getElementById("submitError");
    submitError.style.display = "none";

    // Validate all fields synchronously first
    const emailValid = validateEmail(document.getElementById("regEmail"));
    const loginValid = validateLogin(document.getElementById("regLogin"));
    const nameValid = validateName(document.getElementById("regName"));
    const passwordValid = validatePassword(
      document.getElementById("regPassword"),
    );
    const confirmPasswordValid = validateConfirmPassword(
      document.getElementById("regConfirmPassword"),
    );

    // Check if all basic validations passed
    if (
      !emailValid ||
      !loginValid ||
      !nameValid ||
      !passwordValid ||
      !confirmPasswordValid
    ) {
      e.preventDefault();
      submitError.textContent =
        "Por favor, corrija os erros no formulário antes de submeter.";
      submitError.style.display = "block";

      // Add shake animation to highlight invalid fields
      const invalidFields = this.querySelectorAll(".is-invalid");
      invalidFields.forEach((field) => {
        field.style.animation = "none";
        field.offsetHeight; // trigger reflow
        field.style.animation = "shake 0.5s ease-in-out";
      });

      return false;
    }

    // Check if email and login existence validations are complete
    // Improved logic: Allow submission if we have a definitive answer (either exists or doesn't exist)
    const emailValidationComplete =
      validationState.email || validationState.emailExists;
    const loginValidationComplete =
      validationState.login || validationState.loginExists;

    if (!emailValidationComplete || !loginValidationComplete) {
      e.preventDefault();
      submitError.textContent =
        "Por favor, aguarde a validação do email e login.";
      submitError.style.display = "block";
      return false;
    }

    // Check if all validations passed (excluding emailExists and loginExists)
    const allValid = Object.entries(validationState).every(([key, value]) => {
      // Skip emailExists and loginExists properties as they indicate conflicts, not success
      // emailExists and loginExists should be false for successful validation
      if (key === "emailExists" || key === "loginExists") {
        return value === false; // These should be false (no conflicts) for successful validation
      }
      return value === true;
    });

    console.log("Validation state:", validationState);
    console.log("All valid:", allValid);

    if (!allValid) {
      e.preventDefault();
      submitError.textContent =
        "Por favor, corrija os erros no formulário antes de submeter.";
      submitError.style.display = "block";

      // Add shake animation to highlight invalid fields
      const invalidFields = this.querySelectorAll(".is-invalid");
      invalidFields.forEach((field) => {
        field.style.animation = "none";
        field.offsetHeight; // trigger reflow
        field.style.animation = "shake 0.5s ease-in-out";
      });

      return false;
    }

    // If all validations pass, clear any previous submit error
    submitError.style.display = "none";
    return true;
  });

// Add event listeners for input change events to clear validation errors
document.getElementById("regLogin").addEventListener("input", function () {
  this.classList.remove("is-invalid");
  this.classList.remove("is-valid");
  document.getElementById("loginError").style.display = "none";
  document.getElementById("submitError").style.display = "none";
});

document.getElementById("regEmail").addEventListener("input", function () {
  this.classList.remove("is-invalid");
  this.classList.remove("is-valid");
  document.getElementById("emailError").style.display = "none";
  document.getElementById("submitError").style.display = "none";
  // Only reset emailExists flag when user types, keep email flag as is
  // This prevents blocking form submission while allowing error clearing
  validationState.emailExists = false;
  // Trigger immediate validation on input
  validateEmailImmediate(this);
});

document.getElementById("regName").addEventListener("input", function () {
  this.classList.remove("is-invalid");
  this.classList.remove("is-valid");
  document.getElementById("nameError").style.display = "none";
  document.getElementById("submitError").style.display = "none";
});

document.getElementById("regPassword").addEventListener("input", function () {
  this.classList.remove("is-invalid");
  this.classList.remove("is-valid");
  document.getElementById("passwordError").style.display = "none";
  document.getElementById("submitError").style.display = "none";
});

document
  .getElementById("regConfirmPassword")
  .addEventListener("input", function () {
    this.classList.remove("is-invalid");
    this.classList.remove("is-valid");
    document.getElementById("confirmPasswordError").style.display = "none";
    document.getElementById("submitError").style.display = "none";
  });

// Clear registration form when modal is closed
$("#reg").on("hidden.bs.modal", function () {
  const regLogin = document.getElementById("regLogin");
  const regEmail = document.getElementById("regEmail");
  const regName = document.getElementById("regName");
  const regPassword = document.getElementById("regPassword");
  const regConfirmPassword = document.getElementById("regConfirmPassword");
  const loginError = document.getElementById("loginError");
  const emailError = document.getElementById("emailError");
  const nameError = document.getElementById("nameError");
  const passwordError = document.getElementById("passwordError");
  const confirmPasswordError = document.getElementById("confirmPasswordError");
  const submitError = document.getElementById("submitError");

  // Clear input values
  regLogin.value = "";
  regEmail.value = "";
  regName.value = "";
  regPassword.value = "";
  regConfirmPassword.value = "";

  // Remove validation classes
  regLogin.classList.remove("is-invalid", "is-valid");
  regEmail.classList.remove("is-invalid", "is-valid");
  regName.classList.remove("is-invalid", "is-valid");
  regPassword.classList.remove("is-invalid", "is-valid");
  regConfirmPassword.classList.remove("is-invalid", "is-valid");

  // Hide error messages
  loginError.style.display = "none";
  emailError.style.display = "none";
  nameError.style.display = "none";
  passwordError.style.display = "none";
  confirmPasswordError.style.display = "none";
  submitError.style.display = "none";
});

// Add validation for login form
document.getElementById("login").addEventListener("input", function () {
  this.classList.remove("is-invalid");
});

document.getElementById("password").addEventListener("input", function () {
  this.classList.remove("is-invalid");
});

// Login form validation function
function validateLoginForm() {
  const loginInput = document.getElementById("login");
  const passwordInput = document.getElementById("password");
  const loginError = document.getElementById("loginError");
  let isValid = true;

  // Clear previous error
  loginError.style.display = "none";

  // Validate login field
  if (loginInput.value.trim() === "") {
    loginInput.classList.add("is-invalid");
    isValid = false;
  } else {
    loginInput.classList.remove("is-invalid");
  }

  // Validate password field
  if (passwordInput.value.trim() === "") {
    passwordInput.classList.add("is-invalid");
    isValid = false;
  } else {
    passwordInput.classList.remove("is-invalid");
  }

  return isValid;
}

// Check for login error from server
document.addEventListener("DOMContentLoaded", function () {
  const urlParams = new URLSearchParams(window.location.search);
  if (
    urlParams.has("error") &&
    urlParams.get("error") === "invalid_credentials"
  ) {
    const loginError = document.getElementById("loginError");
    const loginInput = document.getElementById("login");
    const passwordInput = document.getElementById("password");

    loginError.textContent =
      "Credenciais inválidas. Por favor, verifique seu login e password.";
    loginError.style.display = "block";

    // Add invalid styling to both fields
    loginInput.classList.add("is-invalid");
    passwordInput.classList.add("is-invalid");

    // Show the login modal
    $("#log").modal("show");
  }
});

// Clear login form when modal is closed
$("#log").on("hidden.bs.modal", function () {
  const loginInput = document.getElementById("login");
  const passwordInput = document.getElementById("password");
  const loginError = document.getElementById("loginError");

  // Clear input values
  loginInput.value = "";
  passwordInput.value = "";

  // Remove validation classes
  loginInput.classList.remove("is-invalid", "is-valid");
  passwordInput.classList.remove("is-invalid", "is-valid");

  // Hide error message
  loginError.style.display = "none";
});

// Add form submission validation for login
document.getElementById("loginForm").addEventListener("submit", function (e) {
  if (!validateLoginForm()) {
    e.preventDefault();
    // Add shake animation to highlight invalid fields
    const invalidFields = this.querySelectorAll(".is-invalid");
    invalidFields.forEach((field) => {
      field.style.animation = "none";
      field.offsetHeight; // trigger reflow
      field.style.animation = "shake 0.5s ease-in-out";
    });
    return false;
  }
  return true;
});

// Add keyframes for shake animation
const style = document.createElement("style");
style.textContent = `
  @keyframes shake {
    0% { transform: translateX(0); }
    25% { transform: translateX(-5px); }
    50% { transform: translateX(5px); }
    75% { transform: translateX(-5px); }
    100% { transform: translateX(0); }
  }
`;
document.head.appendChild(style);
