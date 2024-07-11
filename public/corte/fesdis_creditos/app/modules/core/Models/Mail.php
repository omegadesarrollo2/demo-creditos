<?php

/**
* Modelo del modulo Core que se encarga de inicializar  la clase de envio de correos
*/
class Core_Model_Mail
{
    /**
     * classe de  phpmailer
     * @var class
     */
    private $mail;

    /**
     * asigna los valores a la clase e instancia el phpMailer
     */
    public function __construct()
    {
/*
        $this->mail = new PHPMailer;
        $this->mail->CharSet = 'UTF-8';
        $this->mail->isSMTP();
        $this->mail->SMTPDebug = 0;
        $this->mail->SMTPSecure = "ssl";
        $this->mail->Host = "mail.omegasolucionesweb.com";
        $this->mail->Port = 465;
        $this->mail->SMTPAuth = true;
        $this->mail->Username ="fendesa@omegasolucionesweb.com";
-       $this->mail->Password ="admin.2008";
-       $this->mail->setFrom("fendesa@omegasolucionesweb.com","Notificaciones FENDESA");

        $this->mail = new PHPMailer;
        $this->mail->CharSet = 'UTF-8';
        $this->mail->isSMTP();
        $this->mail->SMTPDebug = 0;
        $this->mail->SMTPSecure = "ssl";
        $this->mail->Host = "smtp.gmail.com";
        $this->mail->Port = 465;
        $this->mail->SMTPAuth = true;
        $this->mail->Username ="fendesa@omegawebsystems.com";
-       $this->mail->Password ="Admin.2008";
-       $this->mail->setFrom("fendesa@omegawebsystems.com","Notificaciones FENDESA");
// */
          // $this->mail = new PHPMailer;
        // $this->mail->CharSet = 'UTF-8';
        // $this->mail->isSMTP();
        // $this->mail->SMTPDebug = 0;
        // $this->mail->SMTPSecure = "ssl";
        // $this->mail->Host = "mail.omegasol.tk";
        // $this->mail->Port = 465;
        // $this->mail->SMTPAuth = true;
        // $this->mail->Username ="fonkobacreditos@omegasol.tk";
// -       $this->mail->Password ="admin.2008";
// -       $this->mail->setFrom("fonkobacreditos@omegasol.tk","Notificaciones FONKOBA");

		$this->mail = new PHPMailer;
        $this->mail->CharSet = 'UTF-8';
        $this->mail->isSMTP();
        $this->mail->SMTPDebug = 0;
        $this->mail->SMTPSecure = "ssl";
        $this->mail->Host = "mail.fesdis.com.co";
        $this->mail->Port = 465;
        $this->mail->SMTPAuth = true;
        $this->mail->Username ="_mainaccount@fesdis.com.co";
-       $this->mail->Password ="Fesdis2020--";
-       $this->mail->setFrom("info@fesdis.com.co","Notificaciones FONKOBA");


    }
    /**
     * retorna la  instancia de email
     * @return class email
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * envia el correo
     * @return bool envia el estado del correo
     */
    public function sed()
    {
        if ($this->mail->send()) {
            return true;
        } else {
            return false;
        }
    }
}