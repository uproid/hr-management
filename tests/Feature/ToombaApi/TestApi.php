<?php

namespace Tests\Feature\ToombaApi;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TestApi extends TestCase
{
    protected $authData;

    public function setUp(): void
    {
        parent::setUp();
        $this->authData = ['api_token' => '1234'];
    }

    public static function getJsonTheme()
    {
        return [
            'data', 'message' => [], 'code', 'timestamp'
        ];
    }
}
