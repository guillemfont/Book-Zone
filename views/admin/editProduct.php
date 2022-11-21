<div class="center-contenedor-product">
    <div class="contenedor-product">
        <h2 class="login-header">Editar Producto</h2>
        <?php
        $url = 'action="index.php?controller=Admin&action=postEditProduct"';
        ?>
        <form <?php echo $url ?> class="login" method="POST" enctype="multipart/form-data">
            <p>ID: <input type="text" readonly name="id" value="<?php echo($product->id); ?>"/></p>
            <p>Nombre: <input type="text" required="" name="nombre" value="<?php echo($product->nombre); ?>"/></p>
            <p>Descripción: <input type="name" required="required" name="descripcion"
                                   value="<?php echo($product->descripcion); ?>"/></p>
            <p>Precio: <input type="name" required="required" name="precio" value="<?php echo($product->precio); ?>"/>
            </p>
            <p> Foto: <input type="file" required="required" name="foto" value="<?php echo($product->foto); ?>"/></p>
            <p>Stock: <input type="text" required="required" name="stock" value="<?php echo($product->stock); ?>"/></p>
            <p>ID_Categoria: <input type="text" required="required" name="id_categoria"
                                    value="<?php echo($product->id_categoria); ?>"/></p>
            <p><input type="submit" name="enviar" value="Aceptar"/></p>
            </a>
        </form>
    </div>
</div>
