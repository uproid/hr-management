<?php

namespace Tests\Feature\ToombaApi;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EmployeeTest extends TestApi
{
    use WithFaker;

    public static function getJsonTheme()
    {
        return [
            "id",
            "first_name",
            "last_name",
            "email",
            "phone_number",
            "hire_date",
            "job_id",
            "salary",
            "manager_id",
            "department_id",
            "job" => [
                "id",
                "job_title",
                "min_salary",
                "max_salary"
            ],
            "department" => DepartmentTest::getJsonTheme(),
            "manager",
            "dependents" => [
                '*' => [
                    "id",
                    "first_name",
                    "last_name",
                    "relationship",
                    "employee_id"
                ]
            ]
        ];
    }

    public function test_employee_get_one_by_id()
    {
        $response = $this->json('GET', '/api/employee/1', $this->authData);
        $theme = TestApi::getJsonTheme();
        $theme['data'] = self::getJsonTheme();

        $response->assertStatus(200)
            ->assertJsonStructure($theme);
    }

    public function test_employee_get_all()
    {
        $response = $this->json('GET', '/api/employee', $this->authData);
        $theme = TestApi::getJsonTheme();
        $theme['data'] = ['*' => self::getJsonTheme()];

        $response->assertStatus(200)
            ->assertJsonStructure($theme);
    }

    public function test_employee_add_new()
    {
        $data = $this->fakeEmploye();
        $data['api_token'] = env('API_TOKEN');
        array_merge($data, $this->authData);
        $response = $this->postJson('/api/employee', $data);
        $theme = TestApi::getJsonTheme();
        $theme['data'] = self::getJsonTheme();
        $response->assertJsonStructure($theme)
            ->assertStatus(200);
    }

    public function test_employee_edit()
    {
        $data = $this->fakeEmploye();
        $data['api_token'] = env('API_TOKEN');
        array_merge($data, $this->authData);
        $response = $this->putJson('/api/employee/1', $data);
        $theme = TestApi::getJsonTheme();
        $theme['data'] = self::getJsonTheme();

        $response->assertJsonStructure($theme)
            ->assertStatus(200);
    }

    public function test_employee_edit_error()
    {
        $data = $this->fakeEmployeError();
        $data['api_token'] = env('API_TOKEN');
        array_merge($data, $this->authData);
        $response = $this->putJson('/api/employee/10000', $data);
        $theme = TestApi::getJsonTheme();

        $response->assertJsonStructure($theme);
        if ($response->getStatusCode() !== 200) {
            $this->echoMessages(__METHOD__,$response);
        }
    }

    public function test_employee_add_new_error()
    {
        $data = $this->fakeEmployeError();
        $data['api_token'] = env('API_TOKEN');
        array_merge($data, $this->authData);
        $response = $this->postJson('/api/employee', $data);
        $theme = TestApi::getJsonTheme();
        $response->assertJsonStructure($theme);
        if ($response->getStatusCode() !== 200) {
            $this->echoMessages(__METHOD__,$response);
        }
    }

    private function fakeEmploye()
    {
        return [
            "first_name" => $this->faker->firstNameMale,
            "last_name" => $this->faker->lastName,
            "email" => $this->faker->email,
            "phone_number" => $this->faker->e164PhoneNumber,
            "hire_date" => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            "salary" => $this->faker->numberBetween($min = 1000, $max = 9000) . ".00",
            "department_id" => $this->faker->unique()->numberBetween(1, 10),
            "job_id" => $this->faker->unique()->numberBetween(1, 10),
            "dependents" => [
                [
                    "first_name" => $this->faker->firstNameFemale,
                    "last_name" => $this->faker->lastName,
                    "relationship" => "wife"
                ]
            ]
        ];
    }

    private function fakeEmployeError()
    {
        return [
            "first_name" => $this->faker->firstNameMale,
            "email" => "email_error@",
            "phone_number" => $this->faker->e164PhoneNumber,
            "hire_date" => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            "salary" => $this->faker->numberBetween($min = 1000, $max = 9000) . ".00",
            "department_id" => $this->faker->unique()->numberBetween(1, 10),
            "dependents" => [
                [
                    "last_name" => $this->faker->lastName,
                    "relationship" => "wife"
                ]
            ]
        ];
    }
}
