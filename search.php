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

$sql_products = "SELECT id, name,description,image FROM products WHERE name LIKE '%" . $_GET['q'] . "%'  OR description LIKE '%" . $_GET['q'] . "%' ; ";


$products_obj = $conn->query($sql_products);


while ($row = $products_obj->fetch_array()) {
  $products[] = $row;
}



$conn->close();
?>


<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="css/header.css" type="text/css">
  <link rel="stylesheet" href="css/category.css" type="text/css">
  <!-- <link rel="stylesheet" href="css/header.css" type="text/css"> -->
  <link rel="stylesheet" href="css/footer.css" type="text/css">
  <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Oswald:400,300" type="text/css">
</head>

<body>
  <div id="wrapper">
    <?php
    include "./include/header.php"
    ?>
    <section class="middle-column">

      <div class="images">
        <?php
        if (!empty($products)) {

          foreach ($products as $product) {

            echo '<figure>';
            echo '<a href="/product.php?product=' . $product['id'] . '">';
           echo  '<img src="' . $product['image'] . '" width="250" height="250" alt="">';
            echo '<figcaption>' . $product['name'] . '<span></span></figcaption>';
            echo '</a>';
            echo '</figure>';
          }
        } else {
          echo 'Not found';
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