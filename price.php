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

$sql = "SELECT id,name, price,image FROM products";

$result_obj = $conn->query($sql);


while ($row = $result_obj->fetch_array()) {
    $result[] = $row;
}



$conn->close();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <!-- <link rel="stylesheet" href="css/main-store.css" type="text/css">

    <link rel="stylesheet" href="css/main&category.css" type="text/css"> -->
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

        <div class="main">

            <section class="middle-column">
                

                <div class="images">
                    <?php
                    $con = mysqli_connect("localhost", "root", "12345", "store");

                    if (isset($_GET['start_price']) && isset($_GET['end_price'])) {
                        $startprice = $_GET['start_price'];
                        $endprice = $_GET['end_price'];

                        $query = "SELECT * FROM products WHERE price BETWEEN $startprice AND $endprice ";
                    } else {
                        $query = "SELECT * FROM products";
                    }

                    $query_run = mysqli_query($con, $query);

                    if (mysqli_num_rows($query_run) > 0) {
                        foreach ($query_run as $items) {
                            // 
                    ?>
                            <?php
                            echo '<figure>';
                        echo '<a href="/product.php?product=' . $items['id'] . '">';
                            echo '<img src="' . $items['image'] . '" width="250" height="250" alt="">';
                            echo '<figcaption>';

                            echo $items['name'];

                            echo '<br>';

                            echo '<br>';
                            echo $items['price'];

                            echo '<span></span></figcaption>';
                            echo '</a>';
                            echo '</figure>';
                            ?>
                    <?php
                        }
                    } else {
                        echo "No Record Found";
                    }
                    ?>
                </div>



        </div>
        </section>
    </div>

    </div>
    <?php
    include "./include/footer.php";
    ?>

</body>

</html>