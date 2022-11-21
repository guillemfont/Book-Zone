<div class="center-contenedor-product">
    <div class="contenedor-product">
        <h2 class="login-header">Añadir Producto</h2>
        <form action="index.php?controller=Admin&action=postAddProduct" class="login" method="POST" enctype="multipart/form-data">
            <p>ID: <input type="text" required="required" name="id" /></p>
            <p>Nombre: <input type="text" required="" name="nombre" /></p>
            <p>Descripción: <input type="name" required="required" name="descripcion" /> </p>
            <p>Precio: <input type="name" required="required" name="precio" /> </p>
<!--            <p> Foto: <input type="text" required="required" name="foto" /> </p>-->
            <p>Foto: <input type="file" required="required" name="foto" /> </p>
            <p>Stock: <input type="text" required="required" name="stock" /> </p>
            <p>ID_Categoria: <input type="text" required="required" name="id_categoria" /> </p>
            <p><input type="submit" name="enviar" value="Aceptar" /></p>
            </a>
        </form>
    </div>
</div>
