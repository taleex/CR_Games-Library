// Global variables for search functionality
var searchTimeout;
var isSearching = false;

//ADD E REMOVER da lista de desejos
function lid(e, j, u) {
  var idi = e.id;

  if ($(e).hasClass("fa fa-minus-circle")) {
    $.ajax({
      url: "files/AJAX/ldmenos.php",
      type: "GET",
      data: {
        q: j,
        u: u,
        i: idi,
      },
      success: function (response) {
        if (response == 1) {
          $(e).removeClass("fa-minus-circle");
          $(e).addClass("fa-plus-circle");
        }
      },
      error: function (xhr, status, error) {
        console.error("Error removing from wishlist:", error);
      },
    });
  } else {
    $.ajax({
      url: "files/AJAX/ldmais.php",
      type: "GET",
      data: {
        q: j,
        u: u,
        i: idi,
      },
      success: function (response) {
        if (response == 1) {
          $(e).removeClass("fa-plus-circle");
          $(e).addClass("fa-minus-circle");
        }
      },
      error: function (xhr, status, error) {
        console.error("Error adding to wishlist:", error);
      },
    });
  }
}
// ----------------------------//

//lista de sugestões do admin
function su(e, s) {
  $.ajax({
    url: "files/AJAX/Sugmenos.php",
    type: "GET",
    data: {
      q: s,
    },
    success: function (response) {
      $(e).removeClass("fa-minus-circle");
      document.getElementById("sug1").innerHTML = response;
    },
    error: function (xhr, status, error) {
      console.error("Error updating suggestions:", error);
    },
  });
}

function su2(e, s) {
  $.ajax({
    url: "files/AJAX/sugmen2.php",
    type: "GET",
    data: {
      q: s,
    },
    success: function (response) {
      $(e).removeClass("fa-minus-circle");
      document.getElementById("sug2").innerHTML = response;
    },
    error: function (xhr, status, error) {
      console.error("Error updating suggestions:", error);
    },
  });
}

// ------------------------ //

//ALL JOGOS - Improved with debouncing and error handling
function filTodosJogos(element, c, pag, pa) {
  // Handle both DOM element and jQuery object
  var searchTerm = typeof element === "object" ? $(element).val() : element;

  // Clear previous timeout
  clearTimeout(searchTimeout);

  // Debounce search to prevent excessive requests
  searchTimeout = setTimeout(function () {
    // Show loading indicator
    $("#jg").html(
      '<div class="text-center"><i class="fa fa-spinner fa-spin"></i> Buscando...</div>',
    );

    $.ajax({
      url: "files/AJAX/filTodosJogos.php",
      type: "GET",
      data: {
        p: searchTerm,
        c: c,
        pa: pa,
      },
      success: function (response) {
        $("#jg").html(response);
      },
      error: function (xhr, status, error) {
        console.error("Search failed:", error);
        $("#jg").html(
          '<div class="alert alert-danger">Erro ao buscar jogos. Por favor, tente novamente.</div>',
        );
      },
    });
  }, 300); // 300ms debounce delay
}

// Improved search function with proper event handling
function setupSearch() {
  if ($("#pesq").length > 0) {
    $("#pesq").on("input", function () {
      filTodosJogos(this, $("#pesq").data("c") || -404, 1, 1);
    });
  }
}

// Initialize search when document is ready
$(document).ready(function () {
  setupSearch();
});

// Legacy functions for backward compatibility
function filJogosPr(e, c, pr, pa) {
  var searchTerm = typeof e === "object" ? $(e).val() : e;

  $.ajax({
    url: "files/AJAX/filTodosJogos.php",
    type: "GET",
    data: {
      p: searchTerm,
      pr: pr,
      c: c,
      pa: pa,
    },
    success: function (response) {
      document.getElementById("PR").innerHTML = response;
    },
    error: function (xhr, status, error) {
      console.error("Search failed:", error);
    },
  });
}

function filJogosGr(e, c, Gr, pa) {
  var searchTerm = typeof e === "object" ? $(e).val() : e;

  $.ajax({
    url: "files/AJAX/filTodosJogos.php",
    type: "GET",
    data: {
      p: searchTerm,
      c: c,
      Gr: Gr,
      pa: pa,
    },
    success: function (response) {
      document.getElementById("GR").innerHTML = response;
    },
    error: function (xhr, status, error) {
      console.error("Search failed:", error);
    },
  });
}

function filJogosLd(e, c, pa) {
  var searchTerm = typeof e === "object" ? $(e).val() : e;

  $.ajax({
    url: "files/AJAX/filTodosJogos.php",
    type: "GET",
    data: {
      p: searchTerm,
      c: c,
      pa: pa,
    },
    success: function (response) {
      document.getElementById("ld").innerHTML = response;
    },
    error: function (xhr, status, error) {
      console.error("Search failed:", error);
    },
  });
}

function filJogosPL(e, c, Pl, pa) {
  var searchTerm = typeof e === "object" ? $(e).val() : e;

  $.ajax({
    url: "files/AJAX/filTodosJogos.php",
    type: "GET",
    data: {
      p: searchTerm,
      c: c,
      Pl: Pl,
      pa: pa,
    },
    success: function (response) {
      document.getElementById("PL").innerHTML = response;
    },
    error: function (xhr, status, error) {
      console.error("Search failed:", error);
    },
  });
}
