<?php

namespace App\Http\Controllers;

use App\Models\addresses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Inertia\Inertia;

class SearchRadiusController extends Controller
{
    public function index($extraParams = [])
    {
        $addresses = addresses::all();
        return Inertia::render('Addresses/searchradius', ['addresses' => $addresses, 'results' => $extraParams]);
    }

    public function search(Request $request)
    {
        $geo_lat = $request->address['geo_lat'];
        $geo_lon = $request->address['geo_lon'];
        $radius = $request->radius;

        $location = $geo_lat .',' . $geo_lon;
        $params = [
            'key' => 'AIzaSyDrRHRgb1PWLWRpEFdmjfH8NN4nzBPUXrw',
            'location' => $location,
            'radius' => $radius
        ];

        $results = $this->requestGoogleApi($params);
        $results = $results['results'];

//      Selecting Cities from the results
        $cities = [];

        foreach($results as $result){
            if($result['types'][0]  == 'locality'){
                array_push($cities, $result);
            }
        }

        $addresses = addresses::all();

        return Inertia::render('Addresses/searchradius', ['addresses' => $addresses, 'results'=> $cities]);
    }

    /**
     * Makes a request to the Google-Maps API with the params array
     *
     * @param  array $params
     * @return void
     */
    private function requestGoogleApi($params = [])
    {
        // return  Http::withOptions($params)->get('https://maps.googleapis.com/maps/api/geocode/json');
        return Http::get('https://maps.googleapis.com/maps/api/place/nearbysearch/json', $params )->json();
    }
}
