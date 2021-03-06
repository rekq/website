<?php

$upload_directory = "uploads";

// helper functions 

function last_id()
{
    global $connection;
    return mysqli_insert_id($connection);
}

function set_message($msg)
{
    if (!empty($msg)) {
        $_SESSION['message'] = $msg;
    } else {
        $msg = "";
    }
}

function display_message()
{
    if (isset($_SESSION['message'])) {
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }
}

function redirect($location)
{
    header("Location: $location ");
}

function query($sql)
{
    global $connection;
    return mysqli_query($connection, $sql);
}

function confirm($result)
{
    global $connection;
    if (!$result) {
        die("QUERY FAILED " . mysqli_error($connection));
    }
}

function escape_string($string)
{
    global $connection;
    return mysqli_real_escape_string($connection, $string);
}

function fetch_array($result)
{
    return mysqli_fetch_array($result);
}

/********** front-end functions **********/

// get products

function get_products()
{
    $query = query("SELECT * FROM products");
    confirm($query);

    while ($row = fetch_array($query)) {

        $product_image = display_image($row['product_image']);
        $product = <<<DELIMETER
        
        <div class="col-3 py-4">
            <div class="img-thumbnail"> <!-- thumbnail -->
                <a href="item.php?id={$row['product_id']}"><img src="../resources/{$product_image}" alt="" class="img-fluid"></a>
                <div class="figure-caption"> <!-- caption -->
                    <h4 class="pull-right">&#36;{$row['product_price']}</h4>
                    <h4><a href="item.php?id={$row['product_id']}">{$row['product_title']}</a></h4>
                    <p>Online store item</p>
                </div>
                <a class="btn btn-primary" target="_blank" href="../resources/cart.php?add={$row['product_id']}">Add to cart</a>
            </div>
        </div>
        
        DELIMETER;
        echo $product;
    }
}

function get_categories()
{

    $query = query("SELECT * FROM categories");
    confirm($query);

    while ($row = fetch_array($query)) {
        $categories_links = <<<DELIMETER
        <a href='category.php?id={$row['cat_id']}' class='dropdown-item'>{$row['cat_title']}</a>
        DELIMETER;

        echo $categories_links;
    }
}

function get_products_in_cat_page()
{
    $query = query("SELECT * FROM products WHERE product_category_id =" . escape_string($_GET['id']) . " ");
    confirm($query);

    while ($row = fetch_array($query)) {
        $product_image = display_image($row['product_image']);
        $product = <<<DELIMETER

        <div class="col-md-3 col-sm-6 hero-feature">
            <div class="img-thumbnail">
            <a href="item.php?id={$row['product_id']}"><img src="../resources/{$product_image}" alt="" class="img-fluid"></a>
                <div class="figure-caption">
                    <h3><a href="item.php?id={$row['product_id']}">{$row['product_title']}</a></h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    <p>
                        <a href="../resources/cart.php?add={$row['product_id']}" class="btn btn-primary">Add To Cart</a> <a href="item.php?id={$row['product_id']}" class="btn btn-secondary">More Info</a>
                    </p>
                </div>
            </div>
        </div>
        
        DELIMETER;
        echo $product;
    }
}

function get_products_in_shop_page()
{
    $query = query("SELECT * FROM products");
    confirm($query);

    while ($row = fetch_array($query)) {

        $product_image = display_image($row['product_image']);
        $product = <<<DELIMETER

        <div class="col-md-3 col-sm-6 hero-feature">
            <div class="img-thumbnail">
            <a href="item.php?id={$row['product_id']}"><img src="../resources/{$product_image}" alt="" class="img-fluid"></a>
                <div class="figure-caption">
                    <h3><a href="item.php?id={$row['product_id']}">{$row['product_title']}</a></h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    <p>
                        <a href="../resources/cart.php?add={$row['product_id']}" class="btn btn-primary">Add To Cart</a> <a href="item.php?id={$row['product_id']}" class="btn btn-secondary">More Info</a>
                    </p>
                </div>
            </div>
        </div>
        
        DELIMETER;
        echo $product;
    }
}

function login_user()
{
    if (isset($_POST['submit'])) {
        $username = escape_string($_POST['username']);
        $password = escape_string($_POST['password']);

        $query = query("SELECT * FROM users WHERE username = '{$username}' AND password = '{$password}'");
        confirm($query);

        if (mysqli_num_rows($query) == 0) {
            set_message("Wrong Password or Username!");
            redirect("login.php");
        } else {
            $_SESSION['username'] = $username;
            //set_message("Welcome to Admin {$username}");
            redirect("admin");
        }
    }
}

function send_message()
{
    if (isset($_POST['submit'])) {

        $to = 'user@example.com';
        $from_name = $_POST['name'];
        $subject = $_POST['subject'];
        $email = $_POST['email'];
        $message = $_POST['message'];

        $headers = "From: {$from_name} {$email}";

        $result = mail($to, $subject, $message, $headers);
        if (!$result) {
            set_message("Sorry we could not send your message!");
            redirect("contact.php");
        } else {
            set_message("Your Message has been sent!");
            redirect("contact.php");
        }
    }
}

/********** back-end functions **********/

function display_orders()
{
    $query = query("SELECT * FROM orders");
    confirm($query);

    while ($row = fetch_array($query)) {
        $orders = <<<DELIMETER

        <tr>
            <td>{$row['order_id']}</td>
            <td>{$row['order_amount']}</td>
            <td>{$row['order_transaction']}</td>
            <td>{$row['order_currency']}</td>
            <td>{$row['order_status']}</td>
            <td><a class="btn btn-danger" href="../../resources/templates/back/delete_order.php?id={$row['order_id']}">Delete</a></td>
        </tr>
        
        DELIMETER;

        echo $orders;
    }
}

/********** admin products **********/

function display_image($picture)
{
    global $upload_directory;
    return $upload_directory . DS . $picture;
}

function get_products_in_admin()
{

    $query = query("SELECT * FROM products");
    confirm($query);

    while ($row = fetch_array($query)) {

        $category = show_product_category_title($row['product_category_id']);

        $product_image = display_image($row['product_image']);

        $product = <<<DELIMETER
        <tr>
            <td>{$row['product_id']}</td>
            <td>{$row['product_title']}<br>
            <a href="index.php?edit_product&id={$row['product_id']}"><img width='100' src="../../resources/{$product_image}" alt=""></a>
            </td>
            <td>{$category}</td>
            <td>{$row['product_price']}</td>
            <td>{$row['product_quantity']}</td>
            <td><a class="btn btn-danger" href="../../resources/templates/back/delete_product.php?id={$row['product_id']}">Delete</a>
            <a class="btn btn-primary" href="index.php?edit_product&id={$row['product_id']}">Edit</a>
            </td>
        </tr>
        DELIMETER;
        echo $product;
    }
}

function show_product_category_title($product_category_id)
{
    $category_query = query("SELECT * FROM categories WHERE cat_id = '{$product_category_id}'");
    confirm($category_query);

    while ($category_row = fetch_array($category_query)) {
        return $category_row['cat_title'];
    }
}

/********** add products in admin **********/

function add_product()
{
    if (isset($_POST['publish'])) {

        $product_title = escape_string($_POST['product_title']);
        $product_category_id = escape_string($_POST['product_category_id']);
        $product_price = escape_string($_POST['product_price']);
        $product_description = escape_string($_POST['product_description']);
        $short_desc = escape_string($_POST['short_desc']);
        $product_quantity = escape_string($_POST['product_quantity']);

        $product_image = escape_string($_FILES['file']['name']);
        $image_temp_location = escape_string($_FILES['file']['tmp_name']);

        move_uploaded_file($image_temp_location, UPLOAD_DIRECTORY . DS . $product_image);

        $query = query("INSERT INTO products(product_title, product_category_id, product_price, product_description, short_desc, product_quantity, product_image) 
        VALUES ('{$product_title}', '{$product_category_id}', '{$product_price}', '{$product_description}', '{$short_desc}', '{$product_quantity}', '{$product_image}')");
        $last_id = last_id();
        confirm($query);
        //set_message("New product with id {$last_id} was added");
        redirect("index.php?products");
    }
}

function show_categories_add_product()
{

    $query = query("SELECT * FROM categories");
    confirm($query);

    while ($row = fetch_array($query)) {
        $categories_options = <<<DELIMETER
        <option value="{$row['cat_id']}">{$row['cat_title']}</option>
        DELIMETER;

        echo $categories_options;
    }
}

/********** edit in admin **********/

function update_product()
{
    if (isset($_POST['update'])) {

        $product_title = escape_string($_POST['product_title']);
        $product_category_id = escape_string($_POST['product_category_id']);
        $product_price = escape_string($_POST['product_price']);
        $product_description = escape_string($_POST['product_description']);
        $short_desc = escape_string($_POST['short_desc']);
        $product_quantity = escape_string($_POST['product_quantity']);

        $product_image = escape_string($_FILES['file']['name']);
        $image_temp_location = escape_string($_FILES['file']['tmp_name']);

        if (empty($product_image)) {
            $get_pic = query("SELECT product_image FROM products WHERE product_id=" . escape_string($_GET['id']) . " ");
            confirm($get_pic);

            while ($pic = fetch_array($get_pic)) {
                $product_image = $pic['product_image'];
            }
        }

        move_uploaded_file($image_temp_location, UPLOAD_DIRECTORY . DS . $product_image);

        $query = "UPDATE products SET ";
        $query .= "product_title = '{$product_title}', ";
        $query .= "product_category_id = '{$product_category_id}', ";
        $query .= "product_price = '{$product_price}', ";
        $query .= "product_description = '{$product_description}', ";
        $query .= "short_desc = '{$short_desc}', ";
        $query .= "product_quantity = '{$product_quantity}', ";
        $query .= "product_image = '{$product_image}' ";
        $query .= "WHERE product_id=" . escape_string($_GET['id']);

        $send_update_query = query($query);
        confirm($send_update_query);
        //set_message("New product with id {$last_id} was added");
        redirect("index.php?products");
    }
}

/********** categories in admin **********/

function show_categories_in_admin()
{
    $category_query = query("SELECT * FROM categories");
    confirm($category_query);

    while ($row = fetch_array($category_query)) {

        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];

        $category = <<<DELIMETER
            <tr>
                <td>{$cat_id}</td>
                <td>{$cat_title}</td>
                <td><a class="btn btn-danger" href="../../resources/templates/back/delete_category.php?id={$row['cat_id']}">Delete</a></td>
            </tr>
        DELIMETER;

        echo $category;
    }
}

function add_category()
{
    if (isset($_POST['add_category'])) {
        $cat_title = escape_string($_POST['cat_title']);

        if (empty($cat_title) || $cat_title = " ") {
            echo "<p class='text-danger'>This cannot be empty!</p>";
        } else {
            $insert_cat = query("INSERT INTO categories (cat_title) VALUES ('{$cat_title}') ");
            confirm($insert_cat);
            redirect("index.php?categories"); //remove to display message
        }
    }
}

/********** users in admin **********/

function display_users()
{
    $users_query = query("SELECT * FROM users");
    confirm($users_query);

    while ($row = fetch_array($users_query)) {

        $user_id = $row['user_id'];
        $username = $row['username'];
        $email = $row['email'];
        $password = $row['password'];

        $user = <<<DELIMETER
            <tr>
                <td>{$user_id}</td>
                <td>{$username}</td>
                <td>{$email}</td>
                <td><a class="btn btn-danger" href="../../resources/templates/back/delete_user.php?id={$row['user_id']}">Delete</a></td>
            </tr>
        DELIMETER;

        echo $user;
    }
}

function add_user()
{
    if (isset($_POST['add_user'])) {
        $username = escape_string($_POST['username']);
        $email = escape_string($_POST['email']);
        $password = escape_string($_POST['password']);
        //$user_photo = escape_string($_FILES['file']['name']); 
        //$photo_temp = escape_string($_FILES['file']['tmp_name']); 

        //move_uploaded_file($photo_temp, UPLOAD_DIRECTORY . DS . $user_photo);

        $query = query("INSERT INTO users (username, email, password) VALUES ('{$username}', '{$email}', '{$password}')");
        confirm($query);
        redirect("index.php?users");
    }
}

/********** reports in admin **********/

function get_reports()
{

    $query = query("SELECT * FROM reports");
    confirm($query);

    while ($row = fetch_array($query)) {



        $report = <<<DELIMETER
        <tr>
            <td>{$row['report_id']}</td>
            <td>{$row['product_id']}</td>
            <td>{$row['order_id']}</td>
            <td>{$row['product_price']}</td>
            <td>{$row['product_title']}</td>
            <td>{$row['product_quantity']}</td>
            <td><a class="btn btn-danger" href="../../resources/templates/back/delete_report.php?id={$row['report_id']}">Delete</a>
            </td>
        </tr>
        DELIMETER;
        echo $report;
    }
}
