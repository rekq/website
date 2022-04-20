<?php require_once('..\resources\config.php'); ?>
<?php include(TEMPLATE_FRONT . DS . "header.php"); ?>

<?php
//$_SESSION['product_1'] = 1
?>

<!-- Page Content -->
<div class="container">

    <!-- /.row -->

    <div class="row">
        <div class="col-12">
            <h4 class="text-danger"><?php display_message(); ?></h4>
            <h1>Checkout</h1>

            <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
                <input type="hidden" name="cmd" value="_cart">
                <input type="hidden" name="business" value="business@codingpatryk.com">
                <input type="hidden" name="currency_code" value="USD">
                <input type="hidden" name="upload" value="1">

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th></th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Sub-total</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php cart(); ?>
                    </tbody>
                </table>
                <?php echo show_paypal(); ?>
            </form>
        </div>


        <!--  ***********CART TOTALS*************-->

        <div class="col-auto ml-auto m-4">
            <h2>Cart Totals</h2>

            <table class="table table-bordered" cellspacing="0">

                <tr class="cart-subtotal">
                    <th>Items:</th>
                    <td><span class="amount">
                            <?php echo isset($_SESSION['item_quantity']) ? $_SESSION['item_quantity'] : $_SESSION['item_quantity'] = "0"; ?>
                        </span></td>
                </tr>
                <tr class="shipping">
                    <th>Shipping</th>
                    <td>Free Shipping</td>
                </tr>

                <tr class="order-total">
                    <th>Order Total</th>
                    <td>
                        <strong>
                            <span class="amount">&#36;
                                <?php echo isset($_SESSION['item_total']) ? $_SESSION['item_total'] : $_SESSION['item_total'] = "0"; ?>
                            </span>
                        </strong>
                    </td>
                </tr>
                </tbody>
            </table>
            <?php echo show_paypal(); ?>
        </div><!-- CART TOTALS-->
    </div>
    <!--Main Content-->
</div>

<?php include(TEMPLATE_FRONT . DS . "footer.php"); ?>