<?php require_once('..\resources\config.php'); ?>
<?php include(TEMPLATE_FRONT . DS . "header.php"); ?>

<?php

process_transaction();

?>

<!-- Page Content -->
<div class="container" style="height: 720px;">
        <h1 class="text-center py-4"> Thank You!</h1>
</div>

<?php include(TEMPLATE_FRONT . DS . "footer.php"); ?>