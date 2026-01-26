//ADD E REMOVER da lista de desejos
function lid(e, j, u) {
  var idi = e.id;

  if ($(e).hasClass("fa fa-minus-circle")) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        var aux = xmlhttp.responseText;
        if (aux == 1) {
          $(e).removeClass("fa-minus-circle");
          $(e).addClass("fa-plus-circle");
        }
      }
    };
    xmlhttp.open(
      "GET",
      "files/AJAX/ldmenos.php?q=" + j + "&u=" + u + "&i=" + idi,
      true,
    );
    xmlhttp.send();
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        var aux = xmlhttp.responseText;
        if (aux == 1) {
          $(e).removeClass("fa-plus-circle");
          $(e).addClass("fa-minus-circle");
        }
      }
    };
    xmlhttp.open(
      "GET",
      "files/AJAX/ldmais.php?q=" + j + "&u=" + u + "&i=" + idi,
      true,
    );
    xmlhttp.send();
  }
}
// ----------------------------//

//lista de sugestões do admin
function su(e, s) {
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      var aux = xmlhttp.responseText;

      $(e).removeClass("fa-minus-circle");
      document.getElementById("sug1").innerHTML = aux;
    }
  };
  xmlhttp.open("GET", "files/AJAX/Sugmenos.php?q=" + s, true);
  xmlhttp.send();
}

function su2(e, s) {
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      var aux = xmlhttp.responseText;

      $(e).removeClass("fa-minus-circle");
      document.getElementById("sug2").innerHTML = aux;
    }
  };
  xmlhttp.open("GET", "files/AJAX/sugmen2.php?q=" + s, true);
  xmlhttp.send();
}

// ------------------------ //

//ALL JOGOS
function filTodosJogos(e, c, pa) {
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      var aux = xmlhttp.responseText;

      document.getElementById("jg").innerHTML = aux;
    }
  };

  xmlhttp.open(
    "GET",
    "files/AJAX/filTodosJogos.php?p=" + e.value + "&c=" + c + "&pa=" + pa,
    true,
  );
  xmlhttp.send();
}

function filJogosPr(e, c, pr, pa) {
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      var aux = xmlhttp.responseText;

      document.getElementById("PR").innerHTML = aux;
    }
  };
  if (c != "-404") {
    xmlhttp.open(
      "GET",
      "files/AJAX/filTodosJogos.php?p=" +
        e.value +
        "&pr=" +
        pr +
        "&c=" +
        c +
        "&pa=" +
        pa,
      true,
    );
    xmlhttp.send();
  } else {
    xmlhttp.open(
      "GET",
      "files/AJAX/filTodosJogos.php?p=" +
        e.value +
        "&pr=" +
        pr +
        "&c=" +
        c +
        "&pa=" +
        pa,
      true,
    );
    xmlhttp.send();
  }
}

function filJogosGr(e, c, Gr, pa) {
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      var aux = xmlhttp.responseText;

      document.getElementById("GR").innerHTML = aux;
    }
  };

  if (c != "-404") {
    xmlhttp.open(
      "GET",
      "files/AJAX/filTodosJogos.php?p=" +
        e.value +
        "&c=" +
        c +
        "&Gr=" +
        Gr +
        "&pa=" +
        pa,
      true,
    );
    xmlhttp.send();
  } else {
    xmlhttp.open(
      "GET",
      "files/AJAX/filTodosJogos.php?p=" +
        e.value +
        "&c=" +
        c +
        "&Gr=" +
        Gr +
        "&pa=" +
        pa,
      true,
    );
    xmlhttp.send();
  }
}

function filJogosLd(e, c, pa) {
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      var aux = xmlhttp.responseText;

      document.getElementById("ld").innerHTML = aux;
    }
  };
  xmlhttp.open(
    "GET",
    "files/AJAX/filTodosJogos.php?p=" + e.value + "&c=" + c + "&pa=" + pa,
    true,
  );
  xmlhttp.send();
}

function filJogosPL(e, c, Pl, pa) {
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      var aux = xmlhttp.responseText;

      document.getElementById("PL").innerHTML = aux;
    }
  };
  if (c != "-404") {
    xmlhttp.open(
      "GET",
      "files/AJAX/filTodosJogos.php?p=" +
        e.value +
        "&c=" +
        c +
        "&Pl=" +
        Pl +
        "&pa=" +
        pa,
      true,
    );
    xmlhttp.send();
  } else {
    xmlhttp.open(
      "GET",
      "files/AJAX/filTodosJogos.php?p=" + e.value + "&Pl=" + Pl + "&pa=" + pa,
      true,
    );
    xmlhttp.send();
  }
}
