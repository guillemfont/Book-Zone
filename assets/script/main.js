function invalidSession(bool) {
  const par = document.getElementById("formError");
  const cont = document.getElementById("form");

  par.style.display = "block";
  cont.style.padding = "1em 3em 4.5em 3em";
}

function samePass() {
  const pass1 = document.getElementById("userPass").value;
  const pass2 = document.getElementById("userRepeatPass").value;
  const par = document.getElementById("formError");
  const cont = document.getElementById("form");

  if (pass1 != "" && pass2 != "" && pass1 !== pass2) {
    par.style.display = "block";
    cont.style.padding = "1em 3em 4.5em 3em";
  } else {
    par.style.display = "none";
    cont.style.padding = " 4.5em 3em";
  }
}
