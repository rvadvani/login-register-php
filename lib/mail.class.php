<?php 
/**
 * Created by www.coderseven.com
 * User: rvadvani | coder seven
 * Date: 30th March 2017
 * Time: 12:34 AM
 */
class MAIL{
    public function send_mail($email,$message,$subject){
        require_once('mailer/class.phpmailer.php');
        $mail = new PHPMailer();
        $mail->IsSMTP();

        $mail->SMTPAuth   = true;
        $mail->SMTPSecure = "ssl";
        $mail->Host       = "smtp.gmail.com";
        $mail->Port       = 465;
        $mail->AddAddress($email);
        $mail->Username="zikrabyte@gmail.com";
        $mail->Password="password";
        $mail->SetFrom('zikrabyte@gmail.com','Zikrabyte Solutions');
        $mail->AddReplyTo("zikrabyte@gmail.com","Zikrabyte Solutions");
        $mail->Subject    = $subject;
        $mail->MsgHTML($message);
        $mail->Send();
    }
} ?>