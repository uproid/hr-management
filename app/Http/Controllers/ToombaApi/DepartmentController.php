<?php

namespace App\Http\Controllers\ToombaApi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ToombaApi\DepartmentModel;

class DepartmentController extends ApiController
{
    /**
     * Read a record Department from DB by id number.
     *
     * @param null|integer $id
     * @return \Illuminate\Support\Collection
     */
    public function getDepartment($id){
        $result = DepartmentModel::find($id);
        $locationController = new LocationController();

        if($result)
            $result->location = $locationController->getLocation($result->location_id);

        return $result;
    }

    /**
     * get list of departments from database
     * @return mixed array of Deparntments
     */
    public function getDepartments(){
        $result = DepartmentModel::get();
        $locationController = new LocationController();

        foreach ($result as $department){
            $department->location = $locationController->getLocation($department->location_id);
        }

        return $result;
    }

    /**
     * Read a JSON format record of Department from DB
     *
     * @param null|integer $id
     * @return \Illuminate\Support\Collection
     */
    public function department($id){
        $result = $this->getDepartment($id);
        $status_code = is_array($result) && count($result) == 0 ? $this->STATUS_CODE_NOT_FOUND : $this->STATUS_CODE_OK;
        return $this->json($result, $status_code);
    }

    /**
     * get Json format from all Departments model from DB
     * @return String JsonFormat
     */
    public function departments(){
        $result = $this->getDepartments();
        $status_code = is_array($result) && count($result) == 0 ? $this->STATUS_CODE_NOT_FOUND : $this->STATUS_CODE_OK;
        return $this->json($result, $status_code);
    }
}
