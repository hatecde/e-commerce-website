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

$sql = "SELECT p.id, p.name, p.price, p.description, p.image, p.categories_id, m.name AS manufacturer_name FROM products p LEFT JOIN manufacturers m ON p.manufacturers_id = m.id WHERE p.id = " . $_GET['product'] . ";";


$result_obj = $conn->query($sql);

while ($row = $result_obj->fetch_array()) {
  $result[] = $row;
}


$sql_categories = "SELECT id,name FROM categories; ";

$categories_obj = $conn->query($sql_categories);

while ($row = $categories_obj->fetch_array()) {
  $categories[] = $row;
}


$conn->close();
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <title>PCStore</title>
  <link rel="stylesheet" href="css/certaint-vs.css" type="text/css" />
  <link rel="stylesheet" href="css/header.css" type="text/css">
  <link rel="stylesheet" href="css/footer.css" type="text/css">
  <link rel="stylesheet" href="css/category_product.css" type="text/css">
  <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Oswald:400,300" type="text/css" />
</head>

<body>
  <div id="wrapper">
    <?php
    include "./include/header.php"
    ?>
    <!-- Main -->
    <div class="main">
      <aside class="left-column">

        <nav>
          <ul class="aside-menu">
            <?php
            foreach ($categories as $category) {
              echo '<li ';

              if ($result[0]['categories_id'] == $category['id']) {
                echo 'class="active"';
              }

              echo  ' >';
              echo '<a href="/category.php?category=' . $category['id'] . '">' . $category['name'] . '</a>';
              echo '</li>';
            }
            ?>


          </ul>


        </nav>
      </aside>

      <div class="middle-column">


        <img class="active" src="<?php
        echo $result[0]['image'];
        ?>" alt="" />

      </div>

      <div class="right-column">
        <!-- Product Description -->
        <div class="product-description">
          <!-- <span>Videocard</span> -->

          <h1><?php
              // echo $result[0]['name'];
              // echo $_GET['product'];
              echo $result[0]['name'];

              // echo $result[0]['description'];
              ?>
          </h1>
          <p>
            <?php
            echo $result[0]['description'];

            ?>
          </p>
        </div>

        <!-- Product Configuration -->
        <div class="product-configuration">


          <!-- Product Pricing -->
          <div class="product-price">
            <span>Price:
              <?php
              echo $result[0]['price'];
              ?>$</span>
          </div>
          <br>

          <div>
            <form action="/shopping-cart.php" method="POST">
              <input type="hidden" name="product" value="<?php echo $_GET['product'] ?>">
              <input type="hidden" name="action" value="add-to-cart">
              <input type="number" name="count" value="1">
              <br>
              <br>
              <button type="submit" class="shopping-cart-action">Add to Cart</button>
              
            </form>
            <form action="/shopping-cart.php" method="POST">
              <input type="hidden" name="product" value="<?php echo $_GET['product'] ?>">
              <input type="hidden" name="action" value="remove-from-cart">
              <button type="submit" class="shopping-cart-action">Remove from Cart</button>
            </form>
            <br>
          </div>
          <!-- <div class="garanty">
            <a href="garanty.php?product=<?php echo $result[0]['id']; ?>" class="cart-btn"> Warranty card </a>

          </div> -->
        </div>
      </div>
      <!-- /Main -->
    </div>
  </div>

  <?php
  include "./include/footer.php";
  ?>



</body>

</html>