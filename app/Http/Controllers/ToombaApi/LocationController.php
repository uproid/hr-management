<?php

namespace App\Http\Controllers\ToombaApi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ToombaApi\LocationModel;

class LocationController extends ApiController
{
    /**
     * Read records Location from DB.
     *
     * @param null|integer $id
     * @return \Illuminate\Support\Collection
     */
    public function getLocation($id){
        $result = LocationModel::find($id);
        $countryController = new CountryController();
        $result->country = $countryController->getCountry($result->country_id);

        return $result;
    }

    /**
     * Eead all records Location from DB.
     * @return \Illuminate\Support\Collection
     */
    public function getLocations(){
        $result = LcationModel::get();
        $countryController = new CountryController();

        foreach ($result as $location){
            $location->country = $countryController->getCountry($location->country_id);
        }

        return $result;
    }

    /**
     * Read JSON format records Location from DB.
     *
     * @param null|integer $id
     * @return \Illuminate\Support\Collection
     */
    public function location($id = null){
        $result = $this->getLocation($id);
        $status_code = is_array($result) && count($result) == 0 ? $this->STATUS_CODE_NOT_FOUND : $this->STATUS_CODE_OK;
        return $this->json($result, $status_code);
    }
}
