<?php

namespace App\Http\Controllers\ToombaApi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ToombaApi\JobModel;

class JobController extends ApiController
{
    /**
     * Read records Jobs from DB.
     *
     * @param null|integer $id
     * @param integer $min_salary minimum Price range
     * @param integer $max_salary maximum Price range
     * @return \Illuminate\Support\Collection
     */
    public function getJob($id)
    {
        return JobModel::find($id);;
    }

    /**
     * get all list of jobs by min and max salary prices.
     * @param int $min_salary minimum salary price
     * @param int $max_salary maximum salary price.
     * @return mixed
     */
    public function getJobs($min_salary=-1,$max_salary=-1)
    {
        $query = new JobModel();

        if($min_salary >= 0)
            $query->where("min_salary",'=',$min_salary);
        if($max_salary >= 0)
            $query->where("max_salary",'=',$max_salary);

        return $query->get();;
    }

    /**
     * Read JSON format a record of Jobs from DB. then id is Number of job
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

    /**
     * List Of Jobs from Database in Json format
     * @return String Json Format
     */
    public function jobs()
    {
        $result = $this->getJobs();
        $status_code = is_array($result) && count($result) == 0 ? $this->STATUS_CODE_NOT_FOUND : $this->STATUS_CODE_OK;

        return $this->json($result, $status_code);
    }

    /**
     * get Json Model of Jobs from DB that min_salary value = $min_salary
     * @param $min_salary
     * @return String Json Format
     */
    public function jobMinSalary($min_salary){
        $result = $this->getJobs($min_salary);
        $status_code = is_array($result) && count($result) == 0 ? $this->STATUS_CODE_NOT_FOUND : $this->STATUS_CODE_OK;

        return $this->json($result, $status_code);
    }

    /**
     * get Json Model of Jobs from DB that Max_salary value = $max_salary
     * @param $max_salary
     * @return String Json Format
     */
    public function jobMaxSalary($max_salary){
        $result = $this->getJobs(-1,$max_salary);
        $status_code = is_array($result) && count($result) == 0 ? $this->STATUS_CODE_NOT_FOUND : $this->STATUS_CODE_OK;

        return $this->json($result, $status_code);
    }
}
