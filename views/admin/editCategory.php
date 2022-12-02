<div class="center-contenedor-product">
    <div class="contenedor-product">
        <h2 class="login-header">Editar Categoria</h2>
        <?php
        $url = 'action="index.php?controller=Admin&action=postEditCategory"';
        ?>
        <form <?php echo $url ?> class="login" method="POST" enctype="multipart/form-data">
            <p>ID_Categoria: <input type="text" readonly name="id_categoria" value="<?php echo ($category->id_categoria); ?>" /></p>
            <p>Nombre: <input type="text" required="" name="nombre" value="<?php echo ($category->nombre); ?>" /></p>
            <p><input type="submit" value="Aceptar" /></p>
            </a>
        </form>
    </div>
</div>