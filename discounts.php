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

$sql = "SELECT id,name,old_price,price,image FROM products WHERE old_price > price; ";

$products_obj = $conn->query($sql);


while ($row = $products_obj->fetch_array()) {
    $products[] = $row;
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

                foreach ($products as $product) {
                    // print_r($product);
                    echo '<figure>';
                    echo '<a href="/product.php?product=' . $product['id'] . '">';
                    echo '<img src="' . $product['image'] . '" width="250" height="250" alt="">';
                    echo '<figcaption>';

                    echo $product['name'];

                    echo '<br>';

                    echo '<s>' . $product['old_price'] . '</s>';
                    echo '<br>';
                    echo $product['price'];

                    echo  '<span></span></figcaption>';
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