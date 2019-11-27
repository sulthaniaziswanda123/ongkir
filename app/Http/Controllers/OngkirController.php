<?php

namespace App\Http\Controllers;

use GuzzleHttp\Exception\GuzzleException;
use function GuzzleHttp\Psr7\get_message_body_summary;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class OngkirController extends Controller
{
    public function index()
    {
        $client = new Client();

        $response_city = $client->request('GET', 'https://api.rajaongkir.com/starter/city', [
            'headers' => [
                'key' => '1b615bab90de2d26b91e851ec526c669'
            ]

        ]);

        $city = json_decode($response_city->getBody(), true);

        // dd($city);

        return view('ongkir.index', ['cities' => $city['rajaongkir']['results']]);
    }

    public function store(Request $request)
    {
        $client = new Client();

        $response_city = $client->request('GET', 'https://api.rajaongkir.com/starter/city', [
            'headers' => [
                'key' => '1b615bab90de2d26b91e851ec526c669'
            ]

        ]);

        $city = json_decode($response_city->getBody(), true);

        $origin = $request->origin;
        $destination = $request->destination;
        $weight = $request->weight;
        $courier = $request->courier;

        $client = new Client();

        $response = $client->post('https://api.rajaongkir.com/starter/cost', [
            'headers' => [
                'key' => '1b615bab90de2d26b91e851ec526c669'
            ],
            'form_params' => [
                "origin" => $origin,
                "destination" => $destination,
                "weight" => $weight,
                "courier" => $courier
            ]
        ]);

        $response = $response->getBody();
        $data = json_decode($response, 'true');
        
        $asal = $data['rajaongkir']['origin_details'];
        $tujuan =  $data['rajaongkir']['destination_details'];

           return view('ongkir.index',
               [ 'datas' => $data['rajaongkir']['results'],
                   'origin' => $asal, 'destination' => $tujuan,
                   'cities' => $city['rajaongkir']['results']
               ]);

    }
}