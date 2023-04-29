<?php

declare(strict_types=1);

namespace App\Tests\Service\RegisterConfirmation;

use App\Service\RegisterConfirmation\RegisterConfirmationServiceException;
use App\Tests\Service\ServiceKernelTestCase;
use App\ValueObject\EmailAddress;

class RegisterConfirmationServiceTest extends ServiceKernelTestCase
{
    public function testSendEmail(): void
    {
        $expectedEmailCount = 1;

        $service = $this->registerConfirmationService;
        $emailAddress = new EmailAddress(self::TEST_EMAIL);

        $this->assertTrue($service->sendMail($emailAddress));
        self::assertEmailCount($expectedEmailCount);
    }

    public function testSendEmailException(): void
    {
        $service = $this->registerConfirmationService;
        $emptyEmailAddress = $this->createMock(EmailAddress::class);

        $this->expectException(RegisterConfirmationServiceException::class);
        $this->expectExceptionMessage('Email "" does not comply with addr-spec of RFC 2822.');
        $service->sendMail($emptyEmailAddress);
    }
}
