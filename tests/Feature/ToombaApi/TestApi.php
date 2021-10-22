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
        $this->authData = ['api_token' => env('API_TOKEN')];
    }



    public static function getJsonTheme()
    {
        return [
            'data', 'message' => [], 'code', 'timestamp'
        ];
    }

    protected function echoMessages($title,$response){
        $body = $response->baseResponse->original;
        echo "\n\n".$title."->$body[code]:".json_encode($body['message'],JSON_PRETTY_PRINT)."\n\n";
    }
}
