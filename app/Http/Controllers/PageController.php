<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Province;
use App\Models\City;
use App\Models\Courier;
use GuzzleHttp\Client;
use Kavist\RajaOngkir\Facades\RajaOngkir;

class PageController extends Controller
{
    public function index(){
        $couriers = Courier::pluck('title','code');
        $provinces = Province::pluck('title','province_id');
        return view('form', compact('couriers','provinces'));
    }

    public function getCities($id){
        $city = City::where('province_id',$id)->pluck('title','city_id');
       
        return json_encode($city);
    }

    public function submit(Request $request){

        $client = new Client();
        $response = $client->request('POST', 'https://api.rajaongkir.com/starter/cost',
        [
            'body'=>'origin='.$request->origin.'&destination='.$request->destination.'&weight='.($request->weight * 1000).'&courier='.$request->courier,
            'headers'=>[
                'key'=>'7087b0ad65caf8acc15ab3ef5703868f',
                'content-type' => 'application/x-www-form-urlencoded',
            ]
        ]
            );

            
            $json = $response->getBody()->getContents();
            $array = json_decode($json, true);

            $origin = $array["rajaongkir"]["origin_details"]["city_name"];
            $provinsi = $array["rajaongkir"]["origin_details"]["province"];
            $destination = $array["rajaongkir"]["destination_details"]["city_name"];
            $courier = $request->courier;
            $weight = $request->weight;
            $name = $request->name;
            $rname = $request->rname;

            return view('checkout', compact('provinsi','origin','destination','array','courier','weight','name','rname'));
    
}

    

}
