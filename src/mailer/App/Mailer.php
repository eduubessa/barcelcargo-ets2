<?php

namespace App;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

class Mailer {

    protected $port = 2525;
    protected $host = "smtp.mailtrap.io";
    protected $username = "66f318bcb0f91a";
    protected $password = "207a2946ebef9f";
    protected $secure = true;
    protected $charset = PHPMailer::CHARSET_UTF8;

    private $mail;
    private $subject;
    private $body;
    private $messageHtml;
    private $messageText;

    public function __construct()
    {
        try {

            $this->mail = new PHPMailer(true);
            $this->mail->SMTPDebug = SMTP::DEBUG_OFF;
            $this->mail->isSMTP();

            $this->mail->Host = $this->host;
            $this->mail->SMTPAuth = true;
            $this->mail->Username = $this->username;
            $this->mail->Password =  $this->password;
            $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $this->mail->Port = $this->port;
            $this->mail->CharSet = $this->charset;

        }catch (\Exception $exception){
            echo $exception-> getMessage();
        }
    }

    public function From($name = null, $mail)
    {
        $this->mail->setFrom($mail, $name);
        return $this;
    }

    /**
     * @param array $mails
     * @return $this
     * @throws Exception
     */
    public function To($mail = null)
    {
        if(is_array($mail))
        {
            foreach ($mail as $mail)
            {
                $this->mail->addAddress($mail);
            }
        }else{
            $this->mail->addAddress($mail);
        }

        return $this;
    }

    /**
     * @param $subject
     * @return $this
     */
    public function Subject($subject)
    {
        $this->subject = $subject;
        return $this;
    }

    /**
     * @param null $html
     * @param null $text
     * @return $this
     */
    public function Body($html = null, $text = null)
    {
        $this->messageHtml = $html;
        $this->messageText = $text;

        return $this;
    }

    /**
     * @return bool
     */
    public function send()
    {
        try {
            if ($this->messageHtml == null or $this->messageHtml == '') {
                $this->mail->isHTML(false);
                $this->mail->Body = $this->messageHtml;
            } elseif ($this->messageText == null or $this->messageText = '') {
                $this->mail->isHTML(true);
                $this->mail->Body = $this->messageText;
            } else {
                $this->mail->isHTML(true);
                $this->mail->Body = $this->messageHtml;
                $this->mail->AltBody = $this->messageText;

                if($this->mail->send())
                {
                    return true;
                }else{
                    return false;
                }
            }
        }catch(\Exception $exception){
            echo $exception->getMessage();
            return false;
        }
    }

}