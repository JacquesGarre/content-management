<?php

declare(strict_types=1);

namespace App\Shared\Exception\Infrastructure;

use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Messenger\Exception\ValidationFailedException;

class ExceptionListener
{
    public function __invoke(ExceptionEvent $event): void
    {
        $exception = $event->getThrowable();
        $statusCode = JsonResponse::HTTP_BAD_REQUEST;
        $message = 'Bad request';

        if ($exception instanceof ValidationFailedException) {
            $statusCode = JsonResponse::HTTP_BAD_REQUEST;
            $violations = $exception->getViolations();
            $messages = [];
            foreach ($violations as $violation) {
                $messages[] = $violation->getMessage();
            }
            $message = implode(', ', $messages);
        }

        $response = new JsonResponse(['error' => $message], $statusCode);
        $event->setResponse($response);
    }
}
