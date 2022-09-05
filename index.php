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

$sql = "SELECT id,name,image FROM categories";

$result_obj = $conn->query($sql);


while ($row = $result_obj->fetch_array()) {
  $result[] = $row;
}

// print_r($result); 

$conn->close();
?>


<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="css/main-store.css" type="text/css">
  <link rel="stylesheet" href="css/main_category.css" type="text/css">
  <link rel="stylesheet" href="css/header.css" type="text/css">
  <link rel="stylesheet" href="css/footer.css" type="text/css">

  <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Oswald:400,300" type="text/css">
</head>

<body>
  <div id="wrapper">
    <?php
    include "./include/header.php"
    ?>

    <div class="main">

      <section class="middle-column">

        <div class="images">
          <?php
          foreach ($result as $category) {
            echo '<figure>';
            echo '<a href="/category.php?category=' . $category['id'] . '">';
            echo '<img src="' . $category['image'] . '" width="250" height="250" alt="">';
            echo '<figcaption>' . $category['name'] . '<span></span></figcaption>';
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