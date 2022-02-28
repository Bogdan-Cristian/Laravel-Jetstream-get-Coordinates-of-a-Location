<?php

namespace App\Http\Controllers;

use App\Models\addresses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Inertia\Inertia;

class AddressesController extends Controller
{

    /**
     * addresses
     *
     * @var mixed
     */
    protected $addresses;

    protected $apiKey;

    public function __construct(addresses $addresses)
    {
        $this->apiKey = env('GOOGLE_API_KEY') ?? '';
        $this->addresses = $addresses;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Returning the view with addresses
        $addresses = $this->addresses::all();

        return Inertia::render('Addresses/index', ['addresses' => $addresses]);
        //        return view('overview', ['addresses' => $addresses]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Requested Address
//
//        if(isset($request->address) || $request->address === null)
//        {
//           return redirect()->back()->with('message', 'Fked up');
//        }

        $address = $request->address;

        // Making the Request to the Google Maps API
        $params = [
            'key' => $this->apiKey,
            'address' => $address,
        ];

        $res = $this->requestGoogleAPI($params);

        // Getting the array with latitude and longitude
        $geo_coordinates = $res['results'][0]['geometry']['location'];

        $address_format = $res['results'][0]['formatted_address'];
        $address_lat = $geo_coordinates['lat'];
        $address_lon = $geo_coordinates['lng'];

        // Persisting the addresses model with the result from the Response of the Google Maps API
        $addressModel = new addresses;
        $addressModel->address = $address_format;
        $addressModel->geo_lat = $address_lat;
        $addressModel->geo_lon = $address_lon;
        $addressModel->save();

        // Redirecting back with a status
        return redirect()->back()->with('success', 'You just added a new address to your list');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $address = [$this->addresses->find($id)];
        return Inertia::render('Addresses/index' , ['addresses' => $address]);


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        $newAddress = $request->address;

        $requestParams = [
            'key' => $this->apiKey,
            'address' => $newAddress,
        ];

        $res = $this->requestGoogleAPI($requestParams);
        // Getting the array with latitude and longitude
        $geo_coordinates = $res['results'][0]['geometry']['location'];

        $newParams = [
            'address' => $res['results'][0]['formatted_address'],
            'geo_lat' => $geo_coordinates['lat'],
            'geo_lon' => $geo_coordinates['lng']
        ];

//        dd($newParams);
        if ($request->has('id')) {
            $this->addresses::find($id)->update($newParams);
            return redirect()->back()
                             ->with('message', 'Post Updated Successfully.');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($id) {
            $this->addresses::find($id)->delete();
            return redirect()->back();
        }
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
        return Http::get('https://maps.googleapis.com/maps/api/geocode/json?', $params )->json();
    }

}
