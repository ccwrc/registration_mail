<?php

declare(strict_types=1);

namespace App\ValueObject;

/**
 * VO for verifying an email address.
 */
class EmailAddress
{
    private string $email;

    public function __construct(string $email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new \InvalidArgumentException('This is not a valid email address.');
        }

        //some logic as desired

        $this->email = $email;
    }

    public function __toString(): string
    {
        return $this->email;
    }
}
