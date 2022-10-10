<?php

namespace Database\Seeders;

use App\Models\Property;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $url = env('API_URL') . '/properties?api_key=' . env('API_KEY') . '&page[size]=100';
        $res = Http::get($url);

        $json_res = $res->status() === 200 ? $res->json() : [];

        $last_page = $json_res['last_page'];

        for ($i = 1; $i <= $last_page; $i++) {
            $res = Http::get($url . "&page[number]=" . $i);

            if ($res->status() === 200) {
                foreach ($res->json()['data'] as $data) {
                    Property::create([
                        "uuid" => $data['uuid'],
                        "county" => $data['county'],
                        "country" => $data['country'],
                        "town" => $data['town'],
                        "description" => $data['description'],
                        "full_url" => !empty($data['full_url']) ? $data['full_url'] : 'xxxx',
                        "address" => $data['address'],
                        "image_full" => $data['image_full'],
                        "image_thumbnail" => $data['image_thumbnail'],
                        "latitude" => $data['latitude'],
                        "longitude" => $data['longitude'],
                        "num_bedrooms" => $data['num_bedrooms'],
                        "num_bathrooms" => $data['num_bathrooms'],
                        "price" => $data['price'],
                        "type" => $data['type'],
                        "property_type" => json_encode($data['property_type']),
                        "from" => "api",
                    ]);
                }
            }
        }
    }
}
