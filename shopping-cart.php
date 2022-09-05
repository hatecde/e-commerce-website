<?php
$servername = "localhost";
$username = "root";
$password = "12345";
$dbname = "store";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql_categories = "SELECT id, name FROM categories; ";
$categories_obj = $conn->query($sql_categories);

while ($row = $categories_obj->fetch_array()) {
  $categories[] = $row;
}





if (isset($_POST['action'])) {
  if ($_POST['action'] == 'add-to-cart') {

    $sql_add_to_cart = "INSERT INTO `store`.`shoping_cart` (`count`, `products_id`) VALUES ('" . $_POST['count'] . "', '" . $_POST['product'] . "');";
    $result_obj_add_to_cart = $conn->query($sql_add_to_cart);

    $sql_product = 'SELECT p.id, p.name, p.price, p.description, p.image, p.categories_id  FROM products p WHERE id=' . $_POST['product'] . ';';

    $result_obj_product = $conn->query($sql_product);
    while ($row = $result_obj_product->fetch_array()) {
      $product[] = $row;
    }
  } elseif ($_POST['action'] == 'remove-from-cart') {
    $sql_remove_from_cart = "DELETE FROM shoping_cart WHERE products_id = " . $_POST['product'];

    $result_remove_from_cart = $conn->query($sql_remove_from_cart);
  }
}

$sql_shopping_cart = "SELECT s.count, p.name, p.description,p.image,p.id FROM shoping_cart s LEFT JOIN products p ON s.products_id = p.id";
$shopping_cart_obj = $conn->query($sql_shopping_cart);
while ($row = $shopping_cart_obj->fetch_array()) {
  $shopping_cart[] = $row;
  
}




$conn->close();
?>


<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="css/category.css" type="text/css">
  <link rel="stylesheet" href="css/header.css" type="text/css">
  <link rel="stylesheet" href="css/footer.css" type="text/css">
  <link rel="stylesheet" href="css/category_product.css" type="text/css">
  <link rel="stylesheet" href="css/main_category.css" type="text/css">
  <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Oswald:400,300" type="text/css">
</head>

<body>
  <div id="wrapper">
    <?php
    include "./include/header.php"
    ?>


    <div class="main">
      <aside class="left-column">
        <nav>
          <ul class="aside-menu">
            <h2>Categories</h2>
            <?php

            foreach ($categories as $category) {
              echo '<li  >';
              echo '<a href="/category.php?category=' . $category['id'] . '">' . $category['name'] . '</a>';
              echo '</li>';
            }

            ?>
          </ul>


        </nav>
        <br>

        &nbsp; &nbsp; &nbsp;
        <!-- <br><br> -->

        <br><br>

        <br>
      </aside>
      <section class="middle-column">


        <div class="images">
          <?php
          if (!empty($shopping_cart)) {
            foreach ($shopping_cart as $shopping_carts) {
              echo '<figure>';
              echo '<a href="/product.php?product=' . $shopping_carts['id'] . '">';
              echo '<img src="' . $shopping_carts['image'] . '" width="250" height="250" alt="">';
              echo '<figcaption>' . $shopping_carts['name'] . '<br>' . $shopping_carts['count'] . '<span></span></figcaption>';
              echo '</a>';
              echo '</figure>';
            }
          } else echo 'Shopping cart is empty';

          ?>
        </div>
      </section>

    </div>


  </div>
  <?php
  include "./include/footer.php";
  ?>
</body>

</html>