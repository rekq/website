<?php require_once('..\resources\config.php'); ?>

<?php include(TEMPLATE_FRONT . DS . "header.php"); ?>

<!-- Page Content -->
<main>
    <div class="container" style="height: 560px; margin-top: 100px;">

        <header">


            <div class="col-12 col-lg-4 offset-lg-4 text-center">
                <!-- d-flex justify-content-center mb-4 mt-4  col-12 col-lg-4 offset-lg-4-->
                <h1>Login</h1>
                <h6 class="text-danger"><?php display_message(); ?></h6>
                <form class="" action="" method="post" enctype="multipart/form-data">

                    <?php login_user(); ?>

                    <div class="form-group"><label for="">
                            Username<input type="text" name="username" class="form-control"></label>
                    </div>
                    <div class="form-group"><label for="password">
                            Password<input type="password" name="password" class="form-control"></label>
                    </div>

                    <div class="form-group">
                        <input type="submit" name="submit" class="btn btn-primary" value="Log In">
                        <input type="submit" name="submit" class="btn btn-secondary" value="Sing Up">
                    </div>
                </form>
            </div>
    </div>


    </header>


    </div>

    </div>
    <!-- /.container -->

    <div class="container">
</main>

<?php include(TEMPLATE_FRONT . DS . "footer.php"); ?>