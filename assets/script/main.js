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

function responsiveMenu(){
  const listElements =document.querySelectorAll('.menuItemShow');
  const list = document.querySelector('.menuLinks');
  const menu = document.querySelector('.menuDisplay');
  const previous = document.querySelector('#previous');

  const addClick = function() {
    // element.classList.remove('menuItem');
    listElements.forEach(element => {
      element.addEventListener('click', () => {
        let subMenu = element.children[1];
        let height = 0;
        // element.classList.toggle('menuItemActive');
        if(subMenu.clientHeight === 0){
          height = subMenu.scrollHeight;
        }
        subMenu.style.height = `${height}px`;
      })
    })
  }

  menu.addEventListener('click', () => {
    list.classList.toggle('menuLinksShow');
  })

  addClick();

  window.addEventListener('resize', () =>{
    if (!window.innerWidth > 800) addClick();
  })
}