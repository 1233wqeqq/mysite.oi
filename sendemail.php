<?php
    use PHPMailer\PHPMailer\PHPMailer;

    if (isset($_POST['email']) && isset($_POST['name'])) {
        $email = $_POST['email'];
         $name = $_POST['name'];
        $subject = $_POST['subject'];
        $body = $_POST['body'];

        require_once "PHPMailer/PHPMailer.php";

        require_once "PHPMailer/SMTP.php";
        
        require_once "PHPMailer/Exception.php";

        $mail = new PHPMailer();

        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = "nukuta0203@gmail.com"; 
        $mail->Password = 'lidzhieff08rusb'; 
        $mail->Port = 465;
        $mail->SMTPSecure = "ssl";
        
        $mail->isHTML(true);
        $mail->setFrom($email, $name);
        $mail->addAddress("lidzhiev0912@gmail.com"); 
        $mail->Subject = ("$email ($subject)");
        $mail->Body = $body;

        if ($mail->send()) {
            $status = "success";
            $response = "Email is sent!";
        } else {
            $status = "failed";
            $response = "Something is wrong: <br><br>" . $mail->ErrorInfo;
        }
        exit(json_encode(array("status" => $status, "response" => $response)));
    }
?>
