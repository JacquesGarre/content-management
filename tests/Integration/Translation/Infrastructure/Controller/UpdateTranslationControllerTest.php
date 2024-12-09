<?php

declare(strict_types=1);

namespace App\Tests\Integration\Translation\Infrastructure\Controller;

use App\Tests\Stubs\Translation\Domain\TranslationStub;
use App\Translation\Domain\TranslationRepositoryInterface;
use App\Translation\Infrastructure\Persistence\DoctrineTranslationRepository;
use Faker\Factory;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\JsonResponse;

use function PHPUnit\Framework\assertEquals;

class UpdateTranslationControllerTest extends WebTestCase
{
    private DoctrineTranslationRepository $repository;
    private KernelBrowser $client;

    public function setUp(): void
    {
        $this->client = static::createClient(); 
        $this->repository = $this->client->getContainer()->get(TranslationRepositoryInterface::class);
    }

    public function testSunnyCase(): void
    {
        $translation = TranslationStub::random();
        $this->repository->add($translation);

        $faker = Factory::create();
        $body = [
            'english' => $faker->word(),
            'french' => $faker->word()
        ];
        $this->client->request(
            'PUT', 
            '/api/translations/'.$translation->id->toString(),
            [],
            [], 
            ['CONTENT_TYPE' => 'application/json'], 
            json_encode($body)
        );
    
        $response = $this->client->getResponse();
        //dd($response);
        assertEquals(JsonResponse::HTTP_OK, $response->getStatusCode());
    }

    public function testBadRequest(): void
    {
        $translation = TranslationStub::random();
        $this->repository->add($translation);

        $body = '{badjson:';
        $this->client->request(
            'PUT', 
            '/api/translations/'.$translation->id->toString(),
            [],
            [], 
            ['CONTENT_TYPE' => 'application/json'], 
            $body
        );
        $response = $this->client->getResponse();
        assertEquals(JsonResponse::HTTP_BAD_REQUEST, $response->getStatusCode());
    }

    public function testNotFound(): void
    {
        $faker = Factory::create();
        $body = [
            'english' => $faker->word(),
            'french' => $faker->word()
        ];
        $this->client->request(
            'PUT', 
            '/api/translations/'.$faker->uuid(),
            [],
            [], 
            ['CONTENT_TYPE' => 'application/json'], 
            json_encode($body)
        );
        $response = $this->client->getResponse();
        assertEquals(JsonResponse::HTTP_NOT_FOUND, $response->getStatusCode());
    }
}
