# Book Zone
Proyecto M07 y M09 del ciclo superior DAW.

# Autores
Guillem Font y Albert Onetti.


# TODO:

Importante:
    - Ajustar tamaño del fondo negro en los modales (CSS -> assets/style/style.css).
    - Seleccionar las categorías de la cabezera desde la BBDD (PHP -> views/general/header.php).
    - Agregar funcionalidad a la papelera del carrito (PHP -> views/general/header.php & JS -> assets/script/main.js).
    - Redirigir al usuario cuando modifica su perfil (PHP -> models/client.php {método modifyClient}).
    - Redirigir al usuario cuando añade un producto al carrito (PHP -> models/cart.php {método saveToCart}).
    - Redirigir al usuario cuando hace una compra (PHP -> models/cart.php {método saveToCart}).
    - Cojer de la BDDD los pedidos históricos del usuario (PHP -> models/client.php {método getAllData}).
    - Arreglar error "buyButton is null" cuando el usuario no ha iniciado sesión, ya que no existe (JS -> assets/script/main.js).
    - Añadir más libros a la tabla productos (PHPMYADMIN).

Extras:
    - Mejorar diseño del carrito (PHP -> views/general/header.php & JS -> assets/style/style.css).
    - Mejorar diseño responsive (JS -> assets/style/style.css).
    - Añadir ofertas especiales y clasificar por categorías (PHP -> views/general/menu.php).