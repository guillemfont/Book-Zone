<?php 

echo '<header class="menu">
    <nav class="menuContainer">
        <h1 class="menuLogo"><img src="assets/img/img_general/logo.png" alt="" srcset=""></h1>
        
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
        echo '   <li class="menuItem">
        <a href="index.php?log=true&controller=Client&action=loginClient" class="menuLink"><p>Acceder</p></i></a>
        </li>
        <li class="menuItem">
        <a href="index.php?controller=Client&action=registerClient" class="menuLink"><div class="menuLinkContainer"><p>Registrarse</p></div></a>';
    }


    echo '
            </li>
            </ul>
            
            <menu class="menuDisplay"><i class="fa-solid fa-bars" id="menuBars"></i></menu>
            
            </nav>
            
            </header>';
?>