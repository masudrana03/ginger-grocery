<?php

namespace App\Components\Email;

use App\Components\Email\Single\Smtp;

class Email
{
    /**
     * Handle email sending proces
     *
     * @param array $args
     */
    public function handle($args)
    {
        switch (settings('mail_driver')) {
            case 'smtp':
                return $this->begin(new Smtp(), $args);
            break;
        }
    }

    /**
     * Let's start sending email
     *
     * @param EmailInterface $email
     * @param array $args
     */
    public function begin(EmailInterface $email, $args)
    {
        return $email->send($args);
    }
}