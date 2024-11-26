<?php

namespace Tests\Feature;

use App\Services\TokenValidator;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TokenValidatorTest extends TestCase
{
    protected $tokenValidator;
  public function setUp(): void
    {
        parent::setUp();
        $this->tokenValidator = new TokenValidator();
    }
       public function test_valid_token()
    {
        $validToken = '({[]})';

        $result = $this->tokenValidator->validateFormat($validToken);

        $this->assertTrue($result, "The valid token was not accepted.");
    }

    public function test_invalid_token()
    {
        $invalidToken = '{), [{]}';

        $result = $this->tokenValidator->validateFormat($invalidToken);

        $this->assertFalse($result, "The invalid token was accepted.");
    }



}
