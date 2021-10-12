<?php

namespace App\Http\Controllers\ToombaApi;

use App\Http\Controllers\ToombaApi;
use App\Models\ToombaApi\EmployeeModel;
use App\Models\ToombaApi\DependentModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends ApiController
{
    /**
     * Read records Enployee from DB. if id = null then you receive all records
     *
     * @param null|integer $id
     * @return \Illuminate\Support\Collection
     */
    public function getEmployee($id)
    {
        $result = EmployeeModel::find($id);

        $jobController = new JobController();
        $departmentController = new DepartmentController();

        if ($result) {
            $result->job = $jobController->getJob($result->job_id);
            $result->department = $departmentController->getDepartment($result->department_id);
            $result->manager = $this->getEmployee($result->manager_id);
            $result->dependents = $this->getDependentsEmployee($result->id);
        }

        return $result;
    }

    public function getDependentsEmployee($employee_id)
    {
        $result = DependentModel::where('employee_id', $employee_id)->get();
        return $result;
    }

    public function getEmployees()
    {
        $result = EmployeeModel::get();

        $jobController = new JobController();
        $departmentController = new DepartmentController();

        foreach ($result as $employee) {
            if (!isset($employee->job_id))
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
    public function employee($id)
    {
        $result = $this->getEmployee($id);
        $status_code = is_array($result) && count($result) == 0 ? $this->STATUS_CODE_NOT_FOUND : $this->STATUS_CODE_OK;
        return $this->json($result, $status_code);
    }

    public function employees()
    {
        $result = $this->getEmployees();
        $status_code = is_array($result) && count($result) == 0 ? $this->STATUS_CODE_NOT_FOUND : $this->STATUS_CODE_OK;
        return $this->json($result, $status_code);
    }

    public function addEmployee(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|max:20',
            'last_name' => 'required|max:25',
            'email' => 'required|email',
            'phone_number' => 'required|min:11|numeric',
            'hire_date' => 'required|date',
            'salary' => 'required|regex:/^\d*(\.\d{2})?$/',
            'department_id' => 'required|integer',
            'manager_id' => 'integer',
            'job_id' => 'required|integer'
        ]);

        //Check Input Fields
        if ($validator->fails())
            return $this->json($request->all(), $this->STATUS_CODE_BAD_REQUEST, $validator->errors()->all());

        //Check exist manager_id & job_id & department_id in Database;
        $jobController = new JobController();
        if (!$jobController->getJob($request->job_id)) {
            return $this->json($request->all(), $this->STATUS_CODE_BAD_REQUEST, "Job not founded.");
        }

        $departmentController = new DepartmentController();
        if (!$departmentController->getDepartment($request->department_id)) {
            return $this->json($request->all(), $this->STATUS_CODE_BAD_REQUEST, "Department not founded.");
        }

        if (isset($request->manager_id) && !is_null($request->manager_id)) {
            if (!$this->getEmployee($request->manager_id)) {
                return $this->json($request->all(), $this->STATUS_CODE_BAD_REQUEST, "Manager not founded.");
            }
        }

        $employeeId = EmployeeModel::insertGetId(
            [
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'hire_date' => new Carbon($request->hire_date),
                'salary' => $request->salary,
                'department_id' => $request->department_id,
                'manager_id' => $request->manager_id ?? null,
                'job_id' => $request->job_id,
            ]
        );

        if (isset($request->dependents)) {
            $dependents = [];
            foreach ($request->dependents as $dependent) {
                $validatorDependents = Validator::make($dependent, [
                    'first_name' => 'required|max:20',
                    'last_name' => 'required|max:25',
                    'relationship' => 'required|max:25',
                ]);

                if ($validatorDependents->fails())
                    return $this->json($request->all(), $this->STATUS_CODE_BAD_REQUEST, $validatorDependents->errors()->all());

                $dependents[] = [
                    'first_name' => $dependent['first_name'],
                    'last_name' => $dependent['last_name'],
                    'relationship' => $dependent['relationship'],
                    'employee_id' => $employeeId
                ];
            }

            if (count($dependents) > 0)
                DependentModel::insert($dependents);
        }

        return $this->employee($employeeId);
    }

    public function editEmployee(Request $request, $employee_id)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|max:20',
            'last_name' => 'required|max:25',
            'email' => 'required|email',
            'phone_number' => 'required|min:11|numeric',
            'hire_date' => 'required|date',
            'salary' => 'required|regex:/^\d*(\.\d{2})?$/',
            'department_id' => 'required|integer',
            'manager_id' => 'integer',
            'job_id' => 'required|integer'
        ]);

        //Check Input Fields
        if ($validator->fails())
            return $this->json($request->all(), $this->STATUS_CODE_BAD_REQUEST, $validator->errors()->all());

        //Check exist manager_id & job_id & department_id in Database;
        $jobController = new JobController();
        if (!$jobController->getJob($request->job_id)) {
            return $this->json($request->all(), $this->STATUS_CODE_BAD_REQUEST, "Job not founded.");
        }

        $departmentController = new DepartmentController();
        if (!$departmentController->getDepartment($request->department_id)) {
            return $this->json($request->all(), $this->STATUS_CODE_BAD_REQUEST, "Department not founded.");
        }

        if (isset($request->manager_id) && !is_null($request->manager_id)) {
            if (!$this->getEmployee($request->manager_id)) {
                return $this->json($request->all(), $this->STATUS_CODE_BAD_REQUEST, "Manager not founded.");
            }
        }

        $employee = EmployeeModel::find($employee_id);
        if (!$employee) {
            return $this->json($request->all(), $this->STATUS_CODE_BAD_REQUEST, "Employee #$employee_id not founded.");
        }


        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->email = $request->email;
        $employee->phone_number = $request->phone_number;
        $employee->hire_date = new Carbon($request->hire_date);
        $employee->salary = $request->salary;
        $employee->department_id = $request->department_id;
        $employee->manager_id = $request->manager_id ?? null;
        $employee->job_id = $request->job_id;


        if (isset($request->dependents)) {
            $dependents = [];
            foreach ($request->dependents as $dependent) {
                $validatorDependents = Validator::make($dependent, [
                    'first_name' => 'required|max:20',
                    'last_name' => 'required|max:25',
                    'relationship' => 'required|max:25',
                ]);

                if ($validatorDependents->fails())
                    return $this->json($request->all(), $this->STATUS_CODE_BAD_REQUEST, $validatorDependents->errors()->all());

                $dependents[] = [
                    'first_name' => $dependent['first_name'],
                    'last_name' => $dependent['last_name'],
                    'relationship' => $dependent['relationship'],
                    'employee_id' => $employee_id
                ];
            }

            if (count($dependents) > 0) {
                DependentModel::where("employee_id", $employee_id)->delete();
                DependentModel::insert($dependents);
            }
        }

        $employee->save();
        return $this->employee($employee_id);
    }
}
