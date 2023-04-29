<?php

declare(strict_types=1);

namespace App\Tests\Service\RegisterConfirmation;

use App\Tests\Service\ServiceKernelTestCase;
use App\ValueObject\EmailAddress;

class RegisterConfirmationServiceTest extends ServiceKernelTestCase
{
    public function testSendEmail(): void
    {
        $service = $this->registerConfirmationService;
        $emailAddress = new EmailAddress(self::TEST_EMAIL);

        $this->assertTrue($service->sendMail($emailAddress));
    }
}
