
<?php
if(isset($_POST['submit'])) {
    $name = trim($_POST['name']);
    $email= trim($_POST['email']);
    $subject = trim($_POST['subject']);
    $message = trim($_POST['message']);

    $myMail = "Alexandermaslov7@gmail.com";
    $header = "From"."\n".$email;
    $message2 = "You have recieved a message from :" . "\n". $name.".\n\n". $message;
    mail($myMail,$subject,$message2,$header);
    header("Location:contact-1.php?mailsend");
}
// $receiver = "nightwhk@gmail.com";
// $subject = "Email Test via PHP using Localhost";
// $body = "Hi, there...This is a test email send from Localhost.";
// $sender = "Alexandermaslov7@gmail.com";
// if(mail($receiver, $subject, $body, $sender)){
//     echo "Email sent successfully to $receiver";
// }else{
//     echo "Sorry, failed while sending mail!";
// }


?>
