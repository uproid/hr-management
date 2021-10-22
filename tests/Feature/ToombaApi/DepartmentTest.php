<?php

namespace Tests\Feature\ToombaApi;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DepartmentTest extends TestApi
{

    public static function getJsonTheme()
    {
        return [
            "id",
            "department_name",
            "location_id",
            "location" => [
                "id",
                "street_address",
                "postal_code",
                "city",
                "state_province",
                "country_id",
                "country"
            ]
        ];
    }

    public function test_department_get_one_by_id()
    {
        $response = $this->json('GET', '/api/departments/1', $this->authData);
        $theme = TestApi::getJsonTheme();
        $theme['data'] = self::getJsonTheme();

        if ($response->getStatusCode() !== 200) {
            $this->echoMessages(__METHOD__, $response);
        } else {
            $response->assertStatus(200)
                ->assertJsonStructure($theme);
        }
    }

    public function test_department_get_all()
    {
        $response = $this->json('GET', '/api/departments', $this->authData);
        $theme = TestApi::getJsonTheme();
        $theme['data'] = ['*' => self::getJsonTheme()];
        if ($response->getStatusCode() !== 200) {
            $this->echoMessages(__METHOD__, $response);
        } else {
            $response->assertJsonStructure($theme);
        }
    }
}
