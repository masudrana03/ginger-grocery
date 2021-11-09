<?php

namespace App\Components\Email;

use App\Components\Email\Single\Smtp;

/**
 * Undocumented class
 */
abstract class Email
{
    /**
     * Mail driver
     *
     * @var string
     */
    protected $mailDriver;

    /**
     * Email sending details
     * 
     * @var array
     */
    protected $args;

    /**
     * Undocumented function
     *
     * @param [type] $args
     */
    public function __construct($args)
    {
        $this->args = $args;
        $this->mailDriver = settings('mail_driver');

        switch ($this->mailDriver) {
            case 'smtp':
                $this->begin(new Smtp());
            break;
        }
    }

    /**
     * Undocumented function
     *
     * @param EmailInterface $email
     * @return void
     */
    public function begin(EmailInterface $email)
    {
        return $email->send($this->args);
    }
}