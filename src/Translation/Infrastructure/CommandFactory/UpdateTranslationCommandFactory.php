<?php

declare(strict_types=1);

namespace App\Translation\Infrastructure\CommandFactory;

use App\Shared\Exception\Domain\InvalidRequestException;
use App\Translation\Application\Command\UpdateTranslationCommand\UpdateTranslationCommand;
use Exception;
use Symfony\Component\HttpFoundation\Request;

final class UpdateTranslationCommandFactory {
    public static function fromRequest(Request $request): UpdateTranslationCommand
    {
        try {
            $data = json_decode($request->getContent(), true, 512, JSON_THROW_ON_ERROR);
            return new UpdateTranslationCommand(
                $request->attributes->get('id') ?? null,
                $data['english'] ?? null,
                $data['french'] ?? null
            );
        } catch (Exception $e) {
            throw new InvalidRequestException("Invalid request body");
        }
    }
}