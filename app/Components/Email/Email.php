<?php

namespace App\Components\Email;

use App\Components\Email\Single\Smtp;

/**
 * Undocumented class
 */
class Email
{
    public function handle($args)
    {
        switch (settings('mail_driver')) {
            case 'smtp':
                return $this->begin(new Smtp(), $args);
            break;
        }
    }

    public function begin(EmailInterface $email, $args)
    {
        return $email->send($args);
    }
}