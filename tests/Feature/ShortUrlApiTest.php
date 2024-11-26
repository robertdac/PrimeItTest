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

            $response = $this->postJson('/api/v1/short-urls', [
                'url' => 'http://www.example.com',
            ], ['Authorization' => 'Bearer ' . self::CUSTOM_TOKEN]);

            // Verificar que la respuesta tenga el status correcto
            $response->assertStatus(200)
                ->assertJson([
                    'url' => 'https://tinyurl.com/example',
                ]);
        }

        /** @test */
        public function it_returns_error_when_url_is_missing()
        {
            $response = $this->postJson('/api/v1/short-urls', [], ['Authorization' => 'Bearer ' . self::CUSTOM_TOKEN]);

            $response->assertStatus(422)
                ->assertJsonValidationErrors('url');
        }

        /** @test */
        public function it_returns_error_when_url_is_invalid()
        {
            $response = $this->postJson('/api/v1/short-urls', [
                'url' => 'fake-url',
            ], ['Authorization' => 'Bearer ' . self::CUSTOM_TOKEN]);

            $response->assertStatus(422)
                ->assertJsonValidationErrors('url');
        }

        /** @test */
        public function it_requires_authorization_token()
        {
            $response = $this->postJson('/api/v1/short-urls', [
                'url' => 'http://www.example.com',
            ]);
            $response->assertStatus(401);
        }
    }
