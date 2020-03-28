<?php
    //Import the PHPMailer class into the global namespace
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;

    class ContactModel {
        private $name;
        private $email;
        private $age;
        private $message;

        public function setData($name, $email, $age, $message) {
            $this->name = $name;
            $this->email = $email;
            $this->age = $age;
            $this->message = $message;
        }

        public function validForm() {
            if(strlen($this->name) < 3)
                return "Имя слишком короткое";
            else if(strlen($this->email) < 3)
                return "Email слишком короткий";
            else if(!is_numeric($this->age) || $this->age <= 0 || $this->age > 90)
                return "Вы ввели не возраст";
            else if(strlen($this->message) < 10)
                return "Сообщение слишком короткое";
            else
                return "Верно";
        }

         public function sendmail() {
             date_default_timezone_set('Etc/UTC');
             require 'vendor/autoload.php';
             $mail = new PHPMailer;
             $mail->isSMTP();
             $mail->SMTPDebug = SMTP::DEBUG_OFF;
             $mail->Host = 'smtp.sendgrid.net';
             $mail->Port = 25;
             $mail->SMTPAuth = true;
             $mail->Username = 'apikey';
             $mail->Password = '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';
             $mail->setFrom('info@sokratim.com', "=?utf-8?B?".base64_encode("Обратная свзязь с Сокра.тим")."?=");
             $mail->addAddress('kostyadestroy@gmail.com', 'Kostya');
             $mail->Subject = "=?utf-8?B?".base64_encode("Форма обратной связи с Сокра.тим")."?=";
             $message = "Имя: " . $this->name . ". Возраст: " . $this->age . ". Сообщение: " . $this->message;
             $mail->Body = $message;
             $mail->AltBody = $message;

             if (!$mail->send()) {
                 echo 'Mailer Error: ' . $mail->ErrorInfo;
             }
         }

    }