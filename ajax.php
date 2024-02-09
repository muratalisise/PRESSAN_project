<?php

use PHPMailer\PHPMailer\PHPMailer;

require './PhpMailer/PhpMailer/vendor/autoload.php';

switch ($_SERVER['REQUEST_METHOD']){
    case "POST":
        $p = $_POST;
        if (!empty($p['email'])){
            $mail = new PHPMailer(true);

            try {
                $mail->isSMTP();
                $mail->Host       = 'mail.pressancelik.com';
                $mail->SMTPAuth   = true;
                $mail->SMTPSecure = "ssl";
                $mail->Username   = 'mail@pressancelik.com';
                $mail->Password   = '}}v@9jQ6o[E}';
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port       = 465;
                $mail->setFrom('mail@pressancelik.com', 'Teklif');
                $mail->addAddress($p['email'], $p['name']);

                $mail->isHTML(true);
                $mail->Subject = 'Teklif';
                $mail->Body    = `<!DOCTYPE html>
                <html>
                <head>
                    <meta charset="UTF-8">
                    <style>
                        .gray{
                            color: gray;
                        }
                    </style>
                </head>
                <body>
                    <div>
                        <h4 style="float: left; margin-right: 5px;">İsim :</h4>  <h4 class="gray">Eren</h4>
                        <h4 style="float: left; margin-right: 5px;">Soyisim :</h4>  <h4 class="gray">Baş</h4>
                        <h4 style="float: left; margin-right: 5px;">Firma adı :</h4>  <h4 class="gray">9 Bit</h4>
                        <h4 style="float: left; margin-right: 5px;">Adres :</h4>  <h4 class="gray">İstanbul Bağcılar</h4>
                        <h4 style="float: left; margin-right: 5px;">Seçilen Ürün :</h4>  <h4 class="gray">Pressan ütü makineleri</h4>
                        <h4 style="float: left; margin-right: 5px;">Email adres :</h4>  <h4 class="gray">ereninfo</h4>
                        <h4 style="float: left; margin-right: 5px;">Telefon :</h4>  <h4 class="gray">0541 525 54 88</h4>
                        <h4 style="float: left; margin-right: 5px;">Mesaj :</h4>  <h4 class="gray">Lütfen uygun fiyat çıkarınız.</h4>
                </body>
                </html>`;

                $mail->send();
                echo $mail->ErrorInfo;
                echo "true";
            } catch (Exception $e) {
                echo json_encode(array(
                    "text" => $e->getMessage(),
                    "code" => $mail->ErrorInfo
                ));
            }
        }
        break;
}

$mail = new PHPMailer(true);

$mail->isSMTP();
$mail->Host       = 'mail.pressancelik.com';
$mail->SMTPAuth   = true;
$mail->SMTPSecure = "ssl";
$mail->Username   = 'mail@pressancelik.com';
$mail->Password   = '}}v@9jQ6o[E}';
$mail->Port       = 465;
$mail->setFrom('mail@pressancelik.com', 'Teklif');
//$mail->addAddress($p['email'], $p['name']);
$mail->addAddress("erenbas.info@gmail.com", "Eren baş");

$mail->isHTML(true);
$mail->Subject = 'Teklif';
$mail->Body    = "test";

$mail->send();
?>