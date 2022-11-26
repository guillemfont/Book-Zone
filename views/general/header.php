<?php 

echo '<header class="menu">
    <nav class="menuContainer">
        <a href="index.php" class="menuLogo"><img src="assets/img/img_general/logo.png" alt="" srcset=""><a>
        
        <ul class="menuLinks">
            <li class="menuItem">
                <a href="index.php" class="menuLink"><i class="fa-solid fa-house"></i></a>
            </li>
            <li class="menuItem menuItemShow">
                <a href="#" class="menuLink"><p>Categorías</p><i class="fa-solid fa-angle-up" id="menuArrow"></i></a>
                <ul class="menuNesting">
                <li class="menuInside">
                    <a href="#" class="menuLinkInside">Novela</a>
                </li>
                <li class="menuInside">
                    <a href="#" class="menuLinkInside">Ficción</a>
                </li>
                <li class="menuInside">
                    <a href="#" class="menuLinkInside">Comedia</a>
                </li>
                <li class="menuInside">
                    <a href="#" class="menuLinkInside">Terror</a>
                </li>
                <li class="menuInside">
                    <a href="#" class="menuLinkInside">Fantasía</a>
                </li>
            </ul>
        </li>
        <li class="menuItem">
                <a href="index.php" class="menuLink"><i class="fa-solid fa-cart-shopping"></i></a>
            </li>
        ';
    if (!isset($_SESSION['client'])){

     echo '   <li class="menuItem">
        <a href="index.php?log=true&controller=Client&action=loginClient" class="menuLink"><p>Acceder</p></i></a>
        </li>
        <li class="menuItem">
        <a href="index.php?controller=Client&action=registerClient" class="menuLink"><div class="menuLinkContainer"><p>Registrarse</p></div></a>';
    } else {
        echo '

        <li class="menuItem menuItemShow">
        <a href="#" class="menuLink"><i class="fa-solid fa-circle-user" id="userIcon"></i></a>
        <ul class="menuNesting">
        <li class="menuInside">
            <a href="#" class="menuLinkInside"><div class="menuInsideIcons"><i class="fa-solid fa-user"></i></div></a>
        </li>
        <li class="menuInside">
            <a href="#" class="menuLinkInside"><div class="menuInsideIcons"><i class="fa-solid fa-bell"></i></div></a>
        </li>
        <li class="menuInside">
            <a href="#" class="menuLinkInside"><div class="menuInsideIcons"><i class="fa-solid fa-gear"></i></div></a>
        </li>
        <li class="menuInside">
            <a href="index.php?log=true&controller=Client&action=closeClient" class="menuLinkInside"><div class="menuInsideIcons"><i class="fa-solid fa-right-from-bracket"></div></i></a>
        </li>
    </ul>
</li>

        ';
    }
    

    echo '
            </li>
            </ul>
            
            <menu class="menuCart"><i class="fa-solid fa-cart-shopping" id="menuBars"></i></menu>
            <menu class="menuDisplay"><i class="fa-solid fa-bars" id="menuBars"></i></menu>
            
            </nav>';
            ?>

        <!-- Modal carrito  -->
        <div class="cartModal">
            <p class="cartModalTitle">Cesta</p>
            <div class="cartModalCheckoutContainer">
                <div class="cartModalDetailsContainer">
                    <img src="assets/img/img_books/book1.jpg" class="cartModalImg">
                    <div>
                        <p class="cartModalProduct">Nombre del libro</p>
                        <p class="cartModalPrice">24,99€ x 1 <span class="cartModalPriceBold">24,99€</span></p>
                    </div>
                    <i class="fa-solid fa-trash-can" id="cartModalDelete"></i>
                </div>
                <button class="cartModalButton">Comprar</button>
            </div>
        </div>

<?php


echo'</header>';
?>