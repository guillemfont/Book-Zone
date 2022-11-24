<a href="index.php?controller=Admin&action=closeAdmin">Cerrar Sesion</a>
<section class="tabla">
    <form class="d-flex" action="index.php?controller=Admin&action=postSearchCategory" method="POST">
        <a class="b_menu" href="index.php?controller=Admin&action=addCategory">Añadir categorias</a>
        <input class="buscar-form" type="search" placeholder="Busca el nombre" name="busqueda">
    </form>
    <table class="content-table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Editar</th>
            <th>Estado</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($categoryList as $categoria) : ?>
            <tr>
                <td><?php echo ($categoria->id_categoria); ?></td>
                <td><?php echo ($categoria->nombre); ?></td>
                <td>
                    <a title="Edit"
                       href="index.php?controller=Admin&action=editCategory&id_categoria=<?php echo ($categoria->id_categoria); ?>">
                        <img src="assets/img/img_icons/editar.svg" alt="Editar">
                    </a>
                </td>
                <td>
                    <?php
                    $urlEstado = "index.php?controller=Admin&action=conditionCategory&id_categoria=" . $categoria->id_categoria;
                    if ($categoria->estado == 1) {
                        echo "<a title='Desactivar' href='$urlEstado'><img src='assets/img/img_icons/tick.svg' alt='Activar'></a>";
                    } else {
                        echo "<a title='Activar' href='$urlEstado'><img src='assets/img/img_icons/x.svg' alt='Desactivar'></a>";
                    }
                    ?>

                </td>

            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</section>