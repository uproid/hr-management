<?php

namespace App\Http\Controllers\ToombaApi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ToombaApi\DepartmentModel;

class DepartmentController extends ApiController
{
    /**
     * Read records Department from DB. if id = null then you receive all records
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

    public function getDepartments(){
        $result = DepartmentModel::get();
        $locationController = new LocationController();

        foreach ($result as $department){
            $department->location = $locationController->getLocation($department->location_id);
        }

        return $result;
    }

    /**
     * Read JSON format records Department from DB. if id = null then you receive all records
     *
     * @param null|integer $id
     * @return \Illuminate\Support\Collection
     */
    public function department($id = null){
        $result = $this->getDepartment($id);
        $status_code = is_array($result) && count($result) == 0 ? $this->STATUS_CODE_NOT_FOUND : $this->STATUS_CODE_OK;
        return $this->json($result, $status_code);
    }

    public function departments(){
        $result = $this->getDepartments();
        $status_code = is_array($result) && count($result) == 0 ? $this->STATUS_CODE_NOT_FOUND : $this->STATUS_CODE_OK;
        return $this->json($result, $status_code);
    }
}
