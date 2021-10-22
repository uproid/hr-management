<?php

namespace Tests\Feature\ToombaApi;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class JobsTest extends TestApi
{

    public static function getJsonTheme()
    {
        return [
            "id",
            "job_title",
            "min_salary",
            "max_salary"
        ];
    }

    public function test_jobs_get_one_by_id()
    {

        $response = $this->json('GET', '/api/jobs/1', $this->authData);

        $formTheme = TestApi::getJsonTheme();
        $formTheme['data'] = self::getJsonTheme();

        $response->assertStatus(200)
            ->assertJsonStructure($formTheme);
    }

    public function test_jobs_get_one_by_id_not_found()
    {

        $response = $this->json('GET', '/api/jobs/9999', $this->authData);

        $response->assertJsonStructure(TestApi::getJsonTheme())
            ->assertStatus(404);
    }


    public function test_jobs_get_all()
    {

        $response = $this->json('GET', '/api/jobs', $this->authData);
        $formData = TestApi::getJsonTheme();
        $formData['data'] = ['*' => self::getJsonTheme()];
        $response->assertJsonStructure($formData)
            ->assertStatus(200);
    }

    public function test_jobs_min_salary()
    {

        $response = $this->json('GET', '/api/jobs/min_salary/4000', $this->authData);
        $formData = TestApi::getJsonTheme();
        $formData['data'] = ['*' => self::getJsonTheme()];
        $response->assertJsonStructure($formData)
            ->assertStatus(200);
    }

    public function test_jobs_max_salary()
    {

        $response = $this->json('GET', '/api/jobs/max_salary/9000', $this->authData);
        $formData = TestApi::getJsonTheme();
        $formData['data'] = ['*' => self::getJsonTheme()];
        $response->assertJsonStructure($formData)
            ->assertStatus(200);
    }
}
