<?php

namespace App\Http\Controllers\ToombaApi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ToombaApi\JobModel;

class JobController extends ApiController
{
    /**
     * Read records Jobs from DB. if id = null then you receive all records
     *
     * @param null|integer $id
     * @param integer $min_salary minimum Price range
     * @param integer $max_salary maximum Price range
     * @return \Illuminate\Support\Collection
     */
    public function getJob($id)
    {
        $result = JobModel::find($id);
        return $result;
    }

    public function getJobs($min_salary=-1,$max_salary=-1)
    {
        $query = new JobModel();

        if($min_salary >= 0)
            $query->where("min_salary",'=',$min_salary);
        if($max_salary >= 0)
            $query->where("max_salary",'=',$max_salary);

        $result = $query->get();

        return $result;
    }

    /**
     * Read JSON format records Jobs from DB. if id = null then you receive all records
     *
     * @param null|integer $id
     * @return \Illuminate\Support\Collection
     */
    public function job($id)
    {
        $result = $this->getJob($id);
        $status_code = is_array($result) && count($result) == 0 ? $this->STATUS_CODE_NOT_FOUND : $this->STATUS_CODE_OK;

        return $this->json($result, $status_code);
    }

    public function jobs()
    {
        $result = $this->getJobs();
        $status_code = is_array($result) && count($result) == 0 ? $this->STATUS_CODE_NOT_FOUND : $this->STATUS_CODE_OK;

        return $this->json($result, $status_code);
    }

    public function jobMinSalary($min_salary){
        $result = $this->getJobs($min_salary);
        $status_code = is_array($result) && count($result) == 0 ? $this->STATUS_CODE_NOT_FOUND : $this->STATUS_CODE_OK;

        return $this->json($result, $status_code);
    }

    public function jobMaxSalary($max_salary){
        $result = $this->getJobs(-1,$max_salary);
        $status_code = is_array($result) && count($result) == 0 ? $this->STATUS_CODE_NOT_FOUND : $this->STATUS_CODE_OK;

        return $this->json($result, $status_code);
    }
}
