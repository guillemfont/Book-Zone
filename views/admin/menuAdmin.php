
<a href="index.php?controller=Admin&action=closeAdmin">Cerrar Sesion</a>
<section class="tabla"><form class="d-flex" action="#" method="GET">
        <a class="b_menu" href="index.php?controller=Admin&action=addProduct">Añadir libro</a>
        <input class="buscar-form" type="search" placeholder="Busca el nombre" name="busqueda">
    </form>
    <table class = "content-table">
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
<?php foreach ($productList as $product): ?>
    <tr>
        <td><?php echo($product->id); ?></td>
        <td><?php echo($product->nombre); ?></td>
        <td><?php echo($product->descripcion); ?></td>
        <td><?php echo($product->precio); ?></td>
        <td><?php echo($product->foto); ?></td>
        <td><?php echo($product->stock); ?></td>
        <td><?php echo($product->id_categoria); ?></td>
        <td><a href=""></a><img src="assets/img_icons/editar.svg" alt="Editar"></td>
    </tr>
<?php endforeach; ?>
        </tbody>
    </table>
</section>