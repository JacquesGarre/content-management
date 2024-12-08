<?php

declare(strict_types=1);

namespace App\Translation\Infrastructure\Persistence;

use App\Translation\Domain\Id;
use App\Translation\Domain\Translation;
use App\Translation\Domain\TranslationRepositoryInterface;
use Doctrine\ORM\EntityManagerInterface;

final class DoctrineTranslationRepository implements TranslationRepositoryInterface {

    public function __construct(public readonly EntityManagerInterface $em)
    {
    }

    public function add(Translation $translation): void
    {
        $this->em->persist($translation);
        $this->em->flush();
    }

    public function ofId(Id $id): ?Translation
    {
        return $this->em->getRepository(Translation::class)->find($id->toString());
    }

    public function remove(Translation $translation): void
    {
        $this->em->remove($translation);
        $this->em->flush();
    }
}