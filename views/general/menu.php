<section class="container">

<?php if (isset($productList)) {
                foreach ($productList as $product) : ?>



    <section class="mainMenu">
        <article class="gallery">
            <div class="galleryImageContainer" style='background-image:url(data:image/jpg;base64,<?php echo base64_encode($product->foto); ?>);'></div>
        </article>
        <article class="details">
            <h2 class="detailsAuthor"><?php echo ($product->autor); ?></h2>
            <h2 class="detailsTitle"><?php echo ($product->nombre); ?></h2>
            <p class="detailsDescription"><?php echo ($product->descripcion); ?></p>
            <div class="detailsPrices">
                <p class="detailsNewPrice">24,99€ <span class="detailsDiscount">-50%</span> </p>
                <p class="detailsBeforePrice">Antes: <span class="detailsBeforeLine">49,99€</span></p>
            </div>
            <div class="detailsQuantity">
                <div class="detailsInput">
                    <i class="fa-solid fa-minus" id="detailsInputMinus"></i>
                    <input type="text" value="0" class="detailsInputNumber">
                    <i class="fa-solid fa-plus" id="detailsInputPlus"></i>
                </div>
                <button class="detailsButton"><i class="fa-solid fa-cart-shopping"></i> Añadir a la cesta</button>
            </div>
        </article>
    </section>
    <div class="modalMoreInfo">
        <div class="xmark">
            <i class="fa-solid fa-circle-xmark" id="closeMoreInfo"></i>
    </div>
    <div class="menuMoreInfo">
            <h2 class="detailsAuthor"><?php echo ($product->autor); ?></h2>
            <h2 class="detailsTitle"><?php echo ($product->nombre); ?></h2>
            <article class="gallery">
                <div class="galleryImageContainerMoreInfo" style='background-image:url(data:image/jpg;base64,<?php echo base64_encode($product->foto); ?>);'></div>
            </article>
            <article class="details">
            <h2 class="detailsAuthor">Categoría</h2>
                <p class="detailsDescriptionInfo"><?php echo ($product->descripcion); ?></p>
                <p class="classStock">En stock.</p>
            </article>
        </div>
    </div>




    <?php endforeach;
            } ?>
</section>