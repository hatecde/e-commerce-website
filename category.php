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

$sql_products = "SELECT id, name,image FROM products WHERE categories_id = " . $_GET['category'];

if (isset($_GET['manufacturer'])) {
  $sql_products .= ' AND manufacturers_id=' . $_GET['manufacturer'];
}

$sql_products .= ';';

$sql_categories = "SELECT id,name FROM categories; ";

$sql_manufacturers = "SELECT COUNT(*) AS manufacturer_count, m.name AS manufacturer_name, m.id FROM products p LEFT JOIN manufacturers m ON p.manufacturers_id = m.id WHERE p.categories_id= " . $_GET['category'] . " GROUP BY p.manufacturers_id";
$products_obj = $conn->query($sql_products);

$categories_obj = $conn->query($sql_categories);
$manufacturers_obj = $conn->query($sql_manufacturers);

while ($row = $products_obj->fetch_array()) {
  $products[] = $row;
}
while ($row = $categories_obj->fetch_array()) {
  $categories[] = $row;
}
while ($row = $manufacturers_obj->fetch_array()) {
  $manufacturers[] = $row;
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
              echo '<li ';

              if ($_GET['category'] == $category['id']) {
                echo 'class="active"';
              }
              echo  ' >';
              echo '<a href="/category.php?category=' . $category['id'] . '">' . $category['name'] . '</a>';
              echo '</li>';
            }

            ?>
          </ul>

          <br><br>
          <h2>Manufacturers</h2>

          <ul class="aside-menu">

            <?php
            foreach ($manufacturers as $manufacturer) {
              echo '<li ';
              if (isset($_GET['manufacturer'])) {
                if ($_GET['manufacturer'] == $manufacturer['id']) {
                  echo 'class="active"';
                }
              }
              echo  ' >';
              echo '<a href="/category.php?category=' . $_GET['category'] . '&manufacturer=' . $manufacturer['id'] . '">' . $manufacturer['manufacturer_name'] . '</a>';
              echo '</li>';
            }
            ?>
          </ul>
            <br>
                <h2>Filters by price</h2>

          <div class="aside-menu"> 
            <form action="/price.php" method="GET">
            <div class="row">
                <div class="label-1">
                  <label for="">Start price</label>
                  <input type="text" name="start_price"  class ="aside-text"value="<?php if(isset($_GET['start_price'])){echo $_GET['start_price']; }else{echo "100";} ?>" class="form-control">
                </div>
                <div class="label-2">
                  <label for="">End price</label>
                  <input type="text"  class ="aside-text" name="end_price" value="<?php if(isset($_GET['end_price'])){echo $_GET['end_price']; }else{echo "900";} ?>" class="form-control">
                </div>
                 <button type="submit" class="btn-search">Search</button>
                
            </div>
            </form>
          </div>

         

        </nav>
        <br>
        &nbsp; &nbsp; &nbsp;
      </aside>

      <section class="middle-column">
        <div class="images">
          <?php
          foreach ($products as $product) {
            echo '<figure>';
            echo '<a href="/product.php?product=' . $product['id'] . '">';
            echo '<img src="' . $product['image'] . '" width="250" height="250" alt="">';
            echo '<figcaption>' . $product['name'] . '<span></span></figcaption>';
            echo '</a>';
            echo '</figure>';
          }
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
