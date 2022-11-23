<a href="index.php?controller=Admin&action=closeAdmin">Cerrar Sesion</a>
<section class="tabla">
    <form class="d-flex" action="#" method="GET">
        <a class="b_menu" href="index.php?controller=Admin&action=viewTableCategory">Categorias</a>
        <a class="b_menu" href="index.php?controller=Admin&action=addProduct">Añadir libro</a>
        <input class="buscar-form" type="search" placeholder="Busca el nombre" name="busqueda">
    </form>
    <table class="content-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Foto</th>
                <th>Stock</th>
                <th>ID_Categoria</th>
                <th>Editar</th>
                <th>Desactivar</th>
            </tr>
        </thead>
        <tbody>
            <?php if (isset($productList)) {
                foreach ($productList as $product) : ?>
                <tr>
                    <td><?php echo ($product->id); ?></td>
                    <td><?php echo ($product->nombre); ?></td>
                    <td><?php echo ($product->descripcion); ?></td>
                    <td><?php echo ($product->precio); ?></td>
                    <td><img class="fotoProduct" src="<?php echo ($product->foto); ?>" alt="<?php echo ($product->foto); ?>"></td>
                    <td><?php echo ($product->stock); ?></td>
                    <td><?php echo ($product->id_categoria); ?></td>
                    <td>
                        <a title="Edit"
                            href="index.php?controller=Admin&action=editProduct&id=<?php echo ($product->id); ?>">
                            <img src="assets/img/img_icons/editar.svg" alt="Editar">
                        </a>
                    </td>
                    <td>
                        <?php
                        $urlEstado = "index.php?controller=Admin&action=conditionProduct&id=" . $product->id;
                        if ($product->estado == 1) {
                            echo "<a title='Desactivar' href='$urlEstado'><img src='assets/img/img_icons/tick.svg' alt='Activar'></a>";
                        } else {
                            echo "<a title='Activar' href='$urlEstado'><img src='assets/img/img_icons/x.svg' alt='Desactivar'></a>";
                        }
                        ?>
                        
                    </td>

                </tr>
                <?php endforeach;
            } ?>
        </tbody>
    </table>
</section>