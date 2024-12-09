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

    public function update(Translation $translation): void
    {
        $qb = $this->em->createQueryBuilder();
        $qb->update(Translation::class, 't')
            ->set('t.english.value', ':english') 
            ->set('t.french.value', ':french')  
            ->where('t.id = :id')     
            ->setParameter('english', $translation->english->value) 
            ->setParameter('french', $translation->french->value)  
            ->setParameter('id', $translation->id->value->toString()); 
        $qb->getQuery()->execute();
        $this->em->clear();
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