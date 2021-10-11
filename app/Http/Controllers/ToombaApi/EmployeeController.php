<?php

namespace App\Http\Controllers\ToombaApi;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\ToombaApi\EmployeeModel;

class EmployeeController extends ApiController
{
    /**
     * Read records Enployee from DB. if id = null then you receive all records
     *
     * @param null|integer $id
     * @return \Illuminate\Support\Collection
     */
    public function getEmployee($id){
        $result = EmployeeModel::find($id);

        $jobController = new JobController();
        $departmentController = new DepartmentController();

        if($result) {
            $result->job = $jobController->getJob($result->job_id);
            $result->department = $departmentController->getDepartment($result->department_id);
            $result->manager = $this->getEmployee($result->manager_id);
        }

        return $result;
    }

    public function getEmployees(){
        $result = EmployeeModel::get();

        $jobController = new JobController();
        $departmentController = new DepartmentController();

        foreach ($result as $employee){
            if(!isset($employee->job_id))
                continue;
            $employee->job = $jobController->getJob($employee->job_id);
            $employee->department = $departmentController->getDepartment($employee->department_id);
            $employee->manager = $this->getEmployee($employee->manager_id);
        }

        return $result;
    }

    /**
     * Read JSON format records Enployee from DB. if id = null then you receive all records
     *
     * @param null|integer $id
     * @return \Illuminate\Support\Collection
     */
    public function employee($id){
        $result = $this->getEmployee($id);
        $status_code = is_array($result) && count($result) == 0 ? $this->STATUS_CODE_NOT_FOUND : $this->STATUS_CODE_OK;
        return $this->json($result, $status_code);
    }

    public function employees(){
        $result = $this->getEmployees();
        $status_code = is_array($result) && count($result) == 0 ? $this->STATUS_CODE_NOT_FOUND : $this->STATUS_CODE_OK;
        return $this->json($result, $status_code);
    }
}
