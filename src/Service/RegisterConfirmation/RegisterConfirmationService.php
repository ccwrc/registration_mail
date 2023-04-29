<?php

declare(strict_types=1);

namespace App\Service\RegisterConfirmation;

use App\ValueObject\EmailAddress;
use Psr\Log\LoggerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\MailerInterface;

/**
 * Email sending service.
 */
class RegisterConfirmationService implements RegisterConfirmationServiceInterface
{
    private MailerInterface $mailer;

    private LoggerInterface $logger;

    public function __construct(
        MailerInterface $mailer,
        LoggerInterface $logger
    )
    {
        $this->mailer = $mailer;
        $this->logger = $logger;
    }

    /**
     * @inheritDoc
     */
    public function sendMail(EmailAddress $emailAddress): bool
    {
        try {
            $templatedEmail = new TemplatedEmail();
            $templatedEmail->from(self::EMAIL_FROM)
                ->to((string)$emailAddress)
                ->subject(self::EMAIL_SUBJECT)
                ->htmlTemplate('service/register_confirmation/register_confirmation_email.html.twig')
                ->context([
                    'emailMessage' => self::EMAIL_MESSAGE
                ]);

            $this->mailer->send($templatedEmail);
        } catch (\Throwable $throwable) {
            $this->logger->error('Some message from exception: ' . $throwable->getMessage());

            throw new RegisterConfirmationServiceException($throwable->getMessage());
        }

        return true;
    }
}
