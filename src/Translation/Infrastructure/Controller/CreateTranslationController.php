<?php

declare(strict_types=1);

namespace App\Translation\Infrastructure\Controller;

use App\Shared\Command\Domain\CommandBusInterface;
use App\Translation\Infrastructure\CommandFactory\CreateTranslationCommandFactory;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

final class CreateTranslationController extends AbstractController
{
    public function __construct(public readonly CommandBusInterface $commandBus)
    {
    }

    #[Route('/api/translations', name: 'create_translation', methods: ['POST'])]
    public function createTranslation(Request $request): JsonResponse
    {
        $command = CreateTranslationCommandFactory::fromRequest($request);
        $this->commandBus->dispatch($command);
        return new JsonResponse(null, JsonResponse::HTTP_CREATED);
    }
}