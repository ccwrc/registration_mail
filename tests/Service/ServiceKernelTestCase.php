<?php

declare(strict_types=1);

namespace App\Tests\Service;

use App\Service\RegisterConfirmation\RegisterConfirmationService;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class ServiceKernelTestCase extends KernelTestCase
{
    protected const TEST_EMAIL = 'some-test-email-2@openmobi.pl';

    protected RegisterConfirmationService $registerConfirmationService;

    protected function setUp(): void
    {
        $container = self::getContainer();

        $this->registerConfirmationService = $container->get(RegisterConfirmationService::class);
    }
}
