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

$sql_products = "SELECT p.id,p.name,m.name FROM products p LEFT JOIN manufacturers m ON p.manufacturers_id = m.id WHERE p.id = " . $_GET['product'] . ";";   

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
    <link rel="stylesheet" href="css/garanty.css" type="text/css">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Oswald:400,300" type="text/css">
</head>

<body>
    <div id="wrapper">
        <?php
        ?>
        <p>Гарантийный талон № .....
        </p>
        <p> Наименование изделия : <?php
        echo $products[0]['1'];
        ?>
        </p>
        <p> Артикул : <?php
        echo $products[0]['id'];
        ?>
        </p>
        <p> Серийный номер : ....
        </p>
        <p> Производитель : <?php
            echo $products[0]['name'];
        ?>
        </p>
        <p> Название, адрес торгующей организации  :  ........ </p>
        <p> Дата продажи ...  ....  г.</p>
        <p> Печать торгующей организации, подпись продавца ...... </p>
    </div>
</body>