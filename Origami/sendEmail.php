<!DOCTYPE html>

<head>
<link REL="Icon" href="icon.ico"> 
<title> Origami </title>
<meta name= "viewport" content="width=device-width, initial-scale=1.0">
<meta charset="utf-8">
<link rel="stylesheet" href="css.css">
</head>
<style>
</style>
<body>
<div class ="container">
<?php
use PHPMailer\PHPMailer\PHPMailer;

if (isset($_POST["name"]) && isset($_POST["email"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $body = $_POST["body"];

    require_once "PHPMailer/PHPMailer.php";
    require_once "PHPMailer/SMTP.php";
    require_once "PHPMailer/Exception.php";

    $mail = new PHPMailer();

    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->Username = "PHPKERSLO@gmail.com";
    $mail->Password = "phpslo123";
    $mail->Port = 465;
    $mail->SMTPSecure = "ssl";

    $mail->isHTML(true);
    $mail->setFrom($email, $name);
    $mail->addAddress("PHPKERSLO@gmail.com");
    $mail->Subject = "$email ($subject)";
    $mail->Body = $body;

    if ($mail->send()) {
        $status = "success";
        $response = "Email is sent!";
        echo "$response";
    } else {
        $status = "failed";
        $response = "Something is wrong: <br>" . $mail->ErrorInfo;
        echo "$response";
    }

    exit(json_encode(["status" => $status, "response" => $response]));
}
?>
      
</div>
</body>
</html>
   