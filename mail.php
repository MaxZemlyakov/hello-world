<?php 

require_once('phpmailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->CharSet = 'utf-8';

$name = $_POST['UserName'];
$phone = $_POST['UserNumber'];
$email = $_POST['UserEmail'];
$login = $_POST['UserLogin'];
$password = $_POST['UserPassword'];


//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.mail.ru';  																							// Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'zem_maxim@mail.ru'; // Ваш логин от почты с которой будут отправляться письма
$mail->Password = '45fgh89oks67!!234??lG'; // Ваш пароль от почты с которой будут отправляться письма
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465; // TCP port to connect to / этот порт может отличаться у других провайдеров

$mail->setFrom('zem_maxim@mail.ru'); // от кого будет уходить письмо?
$mail->addAddress('vanido4175@ksyhtc.com');     // Кому будет уходить письмо 
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Заявка с тестового сайта';
$mail->Body    = '' .$name . ' оставил заявку, его телефон ' .$phone. '<br>Почта этого пользователя: ' .$email. '<br> Логин пользователя: ' .$login. '<br>Пароль пользователя: ' .$password;
$mail->AltBody = '';

if(!$mail->send()) {
    echo 'Error';
} else {
    header('location: thank-you.html');
}
?>