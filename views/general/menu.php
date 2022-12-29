<section class="container">

<?php if (isset($productList)) {
                foreach ($productList as $product) : 
                ?>



    <section class="mainMenu">
    <iframe onload="desplegarImagen(<?php echo ($product->id);?>)" style="display: none"></iframe>
        <article class="gallery">
            <div class="galleryImageContainer<?php echo ($product->id); ?> galleryImageContainer" style='background-image:url(data:image/jpg;base64,<?php echo base64_encode($product->foto); ?>);'></div>
        </article>
        <article class="details">
            <h2 class="detailsAuthor"><?php echo ($product->autor); ?></h2>
            <h2 class="detailsTitle"><?php echo ($product->nombre); ?></h2>
            <p class="detailsDescription"><?php echo ($product->descripcion); ?></p>
            <div class="detailsPrices">
            <?php
                if ($product->precioAnterior != null){
                ?>
                <p class="detailsNewPrice"><?php echo ($product->precio);?>€<span class="detailsDiscount">-<?php echo (round($product->precio / $product->precioAnterior, 2) * 100);?>%</span> </p>
                <p class="detailsBeforePrice">Antes: <span class="detailsBeforeLine"><?php echo ($product->precioAnterior);?>€</span></p>
            <?php
                } else {
            ?>
                    <p class="detailsNewPrice"><?php echo ($product->precio);?>€</p>
            <?php
                }
            ?>
                </div>
            <iframe onload="anadirCarrito(<?php echo ($product->id);?>)" style="display: none"></iframe>
            <div class="detailsQuantity">
                <div class="detailsInput">
                    <i class="fa-solid fa-minus detailsInputMinus" id="detailsInputMinus<?php echo ($product->id);?>"></i>
                    <input type="text" value="0" class="detailsInputNumber<?php echo ($product->id);?> detailsInputNumber">
                    <i class="fa-solid fa-plus detailsInputPlus" id="detailsInputPlus<?php echo ($product->id);?>"></i>
                </div>
                <?php
                    if($product->stock > 0){
                      echo '<button class="detailsButton'.$product->id.' detailsButton"><i class="fa-solid fa-cart-shopping"></i> Añadir a la cesta</button>';
                    }else {
                        echo '<button class="detailsButtonDisabled">No hay unidades</button>';
                    }
                ?>
            </div>
        </article>
    </section>
    <div class="modalMoreInfo<?php echo ($product->id); ?> modalMoreInfo">
        <div class="xmark<?php echo ($product->id); ?> xmark">
            <i class="fa-solid fa-circle-xmark" id="closeMoreInfo"></i>
    </div>
    <div class="menuMoreInfo">
            <h2 class="detailsAuthor"><?php echo ($product->autor); ?></h2>
            <h2 class="detailsTitle"><?php echo ($product->nombre); ?></h2>
            <article class="gallery">
                <div class="galleryImageContainerMoreInfo" style='background-image:url(data:image/jpg;base64,<?php echo base64_encode($product->foto); ?>);'></div>
            </article>
            <article class="details">
            <h2 class="detailsAuthor"><?php echo ($product->id_categoria); ?></h2>
                <p class="detailsDescriptionInfo"><?php echo ($product->descripcion); ?></p>
                <?php 
                    if ($product->stock > 10){
                        echo '<p class="classStock">En stock.</p>';
                    }
                    else if ($product->stock < 5 && $product->stock > 0){
                        echo '<p class="classStock">Últimas unidades.</p>';
                    }
                    else {
                        echo '<p class="classStock">No disponible.</p>';
                    }

                ?>
            </article>
        </div>
    </div>




    <?php endforeach;
            } ?>
</section>