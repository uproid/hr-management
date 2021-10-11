<?php

namespace App\Http\Controllers\ToombaApi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ToombaApi\RegionModel;

class RegionController extends ApiController
{
    /**
     * Read records Region from DB. if id = null then you receive all records
     *
     * @param null|integer $id
     * @return \Illuminate\Support\Collection
     */
    public function getRegion($id){
        $result = RegionModel::find($id);
        return $result;
    }

    public function getRegions(){
        $result = RegionModel::get();
        return $result;
    }

    /**
     * Read JSON format records Region from DB. if id = null then you receive all records
     *
     * @param null|integer $id
     * @return \Illuminate\Support\Collection
     */
    public function region($id = null){
        $result = $this->getRegion($id);
        $status_code = is_array($result) && count($result) == 0 ? $this->STATUS_CODE_NOT_FOUND : $this->STATUS_CODE_OK;
        return $this->json($result, $status_code);
    }
}
