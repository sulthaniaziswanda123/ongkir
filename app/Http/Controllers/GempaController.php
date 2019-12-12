<?php

namespace App\Http\Controllers;

use GuzzleHttp\Exception\GuzzleException;
use function GuzzleHttp\Psr7\get_message_body_summary;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class GempaController extends Controller
{
    public function index()
    {
        $client = new Client();

        $response_gempa = $client->request('GET', 'http://api.ngongkir.company:50700/gempa/all');

        $gempa = json_decode($response_gempa->getBody(), true);

//        dd($gempa);

        return view('gempa.index', ['gempas' => $gempa['results']]);
    }

    public function ongkir($latitude, $longitude)
    {
        $client = new Client();

        $response = $client->request('GET', 'http://api.ngongkir.company:50700/coor/', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'body' => json_encode(
                [
                    "latitude" => $latitude,
                    "longitude" => $longitude
                ]
            )
        ]);

        $data = json_decode($response->getBody(), true);

        $client = new Client();

        $response_city = $client->request('GET', 'https://api.rajaongkir.com/starter/city', [
            'headers' => [
                'key' => '1b615bab90de2d26b91e851ec526c669'
            ]

        ]);

        $city = json_decode($response_city->getBody(), true);

        return view('gempa.indexHarga', ['cities' => $city['rajaongkir']['results'], 'destination' => $data, 'lat' => $latitude, 'lon' => $longitude]);
    }

    public function store(Request $request, $latitude, $longitude)
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
                "weight" => $weight * 1000,
                "courier" => $courier
            ]
        ]);

        $response = $response->getBody();
        $data = json_decode($response, 'true');

        $asal = $data['rajaongkir']['origin_details'];
        $tujuan = $data['rajaongkir']['destination_details'];

        return view('gempa.indexHarga',
            [
                'datas' => $data['rajaongkir']['results'],
                'origin' => $asal, 'destination' => $asal,
                'cities' => $city['rajaongkir']['results'],
                'lat' => $latitude,
                'lon' => $longitude
            ]);

    }
}
