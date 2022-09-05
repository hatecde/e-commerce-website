<!DOCTYPE html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="css/main-store.css" type="text/css">
  <link rel="stylesheet" href="css/header.css" type="text/css">
  <link rel="stylesheet" href="css/footer.css" type="text/css">
  <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Oswald:400,300" type="text/css">

  <title>contact</title>

</head>

<body>
  <div id="wrapper">
    <?php
    include "./include/header.php"
    ?>
    <div class="main">

      <section class="middle-column">

        <h3 class="fcf-h3">Contact us</h3>

        <form id="fcf-form-id" class="fcf-form-class" method="post" action="send.php">

          <div class="fcf-form-group">
            <label for="Name" class="fcf-label">Your name</label>
            <div class="fcf-input-group">
              <input type="text" id="Name" name="Name" class="fcf-form-control" required>
            </div>
          </div>

          <div class="fcf-form-group">
            <label for="Email" class="fcf-label">Your email address</label> 
            <div class="fcf-input-group">
              <input type="email" id="Email" name="Email" class="fcf-form-control" required>
            </div>
          </div>

          <div class="fcf-form-group">
            <label for="Message" class="fcf-label">Your message</label>
            <div class="fcf-input-group">
              <textarea id="Message" name="Message" class="fcf-form-control" rows="6" maxlength="3000" required></textarea>
            </div>
          </div>

          <div class="fcf-form-group">
            <button type="submit" id="fcf-button" class="fcf-btn-primary">Send Message</button>
          </div>



        </form>
      </section>


    </div>
  </div>
  <?php
  include "./include/footer.php";
  ?>

</body>

</html>