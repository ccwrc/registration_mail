<?php

declare(strict_types=1);

namespace App\Service\RegisterConfirmation;

use App\ValueObject\EmailAddress;

/**
 * Email sending service interface.
 */
interface RegisterConfirmationServiceInterface
{
    public const EMAIL_FROM = 'some-test-email@openmobi.pl';
    public const EMAIL_SUBJECT = 'some-subject';
    public const EMAIL_MESSAGE = 'Standard content of the confirmation of registration on the service.';

    /**
     * Sends an e-mail confirming registration on the service.
     *
     * @param EmailAddress $emailAddress Recipient.
     *
     * @return bool TRUE if success.
     * @throws RegisterConfirmationServiceException If sending fails.
     */
    public function sendMail(EmailAddress $emailAddress): bool;
}
