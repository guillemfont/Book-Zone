<?php
echo'
<ul>

    <li> <a href= "index.php?log=true&controller=Admin&action=loginAdmin" >Login Admin </a></li>
    <li> <a href= "index.php?log=true&controller=Client&action=loginClient" >Login Cliente </a></li>

</ul>
<a href="index.php?controller=Admin&action=closeAdmin">Cerrar Sesion</a>
<section class="mainMenu">';
    

if (isset($productList)){
    foreach ($productList as $product) : ?>
    <div class="product-component__container">
    <div class="product-component__content">
        <p class="product-component__text"><?php echo ($product->nombre); ?></p>
        <div class="product-component__img-container">
        hpña
            <img class="product-component__img" src="data:image/jpg;base64,<?php echo base64_encode($product->foto); ?>"/>
        </div>
        <p class="product-component__text"><?php echo ($product->precio); ?>€</p>
    </div>
    </div>
    
    
    
    

    
    
    
    <?php     
    endforeach;
}    
    ?>
</section>