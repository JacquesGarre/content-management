<?php

declare(strict_types=1);

namespace App\Translation\Infrastructure\Controller;

use App\Shared\Command\Domain\CommandBusInterface;
use App\Translation\Infrastructure\CommandFactory\UpdateTranslationCommandFactory;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

final class UpdateTranslationController extends AbstractController
{
    public function __construct(public readonly CommandBusInterface $commandBus)
    {
    }

    #[Route('/api/translations/{id}', name: 'update_translation', methods: ['PUT', 'PATCH'])]
    public function updateTranslation(Request $request): JsonResponse
    {
        $command = UpdateTranslationCommandFactory::fromRequest($request);
        $this->commandBus->dispatch($command);
        return new JsonResponse(null, JsonResponse::HTTP_OK);
    }
}