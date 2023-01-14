<?php

use PHPMailer\PHPMailer\PHPMailer;

function config()
{
    $phpmailer = new PHPMailer();
    $phpmailer->isSMTP();
    $phpmailer->Host = $_ENV['EMAIL_HOST'];
    $phpmailer->SMTPAuth = true;
    $phpmailer->Port = $_ENV['EMAIL_PORT'];
    $phpmailer->Username = $_ENV['EMAIL_USERNAME'];
    $phpmailer->Password = $_ENV['EMAIL_PASSWORD'];

    return $phpmailer;
}

function send(stdClass|array $emailData)
{
    try {
        if(is_array($emailData)){
            $emailData = (object)$emailData;
        }
        checkPropertiesEmail($emailData);
        $mail = config();
        $mail->setFrom($emailData->fromEmail, $emailData->fromName);
        $mail->addAddress($emailData->toEmail, $emailData->toName);
        $mail->isHTML(true);
        $mail->Subject = $emailData->subject;
        $mail->Body    = $emailData->message;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        return $mail->send();
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

function checkPropertiesEmail($emailData)
{
    $propertiesRequired = ['toName', 'toEmail', 'fromName', 'fromEmail', 'subject', 'message'];
    unset($emailData->template);
    $emailVars = get_object_vars($emailData);
    foreach ($propertiesRequired as $prop) {
        if (!in_array($prop, array_keys($emailVars))) {
            throw new Exception("{$prop} é obrigatório para enviar o email");
        }
    }
}