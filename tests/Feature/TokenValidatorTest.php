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

}
