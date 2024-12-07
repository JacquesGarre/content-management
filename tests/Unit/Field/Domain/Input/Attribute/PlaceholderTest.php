<?php

declare(strict_types=1);

namespace App\Tests\Unit\Field\Domain\Input\Attribute;

use App\Field\Domain\Input\Attribute\Placeholder;
use Faker\Factory;
use PHPUnit\Framework\TestCase;

use function PHPUnit\Framework\assertEquals;

final class PlaceholderTest extends TestCase {

    public function testPlaceholder(): void
    {   
        $faker = Factory::create();
        $word = $faker->word();
        $placeholder = new Placeholder($word);
        assertEquals($word, $placeholder->value);
    }
}
