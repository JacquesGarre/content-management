<?php

declare(strict_types=1);

namespace App\Translation\Infrastructure\CommandFactory;

use App\Shared\Exception\Domain\InvalidRequestException;
use App\Translation\Application\Command\CreateTranslationCommand\CreateTranslationCommand;
use Exception;
use Symfony\Component\HttpFoundation\Request;

final class CreateTranslationCommandFactory {
    public static function fromRequest(Request $request): CreateTranslationCommand
    {
        try {
            $data = json_decode($request->getContent(), true);
            return new CreateTranslationCommand(
                $data['id'] ?? null,
                $data['english'] ?? null,
                $data['french'] ?? null
            );
        } catch (Exception $e) {
            throw new InvalidRequestException("Invalid request body");
        }
    }
}