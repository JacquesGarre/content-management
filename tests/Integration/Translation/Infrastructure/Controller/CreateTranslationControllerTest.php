<?php

declare(strict_types=1);

namespace App\Tests\Integration\Translation\Infrastructure\Controller;

use Faker\Factory;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\JsonResponse;

use function PHPUnit\Framework\assertEquals;

class CreateTranslationControllerTest extends WebTestCase
{
    public function testSunnyCase(): void
    {
        $client = static::createClient();
        $faker = Factory::create();
        $body = [
            'id' => $faker->uuid(),
            'english' => $faker->word(),
            'french' => $faker->word()
        ];
        $client->request(
            'POST', 
            '/api/translations',
            [],
            [], 
            ['CONTENT_TYPE' => 'application/json'], 
            json_encode($body)
        );
        $response = $client->getResponse();
        assertEquals(JsonResponse::HTTP_CREATED, $response->getStatusCode());
    }

    public function testBadRequest(): void
    {
        $client = static::createClient();
        $faker = Factory::create();
        $body = [
            'badrequest' => $faker->uuid(),
        ];
        $client->request(
            'POST', 
            '/api/translations',
            [],
            [], 
            ['CONTENT_TYPE' => 'application/json'], 
            json_encode($body)
        );
        $response = $client->getResponse();
        assertEquals(JsonResponse::HTTP_BAD_REQUEST, $response->getStatusCode());
    }
}
