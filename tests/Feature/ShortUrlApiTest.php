<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class ShortUrlApiTest extends TestCase
{
const CUSTOM_TOKEN = '[]{}()';

    /** @test */
    public function it_returns_a_shortened_url()
    {

        $this->mockTinyUrlApi('http://www.example.com', 'https://tinyurl.com/example');

        $response = $this->postJson('/api/v1/short-urls', [
            'url' => 'http://www.example.com',
        ], ['Authorization' => 'Bearer ' . self::CUSTOM_TOKEN]);

        // Verificar que la respuesta tenga el status correcto
        $response->assertStatus(200)
            ->assertJson([
                'url' => 'https://tinyurl.com/example',
            ]);
    }


    protected function mockTinyUrlApi($url, $shortenedUrl)
    {
        Http::fake([
            'https://api.tinyurl.com/create' => Http::response([
                'result' => $shortenedUrl,
            ], 200),
        ]);
    }


}
