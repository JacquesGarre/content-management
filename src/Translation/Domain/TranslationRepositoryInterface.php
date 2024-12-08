<?php

declare(strict_types=1);

namespace App\Translation\Domain;

interface TranslationRepositoryInterface {
    public function add(Translation $translation): void;
    public function ofId(Id $id): ?Translation;
    public function remove(Translation $translation): void;
}