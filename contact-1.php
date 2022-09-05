<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/main-store.css" type="text/css">
    <link rel="stylesheet" href="css/header.css" type="text/css">
    <link rel="stylesheet" href="css/footer.css" type="text/css">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Oswald:400,300" type="text/css">

    <title>Contact</title>
</head>
<body>
    <div id="wrapper">
        <?php
        include "./include/header.php"
        ?>
        <div class="main">
            <section class="middle-column">
                <!-- <form action="send.php" method="POST">
                    <div class="col-1">
                        <input type="text" name="name" placeholder="Full name">
                        <input type="text" name="email" placeholder="E-mail">
                        <input type="text" name="subject" placeholder="Subject">
                    </div>
                    <textarea name="message" placeholder="Enter message"></textarea>
                    <button type="submit" name="submit">SEND E-MAIL</button>
                </form> -->
                <form action="send.php" method="POST">
                <label for="fname">First name:</label><br>
                <input type="text"  name="name" value="John"><br>
                <label for="email"> Email:</label><br>
                <input type="text" name="email"><br>
                <label for="email"> Subject:</label><br>
                <input type="text" name="subject" class ="subject-message">
                <br>
                <textarea name="message" placeholder="Enter message"></textarea>
                <br>
                <br>
                <input type="submit" value="Submit">
                <!-- <input type="reset"> -->
                </form> 
            </section>                                                                                                                      
        </div>
    </div>
    <?php
    include "./include/footer.php";
    ?>
</body>

</html>