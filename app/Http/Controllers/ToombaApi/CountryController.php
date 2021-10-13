<?php

namespace App\Http\Controllers\ToombaApi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ToombaApi\CountryModel;

class CountryController extends ApiController
{
    /**
     * Read one records Country from DB by id
     *
     * @param null|integer $id
     * @return \Illuminate\Support\Collection
     */
    public function getCountry($id){
        $result = CountryModel::find($id);
        $regionController = new RegionController();
        $result->region = $regionController->getRegion($result->region_id);

        return $result;
    }

    /**
     * get list of all countries from Table
     * @return Array model for output
     */
    public function getCountries(){
        $result = CountryModel::get();

        $regionController = new RegionController();
        foreach ($result as $country){
            $country->region = $regionController->getRegion($country->region_id);
        }

        return $result;
    }

    /**
     * Read JSON format records Country from DB. if id = null then you receive all records
     *
     * @param null|integer $id
     * @return String json model for output
     */
    public function country($id = null){
        $result = $this->getCountry($id);
        $status_code = is_array($result) && count($result) == 0 ? $this->STATUS_CODE_NOT_FOUND : $this->STATUS_CODE_OK;
        return $this->json($result, $status_code);
    }
}
