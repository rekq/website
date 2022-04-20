<?php require_once('..\resources\config.php'); ?>

<?php include(TEMPLATE_FRONT . DS . "header.php"); ?>


<main>
    <div class="row" style=" background: radial-gradient(#fff, #6c757d); display: flex; align-items: center; flex-wrap: wrap; justify-content: space-around;">
        <div class="col-3" style="flex-basis: 50%; min-width: 300px;">
            <h1>Lorem Ipsum<br />Lorem Ipsum</h1>
            <p>Lorem Ipsum</p>
            <a href="shop.php" class="btn btn-secondary">Explore Now &#8594;</a> 
            <!-- <img src="\shop\assets\shopping-cart.png"> -->
        </div>
        <div class="col-6" style="flex-basis: 50%; min-width: 300px; ">
            <?php include(TEMPLATE_FRONT . DS . "slider.php"); ?>
        </div>
    </div>

    <div class="container">
        <!-- Products -->
        <h4 class="font-rubik font-size-20" style="margin-top: 20px;">Products</h4>
        <div class="row">
            <?php get_products(); ?>
        </div>
    </div>

</main>

<?php include(TEMPLATE_FRONT . DS . "footer.php"); ?>