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

// FUNCIÓN QUE SE EJECUTA AL CARGAR EL BODY, PARA AYUDAR AL DISSEÑO RESPONSIVE
function responsiveMenu() {
  // Menú hamburguesa:
  const listElements = document.querySelectorAll(".menuItemShow");
  const list = document.querySelector(".menuLinks");
  const menu = document.querySelector(".menuDisplay");

  const addClick = function () {
    listElements.forEach((element) => {
      element.addEventListener("click", () => {
        let subMenu = element.children[1];
        let height = 0;
        if (subMenu.clientHeight === 0) {
          height = subMenu.scrollHeight;
        }
        subMenu.style.height = `${height}px`;
      });
    });
  };

  menu.addEventListener("click", () => {
    list.classList.toggle("menuLinksShow");
  });

  addClick();

  window.addEventListener("resize", () => {
    if (!window.innerWidth > 800) addClick();
  });

  // Número de productos del ménu:
  if (document.querySelector("#detailsInputMinus")) {
    const minusButton = document.querySelector("#detailsInputMinus");
    const plusButton = document.querySelector("#detailsInputPlus");
    let userInput = document.querySelector(".detailsInputNumber");
    let userInputNumber = 0;
    const sendButton = document.querySelector(".detailsButton");

    plusButton.addEventListener("click", () => {
      userInputNumber++;
      userInput.value = userInputNumber;
    });

    minusButton.addEventListener("click", () => {
      if (userInputNumber > 0) {
        userInputNumber--;
      }
      userInput.value = userInputNumber;
    });

    sendButton.addEventListener("click", () => {
      console.log(userInput.value);
    })

  }

  // Desplegar/Ocultar cesta de la compra:
  if (document.querySelector("#cartShopContainer")) {
    const cartShop = document.querySelector("#cartShopContainer");
    const cartShop2 = document.querySelector("#cartShopContainer2");
    const cartModal = document.querySelector(".cartModal");

    cartShop.addEventListener("click", () => {
      cartModal.classList.toggle("cartModalDisplay");
    });

    cartShop2.addEventListener("click", () => {
      cartModal.classList.toggle("cartModalDisplay");
    });

    // Desplegar/Ocultar más información sobre el producto:
    if (document.querySelector(".galleryImageContainer")) {
      const galleryImg = document.querySelector(".galleryImageContainer");
      const modalInfo = document.querySelector(".modalMoreInfo");
      const mark = document.querySelector(".xmark");

      galleryImg.addEventListener("click", () => {
        modalInfo.classList.toggle("modalMoreInfoDisplay");
      });
      mark.addEventListener("click", () => {
        modalInfo.classList.toggle("modalMoreInfoDisplay");
      });
    }
  }
}
