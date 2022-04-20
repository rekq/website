<?php require_once('..\resources\config.php'); ?>

<?php include(TEMPLATE_FRONT . DS . "header.php"); ?>

    <!-- Page Content -->
    <div class="container">

        <!-- Header -->
        <header>
            <h1>Shop</h1>
        </header>

        <hr>

        <!-- Page Features -->
        <div class="row text-center" style="margin: 20px;">
            <?php get_products_in_shop_page(); ?>
        </div>

    </div>

<?php include(TEMPLATE_FRONT . DS . "footer.php"); ?>